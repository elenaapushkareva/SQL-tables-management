<?php   
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=books','root','root'); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "CREATE TABLE `authors1224` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(50) NULL, 
`age` tinyint(4) NOT NULL DEFAULT '0', PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$pdo->exec($sql);
//echo "Table authors created successfully";
$sql1 = "SHOW TABLES";

?> 
<!DOCTYPE>  
<html lang="ru">
    <head>
        <title>
            Базы данных 
        </title>
        <meta charset="utf-8">
        <style>
            body {
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>
        <h1>
            Перечень таблиц в базе данных books
        </h1>
        <table>
            <tr>
                       
                <td>
                    Название таблицы
                </td>
            </tr>
            <?php foreach ($pdo->query($sql1) as $k =>$row) {?>
            <tr>
                
                <td>
                    <?php echo $row['Tables_in_books'] ?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <br />

     <form action="table.php" method="POST">
        <div>Введите название таблицы для подробной информации</div>
        <input type="text" name="name">
        <input type="submit" name="Отправить">
    </form>

    </body>
</html>