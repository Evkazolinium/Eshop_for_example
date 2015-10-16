<? include ROOT.'/views/layouts/header.php';?>
<div class="container">
	<?if($result):?>
	<p><h4>Вы зарегистрированны!</h4></p>
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
			  <legend class="">Регистрация</legend>
			</div>
			<div class="control-group">
			  <!-- Username -->
			  <label class="control-label"  for="username">Имя</label>
			  <div class="controls">
				<input type="text" id="username" name="username" placeholder="Имя" class="input-xlarge" value="<?=$username;?>">
				<p class="help-block">Имя может содержать любые буквы или цифры, без пробелов</p>
			  </div>
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
				<p class="help-block">Пароль должен быть больше 4 символов</p>
			  </div>
			</div>
		 
			<div class="control-group">
			  <!-- Password -->
			  <label class="control-label"  for="password_confirm">Пароль (повтор)</label>
			  <div class="controls">
				<input type="password" id="password_confirm" name="password_confirm" placeholder="Повторите пароль" class="input-xlarge">
				<p class="help-block">Повторите пароль</p>
			  </div>
			</div>
		 
			<div class="control-group">
			  <!-- Button -->
			  <div class="controls">
				<button name="submit" class="btn btn-success">Регистрация</button>
			  </div>
			</div>
		  </fieldset>
		</form>
		<?endif;?>
</div>
<? include ROOT.'/views/layouts/footer.php';?>