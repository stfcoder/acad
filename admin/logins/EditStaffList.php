<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/logins/EditStaffList.php
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
	
	dbConnect();
	
  if(isset($_POST['StaffID']))
	{
		$StaffID = $_POST['StaffID'];
	
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
			$sql = "UPDATE `acadgrads_logins` SET `Username` = '".mysql_escape_string($_POST['Username'])."', `Email` = '".mysql_escape_string($_POST['Email'])."'";
			
			if(!empty($_POST['Password'])) {
			  $sql .= ", `Password` = '".MD5($_POST['Password'])."'";
			}
			
			$sql .= " WHERE `uID` = '".mysql_escape_string($StaffID)."'";
			
			$result = mysql_query($sql) or die(mysql_error());
									
			echo("<p>Account has been modified.</p>");
			
		}
			
	}
	
	
	$sql = "SELECT * FROM `acadgrads_logins` ORDER BY `LastName`";
	
	$result = @mysql_query($sql) or die(mysql_error());
	
	?><ul><?php
	while ($row = mysql_fetch_array($result)) 
	{
		echo('<li><a href="EditStaff.php?StaffID='.$row['uID'].'">'.$row['Username'].'</a></li>');
	}
	?></ul><p><a href="/acad/admin/logins/ModStaff.php">Return to Account Admin Menu</a></p>

	<?php

	include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}
