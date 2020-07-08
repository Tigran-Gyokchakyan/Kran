<?php
if($_POST['protect_f']){

    $_POST['protect']+=0;

    if($_POST['protect_f'] !=0 and $_POST['protect_f'] !=1 ){
        message('Տեղի է ունեցել սխալ');
    }

    db();
    mysqli_query($db,"UPDATE `users` SET `protect` = $_POST[protect] WHERE `id` = $_SESSION[id]");
    $_SESSION['protect'] = $_POST['protect'];

     message('Հաստատված է')  ;
}
elseif ($_POST['logout_f']){
    session_destroy();
    go('login');
}

else if($_POST['bonus_f']){
    valid_captcha();

    $time = time();

    db();

    $query = mysqli_query($db, "SELECT `time` FROM `blim` WHERE `ip` = '$_SERVER[REMOTE_ADDR]'");
    $limit = strtotime('+ 3 minute');

    if (!mysqli_num_rows($query)) {
        mysqli_query($db, "INSERT INTO `blim` VALUES ('$_SERVER[REMOTE_ADDR]', $limit)");
    } else {
        $row = mysqli_fetch_assoc($query);
        if ($time < $row['time'])
            message('Խնդրում ենք սպասել: '.($row['time'] - $time).' վարկյան.');

        mysqli_query($db, "UPDATE `blim` SET `time` = $limit WHERE `ip` = '$_SERVER[REMOTE_ADDR]'");
    }

    $bonus = round(mt_rand(MIN_BONUS, MAX_BONUS) / mt_rand((MIN_BONUS*5), (MAX_BONUS*2)),2 );

    mysqli_query($db, "UPDATE `users` SET `balance` = `balance` + $bonus WHERE `id` = $_SESSION[id]");
    $_SESSION['balance'] += $bonus;

    message('Շնորհավորում ենք Դուք ստացաք '   .$bonus .  ' դրամ' );
}
elseif ($_POST['pay_f']){

    if ($_SESSION['balance'] < MIN_PAY){
        message('Գումարը կարող եք կանխիկացնել '. MIN_PAY. ' դրամից սկսած');
    }



    db();

    $_SESSION['balance'] = 0;

    mysqli_query($db, "UPDATE `users` SET `balance` = 0 WHERE `id` = $_SESSION[id]");

    require_once('cpayeer.php');
    $accountNumber = PAYEER_ACCOUNT;
    $apiId = PAYEER_ID;
    $apiKey = PAYEER_SECRET;
    $payeer = new CPayeer($accountNumber, $apiId, $apiKey);
    if ($payeer->isAuth())
    {
        $arTransfer = $payeer->transfer(array(
            'curIn' => 'RUB',
            'sum' => 0.10,
            'curOut' => 'RUB',
            'to' => PAYEER_ID,
            'comment' => 'Գումարի կանխիկացում',
        ));
        if (empty($arTransfer['errors'])){
            message( $arTransfer['historyId'].": Перевод средств успешно выполнен");
        }
        else {
            message(print_r($arTransfer["errors"], true));
        }
    }
    else{
       message(print_r($payeer->getErrors(), true));
    }

}
?>

