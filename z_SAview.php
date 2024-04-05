<?php
// Include the connection.php file
include "connection.php";
?>

<html>
<head>
<title>PatientView - Walk In Form</title>

<style>
ul{
list-style-type:none;
}

html, body{
height:100%;
font-family: 'Arial';
border: none;
}

/* Rectangle 3 - Side Bar Background */

#SideBarBG{
position: absolute;
width: 298px;
min-height: 100%;
left:0px;
top: 0px;
bottom:0px;
background: yellow;
}
/* Group 1 - Side Bar Hyperlink Nav Container */

#SideBarNavCon{
position: absolute;
right:0px;
top: 75%;
width:100%;
}

/*Side Bar Hyperlink CSS*/
li .sideBarLink{
    display:block;
	color:#02075d;
	font-size: 25px;
	background: yellow;
	border:none;
	text-decoration:none;
	padding:10px;
	width:100%;
	right:30px;
	
}
li .sideBarLink:hover{
    background-color:#4045a3;
	color:white;
	padding:10px;
	
}

/*Rectangle 5 - Text Box Field Container */
#TextBoxContainer{
position: absolute;
width: 68%;
height: 72%;
left: 24%;
top: 21%;
padding: 15px;
background: #02075d;
color: white;
}
/* Rectangle 10 - Message Box */

#Msg{
position: absolute;
width: 700px;
height: 270px;
left: 25%;
top:  42.4%; 

background: #FFFFFF;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 20px;
border: none;
font-size:15px;
padding:7px;
}
/* Rectangle 9 - Date Today Box */

#Date{
position: absolute;
width: 700px;
height: 55px;
left: 25%;
top: 27%;

background: #FFFFFF;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 20px;
border: none;
font-size:24px;
padding:7px;
}

/* Rectangle 6 - FullName TextBox */

#FullName{
position: absolute;
width: 700px;
height: 55px;
left: 25%;
top: 12%;

background: #FFFFFF;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 20px;
border: none;

font-size:24px;
padding:7px;
}

/* Rectangle 25 - Send WalkIn Button*/

input.SendButton{
position: absolute;
width: 550px;
height: 50px;
left: 26%;
top: 94%;

background: #4BCF49;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 50px;
border: none;

font-style: normal;
font-weight: 400;
font-size: 20px;
line-height: 30px;

color: #FFFFFF;
}
input.SendButton:hover{
background: #43b541;
}

input.SendButton:active{
background: #379136;
}


table {
      border-collapse: collapse;
      width: 200%;
      height: 500px;

    }

    th, td {
      padding: 8px;
      text-align: center;
      border-bottom: 1px solid #ddd;
      border-right: 1px solid #ddd;
      border-left: 1px solid #ddd;
      border-top: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    /* Centering the table */
    .table-container {
      width: 75.5;
      position: absolute;
      top: 55%;
      left: 35%;
      transform: translate(-50%, -50%);
    }



  </style>
</head>
<body>
  <p style="position: absolute; font-size: 40px; left: 25%; font-weight:bold; color: #140748;">Send A Walk-in View Form</p>
  <br>
  <p style="position: absolute; font-size: 17px; left: 25%; top:100px; color:gray; "><i>Disclosure: This is only for tracking the applicant's track record for walk-in</i></p>

  <div id ="SideBarBG">
    <center><img src ="./assets/images/logobrgy.png" style="width:200px; height:200px;"></center>
    <ul id="sideBarNavCon">
      <li><a class="sideBarLink" href="z_SA.php">Request Appointment</a></li>
      <li style="background-color:#02075d; font-size: 25px; color:white; padding:10px;">Appointments</li>
      <li><a class="sideBarLink" href="z_user.PHP">Center Homepage</a></li>
      <li><a class="sideBarLink" href="dummy">Mapulang Lupa HP</a></li>
    </ul>
  </div>

  <div class="table-container">
  <div class="table-container">
    <table>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Date</th>
            <th>Message</th>
          
            <th>Status</th>
            
        </tr>
        <?php
// Include the connection.php file
include "connection.php";

// Check if a session is already active
if (session_status() == PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

// Fetch the username from the session
if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];

    $query = $con->prepare("SELECT * FROM req_form WHERE user_name = :user_name");
    $query->bindParam(':user_name', $username);
    $query->execute();

    $walkinData = $query->fetchAll(PDO::FETCH_ASSOC);

    // Display the data in the HTML table
    foreach ($walkinData as $data) {
        echo "<tr>";
        echo "<td>" . $data['full_name'] . "</td>";
        echo "<td>" . $data['email'] . "</td>";
        echo "<td>" . $data['mobile'] . "</td>";
        echo "<td>" . $data['date'] . "</td>";
        echo "<td>" . $data['message'] . "</td>";
        echo "<td>" . $data['status'] . "</td>";
        echo "</tr>";
    }
}
?>
</div>
</body>
</html>