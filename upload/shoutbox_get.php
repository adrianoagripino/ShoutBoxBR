<?php
/*======================================================================*\
|| #################################################################### ||
|| # ShoutBoxBR 1.0
|| # ---------------------------------------------------------------- # ||
|| # Copyright �2009 adrianobr. Todos os Diretos s�o reservados.        ||
|| # � proibido a copia ou distribui��o sem autoriza��o do autor.     # ||
|| # ------------------ ShoutBoxBR N�O � GRATUITO  ------------------ # ||
|| # Site: http://www.adrianobr.com | Email: webmaster@adrianobr.com  # ||
|| #################################################################### ||
\*======================================================================*/


// ######################## Inicio do script ############################

include("shoutbox_config.php");

$sql = mysql_query("SELECT * FROM " . TABLE_PREFIX . " shoutbox ORDER BY id DESC LIMIT $maxshouts");
$sqlcount = mysql_num_rows($sql);

$row_count = 0;

	  echo '<table class=\"tborder\" align=\"left\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" width=\"100%\">';

if ($sqlcount == 0)
{
  echo '<tr>';
  echo "<td class=\"alt1\" align=\"center\" >";
  echo '<span style="color:#FF0000;">Parab�ns o SHOUTBOXBR foi instalado com �xito!</span>';
  echo '</td>';
  echo '</tr>';
  echo '<tr>';
  echo "<td class=\"alt2\" align=\"center\" >";
  echo '<strong>Mantenha os creditos!</strong>';
  echo '</td>';
  echo '<tr>';
  echo "<td class=\"alt1\" align=\"center\" >";
  echo '<span style="color:#FF0000;">Em caso de duvidas entrar em contato com o <b><a href="mailto:baterista_hc@hotmail.com"><b>adrianobr</b></a></span>';
  echo '</td>';
  echo '</tr>';
  echo '</tr></table>';
}
else
{
  while($row = mysql_fetch_array($sql))
  {
    //$row_style = ($row_count % 2) ? alt2 : alt1;
    
    $userid = $row['userid'];
    $username = $row['username'];
    $message = stripslashes($row['message']);
    $time = vbdate('H:i', $row['time']); 
	$date = vbdate('d/m', $row['time']); 
		    
   
    if ($userid == 0)
	
	  echo "<table class=\"tborder\" align=\"left\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" width=\"100%\">";
	  echo "<tr>";
      echo "<td class=\"alt1\">";
      echo "$username: $message </td>";
      echo "</tr>";
	  echo "<tr>";
      echo "<td class=\"thead\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
	  echo "<tr>";
      echo "<td width=\"90%\"><span class=\"smallfont\">Em: $date &bull; $time</span></td>";
      echo "<td width=\"10%\"></td>";
	  echo "</tr>";
	  echo "</table>";
	  echo "</td>";
    
    $row_count++;
  }
}

echo '</table>';

?>
