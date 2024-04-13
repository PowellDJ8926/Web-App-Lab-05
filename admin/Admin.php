
<!DOCTYPE html>



<?php
session_start();
if($_SESSION['role'] != 'admin'){
	 echo "<script>alert('Invalid Access');</script>";
	 header("Location: login_lab5.php"); 
    exit();
}

$id = $_SESSION['id'];
?>





<?php
include("db_connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addFaculty"])) {
    // Call the addFaculty function
    addFaculty($connect);
}

function addFaculty($connection) {
    // Retrieve form data
    $facultyName = $_POST['FacultyName'];
    $facultyID = $_POST['FacultyID'];
    $facultyYear = $_POST['FacultyYear'];
    $facultyQual = $_POST['FacultyQual'];
    $facultyDepart = $_POST['FacultyDepart'];

    // Insert data into the database
    $sql = "INSERT INTO faculty_tab (fac_name, fac_id, fac_date_of_join, qualification, department) 
            VALUES ('$facultyName', '$facultyID', '$facultyYear', '$facultyQual', '$facultyDepart')";

    // Execute the SQL query
    if(mysqli_query($connection, $sql)) {
        echo "<script>alert('Faculty Submitted');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
    }
}
?>

<?php

include("db_connection.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addStudent"])) {
    // Call the addStudent function
    addStudent($connect);
}

// Function to add a student
function addStudent($connection) {
    // Retrieve form data
    $studentName = $_POST['studentName'];
    $studentID = $_POST['studentID'];
    $studentYear = $_POST['studentYear'];
    $studentMajor = $_POST['studentMajor'];
    $studentGPA = $_POST['studentGPA'];
    $studentGRAD = $_POST['studentGRAD'];

    // Insert data into the database
    $sql = "INSERT INTO student_tab (stu_name, stu_id, stu_year_of_enroll, stu_major, CGPA, Year_of_grad) 
            VALUES ('$studentName', '$studentID', '$studentYear', '$studentMajor', '$studentGPA', '$studentGRAD')";

    // Execute the SQL query
    if(mysqli_query($connection, $sql)) {
        echo "<script>alert('Student Submitted');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
    }
}
?>








