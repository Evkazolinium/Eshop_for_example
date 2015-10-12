<?php
class CatalogController {
	public function actionIndex($page = 1) {
		$count = 6;
		$categories = array();
		$categories = Category::getCategoryList();
		
		$productList = array();
		$productList = Products::getProducts($count, $page);
		
		$total = Products::getTotalProductInCatalog();
		$pagination = new Pagination($total, $page, $count, 'page-');

		require_once(ROOT.'/views/catalog/index.php');
		
		return true;
	}
	public function actionCategory($categoryId, $page = 1) {
		$categories = array();
		$categories = Category::getCategoryList();
		
		$categoryProduct = array();
		$categoryProduct = Products::getProductsListByCategory($categoryId, $page);
		
		$total = Products::getTotalProductInCategory($categoryId);
		$pagination = new Pagination($total, $page, Products::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT.'/views/catalog/category.php');
		return true;
	}
}
?>