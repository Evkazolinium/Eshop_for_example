<? include ROOT.'/views/layouts/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>колличество</th>
                        <th class="text-center">Цена</th>
                        <th>Удалить</th>
                        <th> </th>
                    </tr>
                </thead>
				<? if($productsInBasket):?>
                <tbody>
                <?php $i = 0?>
				<?foreach($products as $product):?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="/product/<?=$product['id']?>"><?=$product['name'];?></a></h4>
                                <h5 class="media-heading"> by <a href="#"><?=$product['platformName'];?></a></h5>
                                <span>Статус: </span><span class="text-success"><strong>В наличии</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input class="form-control" id="exampleInputEmail1" value="<?=$productsInBasket[$product['id']];?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?=$totalPrice[$i];?></strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href="/basket/delete/<?=$product['id'];?>" type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Удалить
                        </a></td>
                    </tr>
					<?php $i++; endforeach;?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Сумма - </h3></td>
                        <td class="text-right"><h3><strong><?=$total;?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="/" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Продолжить покупки
                        </a></td>
                        <td>
                        <a href="/basket/order" type="button" class="btn btn-success">
                            Оформить заказ <span class="glyphicon glyphicon-play"></span>
                        </a></td>
                    </tr>
					</tbody>
				<?else:?>
				<h4>Корзина пуста</h4>	
				<?endif;?>
            </table>
        </div>
    </div>
</div>

<? include ROOT.'/views/layouts/footer.php';?>