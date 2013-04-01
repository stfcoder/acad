<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/logins/DelStaffList.php
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
	
	if(isset($_POST['number']))
	{
		$i =0;
		
		while($i <= $_POST['number'])
		{
			$StaffID  = $_POST['delid'.$i];
			
			if($_POST['Delete'.$i] == 1)
			{
				$sql = "SELECT * FROM `acadgrads_logins` WHERE `uID` = ".mysql_escape_string($StaffID);
				$result = mysql_query($sql) or die(mysql_error());
				
				while ($row = mysql_fetch_array($result)) 
				{
					$sql2 = "DELETE FROM `acadgrads_logins` WHERE `uID` = ".mysql_escape_string($StaffID);
					$result2 = @mysql_query($sql2) or die(mysql_error());
				}
			}
			
			$i++;
		}
	}
		
	$sql = "SELECT * FROM `acadgrads_logins` ORDER BY `LastName`";
	
	$result = mysql_query($sql) or die(mysql_error());
	$update = 0;
	$n=0;
	?><form action="DelStaffList.php" method="post"><ul class="plain"><?php
	while ($row = mysql_fetch_array($result)) 
	{
		echo('<li><input name="delid'.$n.'" type="hidden" value="'.$row['uID'].'" />
		<input type="checkbox" name="Delete'.$n.'" value="1" />'.$row['Username'].'</li>');
		$n++;
	}
	echo('</ul><p><input name="number" type="hidden" value="'.($n - 1).'" />');
	?><input type="submit" value="Delete Selected Accounts" /></p></form>
	
	<p><a href="/acad/admin/logins/ModStaff.php">Return to Account Admin Menu</a></p>

	<?php

	include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}
