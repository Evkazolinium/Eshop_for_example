<? include ROOT.'/views/layouts/header.php';?>

<!-- Page Content -->
<div class="container">

	<div class="row">

       	<div class="col-md-3">
			<p class="lead">Платформы</p>
			<div class="list-group">
				<?php foreach($platforms as $platformItem) :?>
					<a href="/platform/<?=$platformItem['id'];?>" class="list-group-item <? if($platformId == $platformItem['id']) echo 'active';?>"><?=$platformItem['name_platforms'];?></a>
				<? endforeach;?>
			</div>
            <p class="lead">Жанры</p>
			<div class="list-group">
				<?php foreach($genres as $genreItem) :?>
					<a href="/genre/<?=$genreItem['id'];?>" class="list-group-item <? if($genreId == $genreItem['id']) echo 'active';?>"><?=$genreItem['name'];?></a>
				<? endforeach;?>
			</div>
		</div>

		<div class="col-md-9">

			<div class="row carousel-holder">

				<div class="col-md-12">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<img class="slide-image" src="/upload/images/products/romeII.png" alt="">
							</div>
							<div class="item">
								<img class="slide-image" src="/upload/images/products/AS_BF.png" alt="">
							</div>
						</div>
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
				</div>

			</div>

			<div class="row">
				
				<?php $i=0; foreach($productList as $productItem) :?>
				
				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
					<img src="<?=Products::getImage($productItem['id']); ?>">
						<div class="caption">
							<h5><a href="/product/<?=$productItem['id']?>"><?=$productItem['name']?></a></h5>
							<p><h4 ><?=$productItem['price']?> грн.</h4></p>
						<a href="#" data-id="<?=$productItem['id'];?>" class="btn btn-success add-to-basket">Купить</a>
						</div>
                        <div class="ratings">
							<a href="" class="pull-right">&nbsp<?=Comment::countCommentsByProduct($productItem['id']);?> отзывов</a>
                        </div>
					</div>
				</div>
				<?php $i++; endforeach;?>
			</div>

		</div>

	</div>

</div>
<!-- /.container -->

<div class="container">

	<hr>
<? include ROOT.'/views/layouts/footer.php';?>
