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
        <div id="platform"></div>
        <? include ROOT.'/views/layouts/sort.php';?>
		</div>
		<div class="col-md-9">
            <?php if(!empty($products)):?>

                <div class="row">
                    <?php foreach($products as $product) :?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                        <img src="<?=Products::getImage($product['id']); ?>">
                            <div class="caption">
                                <a href="/product/<?=$product['id']?>"><?=$product['name']?></a></h5>
                                <p><h4 ><?=$product['price']?> грн.</h4></p>
                                <a href="#" data-id="<?=$product['id'];?>" class="btn btn-success add-to-basket">Купить</a>
                            </div>
                            <div class="ratings">
                                <a href="" class="pull-right">&nbsp<?=Comment::countCommentsByProduct($product['id']);?> отзывов</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
				<?=$pagination->get();?>
            <?php else: ?> 
                <?="<h2>Раздел наполняется...</h2>";?>
            <?php endif; ?>

		</div>

	</div>

</div>
<!-- /.container -->

<div class="container">

	<hr>
<? include ROOT.'/views/layouts/footer.php';?>
