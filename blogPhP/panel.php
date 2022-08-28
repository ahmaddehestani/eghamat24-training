<?php
require('./services/helper.php');
if(!auth()){
redirect('login.php');
}
$posts=[];
$message;








class MyDBRead extends SQLite3 {
    function __construct() {
       $this->open('test.db');
    }
 }
 
 $dbRead = new MyDBRead();
 if(!$dbRead) {
    $message= $dbRead->lastErrorMsg();
 } else {
    $message="Opened database successfully\n";
 }

 $sqlRead =<<<EOF
    SELECT * from blog;
EOF;

 $retRead = $dbRead->query($sqlRead);
 while($rowRead = $retRead->fetchArray() ) {

array_push($posts, (object)[
    'id' => $rowRead['id'],
    'title' => $rowRead['title'],
    'content' => $rowRead['content'],
    'author' => $rowRead['author'],
]);

 }
 $message= "Operation done successfully\n";
 $dbRead->close();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>PANEL ADMIN</title>
</head>
<body>
    <nav>
    <a href="logout.php">log out</a>
    <a href="create.php">create Post</a>
    <a href="panel.php">panel admin</a>
    </nav>


    <main >
<h1> database message:   <?= $message?></h1>

    <table class="panelTable">
        <tr>
        <th>id</th>
            <th>title</th>
            <th>content</th>
            <th>author</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

       <?php foreach($posts as $key=>$value):   ?>
       
          
        <tr >
        <th ><?=$value->id?></th>
                   <th ><?=$value->title?></th>
                   <th ><?=$value->content?></th>
                   <th ><?=$value->author?></th>
                   <th ><a href="edit.php?id=<?= $value->id?>&title=<?= $value->title?>&content=<?= $value->content?>&author=<?= $value->author?>">edit</a></th>
                   <th><a href="delete.php?id=<?= $value->id?>">delete</a></th>
             
       </tr>
           <?php endforeach ?>
           
       </table>
       
           </main>



</body>
</html>