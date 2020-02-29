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



// ###################### VBULLETIN INTEGRATION #########################
// Don't edit this line, don't even think about moving it...

require_once('./global.php');  

// ##################### SHOUTBOX Customization ########################
// You can edit the following variables

// The name of your Shoutbox, must be added between the quotes
$shoutboxname = ".:: ShoutBoxBR ::.";

// Number of messages to be displayed on the Shoutbox ( whole number )
$maxshouts = 30;

// number of messages that can be stored in the database ( whole number )
$maxstore = 2000;

// Can visitors write on Shoutbox? (true (YES) or false (NO))
$guestshouts = false;

?>