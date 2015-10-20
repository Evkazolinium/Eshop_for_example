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

			<div class="row">
				
				<?php foreach($productList as $productItem) :?>
				
				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
					<img src="<?=Products::getImage($productItem['id']); ?>">
						<div class="caption">
							<h5><a href="/product/<?=$productItem['id']?>"><?=$productItem['name']?></a></h5>
							<p><h4 ><?=$productItem['price']?> грн.</h4></p>
						<a href="#" data-id="<?=$productItem['id'];?>" class="btn btn-success add-to-basket">Купить</a>
						</div>
						<div class="ratings">
							<a href="/product/<?=$productItem['id']?>/#service-three" class="pull-right">&nbsp<?=Comment::countCommentsByProduct($productItem['id']);?>  отзывов</a>
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div>

				<?=$pagination->get();?>
		</div>

	</div>

</div>
<!-- /.container -->

<div class="container">

	<hr>
<? include ROOT.'/views/layouts/footer.php';?>
