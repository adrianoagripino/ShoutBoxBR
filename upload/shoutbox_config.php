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


// ###################### VBULLETIN INTEGRATION #########################
// N�o edite esta linha, nem pense em mexer...

require_once('./global.php');  

// ##################### Customiza��o do SHOUTBOX ########################
// Voc� pode editar as seguintes vari�veis

// O nome do seu Shoutbox, deve ser adicionado entre as aspas
$shoutboxname = ".:: ShoutBoxBR ::.";

// N�mero de menssagens para ser exibido no Shoutbox (numero inteiro)
$maxshouts = 30;

// n�mero de recados que pode ser armazenado no banco de dados ( Numero inteiro)
$maxstore = 100;

// Visitantes podem escrever no Shoutbox? (true (SIM) or false (N�O))
$guestshouts = true;

?>