<?php 


    $task = $_POST['task'];
   $todo = $_POST['todo'];

   $db = new PDO('mysql:host=mariadb;dbname=tutorial', 'tutorial', 'secret');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->query('SELECT * FROM todoapp');

foreach($query as $row){
    ?>
    <span>Title: </span> <?php echo $row['title'];?><br>
    <span>Description: </span> <?php echo $row['description'];?><br>
<?php
}
?>
<?php
$query = <<<SQL
INSERT INTO todoapp(title,description)
VALUES ('$task', '$todo')
SQL;

$result = $db->exec($query);
//var_dump($result);
?>


?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
        <input type="text" name="task" placeholder="Enter Taskname"> <br>
        <input type="text" name="todo" placeholder="Enter What To Do"> <br>
        <input type="submit" name="submit">
    </form>
</body>
</html> 