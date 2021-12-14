<?php



/**AuthController
 * 
 */

class AuthController extends BaseController
{
    /**
     * login Action
     *
     * @return boolean
     */
    public function actionLogin()
    {
        $email = false;
        $password = false;
        if (isset($_POST['submit'])) {
            $email = htmlspecialchars($_POST['email'], ENT_HTML5);
            $password = htmlspecialchars($_POST['password'], ENT_HTML5);

            $errors = false;

            if (!checkEmail($email)) {
                $erros[] = 'Invalid Email';
            }

            $user = User::getUserByEmail($email);

            if (!empty($user) && !password_verify($password, $user['hash_password'])) {

                $errors[] = 'Invalid email or password';
            } else {

                SessionHelper::auth($user['id']);

                $this->redirect('/admin/index');
            }
        }


        require_once(ROOT . '/public/views/auth/login.php');
        return true;
    }


    /**
     * @return void Redirect to login form
     */
    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        $this->redirect('/admin/login');
    }
}
