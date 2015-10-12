
<? include ROOT.'/views/layouts/header.php';?>
<div class="container">
	<?if($result):?>
		<p>Данные отредактированны</p>
	<?else:?>
		<?php if(isset($errors) && is_array($errors)):?>
			<ul>
				<?foreach($errors as $error):?>
					<li><?=$error;?></li>
				<?endforeach;?>
			</ul>
		<?endif;?>
		<form class="form-horizontal" action='' method="POST">
		  <fieldset>
			<div id="legend">
			  <legend class="">Редактировать</legend>
			</div>
			<div class="control-group">
			  <!-- Username -->
			  <label class="control-label"  for="username">Имя</label>
			  <div class="controls">
				<input type="text" id="username" name="username" placeholder="Имя" class="input-xlarge" value="<?=$username;?>">
				<p class="help-block">Имя может содержать любые буквы или цифры, без пробелов</p>
			  </div>
			</div>
			<br>
			<div class="control-group">
			  <!-- Button -->
			  <div class="controls">
				<button name="submit" class="btn btn-success">Редактировать</button>
			  </div>
			</div>
		  </fieldset>
		</form>
	<?endif;?>
</div>
<? include ROOT.'/views/layouts/footer.php';?>