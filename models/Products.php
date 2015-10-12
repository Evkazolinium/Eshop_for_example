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
    // Remove. Takes id (int)
    public static function deleteProductById($id) {
        $db = Db::dbConnection();
        $sql = "DELETE FROM products WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        return $result->execute();
    }
    // ADD NEW PRODUCT
    public static function createProduct($option) {
        $db = Db::dbConnection();  
        
        $sql = "INSERT INTO products ( name, platform_id, code, price, availability, "
                ." brand, description, is_new, is_recomend, status ) "
                ." VALUES ( :name, :platform_id, :code, :price, :availability, "
                ." :brand, :description, :is_new, :is_recomend, :status ) ";
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $option['name'], PDO::PARAM_STR);
        $result->bindParam(':platform_id', $option['platform_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $option['code'], PDO::PARAM_INT);
        $result->bindParam(':price', $option['price'], PDO::PARAM_STR);
        $result->bindParam(':availability', $option['availability'], PDO::PARAM_INT);
        $result->bindParam(':brand', $option['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $option['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $option['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recomend', $option['is_recomend'], PDO::PARAM_INT);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);
        if($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }
    // UPDATE PRODUCT
    public static function updateProduct($id, $option) {
        $db = Db::dbConnection();  
        
        $sql = "UPDATE products SET  "
                ." name = :name, platform_id = :platform_id, "
                ." code = :code, price = :price, availability = :availability, "
                ." brand = :brand, description = :description, is_new = :is_new, "
                ." is_recomend = :is_recomend, status = :status  "
                ." WHERE id = :id";
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $option['name'], PDO::PARAM_STR);
        $result->bindParam(':platform_id', $option['platform_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $option['code'], PDO::PARAM_INT);
        $result->bindParam(':price', $option['price'], PDO::PARAM_STR);
        $result->bindParam(':availability', $option['availability'], PDO::PARAM_INT);
        $result->bindParam(':brand', $option['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $option['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $option['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recomend', $option['is_recomend'], PDO::PARAM_INT);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);
        return $result->execute();
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
            $sql = 'SELECT * FROM products WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
			$productItem = $result->fetch();
			return $productItem;
		}
	}
    
    public static function getProductlistById($idArray) {
        $db = Db::dbConnection();
		$idString = implode(",", $idArray);
		$sql = 'SELECT * '
				.'FROM products '
				.'WHERE products.status="1" AND products.id IN ( '.$idString.' ) ';
		//echo $sql;
		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$i = 0;
		while($row = $result->fetch()) {
			$products[$i]['id'] = $row['id'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
            $products[$i]['code'] = $row['code'];
			$i++;
		}
		return $products;
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
	public static function getProductsByIdInBasket($idProduct) {
	 	$platformId = array();
		$db = Db::dbConnection();
		$idStringProduct = implode(",", $idProduct);
		$sql = 'SELECT id, name, price '
				.'FROM products '
				.'WHERE products.status="1" AND products.id IN ( '.$idStringProduct.' ) ';
		//echo $sql;
		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$i = 0;
		while($row = $result->fetch()) {
			$products[$i]['id'] = $row['id'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
			$i++;
		}
		return $products;
	}
 	public static function getPlatformByIdInBasket($idArray) {
		$platformId = array();
		$db = Db::dbConnection();
		$idString = implode(",", $idArray);
		$sql = 'SELECT platform_id '
				.'FROM products '
				.'WHERE products.status="1" AND products.id IN ( '.$idString.' ) ';
		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$platformId = $result->fetch();
		return $platformId;
	}
}
?>