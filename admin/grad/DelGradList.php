<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/grad/DelGradList.php
	Last Modified: 06 Jul 2008

\*****************************************************************/

session_start();

if ($_SESSION['Myvalid'] == "Yes")
{
	$title='Academy Adminstration';
  include("../../includes/header.php");
  include("../../includes/dbconnect.php");
  
  if(isset($_GET['Subject']))
	{	
		?>
		<h3><?php echo(strip_tags($_GET['Subject']));?> Graduate List Admin</h3>
		<?php
		
		dbConnect();
		
		if(isset($_POST['number']))
		{
		  
			$i =0;
			
			while($i <= $_POST['number'])
			{
				$StudentID  = $_POST['delid'.$i];
				
				if($_POST['Delete'.$i] == 1)
				{
					
					$sql = "UPDATE `acadgrads_grads` SET `Grad".mysql_escape_string($_GET['Subject'])."` = '0', `Grad".mysql_escape_string($_GET['Subject'])."Date`  = '0' WHERE `StuID` = ".mysql_escape_string($StudentID);		
					$result = mysql_query($sql) or die(mysql_error());
					
					$sql = "SELECT * FROM `acadgrads_grads` WHERE `StuID` = ".mysql_escape_string($StudentID);
					$result = mysql_query($sql) or die(mysql_error());
					
					while ($row = mysql_fetch_array($result)) 
					{
						if(($row['GradCNS']==0) and ($row['GradGM']==0) and ($row['GradMed']==0) and ($row['GradEng']==0) and ($row['GradSec']==0) and ($row['GradSci']==0) and ($row['GradCO']==0) and ($row['GradShip']==0))
						{
							$sql2 = "DELETE FROM `acadgrads_grads` WHERE `StuID` = ".mysql_escape_string($StudentID);
							$result2 = mysql_query($sql2) or die(mysql_error());
						}  
					}
				}
				
				$i++;
			}
			
			?><p>The selected graduates have been deleted.</p><?php
		}
								
		$sql = "SELECT * FROM `acadgrads_grads` WHERE `Grad".mysql_escape_string($_GET['Subject'])."` = 1 ORDER BY `GradLastName`";
							
		$result = mysql_query($sql) or die(mysql_error());
		$update = 0;
		$n=0;
		?><form action="DelGradList.php?Subject=<?php echo(strip_tags($_GET['Subject']));?>" method="post"><ul class="plain"><?php
		while ($row = mysql_fetch_array($result)) 
		{
			echo('<li><input name="delid'.$n.'" type="hidden" value="'.$row['StuID'].'" />
			<input type="checkbox" name="Delete'.$n.'" value="1" />'.$row['GradLastName'].', '.$row['GradFirstName'].'</li>');
			$n++;
		}
		echo('</ul><p><input name="number" type="hidden" value="'.($n - 1).'" />');
		?><input type="submit" value="Delete Selected Graduates" /></p></form>
		
		<p><a href="/acad/admin/grad/ModGrad.php?Subject=<?php echo(strip_tags($_GET['Subject']));?>">Return to Graduate Menu</a></p>	
		<?php
	}
					
include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}
?>
