<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/logins/EditStaff.php
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
							
	$sql = "SELECT * FROM `acadgrads_logins` WHERE `uID` = ".mysql_escape_string($_GET['StaffID']);
						
	$result = @mysql_query($sql) or die(mysql_error());
	?><p><?php
	while ($row = mysql_fetch_array($result)) 
	{
		?>

		<p>Please enter account detals:</p>
		<form action="EditStaffList.php" method="post">
		<p>Username: <input name="Username" type="text" value="<?php echo(strip_tags($row['Username'])); ?>"></p>
		<p>Password (leave blank to keep current password): <input name="Password" type="text"></p>
		<p>Email: <input name="Email" type="text" value="<?php echo(strip_tags($row['Email'])); ?>"></p>
		<p><input type="hidden" name="StaffID" value="<?php echo(strip_tags($_GET['StaffID'])); ?>" />
		<input type="submit" value="Submit Details" /></p>
		</form>

		<p><a href="/acad/admin/logins/EditStaffList.php">Return to Edit Graduate List</a></p>
   
    <?php
	}			
	include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}?>
