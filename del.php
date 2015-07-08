<?php
    
    echo "<link href='style.css' rel='stylesheet' type='text/css' />";
    
    require_once "connection.php";
    
    session_start();
    if (isset($_SESSION["auth"])){
        
        $query = mysqli_query($db, "SELECT * FROM `data`");
        
        echo "<div>";
        echo "<h1 id='imp'>Сторінка видалення</h1>";
        echo "<table>";
        while($row = mysqli_fetch_assoc($query)){
            $str = $row["string"];
            $id = $row["id"];
            $date = date("d:m:Y H:i:s", $row["date"]);
            echo "
            <form action='del.php' method='post' name='delform'>
                    <tr>
                        <td><p id='text'>$str</p><td>
                        <td><p id='text'>$date</p><td>
                        <td><input type='checkbox' value='$id' name='$id' /></td>
                    </tr>";
        }
        
        echo "</table>
                </div>
                <div>
                <table>
                    <tr>
                        <td><input type='submit' value='Видалити' name='delete' /></td>
                        <td><p id='imp'>Сторінка автоматично не оновлюється, тому після видалення натисніть</p></td>
                        <td><a href='del.php'><button>Оновити</button></a></td>
                    </tr>
                </table>
            </form>
            <table>
                <tr>
                    <td><a href='work.php'><button>Повернутися</button></a></td>
                </tr>
            </table>
            </div>";
        if(isset($_REQUEST["delete"])){
            $ids = implode("','", $_REQUEST);
            $query = mysqli_query($db, "DELETE FROM `dbase`.`data` WHERE `data`.`id` IN ('$ids')");
        }
        
    mysqli_close($db);
    
    }
    else header("Location: index.php");
    exit;
    
?>