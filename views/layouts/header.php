<!DOCTYPE html>
<html lang="en">

<head>

    <link href="/template/css/bootstrap.css" rel="stylesheet">
	<link href="/template/css/register.css" rel="stylesheet">

    <link href="/template/css/view-product.css" rel="stylesheet">
    <link href="/template/css/shop-homepage.css" rel="stylesheet">
    <!-- In <head> -->

    <!-- In <body> -->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
				<!-- Collect the nav links, forms, and other content for toggling -->
					<ul class="nav navbar-nav">
						<li>
							<a class="navbar-brand" href="/">Главная</a>
						</li>
						<li>
							<a class="navbar-brand" href="/catalog/">Каталог</a>
						</li>
						<li>
							<a class="navbar-brand" href="/basket/">Корзина
							<span id="basket-count"> <?=Basket::countItem();?> </span>
							</a>
						</li>
						<?php if(User::isGuest()):?>
						<li>
							<a class="navbar-brand" href="/user/login/">Вход</a>
						</li>
						<li>
							<a class="navbar-brand" href="/user/register/">Регистрация</a>
						</li>
						<?php else:?>
						<li>
							<a class="navbar-brand" href="/cabinet/">Личный кабинет</a>
						</li>
						<li>
							<a class="navbar-brand" href="/user/logout/">Выход</a>
						</li>
						<?php endif;?>
						<li>
							<a class="navbar-brand" href="/contact/">Контакты</a>
						</li>
					</ul>
				</div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	