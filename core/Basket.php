<?php
class Basket {
	public static function addProduct($id) {
		$id = intval($id);
		$productsInBasket = array();

		if(isset($_SESSION['products'])) {
			$productsInBasket = $_SESSION['products'];
		}
		if(array_key_exists($id, $productsInBasket)) {
			$productsInBasket[$id] ++;
		}else {
			$productsInBasket[$id] = 1;
		}
		$_SESSION['products'] = $productsInBasket;
		return self::countItem();
	} 
	public static function countItem() {
		if(isset($_SESSION['products'])) {
			$count = 0;
			foreach($_SESSION['products'] as $id=>$quantity) {
				$count += $quantity;
			}
			return $count;
		}else{
			return 0;
		}
	}
	public static function getProducts() {
        if(isset($_SESSION['products'])){
			return $_SESSION['products'];
		}
		return false;
	}
	public static function getTotalPrice($products, $quantity = false) {
        if($quantity == false) {
            $productsInBasket = self::getProducts();
        }else{
            $productsInBasket = $quantity;
        }
		if($productsInBasket) {
			$total = array();
			foreach($products as $item) {
				$total[] = $item['price'] * $productsInBasket[$item['id']];
			}
		}
		return $total;
	}
    public static function clear() {
        if(isset($_SESSION['products']))
            unset($_SESSION['products']);
    }
    public static function deleteProduct($id) {
		$id = intval($id);
		$productsInBasket = self::getProducts();
        unset($productsInBasket[$id]);
        $_SESSION['products'] = $productsInBasket;
    }
}
?>