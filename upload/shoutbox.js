function ajaxFunction() {
  var ajaxRequest;

  try {
    ajaxRequest = new XMLHttpRequest();
  }
  catch (e) {
    try {
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
      try {
        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {
        // browser does not support
        alert("Your browser does not support ShoutBoxBR, update your browser.");
        return false;
      }
    }

  }
  return ajaxRequest;
}

function stateChanged() {
  if (htmlRequest.readyState == 4 && htmlRequest.status == 200) {
    document.getElementById("shoutarea").innerHTML = htmlRequest.responseText;
  }
}

function showData() {
  htmlRequest = ajaxFunction();

  if (htmlRequest == null) {
    alert("Your browser does not support HTTP requests.");
    return;
  }

  htmlRequest.onreadystatechange = stateChanged
  htmlRequest.open("GET", "shoutbox_get.php", true);
  htmlRequest.send(null);
}

showData();
setInterval("showData()", 1000);

function saveData() {
  htmlRequest = ajaxFunction();

  if (htmlRequest == null) {
    alert("Your browser does not support HTTP requests.");
    return;
  }

  if (document.shoutform.message.value == "" || document.shoutform.message.value == "NULL" || document.shoutform.message.value == "") {
    alert('It is necessary to type something on the Wall. lol');
    return;
  }
  else if (document.shoutform.message.value.length < 3) {
    alert('Your message must contain at least 03 characters');
    return;
  }
  else if (document.shoutform.message.value.length > 300) {
    alert('Your message must contain a maximum of 300 characters');
    return;
  }

  htmlRequest.open('POST', 'shoutbox_send.php');
  htmlRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded; text/html; iso-8859-1");
  htmlRequest.setRequestHeader("Cache-Control", "no-cache");
  htmlRequest.setRequestHeader("Encoding", "ISO-8859-1");
  htmlRequest.setRequestHeader("Pragma", "no-cache");
  htmlRequest.setRequestHeader("Connection", "close");
  htmlRequest.send('message=' + document.shoutform.message.value);

  document.shoutform.message.value = '';
  document.shoutform.message.focus();

  //setTimeout("showData()",2000);
}
