<?php
class Comment {
    public static function addComment($userComment, $userId, $userName, $productId){
        $db = Db::dbConnection();
		$sql = 'INSERT INTO comment (user_id, message, user_name, product_id ) '
                .'VALUES (:userId, :userComment, :userName, :productId) ';
		$result = $db->prepare($sql);
		$result->bindParam(':userId', $userId, PDO::PARAM_INT);
		$result->bindParam(':userComment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':userName', $userName, PDO::PARAM_STR);
        $result->bindParam(':productId', $productId, PDO::PARAM_INT);
		return $result->execute();
    }
    
    public static function getCommentsByProductId($productId) {
        $db = Db::dbConnection();
		$sql = 'SELECT message, user_name, date FROM comment WHERE product_id IN ( :productId ) ';
		$result = $db->prepare($sql);
		$result->bindParam(':productId', $productId, PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();
		$i = 0;
		while($row = $result->fetch()) {
			$comments[$i]['message'] = $row['message'];
			$comments[$i]['user_name'] = $row['user_name'];
			$comments[$i]['date'] = $row['date'];
			$i++;
		}
		return $comments;
    }
    
    public static function countCommentsByProduct($productId) {
        $db = Db::dbConnection();
		$sql = 'SELECT COUNT(message) FROM comment WHERE product_id = :productId ';
		$result = $db->prepare($sql);
		$result->bindParam(':productId', $productId, PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $arrayCom = $result->fetch();
        $countCom = array_shift($arrayCom);
		return $countCom;
    }
    
    public static function validateMessage($value) {
		return strlen($value) > 1;
	}
}
?>