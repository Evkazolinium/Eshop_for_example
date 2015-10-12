<? include ROOT.'/views/layouts/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div id="sidebar" class="well sidebar-nav">
				<p><h3>Привет, <?=$user['name'];?>!</h3></p><br>
                <h5><i class="glyphicon glyphicon-home"></i>
                    <small><b>МОЙ КАБИНЕТ</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="/cabinet/edit/">Редактировать личные данные</a></li>
                    <li><a href="#">Список покупок</a></li>
                    <li><a href="#">Мои отзывы</a></li>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Content Here -->
        </div>
    </div>
</div>
<? include ROOT.'/views/layouts/footer.php';?>