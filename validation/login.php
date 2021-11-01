
<?php
session_start();
// session_destroy();
include '..\include\connection.php';

// echo'<pre>';
// var_dump($_POST['username']);
// var_dump($_POST['password']);
// die();
if(isset($_POST['username']) &&isset($_POST['password'])){
        if(empty($_POST['username']) || empty($_POST['password']) ){
            header('Location: ../login.php?message=Username and password is required');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = 'SELECT member_id as id, name, username, member_type, expiry_date FROM member where username = "'.$username.'" AND password = "'.$password.'" ORDER BY created_at';
        $result = mysqli_query($conn, $sql);
        $members = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        if(mysqli_num_rows($result) == 1){
            $_SESSION['lms'] = $members;
            header('Location: ../index.php');
        }
        else{
            header('Location: ../login.php?error=Username Password not correct');
        }
            
    }

?>