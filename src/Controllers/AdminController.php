<?php

class AdminController extends BaseController
{
    /**
     * index action for  index admin route
     *
     * @return void
     */
    public function actionIndex()
    {
      

        self::checkLogged();
        $userId  = SessionHelper::checkLogged();
        
        $user = User::getUserById($userId);
        require_once(ROOT . '/public/views/admin/index.php');
        return true;
    }
  

   
}
