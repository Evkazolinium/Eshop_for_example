<? include ROOT.'/views/layouts/header.php';?>
<div class="container">
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
		  <legend class="">Вход</legend>
		</div>
		<div class="control-group">
		  <!-- E-mail -->
		  <label class="control-label" for="email">E-mail</label>
		  <div class="controls">
			<input type="text" id="email" name="email" placeholder="E-mail" class="input-xlarge" value="<?=$email;?>">
			<p class="help-block">Пожалуйста, укажите ваш E-mail</p>
		  </div>
		</div>
	 
		<div class="control-group">
		  <!-- Password-->
		  <label class="control-label" for="password">Пароль</label>
		  <div class="controls">
			<input type="password" id="password" name="password" placeholder="Пароль" class="input-xlarge">
		  </div>
		</div>
		<br>
		<div class="control-group">
		  <!-- Button -->
		  <div class="controls">
			<button name="submit" class="btn btn-success">Вход</button>
		  </div>
		</div>
	  </fieldset>
	</form>
</div>
<? include ROOT.'/views/layouts/footer.php';?>