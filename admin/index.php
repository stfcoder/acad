<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com

	Filename: admin/index.php
	Last Modified: 13 Jul 2008

\*****************************************************************/

	$title='Academy Adminstration';
session_start();

include("../includes/header.php");
include("../includes/dbconnect.php");

if($_GET['logout']) {
  session_destroy();
  loginpage();
}

else if(isset($_POST['username'])) {
  dbConnect();
	$password = $_POST['password'];

$sql="SELECT * FROM acadgrads_logins WHERE `Username` = '".mysql_escape_string($_POST['username'])."' AND `Password` = MD5('".mysql_escape_string($_POST['password'])."')";

	$rs=mysql_query($sql)or die("Could not execute query");

	$num = mysql_numrows($rs);
	if (($num != 0))
	{
		$_SESSION['Myvalid'] = "Yes";

		while ($row = mysql_fetch_array($rs))
		{

			$_SESSION['MyuID'] = $row['uID'];
			$_SESSION['MyFirstName'] = $row['FirstName'];
			$_SESSION['MyLastName'] = $row['LastName'];
			$_SESSION['MyAdmin'] = $row['Admin'];
			$_SESSION['MyCmdt'] = $row['Cmdt'];
			$_SESSION['MyEmail'] = $row['Email'];
		}

		mainpage();

	}

	else
	{
		loginpage("Invalid username or password. Please try again.");
	}

}

else if($_SESSION['Myvalid'] == "Yes") {
	mainpage();
}

else if(isset($_GET['Error'])) {
	if($_GET['Error'] == "Session")	{
		loginpage("Session error. Please login again");
	}
}

else {
	loginpage();
}

include("../includes/footer.php");

function mainpage()
{
?>

	<h3>Administration Home</h3>
	<p>Welcome to the Academy Administration page.</p>

	<ul>
	<li><a class="pages" href="grad/ModGrad.php?Subject=CNS">Update CNS List</a></li>
	<li><a class="pages" href="grad/ModGrad.php?Subject=Eng">Update Eng List</a></li>
	<li><a class="pages" href="grad/ModGrad.php?Subject=GM">Update GM List</a></li>
	<li><a class="pages" href="grad/ModGrad.php?Subject=Med">Update Med List</a></li>
	<li><a class="pages" href="grad/ModGrad.php?Subject=Sci">Update Sci List</a></li>
	<li><a class="pages" href="grad/ModGrad.php?Subject=Sec">Update Sec List</a></li>
	<li><a class="pages" href="grad/ModGrad.php?Subject=CO">Update CO List</a></li>
	<li><a class="pages" href="grad/ModGrad.php?Subject=XO">Update XO List</a></li>
	<li><a class="pages" href="grad/ModGrad.php?Subject=DH">Update DH List</a></li>
	<li><a class="pages" href="ship/ModShip.php?Ship=Apol">Update Apollo List</a></li>
	<li><a class="pages" href="ship/ModShip.php?Ship=Chal">Update Challenger List</a></li>
	<li><a class="pages" href="ship/ModShip.php?Ship=Colu">Update Columbia List</a></li>
	<li><a class="pages" href="ship/ModShip.php?Ship=Disc">Update Discovery List</a></li>
	<li><a class="pages" href="ship/ModShip.php?Ship=Ende">Update Endeavour List</a></li>
	<li><a class="pages" href="logins/ModStaff.php">Update Admin Accounts</a></li>
	<li><a class="pages" href="logins/ModNames.php">Update Site Names</a></li>
	<li><a class="pages" href="?logout=true">Logout From Admin System</a></li>
	</ul>

	<?php

}

function loginpage($Error = '')
{
	?>
	<h3>Administration Login</h3>
	<div><p><?php echo($Error);?></p>

  <p>Please log-in:</p>
	<form action="/acad/admin/" method="post">
  	<p>Username: <input name="username" type="text" /></p>
  	<p>Password: <input name="password" type="password" /></p>
  	<p><input type="submit" value="Log In" /></p>
	</form>
	<a class="pages" href="pass.php">Retrieve password</a>
	</div>

	<?php
}