<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php include ("db_connection.php");?>

    <style>
        body {
            padding: 20px;
			background-image: url('download2.png');
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Admin Page</h1>

        <!-- View all students department wise -->
        <div class="card">
        <div class="card-header" onclick="toggleCollapse('viewStudentsCS')">
            View all Students in CS Department
        </div>
        <div class="card-body collapse" id="viewStudentsCS">
            <table class="table">
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th>Students Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
					
                        <td>
						<?php
                            $sql_depart="SELECT * FROM depart_tab";
                            $result_faculty=$connect->query($sql_depart);
                            while ($row_faculty = $result_faculty->fetch_assoc())
                            {
								echo $row_faculty["dept_name"] . "<br>";
									break;								
							}
                          ?>
						
						</td>
                        <td>
                            <?php
                            $sql_student="SELECT * FROM students_in_cs";
                            $result_faculty=$connect->query($sql_student);
                            while ($row_faculty = $result_faculty->fetch_assoc())
                            {
                                echo $row_faculty["student_name_cs"] . "<br>";
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<!-- ARTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
<div class="card">
    <div class="card-header" onclick="toggleCollapse('viewStudentsART')">
        View all Students in ART Department
    </div>
    <div class="card-body collapse" id="viewStudentsART">
        <table class="table">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Students Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $sql_depart = "SELECT * FROM depart_tab LIMIT 1, 1"; // Get the second department
                        $result_depart = $connect->query($sql_depart);
                        $row_depart = $result_depart->fetch_assoc();
                        echo $row_depart["dept_name"];
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql_student = "SELECT * FROM students_in_art";
                        $result_faculty = $connect->query($sql_student);
                        while ($row_faculty = $result_faculty->fetch_assoc()) {
                            echo $row_faculty["student_name_art"] . "<br>";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
	</div>
	</div>
<!-- MATHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH-->
<div class="card">
    <div class="card-header" onclick="toggleCollapse('viewStudentsMATH')">
        View all Students in Math Department
    </div>
    <div class="card-body collapse" id="viewStudentsMATH">
        <table class="table">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Students Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $sql_depart = "SELECT * FROM depart_tab LIMIT 2, 1"; // Get the second department
                        $result_depart = $connect->query($sql_depart);
                        $row_depart = $result_depart->fetch_assoc();
                        echo $row_depart["dept_name"];
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql_student = "SELECT * FROM students_in_math";
                        $result_faculty = $connect->query($sql_student);
                        while ($row_faculty = $result_faculty->fetch_assoc()) {
                            echo $row_faculty["student_name_math"] . "<br>";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
	</div>
	</div>
<!-- ENGLISHHHHHHHHHHHHHHHHHHHHHHHHHHHH-->
<div class="card">
    <div class="card-header" onclick="toggleCollapse('viewStudentsENG')">
        View all Students in English Department
    </div>
    <div class="card-body collapse" id="viewStudentsENG">
        <table class="table">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Students Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $sql_depart = "SELECT * FROM depart_tab LIMIT 3, 1"; // Get the second department
                        $result_depart = $connect->query($sql_depart);
                        $row_depart = $result_depart->fetch_assoc();
                        echo $row_depart["dept_name"];
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql_student = "SELECT * FROM students_in_eng";
                        $result_faculty = $connect->query($sql_student);
                        while ($row_faculty = $result_faculty->fetch_assoc()) {
                            echo $row_faculty["student_name_eng"] . "<br>";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
</div>
<!-- -------------------------------------------------------------- -->
        <!-- View all faculty department wise -->
       <div class="card">
        <div class="card-header" onclick="toggleCollapse('viewFaculty')">
            View all faculty in CS Department
        </div>
        <div class="card-body collapse" id="viewFaculty">
            <table class="table">
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th>Faculty Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
					
                        <td>
						<?php
                            $sql_depart="SELECT * FROM depart_tab";
                            $result_faculty=$connect->query($sql_depart);
                            while ($row_faculty = $result_faculty->fetch_assoc())
                            {
								echo $row_faculty["dept_name"] . "<br>";
									break;								
							}
                          ?>
						
						</td>
                        <td>
                            <?php
                            $sql_faculty="SELECT * FROM faculty_in_depart_cs";
                            $result_faculty=$connect->query($sql_faculty);
                            while ($row_faculty = $result_faculty->fetch_assoc())
                            {
                                echo $row_faculty["faculty_name"] . "<br>";
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<!-- ARTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
<div class="card">
    <div class="card-header" onclick="toggleCollapse('viewFacultyart')">
        View all faculty in ART Department
    </div>
    <div class="card-body collapse" id="viewFacultyart">
        <table class="table">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Faculty Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $sql_depart = "SELECT * FROM depart_tab LIMIT 1, 1"; // Get the second department
                        $result_depart = $connect->query($sql_depart);
                        $row_depart = $result_depart->fetch_assoc();
                        echo $row_depart["dept_name"];
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql_faculty = "SELECT * FROM faculty_in_depart_art";
                        $result_faculty = $connect->query($sql_faculty);
                        while ($row_faculty = $result_faculty->fetch_assoc()) {
                            echo $row_faculty["faculty_name_a"] . "<br>";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
	</div>
	</div>
<!-- MATHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH-->
<div class="card">
    <div class="card-header" onclick="toggleCollapse('viewFacultymath')">
        View all faculty in Math Department
    </div>
    <div class="card-body collapse" id="viewFacultymath">
        <table class="table">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Faculty Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $sql_depart = "SELECT * FROM depart_tab LIMIT 2, 1"; // Get the second department
                        $result_depart = $connect->query($sql_depart);
                        $row_depart = $result_depart->fetch_assoc();
                        echo $row_depart["dept_name"];
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql_faculty = "SELECT * FROM faculty_in_depart_math";
                        $result_faculty = $connect->query($sql_faculty);
                        while ($row_faculty = $result_faculty->fetch_assoc()) {
                            echo $row_faculty["faculty_name_m"] . "<br>";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
	</div>
	</div>
<!-- ENGLISHHHHHHHHHHHHHHHHHHHHHHHHHHHH-->
<div class="card">
    <div class="card-header" onclick="toggleCollapse('viewFacultyenglish')">
        View all faculty in English Department
    </div>
    <div class="card-body collapse" id="viewFacultyenglish">
        <table class="table">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Faculty Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $sql_depart = "SELECT * FROM depart_tab LIMIT 3, 1"; // Get the second department
                        $result_depart = $connect->query($sql_depart);
                        $row_depart = $result_depart->fetch_assoc();
                        echo $row_depart["dept_name"];
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql_faculty = "SELECT * FROM faculty_in_depart_eng";
                        $result_faculty = $connect->query($sql_faculty);
                        while ($row_faculty = $result_faculty->fetch_assoc()) {
                            echo $row_faculty["faculty_name_e"] . "<br>";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
</div>
		
   <div class="card">
    <div class="card-header">
        Add a Student
    </div>
    <div class="card-body">
        <!-- Include form to add a student -->
        <form method="post" action="">
            <div class="form-group">
                <label for="studentName">Student Name</label>
                <input type="text" class="form-control" name="studentName" id="studentName" placeholder="Enter student name">
            </div>
            <div class="form-group">
                <label for="studentID">Student ID</label>
                <input type="text" class="form-control" name="studentID" id="studentID" placeholder="Enter student ID">
            </div>
            <div class="form-group">
                <label for="studentYear">Student Enrollment Year</label>
                <input type="text" class="form-control" name="studentYear" id="studentYear" placeholder="Enter student Enrollment Year">
            </div>
            <div class="form-group">
                <label for="studentMajor">Student Major</label>
                <input type="text" class="form-control" name="studentMajor" id="studentMajor" placeholder="Enter student Major">
            </div>
            <div class="form-group">
                <label for="studentGPA">Student GPA</label>
                <input type="text" class="form-control" name="studentGPA" id="studentGPA" placeholder="Enter student GPA">
            </div>
            <div class="form-group">
                <label for="studentGRAD">Student Graduation Year</label>
                <input type="text" class="form-control" name="studentGRAD" id="studentGRAD" placeholder="Enter student year of Graduation">
            </div>
            <button type="submit" class="btn btn-primary" name="addStudent">Add Student</button>
        </form>
    </div>
</div>

        <!-- Add a Faculty -->
<div class="card">
    <div class="card-header">
        Add a Faculty
    </div>
    <div class="card-body">
        <!-- Include form to add a faculty -->
        <form id="addFacultyForm" method="post" action="">

            <div class="form-group">
                <label for="FacultyName">Faculty Name</label>
                <input type="text" class="form-control" name="FacultyName" id="FacultyName" placeholder="Enter Faculty name">
            </div>
            <div class="form-group">
                <label for="FacultyID">Faculty ID</label>
                <input type="text" class="form-control" name="FacultyID" id="FacultyID" placeholder="Enter Faculty ID">
            </div>
            <div class="form-group">
                <label for="FacultyYear">Faculty Year of Joining</label>
                <input type="text" class="form-control" name="FacultyYear" id="FacultyYear" placeholder="Enter Faculty Year of Joining">
            </div>
            <div class="form-group">
                <label for="FacultyQual">Qualifications</label>
                <input type="text" class="form-control" name="FacultyQual" id="FacultyQual" placeholder="Enter Faculty Qualifications">
            </div>
            <div class="form-group">
                <label for="FacultyDepart">Faculty Department</label>
                <input type="text" class="form-control" name="FacultyDepart" id="FacultyDepart" placeholder="Enter Faculty Department">
            </div>
            <button type="submit" class="btn btn-primary" name="addFaculty">Add Faculty</button>


        </form>
    </div>
</div>


        <!-- Preloaded Departments -->
        <div class="card">
            <div class="card-header" onclick="toggleCollapse('departments')">
                Departments
            </div>
            <div class="card-body collapse" id="departments">
                <!-- Display preloaded departments -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Department Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_depart="SELECT * FROM depart_tab";
                        $result_depart=$connect->query($sql_depart);
                        while ($row_depart = $result_depart->fetch_assoc())
                        {
                        ?>
                        <tr>
                            <td><?php echo $row_depart["dept_name"] ?></td>
                            <td>
                                Department ID: <?php echo $row_depart["dept_id"] ?><br>
                                Department Chair: <?php echo $row_depart["dept_chair"] ?><br>
                                Department Dean: <?php echo $row_depart["dept_dean"] ?><br>
                                Department Budget: <?php echo $row_depart["dept_buget"] ?> $<br>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Preloaded Courses -->
        <div class="card">
            <div class="card-header" onclick="toggleCollapse('courses')">
                Courses
            </div>
            <div class="card-body collapse" id="courses">
                <!-- Display preloaded courses -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_course="SELECT * FROM courses_tab";
                        $result_course=$connect->query($sql_course);
                        while ($row_course = $result_course->fetch_assoc())
                        {
                        ?>
                        <tr>
                            <td><?php echo $row_course["course_name"] ?></td>
                            <td>
                                Course ID: <?php echo $row_course["course_id"] ?><br>
                                Professor ID: <?php echo $row_course["fac_id"] ?><br>
                                Availability: <?php echo $row_course["offerd_in"] ?><br>
                                Credits: <?php echo $row_course["credits"] ?> <br>
                                Pre-requisites: <?php echo $row_course["pre_req"] ?> <br>
                                Type: <?php echo $row_course["type"] ?> <br>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleCollapse(elementId) {
            var element = document.getElementById(elementId);
            if (element.classList.contains('collapse')) {
                element.classList.remove('collapse');
            } else {
                element.classList.add('collapse');
            }
        }


		
    </script>
</body>
</html>
