<?php
class AdminProductController extends AdminBase {
    
    public function actionIndex($page = 1) {
        self::validateAdmin();
        $count = 6;
        
        $productList = array();
		$productList = Products::getProducts($count, $page);
        
 		$total = Products::getTotalProductInCatalog();
		$pagination = new Pagination($total, $page, $count, 'page-');
        
        require_once(ROOT.'/views/admin_product/index.php');
        return true;
    }
    
    public function actionDelete($id){
        self::validateAdmin();
        if(isset($_POST['submit'])) {
            echo $id;  
            Products::deleteProductById($id);
            header("Location: /evkazolinAdminka/product/");
        }
        require_once(ROOT.'/views/admin_product/delete.php');
        return true;
    }
    
    public function actionCreate() {
        self::validateAdmin();
        $platformList = Platform::getPlatformListByAdmin();
        
		$genreList = Genre::getGenresListByAdmin();
        
        if(isset($_POST['submit'])) {
            $option['code'] = $_POST['code'];
            $option['name'] = $_POST['name'];
            $option['price'] = $_POST['price'];
            $option['platform_id'] = $_POST['platform_id'];
            $option['genre_id'] = $_POST['genre_id'];
            $option['brand'] = $_POST['brand'];
            $option['description'] = $_POST['description'];
            $option['availability'] = $_POST['availability'];
            $option['is_recomend'] = $_POST['is_recomend'];
            $option['is_new'] = $_POST['is_new'];
            $option['status'] = $_POST['status'];
            
            $errors = false;
            if(!isset($option['name']) || empty($option['name'])) {
                $errors[] = "Введите имя товара"; 
                print_r($errors);
            }
            if($errors == false) {
                $id = Products::createProduct($option);
                if($id) {
                    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'], 
                                            $_SERVER["DOCUMENT_ROOT"]."/upload/images/products/(".$id.").png");
                    }
                }
                header("Location: /evkazolinAdminka/product/");
            }

        }
        require_once(ROOT.'/views/admin_product/create.php');
        return true; 
    }
    public function actionUpdate($id) {
        self::validateAdmin();
        $platformList = Platform::getPlatformListByAdmin();
        $genreList = Genre::getGenresListByAdmin();
        $product = Products::getProductById($id);
        
        if(isset($_POST['submit'])) {
            $option['code'] = $_POST['code'];
            $option['name'] = $_POST['name'];
            $option['price'] = $_POST['price'];
            $option['platform_id'] = $_POST['platform_id'];
            $option['genre_id'] = $_POST['genre_id'];
            $option['brand'] = $_POST['brand'];
            $option['description'] = $_POST['description'];
            $option['availability'] = $_POST['availability'];
            $option['is_recomend'] = $_POST['is_recomend'];
            $option['is_new'] = $_POST['is_new'];
            $option['status'] = $_POST['status'];
            
            $errors = false;
            if(!isset($option['name']) || empty($option['name'])) {
                $errors[] = "Введите имя товара"; 
            }
            if($errors == false) {
                Products::updateProduct($id, $option);
                if($id) {
                    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'],
                                           $_SERVER["DOCUMENT_ROOT"]."/upload/images/products/(".$id.").png");
                    }
                }
            }
                header("Location: /evkazolinAdminka/product/");
        }

        require_once(ROOT.'/views/admin_product/update.php');
        return true; 
    }
}
?>