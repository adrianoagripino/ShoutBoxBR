<?php
/*===============================================================================*\
|| ############################################################################# ||
|| # ShoutBoxBR 1.0                                                              ||
|| # ------------------------------------------------------------------------- # ||
|| # Copyright @2009 adriano. All rights are reserved.                         # ||
|| # Copying or distribution without the author's authorization is prohibited. # ||
|| # -------------------- ShoutBoxBR is open source -------------------------- # ||
|| # Site: http://www.adrianobr.com | Email: webmaster@adrianobr.com           # ||
|| ############################################################################# ||
\*===============================================================================*/


// ######################## Script start ############################

include("shoutbox_config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $shoutboxname; ?></title>

<?php

$styleid = $vbulletin->userinfo['styleid'];
$styletable = TABLE_PREFIX . 'style';
$css = mysql_result(mysql_query("SELECT " . TABLE_PREFIX . " css FROM $styletable WHERE styleid = $styleid LIMIT 1"), 0);

echo $css;

?>

<script language="JavaScript" type="text/javascript" src="shoutbox.js" charset="utf-8"></script>

</head>
<body style="margin:0px; border:0px;">
<table width="100%" height="565" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" height="20" class="tcat"><span class="smallfont">Message boards</span></td>
  </tr>
  <tr>
    <td height="345" valign="top">
<!--- Do not change this line --->
<div style="overflow:auto; height:345px;" id="shoutarea"></div>
<!--- Do not change this line --->
    </td>
  </tr>
  <tr>
    <td width="100%" valign="top" style="padding-right:0px;">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="tborder">
  <tr>
    <td width="100%" align="center" class="thead"><span class="smallfont"> .: ShoutBoxBR :.</span></td>
  </tr>
  <tr>
    <td width="100%" align="center" class="alt2" style="padding: 0px 0px 0px 0px;"><span class="smallfont"><br />
<?php
// Here are the groups of users who are not allowed to post on the ShoutBox
 if ($vbulletin->userinfo['userid'] == 0 && $guestshouts == false)
    {
      echo "You must be logged in to send the message.";
    }
    else if ($vbulletin->userinfo['usergroupid'] == 2 && $guestshouts == false)
     {
       echo "Your group is not allowed to use ShoutBoxBR!";
     }
	else
    {
?>
<form name="shoutform" method="POST" onsubmit="saveData(); return false;" style="margin: 0px;">
      <textarea name="message" rows="5" cols="15"class="bginput" style="width: 155px; margin-bottom: 10px;" onfocus="if(this.value=='') this.value='';" onblur="if(this.value=='') this.value='';" value="" maxlength="300" /></textarea><br />
      <input type="submit" name="submit" value="submit" class="button" />&nbsp;<input type="reset" name="reset" value="clean" class="button">
</form>
<?php
    }
?>
</span>
    </td>
   <tr><td width="100%" align="center" class="thead">
<!-- Do not remove Copyright-->
<b>adrianobr @ Copyright 2009</b>
<!-- Do not remove Copyright -->
     </td></tr>
</table></td></tr></table>
</body>
</html>