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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
<html>
<head>
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
    <td align="center" height="20" class="tcat"><span class="smallfont">Mural de Recados</span></td>
  </tr>
  <tr>
    <td height="345" valign="top">
<!--- Mas nem fudendo é pra mexer nesta linha --->
<div style="overflow:auto; height:345px;" id="shoutarea"></div>
<!--- Mas nem fudendo é pra mexer nesta linha --->
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
// Aqui consta os grupos de usuarios que não tem permissão de postar no ShoutBox
 if ($vbulletin->userinfo['userid'] == 0 && $guestshouts == false)
    {
      echo "Voc&ecirc; deve estar logado para enviar a menssagem.";
    }
    else if ($vbulletin->userinfo['usergroupid'] == 2 && $guestshouts == false)
     {
       echo "Seu grupo n&atilde;o tem permiss&atilde;o para usar o ShoutBoxBR!";
     }
	else
    {
?>
<form name="shoutform" method="POST" onsubmit="saveData(); return false;" style="margin: 0px;">
      <textarea name="message" rows="5" cols="15"class="bginput" style="width: 155px; margin-bottom: 10px;" onfocus="if(this.value=='') this.value='';" onblur="if(this.value=='') this.value='';" value="" maxlength="300" /></textarea><br />
      <input type="submit" name="submit" value="enviar" class="button" />&nbsp;<input type="reset" name="reset" value="limpar" class="button">
</form>
<?php
    }
?>
</span>
    </td>
   <tr><td width="100%" align="center" class="thead">
<!-- Não remover os Direitos Autorais -->
<b>adrianobr © Copyright 2009</b>
<!-- Não remover os Direitos Autorais -->
     </td></tr>
</table></td></tr></table>
</body>
</html>