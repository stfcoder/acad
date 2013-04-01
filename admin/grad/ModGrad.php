<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/grad/ModGrad.php
	Last Modified: 06 Jul 2008

\*****************************************************************/

session_start();

if ($_SESSION['Myvalid'] == "Yes")
{
	$title='Academy Adminstration';
  include("../../includes/header.php");

  
  if(isset($_GET['Subject']))
	{				
    ?>
	  <h3><?php echo(strip_tags($_GET['Subject']));?> Graduate List Admin</h3>
					
		<ul>
		  <li><a class="pages" href="AddGrad.php?Subject=<?php echo(strip_tags($_GET['Subject']));?>">Add <?php echo(strip_tags($_GET['Subject']));?> Graduate</a></li>
      <li><a class="pages" href="EditGradList.php?Subject=<?php echo(strip_tags($_GET['Subject']));?>">Edit <?php echo(strip_tags($_GET['Subject']));?> Graduate</a></li>
			<li><a class="pages" href="DelGradList.php?Subject=<?php echo(strip_tags($_GET['Subject']));?>">Delete <?php echo(strip_tags($_GET['Subject']));?> Graduate</a></li>
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
