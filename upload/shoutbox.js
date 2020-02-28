function ajaxFunction(){
  var ajaxRequest;

  try
  {
    ajaxRequest = new XMLHttpRequest();
  }
  catch (e)
  {
    try
    {
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e)
    {
      try
      {
        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e)
      {
        // browser does not support
        alert("Seu navegador não suporta o ShoutBoxBR, atualize seu navegador.");
        return false;
      }
    }

  }
  return ajaxRequest;
}

function stateChanged()
{
  if (htmlRequest.readyState==4 && htmlRequest.status==200)
  {
    document.getElementById("shoutarea").innerHTML = htmlRequest.responseText;
  }
}

function showData()
{
  htmlRequest = ajaxFunction();

  if (htmlRequest==null)
  {
    alert ("Seu navegador não suporta solicitações HTTP.");
    return;
  }

  htmlRequest.onreadystatechange=stateChanged
  htmlRequest.open("GET", "shoutbox_get.php", true);
  htmlRequest.send(null);
}

showData();
setInterval("showData()",1000);

function saveData()
{
  htmlRequest = ajaxFunction();

  if (htmlRequest==null)
  {
    alert ("Seu navegador não suporta solicitações HTTP.");
    return;
  }

  if (document.shoutform.message.value == "" || document.shoutform.message.value == "NULL" || document.shoutform.message.value == "")
  {
    alert('É necessário digitar algo no Mural. lol');
    return;
  }
  else if (document.shoutform.message.value.length < 3)
  {
    alert('Sua menssagem deve conter no minimo 03 caracteres');
    return;
  }
  else if (document.shoutform.message.value.length > 300)
  {
    alert('Sua menssagem deve conter no maximo 300 caracteres');
    return;
  }

  htmlRequest.open('POST', 'shoutbox_send.php');
  htmlRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded; text/html; iso-8859-1"); 
  htmlRequest.setRequestHeader("Cache-Control", "no-cache"); 
  htmlRequest.setRequestHeader("Encoding","ISO-8859-1"); 
  htmlRequest.setRequestHeader("Pragma", "no-cache"); 
  htmlRequest.setRequestHeader("Connection", "close");  
  htmlRequest.send('message='+document.shoutform.message.value);

  document.shoutform.message.value = '';
  document.shoutform.message.focus();
  
  //setTimeout("showData()",2000);
}
