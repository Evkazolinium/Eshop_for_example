<? include ROOT.'/views/layouts/header.php';?>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="text-center">Свяжитесь с нами</legend>
    
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
    
	        <div class="form-group">
              <label class="col-md-3 control-label" for="subject">Тема сообщения</label>
              <div class="col-md-9">
                <input id="subject" name="subject" type="text" placeholder="Пожалуйста, введите тему сообщения здесь..." class="form-control">
              </div>
            </div>
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
                <button type="submit" class="btn btn-primary btn-lg">Отправить</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
<? include ROOT.'/views/layouts/footer.php';?>