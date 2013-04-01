<?php
session_start();

if ($_SESSION['Myvalid'] == "Yes")
{

$pagetitle='Academy Adminstration';
include("../../header.php");

?>

<table width="770" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse">
  <tbody>
    <tr>
      <td width="286" colspan="2" valign="top" class="body">
      <table width="751" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <?php include("../navigation.php"); ?>
            <td width="10" valign="top" class="body">&nbsp;</td>
            <td valign="top" class="body">
            <table cellpadding="5" cellspacing="5" border="0" width="100%">
              <tbody>
                <tr align="left">
                 <td valign="top" height="250"> 
				 
					<p class="subtitle">Personal Details</p>
					
					<?php $uID = $_SESSION['MyuID'];
					
					if(isset($_POST['update']))
					{
						if($_POST['AIM'] == "")
						{
							$_POST['AIM'] = "-----";
						}
						
						if($_POST['IRC'] == "")
						{
							$_POST['IRC'] = "-----";
						}
						
						if($_POST['ICQ'] == "")
						{
							$_POST['ICQ'] = "-----";
						}
						
						if($_POST['pass1'] != "")
						{
							if($_POST['pass1'] == $_POST['pass2'])
							{
								echo("Password succesfully changed<br>");
								$sql = "UPDATE `acadgrads_logins` SET `Password` = '".MD5($_POST['pass1'])."' WHERE `uID` = ".mysql_escape_string($uID);
								$result = @mysql_query($sql) or die(mysql_error());
							}
							else
							{
								echo("Passwords did not match. Please try again.<br>");
							}
						}
						
						$sql = "UPDATE `acadgrads_logins` SET `FirstName` = '".mysql_escape_string($_POST['FirstName'])."', `LastName` = '".mysql_escape_string($_POST['LastName'])."', `Email` = '".mysql_escape_string($_POST['Email'])."', `AIM` = '".mysql_escape_string($_POST['AIM'])."',`ICQ` = '".mysql_escape_string($_POST['ICQ'])."', `IRC` = '".mysql_escape_string($_POST['IRC'])."' WHERE `uID` = ".mysql_escape_string($uID);
						$result = @mysql_query($sql) or die(mysql_error());
						echo("Details updated<br><br>");
					}
					
					$sql1 = "SELECT * FROM `acadgrads_logins` WHERE `uID` = ".$uID;
					$result1 = mysql_query($sql1) or die(mysql_error());
									
					while ($row1 = mysql_fetch_array($result1)) 
					{?>
					
						<form action="details.php" method="post">
						<table>
						<tr><td>First Name:</td></tr><tr><td><input name="FirstName" value=<?php echo(strip_tags($row1['FirstName'])); ?> type="text"></td></tr>
						<tr><td>Last Name:</td></tr><tr><td><input name="LastName" value=<?php echo(strip_tags($row1['LastName'])); ?> type="text"></td></tr>
						<tr><td>Email Address:</td></tr><tr><td><input name="Email" value=<?php echo(strip_tags($row1['Email'])); ?> type="text"></td></tr>
						<tr><td>AIM:</td></tr><tr><td><input name="AIM" value=<?php echo(strip_tags($row1['AIM'])); ?> type="text"></td></tr>
						<tr><td>ICQ:</td></tr><tr><td><input name="ICQ" value=<?php echo(strip_tags($row1['ICQ'])); ?> type="text"></td></tr>
						<tr><td>IRC:</td></tr><tr><td><input name="IRC" value=<?php echo(strip_tags($row1['IRC'])); ?> type="text"></td></tr>
						<tr><td><br></td></tr>
						<tr><td>Leave password fields blank if you do not wish to change your password.</td></tr>
						<tr><td>New Password:</td></tr><tr><td><input name="pass1" type="password"></td></tr>
						<tr><td>Confirm New Password:</td></tr><tr><td><input name="pass2" type="password"></td></tr>
						</table><br>
						<input type="hidden" name="update" value="1">
						<input type="submit" value="Change Details">
						</form>
						
					<?php } ?>
					
                  </td>
               </tr>
                <tr>
                  <td>&nbsp;
                  </td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
</table>

<?php
include("../../footer.php");

}
  
else {
header("Location:".$PageRoot."acadadmin/main/index.php?Error=Session"); exit;
}
