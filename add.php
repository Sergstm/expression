<?php
    
    echo "<link href='style.css' rel='stylesheet' type='text/css' />";
    
    require_once "connection.php";
    
    session_start();
    if (isset($_SESSION["auth"])){
                
        echo "<div>
        <form action='add.php' method='post' name='addform'>
            <table>
                <tr>
                    <td><textarea cols='160' rows='10' maxlength='1430' name='string'></textarea></td>
                    <td><input type='submit' value='Прийняти' name='apply' /></td>
                </tr>
            </table>
        </form>
        </div>
        <div>
            <table>
                <tr>
                    <td><a href='work.php'><button>Повернутися</button></a></td>
                </tr>
            </table>
        </div>";
    
        if(isset($_REQUEST["apply"])){
            $string = $_REQUEST["string"];
            $query = mysqli_query($db, "INSERT INTO `dbase`.`data` (`id`, `string`, `date`) VALUES (NULL, '$string', UNIX_TIMESTAMP())"); 
        }
        
    mysqli_close($db);
    
    }
    else header("Location: index.php");
    exit;
    
?>