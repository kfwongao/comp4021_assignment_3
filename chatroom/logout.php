<?php 

require_once('xmlHandler.php');

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    exit;
}

// create the chatroom xml file handler
$xmlh = new xmlHandler("chatroom.xml");
if (!$xmlh->fileExist()) {
    header("Location: error.html");
    exit;
}

//
$xmlh->openFile();
$users = $xmlh->getElement("users");
$messages = $xmlh->getElement("messages");
while($messages->firstChild) {
    $xmlh->removeElement($messages, $messages->firstChild);
}

while($users->firstChild) {
    $xmlh->removeElement($users, $users->firstChild);
}

$xmlh->saveFile();

//ToDo
$name = "";
setcookie("name", "");
echo "<script>
        window.parent.frames['message'].document.getElementById('username').setAttribute('value', '');
        window.parent.location.reload();
        </script>";

?>
