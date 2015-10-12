<? include ROOT.'/views/layouts/header_admin.php';?>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="text-center">Добавление категории</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name_platforms">Название категории</label>
              <div class="col-md-9">
                <input id="name_platforms" name="name_platforms" type="text" value="<?=$category['name_platforms'];?>" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="sort">Порядковый номер</label>
              <div class="col-md-9">
                <input id="sort" name="sort" type="text" value="<?=$category['sort'];?>" class="form-control">
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-3 control-label" for="status">Отображается на сайте</label>
              <div class="col-md-9">
                <select id="status" name="status"  class="form-control">
                    <option value="1" <?php if($category['status'] == 1) echo "selected='selected'"?>>Да</option>
                    <option value="0" <?php if($category['status'] == 0) echo "selected='selected'"?>>Нет</option>
                </select>
              </div>
            </div>   
            <!-- Form actions -->
                <div class="form-group">
                  <div class="col-md-12 text-center">
                <form method="post">
                    <input type="submit" name="submit" class="btn btn-success btn-lg btn3d" value="Сохранить"></input>
                </form>
                  </div>
                </div>
            <div class="form-group">
             <div class="col-md-12 text-right">
                <a href="/evkazolinAdminka/category/" class="btn btn-primary btn-lg">Назад</a>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
<? include ROOT.'/views/layouts/footer_admin.php';?>