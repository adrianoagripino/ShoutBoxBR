<?php
/*======================================================================*\
|| #################################################################### ||
|| # ShoutBoxBR 1.0
|| # ---------------------------------------------------------------- # ||
|| # Copyright ©2009 adrianobr. Todos os Diretos são reservados.        ||
|| # È proibido a copia ou distribuição sem autorização do autor.     # ||
|| # ------------------ ShoutBoxBR NÃO É GRATUITO  ------------------ # ||
|| # Site: http://www.adrianobr.com | Email: webmaster@adrianobr.com  # ||
|| #################################################################### ||
\*======================================================================*/


// ######################## Inicio do script ############################

include("shoutbox_config.php");

// Aqui é verificado a existencia do usuario no banco de dados
if ($vbulletin->userinfo['userid'] == 0)
{
  $userid = 0;
  $username = $guestname;
}
else
{
  $user = $vbulletin->userinfo;
  $usergc = $vbulletin->usergroupcache;

  if (isset($usergc["$user[displaygroupid]"]))
	{
		// use $displaygroupid
		$displaygroupid = $user['displaygroupid'];
	}
	else if (isset($usergc["$user[usergroupid]"]))
	{
		// use primary usergroupid
		$displaygroupid = $user['usergroupid'];
	}
	else
	{
		// use guest usergroup
		$displaygroupid = 1;
	}

  $userid = $user['userid'];
  $username = $usergc["$displaygroupid"]['opentag'] . $user['username'] . $usergc["$displaygroupid"]['closetag'];
}

// Aqui fica o comando que enviar os dados a tabela do shoutbox
$message = mysql_real_escape_string(htmlentities(utf8_decode($_POST['message']),ENT_QUOTES,'ISO-8859-1'));
$time = TIMENOW;

// Aqui esta definido a quantidade maxima de caracteres 300 e quantidade minima para enviar a menssagem 2
if (strlen($message) <= 300 && strlen($message) >= 3 && ($userid != 0 || $guestshouts == true))
{
// Aqui se tudo der certo vai gravar o conteudo no ShoutBoxBR
  mysql_query("INSERT INTO " . TABLE_PREFIX . " shoutbox (userid, username, message, date, time) VALUES ('$userid', '$username', '$message', '$date', '$time')");
}
// Aqui fica a linha de comando responsavel pelo deleção das mensaagem do banco de dados conforme definido em shoutbox_config.php 
$sql = mysql_query("SELECT * FROM " . TABLE_PREFIX . " shoutbox ORDER BY id DESC");
$count = mysql_num_rows($sql);

if ($count > $maxstore)
{
  $seldelsql = mysql_query("SELECT * FROM " . TABLE_PREFIX . " shoutbox ORDER BY id ASC LIMIT 1");
  
  while($row = mysql_fetch_array($seldelsql))
  {
    $delid = $row['id'];
    mysql_query("DELETE FROM " . TABLE_PREFIX . " shoutbox WHERE id='$delid'");
  }
}

?>