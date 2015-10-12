<? include ROOT.'/views/layouts/header_admin.php';?>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <div class="modal-body">
        <h4 class="modal-title custom_align" id="Heading">Удалить категорию</h4>
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Вы действительно хотите удалить эту категорию</div>
       
      </div>
    <form method="POST">
        <div class="modal-footer ">
        <input type="submit" name="submit" class="btn btn-success" value="Да"></input>
        <a href="/evkazolinAdminka/category/" class="btn btn-default" data-dismiss="modal">Нет</a>
      </div>
    </form>
        </div>
        </div>
    </div>
</div>
<? include ROOT.'/views/layouts/footer_admin.php';?>