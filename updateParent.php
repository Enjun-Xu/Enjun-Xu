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
        $Parent_ID = $_POST['Parent_ID'];
        $Parent_name = $_POST['Parent_name'];
        $Address = $_POST[ 'Address'];
        $Email = $_POST['Email'];
       // echo $Class_ID.$Class_name.$Pupils_num.$Teacher_name;
       $sql2 = "UPDATE `Parents` SET  `Parent_ID` = '$Parent_ID', `Parent_name` = '$Parent_name', `Address` = '$Address', `Email` = '$Email' WHERE `Parent_ID` = '$id';";
        if (mysqli_query ($link, $sql2)) {
        echo "successfully";
        } else{
        echo "Error";
        }
    }
?>

<h3>See all Parents</h3>
	
		<table>
		
			<tr>
				<th width="150px">Parent_ID<br><hr></th>
				<th width="250px">Parent_name<br><hr></th>
                <th width="250px">Address<br><hr></th>
                 <th width="250px">Email<br><hr></th>
                 <th width="250px">operate<br><hr></th>
			</tr>
	
			<?php
			 $sql = mysqli_query($link, "SELECT Parent_ID,Parent_name,Address,Email FROM Parents");
    

			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
      	<form method='post' action='./updateParent.php?id={$row['Parent_ID']}'>
				<th><input tpye='text' name='Parent_ID' value='{$row['Parent_ID']}'></th>
				<th><input tpye='text' name='Parent_name' value='{$row['Parent_name']}'></th>
                <th><input tpye='text' name='Address' value='{$row['Address']}'></th>
                <th><input tpye='text' name='Email' value='{$row['Email']}'></th>
                <th><button type='submit'>update</button></th>
			</tr>
			</form>";
			}
			?>
            </table>
        </body>
        </html>
