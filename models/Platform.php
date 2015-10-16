<?php
class platform {
	public static function getPlatformList() {
		
		$db = Db::dbConnection();
		
		$platformList = array();
		
		$result = $db->query('SELECT id, name_platforms '
							.'FROM platforms '
                            .'WHERE status = "1" '
							.'ORDER BY sort ASC ');
		$i = 0;
		while($row = $result->fetch()) {
			$platformList[$i]['id'] = $row['id'];
			$platformList[$i]['name_platforms'] = $row['name_platforms'];
			$i++;
		}
		return $platformList;
	}
    
    public static function getPlatformListByAdmin() {
		
		$db = Db::dbConnection();
		
		$platformList = array();
		
		$result = $db->query('SELECT * '
							.'FROM platforms '
							.'ORDER BY sort ASC ');
		$i = 0;
		while($row = $result->fetch()) {
			$platformList[$i]['id'] = $row['id'];
			$platformList[$i]['name_platforms'] = $row['name_platforms'];
            $platformList[$i]['sort'] = $row['sort'];
            $platformList[$i]['status'] = $row['status'];
			$i++;
		}
		return $platformList;
	}
    
    public static function getPlatformById($id) {
		$id = intval($id);
		if($id) {

			$db = Db::dbConnection();
			
			$sql = 'SELECT * FROM platforms WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$productItem = $result->fetch();
			return $productItem;
		}
	}
    
    public static function deletePlatformById($id) {
        $db = Db::dbConnection();
        $sql = "DELETE FROM platforms WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function createPlatform($option) {
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
    
    public static function updatePlatform($id, $option) {
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