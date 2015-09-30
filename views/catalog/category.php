<? include ROOT.'/views/layouts/header.php';?>

<!-- Page Content -->
<div class="container">

	<div class="row">

		<div class="col-md-3">
			<p class="lead">Платформы</p>
			<div class="list-group">
				<?php foreach($categories as $categoryItem) :?>
						<a href="/category/<?=$categoryItem['id'];?>"
							class="<? if($categoryItem['id'] == $categoryId) echo 'list-group-item-active'; else echo 'list-group-item';?>">
							<?=$categoryItem['name'];?></a>
					<? endforeach;?>
			</div>
		</div>

		<div class="col-md-9">

			<div class="row">
				
				<?php foreach($categoryProduct as $product) :?>
				
				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
						<img src="http://placehold.it/320x150" alt="" src="/template/images/new_lable.jpeg" alt="">
						<div class="caption">
							<a href="/product/<?=$product['id']?>"><?=$product['name']?></a></h5>
							<p><h4 ><?=$product['price']?> грн.</h4></p>
						</div>
						<div class="ratings">
							<p class="pull-right">15 reviews</p>
							<p>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
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
