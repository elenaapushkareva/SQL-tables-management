<?php   
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=books','root','root'); 
$name = $_POST['name'];
$sql = "DESCRIBE $name";
?>
<!DOCTYPE>  
<html lang="ru">
    <head>
        <title>
            Описание таблицы
        </title>
        <meta charset="utf-8">
        <style>
            body {
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>
     
<h1>Таблица <?php echo $name ?></h1>

<table>
    <tr>
        <td>Название поля</td>
         <td>Тип</td>
        <td>Null</td>
        <td>Ключ</td>
        <td>Значение по умолчанию</td>
        <td>Дополнительно</td>
    </tr>
    <?php foreach ($pdo->query($sql) as $row){ ?>
    <tr>
        <td><?php echo $row['Field'] ?></td>
        <td><?php echo $row['Type'] ?></td>
        <td><?php echo $row['Null'] ?></td>
        <td><?php echo $row['Key'] ?></td>
        <td><?php echo $row['Default'] ?></td>
        <td><?php echo $row['Extra'] ?></td>

    </tr><?php } ?>
</table>
<br/ >
<form action="table.php" method="GET">
 <div>Введите ниже название поля, чтобы его удалить</div>
 <input type="text" name="fieldname1">
 <input type="submit" name="Отправить">
    
<div>Чтобы изменить название поля, введить его и новое название</div>
 <input type="text" name="fieldname2">
 <input type="text" name="newfieldname">

 <input type="submit" name="Отправить">
<div>Чтобы изменить тип, введите название поля и новый тип</div>
 <input type="text" name="fieldname3">
 <input type="text" name="newtype">
 <input type="submit" name="Отправить">
</form> 

<?php 
 $a1 = $_POST['fieldname1'];
     
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql11 = "ALTER TABLE $name DROP COLUMN $a1";
$pdo->exec($sql11);   
echo "Поздравляем, поле ".$a1." удалено!"; 
?>

<?php 
 $a2 = $_POST['fieldname2'];
 $an = $_POST['newfieldname'];
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql21 = "ALTER TABLE $name CHANGE $a2 $an VARCHAR(50)";
 
$pdo->exec($sql21);
    
echo "Поздравляем, название поля изменено с ".$a2." на".$an;; 

?>

<?php 
 $a3 = $_POST['fieldname3'];
 $at = $_POST['newtype'];
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql31 = "ALTER TABLE $name MODIFY $а3 $at";
 
$pdo->exec($sql31);
    
echo "Поздравляем, тип поля изменен на ".$at;
?>
 </body> 

</body>
</html>