<?php
class CatalogController {
	public function actionIndex($page = 1) {
		$count = 6;
		$platforms = array();
		$platforms = Platform::getPlatformList();
        
        $genres = array();
		$genres = Genre::getGenreList();
        
		$productList = array();
        
		$productList = Products::getProducts($count, $page);
		
		$total = Products::getTotalProductInCatalog();
		$pagination = new Pagination($total, $page, $count, 'page-');

		require_once(ROOT.'/views/catalog/index.php');
		
		return true;
	}
	public function actionPlatform($platformId, $page = 1) {
		$platforms = array();
		$platforms = Platform::getPlatformList();
        
        $genres = array();
		$genres = Genre::getGenreList();
        
		$products = array();
		$products = Products::getProductsListByPlatform($platformId, $page);
		
		$total = Products::getTotalProductInPlatform($platformId);
		$pagination = new Pagination($total, $page, Products::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT.'/views/catalog/category.php');
		return true;
	}
    
    public function actionGenre($genreId,  $page = 1) {
        $platforms = array();
		$platforms = Platform::getPlatformList();
        
        $genres = array();
		$genres = Genre::getGenreList();
    
		$products = array();
		$products = Products::getProductsListByGenre($genreId, $page);
		
		$total = Products::getTotalProductInGenre($genreId);
		$pagination = new Pagination($total, $page, Products::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT.'/views/catalog/category.php');
		return true;
	}
}
?>