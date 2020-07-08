<?php top("Անձնական էջ"); ?>


<div id="login" class="content">
    <h1 class="text-center"><?=$_SESSION['name']?></h1>
    <hr>
    <h3 class="text-center">Գումար - <span><?=r2f($_SESSION['balance'])?></span> դրամ</h3>
    <button onclick="send_post('account', 'pay')" class="btn btn-primary btn-lg btn-block">Կանխիկացնել</button>
    <hr>
    <p class="text-center">Գրանցման IP - <?=$_SERVER['REMOTE_ADDR']?></p>
    <? if($_SESSION['protect'] == 1):?>
    <input type="hidden" id="protect" value="0"><button onclick="send_post('account', 'protect', 'protect')" class="btn btn-primary btn-lg btn-block">Պասիվացնել մուտք միայն այս IP-ով</button>
    <? else : ?>
    <input type="hidden" id="protect" value="1"><button onclick="send_post('account', 'protect', 'protect')" class="btn btn-primary btn-lg btn-block">Ակտիվացնել մուտք միայն այս IP-ով</button>
     <? endif; ?>
    <button onclick="send_post('account', 'logout')" class="btn btn-primary btn-lg btn-block">Ելք</button>
</div>

<?php bottom(); ?>


