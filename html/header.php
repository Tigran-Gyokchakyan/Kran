<?php $Ball = r2f($_SESSION['balance'])?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	var amout = <?php echo $Ball ?>
	</script>
    <script src="/js/sender.js"></script>
</head>
<body>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Carousel items -->
        <div class="col-md-3">
            <div class="row">
                <div id="carousel-pager" class="carousel slide " data-ride="carousel" data-interval="1000">

                    <div class="carousel-inner vertical">
                        <div class="active item">
                            <img src="http://placehold.it/600/f44336/000000&text=First+Slide" class="img-responsive" data-target="#carousel-main" data-slide-to="0">
                        </div>
                        <div class="item">
                            <img src="http://placehold.it/600/e91e63/000000&text=Second+Slide" class="img-responsive" data-target="#carousel-main" data-slide-to="1">
                        </div>
                        <div class="item">
                            <img src="http://placehold.it/600/9c27b0/000000&text=Third+Slide" class="img-responsive" data-target="#carousel-main" data-slide-to="2">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">

                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                            <ul class="nav navbar-nav">
                                <li><a href="/">Բոնուս</a></li>
                                <li><a href="/games">Կրկնապատկել բոնուսը</a></li>
                                <li><? if ($_SESSION['id']): ?><a href="/profile">Անձնական էջ</a></li>
                            </ul>
                        <? else : ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/login">Մուտք</a></li>
                                <li><a href="/register">Գրանցվել</a></li>
                            </ul>
                        <? endif; ?>
                    </div>
                </nav>