<?php
class Products {
	
	const SHOW_BY_DEFAULT = 2;
	
	public static function getProducts($count = self::SHOW_BY_DEFAULT, $page = 1) {
		
		$count = intval($count);
		$page = intval($page);
		$db = Db::dbConnection();
		$offset = ($page - 1) * $count;
		$productList = array();
		$result = $db->query('SELECT id, name, price, image, is_new '
							.'FROM products '
							.'WHERE status = "1" '
							.'ORDER BY id DESC '
							.'LIMIT '.$count." OFFSET ".$offset);
		$i = 0;
		while($row = $result->fetch()) {
			$productList[$i]['id'] = $row['id'];
			$productList[$i]['name'] = $row['name'];
			$productList[$i]['price'] = $row['price'];
			$productList[$i]['image'] = $row['image'];
			$productList[$i]['is_new'] = $row['is_new'];
			$i++;
		}
		return $productList;
	}
	
	
	public static function getProductsListByCategory($categoryId = false, $page) {
		
		if($categoryId) {
			$page = intval($page);
			$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
			$db = Db::dbConnection();
			
			
			$product = array();
			$result = $db->query("SELECT id, name, price, image, is_new "
								."FROM products "
								."WHERE status = '1' AND platform_id = '$categoryId' "
								."ORDER BY id ASC "
								."LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset);
			$i = 0;
			while($row = $result->fetch()) {
				$product[$i]['id'] = $row['id'];
				$product[$i]['name'] = $row['name'];
				$product[$i]['price'] = $row['price'];
				$product[$i]['image'] = $row['image'];
				$product[$i]['is_new'] = $row['is_new'];
				$i++;
			}
			return $product;
		}
	}
	public static function getProductById($id) {
		$id = intval($id);
		if($id) {

			$db = Db::dbConnection();
			
			$result = $db->query('SELECT * FROM products WHERE id='.$id);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$productItem = $result->fetch();
			return $productItem;
		}
	}
	public static function getTotalProductInCategory($categoryId) {
		$db = Db::dbConnection();
		$result = $db->query('SELECT count(id) AS count '
							.'FROM products ' 
							."WHERE status = '1' AND platform_id = '$categoryId' ");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();
		return $row['count'];
	}
	public static function getTotalProductInCatalog() {
		$db = Db::dbConnection();
		$result = $db->query('SELECT count(id) AS count '
							.'FROM products ' 
							."WHERE status = '1' ");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();
		return $row['count'];
	}
}
?>