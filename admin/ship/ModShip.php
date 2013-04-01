<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/ship/ModShip.php
	Last Modified: 06 Jul 2008

\*****************************************************************/

session_start();

if ($_SESSION['Myvalid'] == "Yes")
{
	$title='Academy Adminstration';
  include("../../includes/header.php");

  
  if(isset($_GET['Ship']))
	{
					
		if($_GET['Ship'] == 'Chal')
		{
		$Ship = 'Challenger';
		$ShipNum = 1;
		}
		
		if($_GET['Ship'] == 'Colu')
		{
		$Ship = 'Columbia';
		$ShipNum = 2;
		}
		
		if($_GET['Ship'] == 'Disc')
		{
		$Ship = 'Discovery';
		$ShipNum = 3;
		}

		if($_GET['Ship'] == 'Apol')
		{
		$Ship = 'Apollo';
		$ShipNum = 4;
		}

		if($_GET['Ship'] == 'Ende')
		{
		$Ship = 'Endeavour';
		$ShipNum = 5;
		}
		
		?>	
		<h3><?php echo($Ship);?> Graduate List Admin</h3>
		
		<ul>
			<li><a class="pages" href="AddShip.php?Ship=<?php echo(strip_tags($_GET['Ship']));?>">Add <?php echo($Ship);?> Graduate</a></li>
			<li><a class="pages" href="EditShipList.php?Ship=<?php echo(strip_tags($_GET['Ship']));?>">Edit <?php echo($Ship);?> Graduate</a></li>
			<li><a class="pages" href="DelShipList.php?Ship=<?php echo(strip_tags($_GET['Ship']));?>">Delete <?php echo($Ship);?> Graduate</a></li>
		</ul>
		
		<p><a href="/acad/admin">Return to Menu</a></p>
		
<?php
	}		

  include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}
?>
