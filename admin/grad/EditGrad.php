<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/grad/EditGrad.php
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
			$sql = "SELECT * FROM `acadgrads_grads` WHERE `StuID` = ".mysql_escape_string($_GET['Student']);
			
			$result = mysql_query($sql) or die(mysql_error());
			$update = 0;
			
			while ($row = mysql_fetch_array($result)) 
			{
				?>
		
				<p>Please change the graduates detals:</p>
				<form action="EditGradList.php?Subject=<?php echo(strip_tags($_GET['Subject']));?>" method="post">
				<p>First name: <input name="FirstName" type="text" value="<?php echo($row['GradFirstName']); ?>" /></p>
				<p>Last name: <input name="LastName" type="text" value="<?php echo($row['GradLastName']); ?>" /></p>
				<p>Date: 
				<select name="Day"> <option value="<?php echo(date('d',$row['Grad'.strip_tags($_GET['Subject']).'Date'])); ?>" selected="selected"> <?php echo(date('d',$row['Grad'.strip_tags($_GET['Subject']).'Date'])); ?></option> <option value="1"> 01</option> <option value="2"> 02</option> <option value="3"> 
				03</option> <option value="4"> 04</option> <option value="5"> 05</option> <option value="6"> 06</option> <option value="7"> 07</option> <option value="8"
				> 08</option> <option value="9"> 09</option> <option value="10"> 10</option> <option value="11"> 11</option> <option value="12"> 12</option> <option 
				value="13"> 13</option> <option value="14"> 14</option> <option value="15"> 15</option> <option value="16"> 16</option> <option value="17" 
				> 17</option> <option value="18"> 18</option> <option value="19"> 19</option> <option value="20"> 20</option> <option value="21"> 21</option> <option 
				value="22"> 22</option> <option value="23"> 23</option> <option value="24"> 24</option> <option value="25"> 25</option> <option value="26"
				> 26</option> <option value="27"> 27</option> <option value="28"> 28</option> <option value="29"> 29</option> <option value="30"> 30
				</option> <option value="31"> 31</option></select>
				 
				<select name="Month"><option value="<?php echo(date('n',$row['Grad'.strip_tags($_GET['Subject']).'Date'])); ?>" selected="selected"> <?php echo(date('F',$row['Grad'.strip_tags($_GET['Subject']).'Date'])); ?></option> <option value="1"> January</option> <option value="2"> February
				</option> <option value="3"> March</option> <option value="4"> April</option> <option value="5"> May</option> <option value="6"> June
				</option> <option value="7"> July</option> <option value="8"> August</option> <option value="9"> September</option> <option value="10"> 
				October</option> <option value="11"> November</option> <option value="12"> December</option></select>
				
				<select name="Year"> <option value="<?php echo(date('Y',$row['Grad'.strip_tags($_GET['Subject']).'Date'])); ?>" selected="selected"> <?php echo(date('Y',$row['Grad'.strip_tags($_GET['Subject']).'Date'])); ?></option> <option value="1998"> 1998</option> <option value="1999"> 1999</option> <option value="2000"> 2000
				</option> <option value="2001"> 2001</option> <option value="2002"> 2002</option> <option value="2003"> 2003</option> <option value="2004"> 2004
				</option> <option value="2005"> 2005</option> <option value="2006"> 2006</option> <option value="2007"> 2007</option> <option value="2008"> 2008
				</option> <option value="2009"> 2009</option> <option value="2010" > 2010</option><option value="2011" > 2011</option><option value="2012" > 2012</option><option value="2013" > 2013</option><option value="2014" > 2014</option></select></p>

				
				<p><input type="hidden" name="StuID" value="<?php echo(strip_tags($_GET['Student'])); ?>" />
				<input type="submit" value="Submit Details" /></p>
				</form>
				
				<p><a href="/acad/admin/grad/EditGradList.php?Subject=<?php echo(strip_tags($_GET['Subject']));?>">Return to Edit Graduate List</a></p>
<?php }

	}
					
include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}

?>
