<?php

require_once 'Database.php';

class User extends Database
{

    public function store($request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = password_hash($request['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";


        if ($this->conn->query($sql)) {
            header('location: ../views');
            exit;
        } else {
            die("Error creating user: " . $this->conn->error);
        }
    }

    public function login($username, $password)
    {
 
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            // check if the password is correct
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['id']             = $user['id'];
                $_SESSION['full_name']      = $user['first_name'] . " " . $user['last_name'];
                $SESSION['username']        = $user['username'];

                header('location: ../views/dashboard.php');
                exit;
            } else {
                die('Password is incorrect.');
            }
        } else {
            die('Username not found.');
        }
    }


    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            die('Error retrieving all users: ' . $this->conn->error);
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('location: ../views');
        exit;
    }

    public function getUser()
    {
        $id = $_SESSION['id'];

        $sql = "SELECT * FROM users WHERE id = $id";

        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        } else {
            die('Error retrieving the user: ' . $this->conn->error);
        }
    }

    public function update($request, $files)
    {
        session_start();
        $id = $_SESSION['id'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $photo = $files['photo']['name'];
        $photo_tmp = $files['photo']['tmp_name'];

        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name',
        username='$username' WHERE id = $id";

        if ($this->conn->query($sql)) {
            $_SESSION['username'] = $username;
            $_SESSION['full_name'] = "$first_name $last_name";

            if ($photo) {
                $sql = "UPDATE users SET photo = '$photo' WHERE id = $id";
                $destination = "../assets/images/$photo";

                if ($this->conn->query($sql)) {
                    if (move_uploaded_file($photo_tmp, $destination)) {
                        header('location: ../views/dashboard.php');
                        exit;
                    } else {
                        die("Error moving the photo");
                    }
                } else {
                    die("Error updating the photo: " . $this->conn->error);
                }
            } 

            header('location: ../views/dashboard.php');
            exit;
        } else{
            die("Error updating the user: " . $this->conn->error);
        }
    }
public function delete()
{
    session_start();
        $id = $_SESSION['id'];

        $sql = "DELETE FROM users WHERE id = $id";

        if($this->conn->query($sql)){
            $this->logout();
        } else {
            die('Error deleting your account: ' . $this->conn->error);
        }
}
}
