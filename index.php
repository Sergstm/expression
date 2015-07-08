<?php
    
    if(isset ($_REQUEST["send"])){
        $login = $_REQUEST["login"];
        $password = $_REQUEST["password"];
        
        require_once "connection.php";
        
        $query = mysqli_query($db, "SELECT `password` FROM `users` WHERE `login` = '$login'");    
        $row = mysqli_fetch_assoc($query);
        $pass = $row["password"];
            
        session_start();
        $_SESSION["auth"] = md5($password);
        
        if($_SESSION["auth"] == $pass){
            echo "<h1 style='text-align: center'>Вітаю: $login</h1>";
            header("Refresh: 1; work.php");
            exit;
        }
        else echo "<h3 id='imp'>Невірно введений логін, пароль або ввімкнений CapsLock</h3>";
        
        mysqli_close($db);
    }
    
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <link href="style.css" rel="stylesheet" type="text/css" />
	<title>Expression</title>
</head>
<body>
<div id="auth">
    <form action="index.php" method="post" name="authform">
        <table>
            <tr>
            	<td>Логін:</td>
            	<td><input type="text" required="requred" name="login" /></td>
            </tr>
            <tr>
            	<td>Пароль:</td>
            	<td><input type="password" required="requred" name="password" /></td>
            </tr>
            <tr>
            	<td colspan="2"><input id="ent" type="submit" value="                Вхід                 " name="send" /></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>