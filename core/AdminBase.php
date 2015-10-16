<?php
abstract class AdminBase {
    public static function validateAdmin() {
    
        $userId = User::validateLogged();
        
        $user = User::getUserById($userId);
        
        if($user['role']=='admin'){
            return true;
        }
        die("ACCESS DINIED");
    }
    
    
}
?>