<? include ROOT.'/views/layouts/header_admin.php';?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h3>Заказ # <?=$order['id']?></h3>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
                       <strong><h4>Данные о покупателе:</h4></strong><br>
                        <strong>Имя: </strong> <?=$order['user_name']?><br>
    					 <strong>Телефон: </strong> <?=$order['user_phone']?><br>
                        <strong>Email: </strong> <?=$order['user_email']?><br>
                            <?php if($order['user_id'] != 0):?>
                                <strong>Id пользователя: </strong> <?=$order['user_id'];?><br>
                            <?php endif;?>
    				</address>
    			</div>
    			<div>
    				<address>
                        <strong><h4>Данные о заказе:</h4></strong><br>
    					    <strong>Комментарий: </strong> <?=$order['user_comment']?><br>
                            <strong>Дата оформления: </strong>
    					       <?=$order['date']?><br>
                            <strong>Статус заказа: </strong> <?=$order['status']?><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Итоговый заказ</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Название</strong></td>
        							<td class="text-center"><strong>Цена</strong></td>
        							<td class="text-center"><strong>Колличество</strong></td>
        							<td class="text-right"><strong>Сумма</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<?php $i=0;?>
                                <?php foreach($products as $product):?>
                                    <tr>
                                        <td><?=$product['name'];?></td>
                                        <td class="text-center"><?=$product['price'];?> грн</td>
                                        <td class="text-center"><?=$productQuantity[$product['id']];?></td>
                                        <td class="text-right"><?=$totalPrice[$i];?> грн</td>
                                    </tr>
                                <?php $i++; endforeach;?>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Сумма</strong></td>
    								<td class="thick-line text-right"><?=$total;?> грн</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
            <div class="form-group">
             <div class="col-md-12 text-right">
                <a href="/evkazolinAdminka/order/" class="btn btn-primary btn-lg">Назад</a>
              </div>
            </div>
</div>
<? include ROOT.'/views/layouts/footer_admin.php';?>