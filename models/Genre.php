<?php
class Genre {
    
    public static function getGenreList() {
		
		$db = Db::dbConnection();
		
		$genreList = array();
		
		$result = $db->query('SELECT id, name '
							.'FROM genres '
                            .'WHERE status = "1" '
							.'ORDER BY sort ASC ');
		$i = 0;
		while($row = $result->fetch()) {
			$genreList[$i]['id'] = $row['id'];
			$genreList[$i]['name'] = $row['name'];
			$i++;
		}
		return $genreList;
	}
    
    
    
    public static function getGenresListByAdmin() {
		
		$db = Db::dbConnection();
		
		$genreList = array();
		
		$result = $db->query('SELECT * '
							.'FROM genres '
							.'ORDER BY sort ASC ');
		$i = 0;
		while($row = $result->fetch()) {
			$genreList[$i]['id'] = $row['id'];
			$genreList[$i]['name'] = $row['name'];
            $genreList[$i]['sort'] = $row['sort'];
            $genreList[$i]['status'] = $row['status'];
			$i++;
		}
		return $genreList;
	}
    
    public static function getGenresById($id) {
		$id = intval($id);
		if($id) {

			$db = Db::dbConnection();
			
			$sql = 'SELECT * FROM genres WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$productItem = $result->fetch();
			return $productItem;
		}
	}
    
    public static function deleteGenresById($id) {
        $db = Db::dbConnection();
        $sql = "DELETE FROM genres WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function createGenres($option) {
        $db = Db::dbConnection();  
        
        $sql = "INSERT INTO genres ( name, sort, status ) "
                ." VALUES ( :name, :sort, :status ) ";
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $option['name'], PDO::PARAM_STR);
        $result->bindParam(':sort', $option['sort'], PDO::PARAM_INT);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);
        if($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }
    
    public static function updateGenres($id, $option) {
        $db = Db::dbConnection();  
        
        $sql = "UPDATE genres SET  "
                ." name = :name, sort = :sort, status = :status  "
                ." WHERE id = :id";
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $option['name'], PDO::PARAM_STR);
        $result->bindParam(':sort', $option['sort'], PDO::PARAM_INT);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);
        return $result->execute();
    }
}
?>