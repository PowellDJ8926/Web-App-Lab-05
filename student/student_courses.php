<!DOCTYPE html>

<?php
session_start();
if($_SESSION['role'] != 'student'){
	 echo "<script>alert('Invalid Access');</script>";
	 header("Location: login_lab5.php"); 
    exit();
}

$id = $_SESSION['id'];
?>








<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-image: url('download.png');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 70px;
            text-align: center;
            position: relative;
        }
        header h1 {
            font-size: 48px;
            color: #000;
        }
        .navbar {
            background-color: #000;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        section {
            padding: 20px;
            text-align: center;
        }
        footer {
            background-color: #000;
            color: #999;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include ("db_connection.php");?>

    <header>
        <h1>Student Home</h1>
    </header>
    <div class="navbar">
        <a href="student.php">Home</a>
        <a href="student_faculty.php">Faculty</a>
        <a href="student_courses.php">Courses</a>
    </div>

    <section>
        <h2>Courses</h2>
        <table>
            <tr>
                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                $sql_course = "SELECT * FROM courses_tab LIMIT 1, 4";
                $result_product = $connect->query($sql_course);
                $count = 0;
                while ($row_product = $result_product->fetch_assoc()) {
                ?>
                <td>
                    <strong>Course Info</strong><br><br>
                    Course ID: <?php echo $row_product["course_id"] ?><br>
                    Course Name: <?php echo $row_product["course_name"] ?><br>
                    Professor: <?php echo $row_product["fac_id"] ?><br>
                    Offered in: <?php echo $row_product["offerd_in"] ?><br>
                    Credits: <?php echo $row_product["credits"] ?><br>
                    Pre-requisites: <?php echo $row_product["pre_req"] ?><br>
                    Type: <?php echo $row_product["type"] ?><br>
                </td>
                <?php
                    if ($count >= 5) {
                        echo "</tr><tr>";
                        $count = 1;
                    } else {
                        $count++;
                    }
                }
                ?>
            </tr>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 John Brown University. All rights reserved.</p>
    </footer>
</body>
</html>
