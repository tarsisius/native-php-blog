<?php
class user extends Controller
{
    public function login()
    {
        $data['title'] = 'Login';
        if (count($_POST)) {
            $result = $this->model('_user')->login();
            if ($result) {
                header("location: " . APP_URL . "admin");
            } else {
                Flasher::setMessage('Gagal', 'login', 'red');
                header('location: ' . APP_URL . 'user/login');
                exit;
            }
        }
        $this->view('auth/login');
    }
    public function logout() {
        if(!isset($_SESSION['logged_in']))  Session::init ();
        Session::destroy();
        header("location: " . APP_URL);   
    }
}
