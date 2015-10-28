<?php
class AdminPlatformController extends AdminBase {
    
    public function actionIndex() {
        self::validateAdmin();
        
        $platformList = array();
		$platformList = platform::getPlatformListByAdmin();
        
        require_once(ROOT.'/views/admin_category/index.php');
        return true;
    }
    
    public function actionDelete($id){
        self::validateAdmin();
        if(isset($_POST['submit'])) {  
            platform::deletePlatformById($id);
            header("Location: /evkazolinAdminka/platform/");
        }
        require_once(ROOT.'/views/admin_category/delete.php');
        return true;
    }
    
    public function actionCreate() {
        self::validateAdmin();
        
        if(isset($_POST['submit'])) {
            $option['name_platforms'] = $_POST['name_platforms'];
            $option['sort'] = $_POST['sort'];
            $option['status'] = $_POST['status'];
            
            $errors = false;
            if(!isset($option['name_platforms']) || empty($option['name_platforms'])) {
                $errors[] = "Введите имя категории"; 
                print_r($errors);
            }
            if($errors == false) {
                $id = Platform::createPlatform($option);
                header("Location: /evkazolinAdminka/platform/");
            }

        }
        require_once(ROOT.'/views/admin_category/create.php');
        return true; 
    }
    
    public function actionUpdate($id) {
        self::validateAdmin();
        $platform = platform::getPlatformById($id);
        
        if(isset($_POST['submit'])) {
            $option['name_platforms'] = $_POST['name_platforms'];
            $option['sort'] = $_POST['sort'];
            $option['status'] = $_POST['status'];
            $errors = false;
            
            if(!isset($option['name_platforms']) || empty($option['name_platforms'])) {
                $errors[] = "Введите имя категории"; 
                print_r($errors);
            }
            if($errors == false) {
                $id = platform::updatePlatform($id, $option);
                header("Location: /evkazolinAdminka/category/");
            }

        }
        require_once(ROOT.'/views/admin_category/update.php');
        return true; 
    }
}
?>