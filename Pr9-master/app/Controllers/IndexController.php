<?php
class IndexController {

    private $conn;

    public function __construct($db){   
        $this->conn = $db->getConnect();
    }

    public function index(){
        include_once 'app/Models/UserModel.php';

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user = (new User)::auth($this->conn, $email, $password);

    
        include_once 'views/home.php';
    }

    public function logout() {

        session_unset();    

        session_destroy();
    }

}
?>