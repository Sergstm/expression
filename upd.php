<?php
    
    //print_r($_REQUEST);
    echo "<link href='style.css' rel='stylesheet' type='text/css' />";

    $id = $_REQUEST["radio"];
    
    require_once "connection.php";
    
    session_start();
    if (isset($_SESSION["auth"])){
        
        $query = mysqli_query($db, "SELECT * FROM `data` WHERE `id` = '$id'");
        $row = mysqli_fetch_assoc($query);
        
        $str = $row["string"];
        
        echo "<div>
        <form action='upd.php' method='post' name='addform'>
            <table>
                <tr>
                    <input type='hidden' value='$id' name='radio' />
                    <td><textarea cols='160' rows='10' maxlength='1430' name='string'>$str</textarea></td>
                    <td><input type='submit' value='Прийняти' name='edit' /></td>
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
        
        if(isset($_REQUEST["edit"])){
            $string = $_REQUEST["string"];
            $query = mysqli_query($db, "UPDATE `dbase`.`data` SET `string` = '$string', `date` = UNIX_TIMESTAMP() WHERE `data`.`id` = $id"); 
        }
        
    mysqli_close($db);
    
    }
    else header("Location: index.php");
    exit;
    
?>