<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/ship/AddShip.php
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
		<h3>USS <?php echo($Ship);?> Graduate List Admin</h3>
		<?php
		
		if(isset($_POST['LastName']))
		{ 
			if(($_POST['LastName'] == '' ) and ($_POST['FirstName'] == '' ))
			{
  			echo("<p>Invalid name. Please try again</p>");
			}
							
			if(($_POST['Month'] == '') or ($_POST['Day'] == '') or ($_POST['Year'] ==''))
			{
				echo("<p>Invalid date. Please try again</p>");
			}
			
			else
			{
			  dbConnect();
			  
				$LastName = stripslashes($_POST['LastName']);
				$FirstName = stripslashes($_POST['FirstName']);
				
				$TimeStamp = mktime(0,0,0,$_POST['Month'],$_POST['Day'], $_POST['Year']);
			
				$sql = "SELECT DISTINCT `StuID` FROM `acadgrads_grads` WHERE `GradLastName` LIKE '".mysql_escape_string($LastName)."' AND `GradFirstName` LIKE '".mysql_escape_string($FirstName)."'";
				
				$result = mysql_query($sql) or die(mysql_error());
				$update = 0;
				
				while ($row = mysql_fetch_array($result)) 
				{
				
					$sql2 = "UPDATE `acadgrads_grads` SET `GradShip` = '".mysql_escape_string($ShipNum)."', `GradShipDate`  = '".mysql_escape_string($TimeStamp)."' WHERE `StuID` = ".$row['StuID'];		
					$update = 1;
					$result2 = mysql_query($sql2) or die(mysql_error());
				}
			
				if($update == 0)
				{
					$sql = "INSERT INTO `acadgrads_grads` (`GradLastName`, `GradFirstName`, `GradShip`, `GradShipDate`) VALUES ('".mysql_escape_string($LastName)."', '".mysql_escape_string($FirstName)."', '".mysql_escape_string($ShipNum)."', '".mysql_escape_string($TimeStamp)."')";		
					$result = mysql_query($sql) or die(mysql_error());
				}
				
				echo("<p>".strip_tags($FirstName)." ".strip_tags($LastName)." has been added to the ship graduates list.</p>");
				
			}
		}
					
	?>
		
		<p>Please enter the graduates detals:</p>
		<form action="AddShip.php?Ship=<?php echo(strip_tags($_GET['Ship']));?>" method="post">
		<p>First name: <input name="FirstName" type="text" /></p>
		<p>Last name: <input name="LastName" type="text" /></p>
		<p>Date: 
		<select name="Day"> <option selected="selected"> Day</option> <option value="1"> 01</option> <option value="2"> 02</option> <option value="3"> 03</option> <option value="4"> 04</option> <option value="5"> 05</option> <option value="6"> 06</option> <option value="7"> 07</option> <option value="8"> 08</option> <option value="9"> 09</option> <option value="10"> 10</option> <option value="11"> 11</option> <option value="12"> 12</option> <option value="13"> 13</option> <option value="14"> 14</option> <option value="15"> 15</option> <option value="16"> 16</option> <option value="17" > 17</option> <option value="18"> 18</option> <option value="19"> 19</option> <option value="20"> 20</option> <option value="21"> 21</option> <option value="22"> 22</option> <option value="23"> 23</option> <option value="24"> 24</option> <option value="25"> 25</option> <option value="26"> 26</option> <option value="27"> 27</option> <option value="28"> 28</option> <option value="29"> 29</option> <option value="30"> 30</option> <option value="31"> 31</option></select>
		 
		<select name="Month"> <option selected="selected"> Month</option> <option value="1"> January</option> <option value="2"> February</option> <option value="3"> March</option> <option value="4"> April</option> <option value="5"> May</option> <option value="6"> June</option> <option value="7"> July</option> <option value="8"> August</option> <option value="9"> September</option> <option value="10"> October</option> <option value="11"> November</option> <option value="12"> December</option></select>
				
		<select name="Year"> <option selected="selected"> Year</option> <option value="1998"> 1998</option> <option value="1999"> 1999</option> <option value="2000"> 2000</option> <option value="2001"> 2001</option> <option value="2002"> 2002</option> <option value="2003"> 2003</option> <option value="2004"> 2004</option> <option value="2005"> 2005</option> <option value="2006"> 2006</option> <option value="2007"> 2007</option> <option value="2008"> 2008</option> <option value="2009"> 2009</option><option value="2010" > 2010</option><option value="2011" > 2011</option><option value="2012" > 2012</option><option value="2013" > 2013</option><option value="2014" > 2014</option></select></p>
		
		<p><input type="submit" value="Submit Details" /></p>
		<p><a href="/acad/admin/ship/ModShip.php?Ship=<?php echo(strip_tags($_GET['Ship']));?>">Return to Graduate Menu</a></p>
		</form>
					
<?php }
					
	include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}?>
