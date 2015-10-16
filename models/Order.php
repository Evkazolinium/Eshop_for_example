<?php
class Order {

    public static function save($userName, $userEmail, $userPhone, $userComment, $userId, $products) {
        
        $products = json_encode($products);
        $db = Db::dbConnection();
        
        $sql = "INSERT INTO products_order (user_name, user_phone, user_email, user_comment, user_id, products) "
            ." VALUES (:user_name, :user_phone, :user_email, :user_comment, :user_id, :products) ";
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function getOrdersByAdmin() {
		
		$db = Db::dbConnection();
		
		$orderList = array();
		
		$result = $db->query('SELECT * '
							.'FROM products_order '
							.'ORDER BY date ASC ');
		$i = 0;
		while($row = $result->fetch()) {
			$orderList[$i]['id'] = $row['id'];
			$orderList[$i]['user_name'] = $row['user_name'];
            $orderList[$i]['user_phone'] = $row['user_phone'];
            $orderList[$i]['user_email'] = $row['user_email'];
            $orderList[$i]['date'] = $row['date'];
            $orderList[$i]['status'] = $row['status'];
			$i++;
		}
		return $orderList;
	}
    
    public static function getOrderById($id) {
        $db = Db::dbConnection();
        $sql = 'SELECT * FROM products_order WHERE id = :id';
        
        $result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_STR);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();
        return $result->fetch();
    }
    // Remove. Takes id (int)
    public static function deleteOrderById($id) {
        $db = Db::dbConnection();
        $sql = "DELETE FROM products_order WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        return $result->execute();
    }

}

?>