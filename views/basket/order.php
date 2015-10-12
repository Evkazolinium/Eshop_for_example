<? include ROOT.'/views/layouts/header.php';?>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="text-center">Оформить заказ</legend>
    
              <?php if($result):?>
              <p>Заказ оформлен мы Вам перезвоним</p>
              <?php else:?>
                  <p>Выбранно товаров: <?=$totalQuantity?> шт, на сумму: <?=$totalPrice?> грн.</p>
                  <?php if(isset($errors) && is_array($errors)):?>
                     <ul>
                    <?php foreach($errors as $error):?>
                        <li><?=$error;?></li>
                    <?php endforeach;?>
                     </ul>
                  <?php endif;?>
                <!-- Name input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="name">Имя</label>
                  <div class="col-md-9">
                    <input id="name" name="name" type="text" placeholder="Ваше имя" class="form-control" value="<?=$userName?>">
                  </div>
                </div>

                <!-- Email input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="email">Ваш E-mail</label>
                  <div class="col-md-9">
                    <input id="email" name="email" type="text" placeholder="Ваш email" class="form-control" value="<?=$userEmail?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="phone">Ваш телефон</label>
                  <div class="col-md-9">
                    <input id="phone" name="phone" type="phone" placeholder="Пожалуйста, введите ваш телефон здесь..." class="form-control">
                  </div>
                </div>
                <!-- Message body -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="message">Комментарий</label>
                  <div class="col-md-9">
                    <textarea class="form-control" id="message" name="message" placeholder="Пожалуйста, введите Ваше сообщение здесь..." value="<?=$userComment?>" rows="5"></textarea>
                  </div>
                </div>

                <!-- Form actions -->
                <div class="form-group">
                  <div class="col-md-12 text-right">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Оформить</button>
                  </div>
                </div>
              </fieldset>
              </form>
            <?php endif;?>
        </div>
      </div>
	</div>
</div>
<? include ROOT.'/views/layouts/footer.php';?>