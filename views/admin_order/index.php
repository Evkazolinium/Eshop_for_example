<? include ROOT.'/views/layouts/header_admin.php';?>

<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h2>Управление заказами</h2>
            <br>
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>id</th>
                    <th>Имя покупателя</th>
                     <th>Телефон покупателя</th>
                       <th>Email покупателя</th>
                       <th>Дата оформления</th>
                       <th>Статус заказа</th>
                       <th>Просмотр заказа</th>
                      <th>Редактировать</th>
                      
                       <th>Удалить</th>
                   </thead>
<?php foreach($orderList as $order):?>
    <tbody>   
    
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?=$order['id'];?></td>
    <td><?=$order['user_name']?></td>
    <td><?=$order['user_phone']?></td>
    <td><?=$order['user_email']?></td>
    <td><?=$order['date']?></td>
    <td><?=$order['status']?></td>
    <td><p><a href="/evkazolinAdminka/order/view/<?=$order['id'];?>" class="btn btn-primary btn-xs" ><span>INFO</span></a></p></td>
        <td><p><a href="/evkazolinAdminka/order/update/<?=$order['id'];?>" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
    <td><p><a href="/evkazolinAdminka/order/delete/<?=$order['id'];?>"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></p></td>
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