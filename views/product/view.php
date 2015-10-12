<? include ROOT.'/views/layouts/header.php';?>
<div class="container-fluid">
        <ol class="breadcrumb bread-primary ">
          <button href="/" class="btn btn-primary"><i class="fa fa-newspaper-1"></i> МАГАЗИН </button>
            <li><a href="/catalog/"> КАТАЛОГ </a></li>
            <li><a href="/category/<?=$platform['id'];?>"><?=$platform['name_platforms'];?></a></li>
            <li class="active"><?=$product['name'];?></li>
        </ol>
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">
				<div class="col-md-12">
					<div class="product col-md-4 service-image-left">
                    
						<center>
							<img id="item-display" src="/template/images/320x150.png" alt=""></img>
						</center>
					</div>
					
					<div class="container service1-items col-sm-2 col-md-2 pull-left">
						<center>
							<a id="item-1" class="service1-item">
								<img src="/template/images/320x150.png" alt=""></img>
							</a>
							<a id="item-2" class="service1-item">
								<img src="/template/images/320x150.png" alt=""></img>
							</a>
							<a id="item-3" class="service1-item">
								<img src="/template/images/320x150.png" alt=""></img>
							</a>
						</center>
					
					</div>
					<div class="product-title"><?=$product['name'];?></div>
					<div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>
						<div class="ratings on-view">
							<p class="pull-left">
								<span class="glyphicon glyphicon-star-empty"></span>
								<span class="glyphicon glyphicon-star-empty"></span>
								<span class="glyphicon glyphicon-star-empty"></span>
								<span class="glyphicon glyphicon-star-empty"></span>
								<span class="glyphicon glyphicon-star-empty"></span>
							</p>
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
								The Corsair Gaming Series GS600 power supply is the ideal price-performance solution for building or upgrading a Gaming PC. A single +12V rail provides up to 48A of reliable, continuous power for multi-core gaming PCs with multiple graphics cards. The ultra-quiet, dual ball-bearing fan automatically adjusts its speed according to temperature, so it will never intrude on your music and games. Blue LEDs bathe the transparent fan blades in a cool glow. Not feeling blue? You can turn off the lighting with the press of a button.

								<h3>Corsair Gaming Series GS600 Features:</h3>
								<li>It supports the latest ATX12V v2.3 standard and is backward compatible with ATX12V 2.2 and ATX12V 2.01 systems</li>
								<li>An ultra-quiet 140mm double ball-bearing fan delivers great airflow at an very low noise level by varying fan speed in response to temperature</li>
								<li>80Plus certified to deliver 80% efficiency or higher at normal load conditions (20% to 100% load)</li>
								<li>0.99 Active Power Factor Correction provides clean and reliable power</li>
								<li>Universal AC input from 90~264V — no more hassle of flipping that tiny red switch to select the voltage input!</li>
								<li>Extra long fully-sleeved cables support full tower chassis</li>
								<li>A three year warranty and lifetime access to Corsair’s legendary technical support and customer service</li>
								<li>Over Current/Voltage/Power Protection, Under Voltage Protection and Short Circuit Protection provide complete component safety</li>
								<li>Dimensions: 150mm(W) x 86mm(H) x 160mm(L)</li>
								<li>MTBF: 100,000 hours</li>
								<li>Safety Approvals: UL, CUL, CE, CB, FCC Class B, TÜV, CCC, C-tick</li>
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
