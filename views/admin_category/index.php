<? include ROOT.'/views/layouts/header_admin.php';?>

<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h2>Управление категориями</h2>
        
            <div class="table-responsive">
                <div class="col-md-12">
                     <a href="/evkazolinAdminka/category/create" class="btn btn-lg btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Добавить категорию</a>  
                </div>
            </div>
            <br>
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>id</th>
                    <th>Название</th>
                     <th>Порядковый номер</th>
                       <th>Статус</th>
                      <th>Редактировать</th>
                      
                       <th>Удалить</th>
                   </thead>
<?php foreach($categoryList as $category):?>
    <tbody>
    
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?=$category['id'];?></td>
    <td><?=$category['name_platforms']?></td>
    <td><?=$category['sort']?></td>
    <td><?=$category['status']?></td>
    <td><a href="/evkazolinAdminka/category/update/<?=$category['id'];?>" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a></td>
    <td><p><a href="/evkazolinAdminka/category/delete/<?=$category['id'];?>"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></p></td>
    </tr>
    </tbody>
<?php endforeach;?>
        
</table>

<div class="clearfix"></div>
                
            </div>
            
        </div>
	</div>
</div>   
<? include ROOT.'/views/layouts/footer_admin.php';?>