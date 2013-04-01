<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/ship/DelShipList.php
	Last Modified: 06 Jul 2008

\*****************************************************************/

session_start();

if ($_SESSION['Myvalid'] == "Yes")
{
	$title='Academy Adminstration';
  include("../../includes/header.php");
  include("../../includes/dbconnect.php");

  if(isset($_GET['Ship']))
	{

	  dbConnect();	
	  
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
		<h3>USS <?php echo(strip_tags($Ship));?> Graduate List Admin</h3>
		<?php
		
		if(isset($_POST['number']))
		{
			$i =0;
			
			while($i <= $_POST['number'])
			{
				$StudentID  = $_POST['delid'.$i];
				
				if($_POST['Delete'.$i] == 1)
				{
					
					$sql = "UPDATE `acadgrads_grads` SET `GradShip` = '0', `GradShipDate`  = '0' WHERE `StuID` = ".mysql_escape_string($StudentID);		
					$result = @mysql_query($sql) or die(mysql_error());
					
					$sql = "SELECT * FROM `acadgrads_grads` WHERE `StuID` = ".mysql_escape_string($StudentID);
					$result = @mysql_query($sql) or die(mysql_error());
					
					while ($row = mysql_fetch_array($result)) 
					{
						if(($row['GradCNS']==0) and ($row['GradGM']==0) and ($row['GradMed']==0) and ($row['GradEng']==0) and ($row['GradSec']==0) and ($row['GradSci']==0) and ($row['GradCO']==0) and ($row['GradShip']==0))
						{
							$sql2 = "DELETE FROM `acadgrads_grads` WHERE `StuID` = ".mysql_escape_string($StudentID);
							$result2 = @mysql_query($sql2) or die(mysql_error());
						}  
					}
				}
				
				$i++;
			}
		}
			
		$sql = "SELECT * FROM `acadgrads_grads` WHERE `GradShip` = ".mysql_escape_string($ShipNum)." ORDER BY `GradLastName`";
		
		$result = mysql_query($sql) or die(mysql_error());
		$update = 0;
		$n=0;
		?><form action="DelShipList.php?Ship=<?php echo(strip_tags($_GET['Ship']));?>" method="post"><ul style="plain"><?php
		while ($row = mysql_fetch_array($result)) 
		{
			echo('<li><input name="delid'.$n.'" type="hidden" value="'.$row['StuID'].'" />
			<input type="checkbox" name="Delete'.$n.'" value="1" />'.$row['GradLastName'].', '.$row['GradFirstName'].'</li>');
			$n++;
		}
		echo('</ul><p><input name="number" type="hidden" value="'.($n - 1).'" />');
		?><input type="submit" value="Delete Selected Graduates" /></p></form>

    <p><a href="/acad/admin/grad/ModGrad.php?Subject=<?php echo(strip_tags($_GET['Ship']));?>">Return to Graduate Menu</a></p>		
			
			<?php
	}
					
include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}

?>
