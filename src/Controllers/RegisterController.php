<?php

class RegisterController extends BaseController
{
    /**
     * register Action
     *
     * @return boolean
     */
    public function actionRegister()
    {

        $credentials = [];
        $categories = Category::getAll();
        $hobies = Hobby::getAll();
        $departments = Department::getAll();


        if (isset($_POST['submit']) && isset($_POST['terms'])) {

            $credentials['username'] = htmlspecialchars($_POST['username'], ENT_HTML5, 'UTF-8');
            $credentials['email']  = htmlspecialchars($_POST['email'], ENT_HTML5, 'UTF-8');
            $credentials['password']  = htmlspecialchars($_POST['password'], ENT_HTML5, 'UTF-8');
            $confirmPassword = htmlspecialchars($_POST['confirmPassword'], ENT_HTML5, 'UTF-8');
            $credentials['hobby']  = htmlspecialchars($_POST['hobby'], ENT_HTML5, 'UTF-8');
            $credentials['department']  = htmlspecialchars($_POST['department'], ENT_HTML5, 'UTF-8');

            $errors = false;
            $userId = false;

            if (!checkNameLength($credentials['username'])) {
                $errors[] = 'Invalid Username length min 6 max 50 characters ';
            }

            if (User::checkUser($credentials['username'], $credentials['email'])) {
                $errors[] = 'Already this username or email exist';
            }

            if (!comparePassword($credentials['password'], $confirmPassword)) {
                $errors[] = 'Password is not Same';
            }
            if (!validationPassword($credentials['password'])) {
                $errors[] = 'Password should be at least 8 chars..';
            }


            if (!checkEmail($credentials['email'])) {
                $errors[] = 'Invalid Input Email';
            }

            if ($errors == false) {
                $userId = User::create($credentials);
            }

            if ($userId == true) {
                Category::insertByUserId($userId, $_POST['categories']);

                SessionHelper::setFlashMessage('Successfully Register');
                SessionHelper::auth($userId);
                $this->redirect('/home/login');
            } else {
                $errors[] = 'Please try again register';
            }
        }
        require_once(ROOT . '/public/views/home/register.php');
        return true;
    }
}
