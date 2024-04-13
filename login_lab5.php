<!DOCTYPE html>

<?php
session_start();
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the form data
    $id = $_POST['ID'];
    $password = $_POST['password'];

    // get first diget of ID
    $first_digit = substr($id, 0, 1);
    switch ($first_digit) {
        case '1':
            $role = 'student';
            break;
        case '9':
            $role = 'faculty';
            break;
        case '2':
            $role = 'admin';
            break;
        default:
            $role = '';
            break;
    }

    // check to see if role is valid and credentials match database
    if (!empty($role)) {
        $sql = "SELECT * FROM users_tab WHERE role = '$role' AND userid = '$id' AND password = '$password'";
        $result = $connect->query($sql);

        if ($result->num_rows == 1) {
            // if found, set session variables
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $id;

            // direct user based on role
            switch ($role) {
                case 'student':
                    header("Location: student/student.php");
                    exit(); 
                case 'faculty':
                    header("Location: faculty/faculty.php");
                    exit(); 
                case 'admin':
                    header("Location: admin/Admin.php");
                    exit();
            }
        } else {
            
            echo "<script>alert('Invalid credentials');</script>";
        }
    } else {
        
        echo "<script>alert('Invalid role');</script>";
    }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
	 
        body {
			background-image: url('download.png');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .login-container h2 {
            margin-top: 0;
        }
        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login-container">
	
        <h2>Login</h2>
        <form id="loginForm" method="post">
           
            <input type="text" name="ID" placeholder="ID #" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
	

</body>
</html>
