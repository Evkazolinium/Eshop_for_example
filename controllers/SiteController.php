<?php
class SiteController {
	public function actionIndex() {
		
		$categories = array();
		$categories = Category::getCategoryList();
		
		$productList = array();
		$productList = Products::getProducts(6);
		require_once(ROOT.'/views/site/index.php');
		
		return true;
	}
}
?>