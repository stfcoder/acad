<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/grad/EditGradList.php
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
			
     if(isset($_POST['StuID']))
		 {
				$StudentID = $_POST['StuID'];
					
				if(($_POST['LastName'] == '' ) and ($_POST['FirstName'] == '' ))
				{
					echo("<p>Invalid name. Please try again</p>");
				}
				
				else
				{
					$LastName = stripslashes($_POST['LastName']);
					$FirstName = stripslashes($_POST['FirstName']);
					
					$sql1 = "SELECT * FROM `acadgrads_grads` WHERE `StuID` = ".mysql_escape_string($StudentID);
					$result1 = mysql_query($sql1) or die(mysql_error());
					
					while ($row1 = mysql_fetch_array($result1)) 
					{
						if(($row1['GradFirstName'] != $FirstName) OR ($row1['GradLastName'] != $LastName))
						{	
							$sql2 = "UPDATE `acadgrads_grads` SET `Grad".mysql_escape_string($_GET['Subject'])."` = '0', `Grad".mysql_escape_string($_GET['Subject'])."Date`  = '0' WHERE `StuID` = ".mysql_escape_string($StudentID);		
							$result2 = mysql_query($sql2) or die(mysql_error());
																		
							$sql2 = "SELECT * FROM `acadgrads_grads` WHERE `StuID` = ".mysql_escape_string($StudentID);
							$result2 = mysql_query($sql2) or die(mysql_error());
							
							while ($row2 = mysql_fetch_array($result2)) 
							{
								if(($row2['GradCNS']==0) and ($row2['GradGM']==0) and ($row2['GradMed']==0) and ($row2['GradEng']==0) and ($row2['GradSec']==0) and ($row2['GradSci']==0) and ($row['GradCO']==0) and ($row['GradShip']==0))
								{
									$sql3 = "DELETE FROM `acadgrads_grads` WHERE `StuID` = ".mysql_escape_string($StudentID);
									$result3 = mysql_query($sql3) or die(mysql_error());
								}  
							}
						}
						
						$TimeStamp = mktime(0,0,0,$_POST['Month'],$_POST['Day'], $_POST['Year']);
					
						$sql2 = "SELECT DISTINCT `StuID` FROM `acadgrads_grads` WHERE `GradLastName` LIKE '".mysql_escape_string($LastName)."' AND `GradFirstName` LIKE '".mysql_escape_string($FirstName)."'";
						
						$result2 = mysql_query($sql2) or die(mysql_error());
						$update = 0;
						
						while ($row2 = mysql_fetch_array($result2)) 
						{
						
							$sql3 = "UPDATE `acadgrads_grads` SET `Grad".$_GET['Subject']."` = '1', `Grad".mysql_escape_string($_GET['Subject'])."Date`  = '".mysql_escape_string($TimeStamp)."' WHERE `StuID` = ".$row2['StuID'];		
							$update = 1;
							$result3 = mysql_query($sql3) or die(mysql_error());
						}
					
						if($update == 0)
						{
							$sql2 = "INSERT INTO `acadgrads_grads` (`GradLastName`, `GradFirstName`, `Grad".mysql_escape_string($_GET['Subject'])."`, `Grad".mysql_escape_string($_GET['Subject'])."Date`) VALUES ('".mysql_escape_string($LastName)."', '".mysql_escape_string($FirstName)."', '1', '".mysql_escape_string($TimeStamp)."')";		
							$result2 = mysql_query($sql2) or die(mysql_error());
						}
					

					}
		
					echo("<p>The details for ".strip_tags($FirstName)." ".strip_tags($LastName)." have been changed on the ".strip_tags($_GET['Subject'])." graduates list.</p>");
					
				}
			}
			
			$sql = "SELECT * FROM `acadgrads_grads` WHERE `Grad".mysql_escape_string($_GET['Subject'])."` = 1 ORDER BY `GradLastName`";
			
			$result = mysql_query($sql) or die(mysql_error());
			
			echo('<ul>');
			
			while ($row = mysql_fetch_array($result)) 
			{
				echo('<li><a href="EditGrad.php?Subject='.strip_tags($_GET['Subject']).'&amp;Student='.strip_tags($row['StuID']).'">'.strip_tags($row['GradLastName']).', '.strip_tags($row['GradFirstName']).'</a></li>');
			}
			?>
			</ul>
			
			<p><a href="/acad/admin/grad/ModGrad.php?Subject=<?php echo(strip_tags($_GET['Subject']));?>">Return to Graduate Menu</a></p>		
			
			<?php
	}
					
include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}

?>
