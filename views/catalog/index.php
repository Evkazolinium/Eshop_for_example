<? include ROOT.'/views/layouts/header.php';?>

<!-- Page Content -->
<div class="container">

	<div class="row">

		<div class="col-md-3">
			<p class="lead">Платформы</p>
			<div class="list-group">
				<?php foreach($categories as $categoryItem) :?>
					<a href="/category/<?=$categoryItem['id'];?>" class="list-group-item"><?=$categoryItem['name_platforms'];?></a>
				<? endforeach;?>
			</div>
		</div>

		<div class="col-md-9">

			<div class="row">
				
                    <?php include('/template/rating/rating.php'); ?>
				<?php foreach($productList as $productItem) :?>
				
				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
					<img src="/template/images/320x150.png">
						<div class="caption">
							<h5><a href="/product/<?=$productItem['id']?>"><?=$productItem['name']?></a></h5>
							<p><h4 ><?=$productItem['price']?> грн.</h4></p>
						<a href="#" data-id="<?=$productItem['id'];?>" class="btn btn-success add-to-basket">Купить</a>
						</div>
							<a href="/product/<?=$productItem['id']?>/#service-three" class="pull-right">&nbsp<?=Comment::countCommentsByProduct($productItem['id']);?>  отзывов</a>
						<div class="ratings">
							<p class="pull-right">
								<span class="glyphicon glyphicon-star-empty"></span>
								<span class="glyphicon glyphicon-star-empty"></span>
								<span class="glyphicon glyphicon-star-empty"></span>
								<span class="glyphicon glyphicon-star-empty"></span>
								<span class="glyphicon glyphicon-star-empty"></span>
							</p>
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
