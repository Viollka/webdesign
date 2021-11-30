<?php
class UsersController{

    private $conn;

    public function __construct($db){
        $this->conn = $db->getConnect();
    }

    public function index(){
        include_once 'app/Models/UserModel.php';
        $users = (new User())::all($this->conn);

        include_once 'views/users.php';
    }

    public function home() {
        include_once 'views/home.php';
    }

    public function addForm(){
        include_once 'views/addUser.php';
    }

    public function add(){
        include_once 'views/addUser.php';
        include_once 'app/Models/UserModel.php';
		include_once 'views/uploads.php';

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        
        if(isset($_FILES['photo'])){
		$file = $_FILES['photo'];
		$imgPath ='public/uploads/' . $file['name'];
		}
        
        $id_role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (trim($name) !== "" && trim($email) !== "" && trim($gender) !== "" && trim($imgPath) !== "" && trim($password) !== "" && trim($id_role) !== "") {
            $user = new User($name, $email, $gender, $password, $imgPath, $id_role);
            $user->add($this->conn);
        }

        header('Location: ?controller=users');
    }

    public function delete(){
        include_once 'app/Models/UserModel.php';  

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (trim($id) !== "" && is_numeric($id)) {
            (new User())::delete($this->conn, $id);
        }

        header('Location: ?controller=users');
    }
 
    public function show() {
        include_once 'app/Models/UserModel.php';  

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (trim($id) !== "" && is_numeric($id)) {
            $user = (new User())::byId($this->conn, $id);
        }

        include_once 'views/showUser.php';
        
    }

    public function edit() {
         include_once 'app/Models/UserModel.php';  

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $target_dir = 'public/uploads/';
        $imgPath = $target_dir . $_FILES["photo"]["name"];

        $data = [];
        $data[0] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data[1] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $data[2] = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data[3] = $imgPath;
        $data[4] = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user = (new User)::update($this->conn, $id, $data);

        header('Location: ?controller=users');

    }

}
?>