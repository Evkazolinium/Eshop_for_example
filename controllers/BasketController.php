<?php
class BasketController {
	public function actionAddAjax($id) {
		echo Basket::addProduct($id);
		return true;
	}
	public function actionIndex() {
		$productsInBasket = false;
		$productsInBasket = Basket::getProducts();
		if($productsInBasket) {
			$productsId = array_keys($productsInBasket);
			//$platformId = Products::getPlatformByIdInBasket($productsId);
			
			$products = Products::getProductsByIdInBasket($productsId);
/* 			$platformsId = Products::getPlatforms($products);*/
			$totalPrice = Basket::getTotalPrice($products);
            $total = array_sum($totalPrice);
		}
		require_once(ROOT."/views/basket/index.php");
		return true;
	}
	public function actionOrder() {
		$platform = array();
        $errors = array();
        $userName = '';
        $userEmail = '';
        $userPhone = '';
        $userComment = '';
		$platform = Platform::getPlatformList();
		
		$result = false;
		
		if(isset($_POST['submit'])) {
			$userName = $_POST['name'];
			$userEmail = $_POST['email'];
			$userPhone = $_POST['phone'];
			$userComment = $_POST['message'];
            
            $errors = false;
            
            if(!User::validateUsername($userName)){
                $errors[] = "Неверное имя";
            }
            if(!User::validateEmail($userEmail)){
                $errors[] = "Неверный Email";
            }
            if(!User::validatePhone($userPhone)){
                $errors[] = "Неккоректный телефон";
            }
        
        
            if($errors == false) {
                $productsBasket = Basket::getProducts();
                if(User::isGuest()) { 
                    $userId = false;
                }else{
                    $userId = User::validateLogged();
                }
                $result = Order::save($userName, $userEmail, $userPhone, $userComment, $userId, $productsBasket);
                if($result) {
                    $adminEmail = "alexey.vnu@gmail.com";
                    $subject = "Новый заказ";
                    mail($adminEmail, $subject, $userComment);
                    
                    Basket::clear();
                }
            }else{
                $productsInBasket = Basket::getProducts();
                $productId = array_keys($productsInBasket);
                $products = Products::getProductsByIdInBasket($productId);
                $totalPrice = Basket::getTotalPrice($products);
                $total = array_sum($totalPrice);
                $totalQuantity = Basket::countItem();               
            }
                
        }else{
            $productsInbasket = Basket::getProducts();
            
            if($productsInbasket == false){
                header("Loaction: /");
            }else{
                $productId = array_keys($productsInbasket);
                $products = Products::getProductsByIdInBasket($productId);
                $totalPrice = Basket::getTotalPrice($products);
                $totalQuantity = Basket::countItem();
                
                $userName = false;
                $userEmail = false;
                $userPhone = false;
                $userComment = false;
                
                if(User::isGuest()){
                
                }else{
                    $userId = User::validateLogged();
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                    $userEmail = $user['email'];
                }
            }
        }
        require_once(ROOT."/views/basket/order.php");
		return true;
	} 
    public function actionDelete($id) {
        Basket::deleteProduct($id);
        
        header("Location: /basket");
    }
}
?>