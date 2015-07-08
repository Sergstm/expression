<?php
    
    echo "<link href='style.css' rel='stylesheet' type='text/css' />";
    
    require_once "connection.php";
    
    session_start();
    if (isset($_SESSION["auth"])){
        
        $query = mysqli_query($db, "SELECT * FROM `data`");
        
        echo "  <div>
                <table>";
        while($row = mysqli_fetch_assoc($query)){
            $str = $row["string"];
            $id = $row["id"];
            $date = date("d:m:Y H:i:s", $row["date"]);
            echo "
            <form action='upd.php' method='post' name='workform'>
                    <tr>
                        <td><p id='text'>$str</p><td>
                        <td><p id='text'>$date</p><td>
                        <td><input type='radio' value='$id' required='requred' name='radio' /></td>
                    </tr>";
        }
        
        echo "</table>
                </div>
                <div>
                <table>
                    <tr>
                        <td><input type='submit' value='Редагувати строку' name='apply' /></td>
                    </tr>
                </table>
            </form>
            <table>
                <tr>
                    <td><a href='add.php'><button>Додати нову строку</button></a></td>
                    <td><a href='del.php'><button>Сторінка видалення</button></a></td>
                    <td><a href='logout.php'><button>Вихід</button></a></td>
                </tr>
            </table>
            </div>";
            
    mysqli_close($db);
    
    }
    else header("Location: index.php");
    exit;
    
?>