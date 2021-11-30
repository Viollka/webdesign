<?php
class User {
    private $name;
    private $email;
    private $gender;
    private $password;
    private $imgPath;
    private $id_role;

    public function __construct($name = '', $email = '', $gender = '', $password = '', $imgPath = '', $id_role = '') {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->password = $password;
        $this->imgPath = $imgPath;
        $this->id_role = $id_role;
    }

    public function add($conn) {
        $sql = "INSERT INTO users (email, name, gender, password, path_to_img, id_role)
            VALUES ('$this->email', '$this->name', '$this->gender', '$this->password', '$this->imgPath', '$this->id_role')";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            return true;
        }
    }

    public static function all($conn) {
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $arr = [];
            while ( $db_field = $result->fetch_assoc() ) {
                $arr[] = $db_field;
            }
            return $arr;
        } else {
            return [];
        }
    }

    public static function byId($conn, $id) {

        $sql = "SELECT * FROM users WHERE id=$id";
        $result = $conn->query($sql);   
        
        if ($result->num_rows > 0) {
            $userData = [];

            while($db_field = $result->fetch_assoc()) {
                $userData = $db_field;
            }
    
            return $userData;
        }
        
    }

    public static function update($conn, $id, $data) {
    
        $sql = "UPDATE users SET email='$data[1]', name='$data[0]', gender='$data[2]', path_to_img='$data[3]', id_role='$data[4]' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
    }

    public static function delete($conn, $id) {
        $sql = "DELETE FROM users WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            return true;
        }
    }

    public static function auth($conn, $email, $password) {

        $users = self::all($conn);
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                $_SESSION['auth'] = true;
                return;
            }
        }
    }

 
}
