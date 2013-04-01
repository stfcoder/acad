<?php
/******************************************************************\
	STAR-FLEET ACADEMY EXTERNAL SITE
	DESIGNER: JACK DIPPER
	EMAIL: jb.dipper.stf@gmail.com
	
	Filename: admin/logins/ModNames.php
	Last Modified: 06 Jul 2008

\*****************************************************************/

session_start();

if ($_SESSION['Myvalid'] == "Yes")
{
	$title='Academy Adminstration';
  include("../../includes/header.php");

  ?>
  <h3>Site Names Admin</h3>
  <?php
  if(isset($_POST['submit'])) {
    $names['acmdt']['name'] = $_POST['acmdt'];
    $names['vcmdt']['name'] = $_POST['vcmdt'];
    $names['aflo']['name'] = $_POST['aflo'];
    $names['CNS']['tutor'] = $_POST['CNS'];
    $names['Eng']['tutor'] = $_POST['Eng'];
    $names['GM']['tutor'] = $_POST['GM'];
    $names['Med']['tutor'] = $_POST['Med'];
    $names['Sci']['tutor'] = $_POST['Sci'];
    $names['Sec']['tutor'] = $_POST['Sec'];
    $names['CO']['tutor'] = $_POST['CO'];
    $names['XO']['tutor'] = $_POST['XO'];
    $names['DH']['tutor'] = $_POST['DH'];
    
    write_ini_file('../../data/names.ini', $names);
    
    echo('<p>Names saved.</p>');
    
  }

  ?>
	<form action="ModNames.php" method="post">
  <p>Academy Commandant: <input name="acmdt" type="text" value="<?php echo(strip_tags($names['acmdt']['name'])); ?>" /></p>
  <p>Vice Commandant: <input name="vcmdt" type="text" value="<?php echo(strip_tags($names['vcmdt']['name'])); ?>" /></p>
  <p>Fleet Liaison Officer: <input name="aflo" type="text" value="<?php echo(strip_tags($names['aflo']['name'])); ?>" /></p>
  <p>CNS Tutor: <input name="CNS" type="text" value="<?php echo(strip_tags($names['CNS']['tutor'])); ?>" /></p>
  <p>Eng Tutor: <input name="Eng" type="text" value="<?php echo(strip_tags($names['Eng']['tutor'])); ?>" /></p>
  <p>GM Tutor: <input name="GM" type="text" value="<?php echo(strip_tags($names['GM']['tutor'])); ?>" /></p>
  <p>Med Tutor: <input name="Med" type="text" value="<?php echo(strip_tags($names['Med']['tutor'])); ?>" /></p>
  <p>Sci Tutor: <input name="Sci" type="text" value="<?php echo(strip_tags($names['Sci']['tutor'])); ?>" /></p>
  <p>Sec Tutor: <input name="Sec" type="text" value="<?php echo(strip_tags($names['Sec']['tutor'])); ?>" /></p>
  <p>CO Tutor: <input name="CO" type="text" value="<?php echo(strip_tags($names['CO']['tutor'])); ?>" /></p>
  <p>XO Tutor: <input name="XO" type="text" value="<?php echo(strip_tags($names['XO']['tutor'])); ?>" /></p>
  <p>DH Tutor: <input name="DH" type="text" value="<?php echo(strip_tags($names['DH']['tutor'])); ?>" /></p>
  
		<p><input name="submit" value="Save Names" type="submit" /></p>
		</form>
    <p><a href="/acad/admin">Return to Menu</a></p>
	
	<?php

	include("../../includes/footer.php");

}
  
else {
header("Location:http://".$_SERVER['HTTP_HOST']."/acad/admin/?Error=Session"); exit;
}

function write_ini_file($path, $assoc_array)
{
    $content = '';
    $sections = '';

    foreach ($assoc_array as $key => $item)
    {
        if (is_array($item))
        {
            $sections .= "\n[{$key}]\n";
            foreach ($item as $key2 => $item2)
            {
                if (is_numeric($item2) || is_bool($item2))
                    $sections .= "{$key2} = {$item2}\n";
                else
                    $sections .= "{$key2} = \"{$item2}\"\n";
            }      
        }
        else
        {
            if(is_numeric($item) || is_bool($item))
                $content .= "{$key} = {$item}\n";
            else
                $content .= "{$key} = \"{$item}\"\n";
        }
    }      

    $content .= $sections;

    if (!$handle = fopen($path, 'w'))
    {
        return false;
    }
   
    if (!fwrite($handle, $content))
    {
        return false;
    }
   
    fclose($handle);
    return true;
}

?>
