<?php top("Աշխատեք գումար առանց ներդնելու"); ?>


<div id="home" class="content">
    <h1 class="text-center">Ստացիր քո բոնուսը</h1>
    <hr>
    <div class="form">
        <button onclick="send_post('account', 'bonus')" class="btn btn-primary btn-lg btn-block">Ստանալ</button>
    </div>
    <hr>
    <h3 class="text-center">10 Ակտիվ օգտատերերը</h3>
    <hr>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Մականուն</th>
            <th>Գումար</th>
        </tr>
        </thead>
        <tbody>
        <?php

        db();

        $query = mysqli_query($db, "SELECT * FROM `users` ORDER BY `balance` DESC LIMIT 10");
        if (mysqli_num_rows($query)){
            while ($row = mysqli_fetch_assoc($query)){
                echo '<tr><th scope="row">'.$row['id'].'</th><td>'.$row['name'].'</td><td>'.$row['balance']. ' դրամ</td></tr>';
            }
        }
        ?>
        </tbody>
    </table>
</div>



<?php bottom(); ?>



