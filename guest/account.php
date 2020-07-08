<?php



//reg valid
if ($_POST['register_f']) {


    valid_name();
    valid_wallet();
    valid_pass();

    db();
    if(mysqli_num_rows(mysqli_query($db,"SELECT `id` FROM `users` WHERE `wallet` = '$_POST[wallet]'"))){
        message("Այս դրամապանակը արդեն գրանցված է");
    }

    mysqli_query($db, "INSERT INTO `users` VALUES('', '$_POST[name]', '$_POST[wallet]', '$_POST[password]', 0, '$_SERVER[REMOTE_ADDR]', 0)");

    message("Շնորհավորում ենք Դուք հաջողությամբ գրանցվել եք, կարող եք մուտք գործել ձեր անձնական էջ");

}


else if ($_POST['login_f']){

    valid_name();
    valid_wallet();
    valid_pass();
    db();

    $query = mysqli_query($db,"SELECT * FROM `users` WHERE `wallet` = '$_POST[wallet]' AND  `name` = '$_POST[name]' AND  `password` = '$_POST[password]'");

    if(!mysqli_num_rows($query)){
        message('Բոլոր դաշտերը լրացրեք ճիշտ');
    }

    $row = mysqli_fetch_assoc($query);

    foreach ($row as $key => $val){
        $_SESSION[$key] = $val;
    }
    go('profile');
}

else if($_POST['bonus_f']){
    message('Բոնուս ստանալու համար պետք է գրանցվել կամ մուտք գործել');
}
?>
