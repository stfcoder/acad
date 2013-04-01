<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/logins/AddStaff.php
	Last Modified: 06 Jul 2008

\*****************************************************************/

session_start();

if ($_SESSION['Myvalid'] == "Yes")
{
	$title='Academy Adminstration';
  include("../../includes/header.php");
  include("../../includes/dbconnect.php");

  ?>
  <h3>Account Admin</h3>
	<?php				
  
  if(isset($_POST['Username']))
	{
		if($_POST['Username'] == '' )
		{
			echo("<p>Invalid username. Please try again</p>");
		}
		  
		else if($_POST['Email'] == '' )
		{
			echo("<p>Invalid email address. Please try again</p>");
		}
		
		else
		{
		  dbConnect();
			
			$sql = "SELECT DISTINCT `uID` FROM `acadgrads_logins` WHERE `Username` LIKE '".mysql_escape_string($_POST['Username'])."'";
			
			$result = mysql_query($sql) or die(mysql_error());
			$userexist = 0;
			
			while ($row = mysql_fetch_array($result)) 
			{
				echo("<p>Username already exists. Please try again</p>");
				$userexist = 1;
			}
		
			if($userexist == 0)
			{
				$sql = "INSERT INTO `acadgrads_logins` (`Username`, `Password`, `Email`) VALUES ('".mysql_escape_string($_POST['Username'])."', '".MD5($_POST['Password'])."', '".mysql_escape_string($_POST['Email'])."')";
				
				$result = mysql_query($sql) or die(mysql_error());
				
			  echo("<p>Account created.<br /> Username: ".strip_tags($_POST['Username'])."<br />  Password: ".strip_tags($_POST['Password'])."</p>");
			}
		}
	}
	$password = rand(1000000, 9999999);

?>
	
	<p>Please enter the users detals:</p>
	<form action="AddStaff.php" method="post">
	<p>Username: <input name="Username" type="text" /></p>
	<p>Password: <input name="Password" type="text" value="<?php echo($password); ?>"/></p>
	<p>Email: <input name="Email" type="text" /></p>
	<p><input type="submit" value="Submit Details" /></p>
	</form>
	
	<p><a href="/acad/admin/logins/ModStaff.php">Return to Account Admin Menu</a></p>

	<?php

	include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}
