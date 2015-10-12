<?php
class ProductController {
	public function actionView($productId) {
		
		$categories = array();
		$categories = Category::getCategoryList();
		
		$product = Products::getProductById($productId);
        $productId = $product['id'];
        $platform = Category::getCategoryById($product['platform_id']);
        $comments = Comment::getCommentsByProductId($productId);
        //COMMENTS
        if(isset($_POST['submit'])) {
			$userComment = $_POST['message'];
            
            $errors = false;
            if(!Comment::validateMessage($userComment)){
                 $errors[] = "Введите собщение";
            }
            if(User::isGuest()) { 
                $userName = $_POST['name'];
                $userEmail = $_POST['email'];
                if(!User::validateUsername($userName)){
                    $errors[] = "Неверное имя";
                }
                if(!User::validateEmail($userEmail)){
                    $errors[] = "Неверный Email";
                }
                $userId = false;
            } else {
                $userId = User::validateLogged();
                $user = User::getUserById($userId);
                $userName = $user['name'];
            }
                Comment::addComment($userComment, $userId, $userName, $productId);
                
        }
		require_once(ROOT.'/views/product/view.php');
		return true;
	}
}

?>