<?php
session_start();

interface Role {
    public function getRoleName();
}

class User implements Role {
    public function getRoleName() {
        return 'User';
    }
}

class Technician implements Role {
    public function getRoleName() {
        return 'Technician';
    }
}

class Doctor implements Role {
    public function getRoleName() {
        return 'Doctor';
    }
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $connection = mysqli_connect("localhost", "root", "", "abc_lab");

    $user_name = $_POST["username"];
    $password = $_POST["password"];

    $query1 = "CALL login_check('" . $user_name . "' , '" . $password . "')";
    $result = mysqli_query($connection, $query1);

    if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {
            $userdata = mysqli_fetch_assoc($result);

            $_SESSION["IDlog"] = $userdata;
            $val_x = $_SESSION["IDlog"];

            $role_id = $_SESSION["IDlog"]["role_id"];
            $role = null;

            switch ($role_id) {
                case 1:
                    $role = new User();
                    break;
                case 2:
                    $role = new Technician();
                    break;
                case 3:
                    $role = new Doctor();
                    break;
            }

            if ($role instanceof Role) {
                $response = array('data' => $role->getRoleName());
                echo json_encode($response);
                die;
            }
        } else {
            $response = array('data' => "Invalid username or password. Please try again");
            echo json_encode($response);
            die;
        }
    }
}
?>