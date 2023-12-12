<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
          overflow: hidden;
          background-color: #333;
        }

        .navbar a {
          float: left;
          font-size: 16px;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        .dropdown {
          float: left;
          overflow: hidden;
        }

        .dropdown .dropbtn {
          font-size: 16px;
          border: none;
          outline: none;
          color: white;
          padding: 14px 16px;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
          background-color: red;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: left;
        }

        .dropdown-content a:hover {
          background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }
        </style>
    </head>
    <body>
                <div class="navbar">
            <a href="index.php">Home</a>
            <div class="dropdown">
                <button class="dropbtn">View
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="viewPupils.php">Student</a>
                    <a href="ViewParents.php">Parent</a>
                    <a href="ViewTeacher.php">Teacher</a>
                    <a href="viewClasses.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Add
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="Addpupils.php">Student</a>
                    <a href="AddParents.php">Parent</a>
                    <a href="AddTeachers.php">Teacher</a>
                    <a href="addClasses.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Delete
                  <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                  <a href="delstudent.php">Student</a>
                  <a href="delParent.php">Parent</a>
                  <a href="delTeacher.php">Teacher</a>
                  <a href="delClass.php">Class</a>
              </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Update
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="updatestudent.php">Student</a>
                <a href="updateParent.php">Parent</a>
                <a href="updateTeacher.php">Teacher</a>
                <a href="updateClass.php">Class</a>
            </div>
        </div>
            <a href="Contact.php">Contact Us</a>
        </div>


<?php

$link = mysqli_connect("localhost", "root", "", "PrimarySchool");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Teacher_ID = $_POST['Teacher_ID'];
    $Teacher_name = $_POST['Teacher_name'];
    $Address = $_POST[ 'Address'];
    $Phone = $_POST['Phone'];
    $Salary = $_POST['Salary'];
    $Background_info = $_POST['Background_info'];
    $sql2 = "UPDATE `Teachers` SET  `Teacher_ID` = '$Teacher_ID', `Teacher_name` = '$Teacher_name', `Address` = '$Address', `Phone` = '$Phone', `Salary` = '$Salary', `background_info` = '$Background_info' WHERE `Teacher_ID` = '$id';";
    if (mysqli_query ($link, $sql2)) {
    echo "successfully";
    } else{
    echo "Error";
    }
}
?>

<h3>See all Teachers</h3>
	
		<table>
		
			<tr>
				<th width="150px">Teacher_ID<br><hr></th>
				<th width="250px">Teacher_name<br><hr></th>
                <th width="250px">Address<br><hr></th>
                <th width="250px">Phone<br><hr></th>
                <th width="250px">Salary<br><hr></th>
                <th width="250px">Background_info<br><hr></th>
			</tr>
			
			<?php
			 $sql = mysqli_query($link, "SELECT Teacher_ID,Teacher_name,Address,Phone,Salary,Background_info FROM Teachers");
    

			while ($row = $sql->fetch_assoc()){
			echo "
			<form method='post' action='./updateTeacher.php?id={$row['Teacher_ID']}'>
			<tr>
      
				<th><input tpye='text' name='Teacher_ID' value='{$row['Teacher_ID']}'></th>
				<th><input tpye='text' name='Teacher_name' value='{$row['Teacher_name']}'></th>
                <th><input tpye='text' name='Address' value='{$row['Address']}'></th>
                <th><input tpye='text' name='Phone' value='{$row['Phone']}'></th>
                <th><input tpye='text' name='Salary' value='{$row['Salary']}'></th>
                <th><input tpye='text' name='Background_info' value='{$row['Background_info']}'></th>
                <th><button type='submit'>update</button></th>
			</tr>
			</form>";
			}
			?>
            </table>
        </body>
        </html>