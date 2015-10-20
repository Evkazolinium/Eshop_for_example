<? include ROOT.'/views/layouts/header_admin.php';?>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Редактирование товара</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Название товара</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" value="<?=$product['name'];?>" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="code">Код товара</label>
              <div class="col-md-9">
                <input id="code" name="code" type="text" value="<?=$product['code'];?>" class="form-control">
              </div>
            </div>
    
	        <div class="form-group">
              <label class="col-md-3 control-label" for="price">Цена товара</label>
              <div class="col-md-9">
                <input id="price" name="price" type="text" value="<?=$product['price'];?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="brand">Производитель</label>
              <div class="col-md-9">
                <input id="brand" name="brand" type="text" value="<?=$product['brend'];?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="genre_id">Жанр</label>
              <div class="col-md-9">
                <select id="genre_id" name="genre_id"  class="form-control">
                    <?php if(is_array($genreList)):?>
                        <?php foreach($genreList as $genre):?>
                           <option value="<?=$genre['id'];?>">
                               <?=$genre['name'];?>
                           </option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="image">Изображение</label>
              <div class="col-md-9">
                <img src="<?=Products::getImage($product['id']); ?>" alt="">
                <input id="image" name="image" type="file"  class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="platform_id">Платформа</label>
              <div class="col-md-9">
                <select id="platform_id" name="platform_id"  class="form-control">
                    <?php if(is_array($platformList)):?>
                        <?php foreach($platformList as $platform):?>
                           <option value="<?=$platform['id'];?>"  
                               <?php if($cplatform['id'] == $product['platform_id']) echo "selected='selected'"?>>
                               <?=$platform['name_platforms'];?>
                           </option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="description">Описание товара</label>
              <div class="col-md-9">
                <textarea class="form-control" id="description" name="description" rows="5"><?=$product['description'];?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="availability">Наличие на складе</label>
              <div class="col-md-9">
                <select id="availability" name="availability"  class="form-control">
                    <option value="1" <?php if($product['availability'] == 1) echo "selected='selected'"; ?>>Да</option>
                    <option value="0" <?php if($product['availability'] == 0) echo "selected='selected'"; ?>>Нет</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="is_recomend">Рекомендуемое</label>
              <div class="col-md-9">
                <select id="is_recomend" name="is_recomend"  class="form-control">
                    <option value="1" <?php if($product['is_recomend'] == 1) echo "selected='selected'"; ?>>Да</option>
                    <option value="0" <?php if($product['is_recomend'] == 0) echo "selected='selected'"; ?>>Нет</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="is_new">Новинки</label>
              <div class="col-md-9">
                <select id="is_new" name="is_new"  class="form-control">
                    <option value="1" <?php if($product['is_new'] == 1) echo "selected='selected'"; ?>>Да</option>
                    <option value="0" <?php if($product['is_new'] == 0) echo "selected='selected'"; ?>>Нет</option>
                </select>
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-3 control-label" for="status">Отображается на сайте</label>
              <div class="col-md-9">
                <select id="status" name="status"  class="form-control">
                    <option value="1" <?php if($product['status'] == 1) echo "selected='selected'"; ?>>Да</option>
                    <option value="0" <?php if($product['status'] == 0) echo "selected='selected'"; ?>>Нет</option>
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
                <a href="/evkazolinAdminka/product/" class="btn btn-primary btn-lg">Назад</a>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
<? include ROOT.'/views/layouts/footer_admin.php';?>