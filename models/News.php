<?php
// include_once ROOT.'/core/db_oop.php';
class News {
	public static function getNewsById($id) {
		$id = intval($id);
		if($id) {

			$db = Db::dbConnection();
			
			$result = $db->query('SELECT * FROM posts WHERE id='.$id);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$newsItem = $result->fetch();
			return $newsItem;
		}
	}
	public static function getNewsList() {
		
		$db = Db::dbConnection();
		
		$newsList = array();
		
		$result = $db->query('SELECT id, title, date, text_previe, img '
							.'FROM posts '
							.'ORDER BY date DESC '
							.'LIMIT 10 ');
		$i = 0;
		while($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['text_previe'] = $row['text_previe'];
			$newsList[$i]['img'] = $row['img'];
			$i++;
		}
		return $newsList;
	}
	public static function getLatestNews() {
		
		$db = Db::dbConnection();
		
		$latestNewsItem = array();
		
		$result = $db->query('SELECT id, text_previe FROM posts ORDER BY date DESC LIMIT 1');
		$i = 0;
		while($row = $result->fetch()) {
			$latestNewsItem[$i]['id'] = $row['id'];
			$latestNewsItem[$i]['text_previe'] = $row['text_previe'];
			$i++;
		}
		return $latestNewsItem;
	}
}
?>