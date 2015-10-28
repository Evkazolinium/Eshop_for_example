<? include ROOT.'/views/layouts/header_admin.php';?>

<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h2>Управление товарами</h2>
        
            <div class="table-responsive">
                <div class="col-md-12">
                     <a href="/evkazolinAdminka/product/create" class="btn btn-lg btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Добавить товар</a>  
                </div>
            </div>
            <br>
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>id</th>
                    <th>Название</th>
                     <th>Цена</th>
                      <th>Редактировать</th>
                      
                       <th>Удалить</th>
                   </thead>
<?php foreach($productList as $product):?>
    <tbody>
    
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?=$product['id'];?></td>
    <td><?=$product['name']?></td>
    <td><?=$product['price']?></td>
    <td><a href="/evkazolinAdminka/product/update/<?=$product['id'];?>" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a></td>
    <td><p><a href="/evkazolinAdminka/product/delete/<?=$product['id'];?>"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></p></td>
    </tr>
    </tbody>
<?php endforeach;?>
        
</table>

<div class="clearfix"></div>
<?=$pagination->get();?>
                
            </div>
            
        </div>
	</div>
</div>   
<? include ROOT.'/views/layouts/footer_admin.php';?>