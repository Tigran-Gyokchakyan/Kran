<?php top("Մուտք"); ?>

        <div id="login" class="content">
            <h1 class="text-center">Մուտք</h1>
            <hr>
            <div class="form">
                <div class="form-group text-center">
                    <label for="wallet">Դրամապանակ</label>
                    <input type="text" class="form-control" id="wallet" placeholder="Դրամապանակ">
                </div>
                <div class="form-group text-center">
                    <label for="name">Մուտքանուն</label>
                    <input type="text" class="form-control" id="name" placeholder="Մուտքանուն">
                </div>
                <div class="form-group text-center">
                    <label for="password">Գաղտնաբառ</label>
                    <input type="password" class="form-control" id="password" placeholder="Գաղտնաբառ">
                </div>
                
                <button onclick="send_post('account', 'login', 'wallet.name.password')" class="btn btn-primary btn-lg btn-block">Մուտք</button>
            </div>
        </div>
<?php bottom(); ?>

