<?php
class Category {
	public static function getCategoryList() {
		
		$db = Db::dbConnection();
		
		$categoryList = array();
		
		$result = $db->query('SELECT id, name_platforms '
							.'FROM platforms '
                            .'WHERE status = "1" '
							.'ORDER BY sort ASC ');
		$i = 0;
		while($row = $result->fetch()) {
			$categoryList[$i]['id'] = $row['id'];
			$categoryList[$i]['name_platforms'] = $row['name_platforms'];
			$i++;
		}
		return $categoryList;
	}
    
    public static function getCategoryListByAdmin() {
		
		$db = Db::dbConnection();
		
		$categoryList = array();
		
		$result = $db->query('SELECT * '
							.'FROM platforms '
							.'ORDER BY sort ASC ');
		$i = 0;
		while($row = $result->fetch()) {
			$categoryList[$i]['id'] = $row['id'];
			$categoryList[$i]['name_platforms'] = $row['name_platforms'];
            $categoryList[$i]['sort'] = $row['sort'];
            $categoryList[$i]['status'] = $row['status'];
			$i++;
		}
		return $categoryList;
	}
    
    public static function getCategoryById($id) {
		$id = intval($id);
		if($id) {

			$db = Db::dbConnection();
			
			$result = $db->query('SELECT * FROM platforms WHERE id='.$id);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$productItem = $result->fetch();
			return $productItem;
		}
	}
    
    public static function deleteCategoryById($id) {
        $db = Db::dbConnection();
        $sql = "DELETE FROM platforms WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function createCategory($option) {
        $db = Db::dbConnection();  
        
        $sql = "INSERT INTO platforms ( name_platforms, sort, status ) "
                ." VALUES ( :name_platforms, :sort, :status ) ";
        
        $result = $db->prepare($sql);
        $result->bindParam(':name_platforms', $option['name_platforms'], PDO::PARAM_STR);
        $result->bindParam(':sort', $option['sort'], PDO::PARAM_INT);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);
        if($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }
    
    public static function updateCategory($id, $option) {
        $db = Db::dbConnection();  
        
        $sql = "UPDATE platforms SET  "
                ." name_platforms = :name_platforms, sort = :sort, status = :status  "
                ." WHERE id = :id";
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name_platforms', $option['name_platforms'], PDO::PARAM_STR);
        $result->bindParam(':sort', $option['sort'], PDO::PARAM_INT);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);
        return $result->execute();
    }
}
?>