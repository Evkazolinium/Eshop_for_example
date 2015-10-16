<?php
class AdminOrderController extends AdminBase {
    
    public function actionIndex() {
        self::validateAdmin();
        
        $orderList = array();
		$orderList = Order::getOrdersByAdmin();
        
        require_once(ROOT.'/views/admin_order/index.php');
        return true;
    }
    
    public function actionView($id) {
        self::validateAdmin();
        
        $order = Order::getOrderById($id);
        $productQuantity = json_decode($order['products'], true);
        
        $productId = array_keys($productQuantity);
        $products = Products::getProductlistById($productId);
        $totalPrice = Basket::getTotalPrice($products, $productQuantity);
        $total = array_sum($totalPrice);
        require_once(ROOT.'/views/admin_order/view.php');
        return true;
    }
    public function actionDelete($id){
        self::validateAdmin();
        if(isset($_POST['submit'])) { 
            Order::deleteOrderById($id);
            header("Location: /evkazolinAdminka/order/");
        }
        require_once(ROOT.'/views/admin_order/delete.php');
        return true;
    }
}
?>