<? include ROOT.'/views/layouts/header.php';?>
<div class="container-fluid">
        <ol class="breadcrumb bread-primary ">
          <a href="/" class="btn btn-primary"><i class="fa fa-newspaper-1"></i> МАГАЗИН </a>
            <li><a href="/catalog/"> КАТАЛОГ </a></li>
            <li><a href="/platform/<?=$platform['id'];?>"><?=$platform['name_platforms'];?></a></li>
            <li class="active"><?=$product['name'];?></li>
        </ol>
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">
				<div class="col-md-13">
					<div class="product col-md-4 service-image-left">
                    
						<center>
							<img id="item-display" src="<?=Products::getImage($product['id']); ?>" alt=""></img>
						</center>
					</div>
					<div class="product-title"><?=$product['name'];?></div><br>
						<div class="ratings on-view">
						<a href="" class="pull-left">&nbsp<?=Comment::countCommentsByProduct($product['id']);?> отзывов</a>
						</div>
					<hr>
					<div class="product-price"><?=$product['price'];?> грн</div>
					<div class="product-stock"><?php if($product['status'] == 1) echo "В наличии";?></div>
					<hr>
					<div class="btn-group cart">
						<a href="#" data-id="<?=$product['id'];?>" class="btn btn-success add-to-basket">Купить</a>
					</div>
				</div>
			</div> 
		</div>
				</div>
		<div class="container-fluid">		
			<div class="col-md-12 product-info">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active"><a href="#service-one" data-toggle="tab">ОПИСАНИЕ</a></li>
						<li><a href="#service-three" data-toggle="tab">ОТЗЫВЫ</a></li>
						
					</ul>
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info">
                                <h3>Описание  <?=$product['name'];?></h3>
								<?=$product['description'];?>
							</section>
										  
						</div>
					<div class="tab-pane fade" id="service-two">
						
						<section class="container">
								
						</section>
						
					</div>
					<div class="tab-pane fade" id="service-three">
                        
                        <section class="container">
				     	<div class="row" id="service-three">
                               <?php if(isset($errors) && is_array($errors)):?>
                                    <ul>
                                        <?foreach($errors as $error):?>
                                            <li><?=$error;?></li>
                                        <?endforeach;?>
                                    </ul>
                                <?endif;?>
                            <?php if(is_array($comments)):?>
                                <?php foreach($comments as $comment):?>
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="panel panel-default">
                                        <div class="panel-heading">
                                        <strong><?=$comment['user_name'];?></strong> <span class="text-muted"><?=$comment['date'];?></span>
                                        </div>
                                        <div class="panel-body">
                                        <?=$comment['message'];?>
                                        </div><!-- /panel-body -->
                                        </div><!-- /panel panel-default -->
                                        </div><!-- /col-sm-5 -->
                                <?php endforeach;?>
                            <?php else:?>
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <strong>Отзывов пока нет</strong>
                                                </div><!-- /panel-body -->
                                            </div><!-- /panel panel-default -->
                                        </div><!-- /col-sm-5 -->
                            <?php endif;?>
                            <div class="col-md-6 col-md-offset-3">
                                <div class="well well-sm">
                                    <form class="form-horizontal" action="" method="post">
                                  <fieldset>
                                    <legend class="text-center">Оставить отзыв</legend>
                                    <?php if(User::isGuest()):?>
                                    <!-- Name input-->
                                    <div class="form-group">
                                      <label class="col-md-3 control-label" for="name">Имя</label>
                                      <div class="col-md-9">
                                        <input id="name" name="name" type="text" placeholder="Ваше имя" class="form-control">
                                      </div>
                                    </div>

                                    <!-- Email input-->
                                    <div class="form-group">
                                      <label class="col-md-3 control-label" for="email">Ваш E-mail</label>
                                      <div class="col-md-9">
                                        <input id="email" name="email" type="text" placeholder="Ваш email" class="form-control">
                                      </div>
                                    </div>
                                    <?php endif;?>
                                    <!-- Message body -->
                                    <div class="form-group">
                                      <label class="col-md-3 control-label" for="message">Введите сообщение</label>
                                      <div class="col-md-9">
                                        <textarea class="form-control" id="message" name="message" placeholder="Пожалуйста, введите Ваше сообщение здесь..." rows="5"></textarea>
                                      </div>
                                    </div>

                                    <!-- Form actions -->
                                    <div class="form-group">
                                      <div class="col-md-12 text-right">
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Отправить</button>
                                      </div>
                                    </div>
                                  </fieldset>
                                  </form>
                                </div>
                            </div>
                        </div>
                        </section>
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>

<? include ROOT.'/views/layouts/footer.php';?>
