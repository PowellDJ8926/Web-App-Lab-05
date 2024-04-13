<!DOCTYPE html>

<?php
session_start();
if($_SESSION['role'] != 'faculty'){
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
    <title>Faculty Home</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
    </style>
</head>
<body>
    <?php include ("db_connection.php");?>

    <header>
        <h1>Faculty Home</h1>
    </header>
    <div class="navbar">
        <a href="faculty.php">Home</a>
        <a href="faculty_courses.php">Courses</a>
    </div>

    <section>
        <h2>Faculty Information</h2>
        <table>
            <thead>
                <tr>
                    <th>Faculty ID</th>
                    <th>Faculty Name</th>
                    <th>Starting Year</th>
                    <th>Qualifications</th>
                    <th>Date of Birth</th>
                    <th>Courses Teaching</th>
                </tr>
            </thead>
            <tbody>
                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                $sql_faculty2 = "SELECT * FROM faculty_tab_2";
                $result_product = $connect->query($sql_faculty2);
                while ($row_product = $result_product->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row_product["fac_id"] ?></td>
                    <td><?php echo $row_product["fac_name"] ?></td>
                    <td><?php echo $row_product["start"] ?></td>
                    <td><?php echo $row_product["qualifications"] ?></td>
                    <td><?php echo $row_product["d_of_b"] ?></td>
                    <td><?php echo $row_product["courses_taught"] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 John Brown University. All rights reserved.</p>
    </footer>
</body>
</html>
