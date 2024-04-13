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
    <?php include ("db_connection.php");?>
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
        }
        th {
            background-color: #f2f2f2;
        }
        .faculty-info {
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Home</h1>
    </header>
    <div class="navbar">
        <a href="student.php">Home</a>
        <a href="student_faculty.php">Faculty</a>
        <a href="student_courses.php">Courses</a>
    </div>
    
    <section class="faculty-info">
        <h2>Faculty Info</h2>
        <table>
            <tr>
                <th>Faculty ID</th>
                <th>Faculty Name</th>
                <th>Year of Joining</th>
                <th>Qualifications</th>
                <th>Department</th>
            </tr>
            <?php
            $sql_faculty="SELECT * FROM faculty_tab";
            $result_faculty=$connect->query($sql_faculty);
            while ($row_faculty = $result_faculty->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row_faculty["fac_id"] ?></td>
                    <td><?php echo $row_faculty["fac_name"] ?></td>
                    <td><?php echo $row_faculty["fac_date_of_join"] ?></td>
                    <td><?php echo $row_faculty["qualification"] ?></td>
                    <td><?php echo $row_faculty["department"] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 John Brown University. All rights reserved.</p>
    </footer>
</body>
</html>
