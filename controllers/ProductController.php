<?php
class ProductController {
	public function actionView($productId) {
		
		$categories = array();
		$categories = Category::getCategoryList();
		
		$product = Products::getProductById($productId);
		require_once(ROOT.'/views/product/view.php');
		return true;
	}
}

?>