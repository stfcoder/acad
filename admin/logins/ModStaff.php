<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/logins/ModStaff.php
	Last Modified: 06 Jul 2008

\*****************************************************************/

session_start();

if ($_SESSION['Myvalid'] == "Yes")
{
	$title='Academy Adminstration';
  include("../../includes/header.php");

  ?>
  <h3>Account Admin</h3>
					
	<ul>
	<li><a class="pages" href="AddStaff.php">Add Account</a></li>
	<li><a class="pages" href="EditStaffList.php">Edit Account</a></li>
	<li><a class="pages" href="DelStaffList.php">Delete Account</a></li>
	</ul>
	
	<p><a href="/acad/admin">Return to Menu</a></p>
	
	<?php

	include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}
