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

// Here the existence of the user in the database is verified
  if ($vbulletin->userinfo['userid'] == 0){
    $userid = 0;
    $username = $guestname;
  }
  else{
    $user = $vbulletin->userinfo;
    $usergc = $vbulletin->usergroupcache;
    
    if (isset($usergc["$user[displaygroupid]"])){
      // use $displaygroupid
      $displaygroupid = $user['displaygroupid'];
    }
    else if (isset($usergc["$user[usergroupid]"])){
      // use primary usergroupid
      $displaygroupid = $user['usergroupid'];
    }
    else{
      // use guest usergroup
      $displaygroupid = 1;
    }
    
    $userid = $user['userid'];
    $username = $usergc["$displaygroupid"]['opentag'] . $user['username'] . $usergc["$displaygroupid"]['closetag'];
  }
  
  // Here is the command that sends the data to the shoutbox table
  $message = mysql_real_escape_string(htmlentities(utf8_decode($_POST['message']),ENT_QUOTES,'ISO-8859-1'));
  $time = TIMENOW;
  
  // Here is defined the maximum number of characters 300 and the minimum number to send the message 3
  if (strlen($message) <= 300 && strlen($message) >= 3 && ($userid != 0 || $guestshouts == true)){
    // Here if everything goes well you will save the content on ShoutBoxBR
    mysql_query("INSERT INTO " . TABLE_PREFIX . " shoutbox (userid, username, message, date, time) VALUES ('$userid', '$username', '$message', '$date', '$time')");
  }
  
  // Here is the command line responsible for automatically deleting messages from the database as defined in shoutbox_config.php 
  $sql = mysql_query("SELECT * FROM " . TABLE_PREFIX . " shoutbox ORDER BY id DESC");
  $count = mysql_num_rows($sql);
  
  if ($count > $maxstore){
    $seldelsql = mysql_query("SELECT * FROM " . TABLE_PREFIX . " shoutbox ORDER BY id ASC LIMIT 1");
    
    while($row = mysql_fetch_array($seldelsql)){
      $delid = $row['id'];
      mysql_query("DELETE FROM " . TABLE_PREFIX . " shoutbox WHERE id='$delid'");
    }
  }
?>