<?
include_once ROOT.'/models/News.php';
class NewsController {
	public function actionIndex() {
		$newsList = array();
		$latestNewsItem = array();
		$newsList = News::getNewsList();
		$latestNewsItem = News::getLatestNews();
		require_once(ROOT.'/views/news/index.php');
		return true;
	}
	
	public function actionView($id) {
		if($id) {
			$newsItem = News::getNewsById($id);
			$latestNewsItem = News::getLatestNews();
			require_once(ROOT.'/views/news/page.php');
		}
		return true;
	}
}
?>
