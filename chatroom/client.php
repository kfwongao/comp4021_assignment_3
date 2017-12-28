<?php

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    return;
}

// get the name from cookie
$name = $_COOKIE["name"];

print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Message Page</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript">
        //<![CDATA[
        function load() {
            var name = "<?php print $name; ?>";

            //delete this line 
            //window.parent.frames["message"].document.getElementById("username").setAttribute("value", name)
            var msg_win = window.parent.frames["message"];
            var username_field = msg_win.document.getElementById("username");
            if(msg_win == null || username_field == null) {
                setTimeout("load()", 200);
                return;
                }
            username_field.value = name;
            document.getElementById("color").value = window.parent.frames["message"].document.getElementById("color").getAttribute("value");
            setTimeout("document.getElementById('msg').focus()",100);

        }
        function select(color) {
            
            document.getElementById("color").value = color;
            //console.log(window.parent.frames["message"].document.getElementById("color"));
            window.parent.frames["message"].document.getElementById("color").setAttribute("value", color);
        }
        //]]>
        </script>
    </head>

    <body style="text-align: left" onload="load()">
        <form action="add_message.php" method="post">
            <table border="0" cellspacing="5" cellpadding="0">
                <tr>
                    <td colspan="2">What is your message?</td>
                </tr>
                <tr>
                    <td colspan="2"><input class="text" type="text" name="message" id="msg" style= "width: 780px" /></td>
                </tr>
                <tr>
                    <td><input class="button" type="submit" value="Send Your Message" style="width: 200px" /></td>
                    <td>
                    Choose your color:
                    <button style="background-color:white;width:30px;height:30px" onclick="select('#ffffff');return false;" />
                    <button style="background-color:#ff0000;width:30px;height:30px" onclick="select('#ff0000');return false;" />
                    <button style="background-color:#00ff00;width:30px;height:30px" onclick="select('#00ff00');return false;" />
                    <button style="background-color:#0000ff;width:30px;height:30px" onclick="select('#0000ff');return false;" />
                    <button style="background-color:#ff00ff;width:30px;height:30px" onclick="select('#ff00ff');return false;" />
                    <button style="background-color:#000000;width:30px;height:30px" onclick="select('#000000');return false;" />
                    </td>
                </tr>
            </table>
            <input id="color" name="color" type="hidden" value="#000000" />
        </form>
        
        <!--logout button-->
        <form action="logout.php" method="post" onsubmit="alert('Goodbye!');">
            <table border="0" cellspacing="5" cellpadding="0">
                <tr style="border-top: 1px solid gray">
                    <td>
                        <input class="button" type="submit" value="Logout" style="width: 200px" />
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>
