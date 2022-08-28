<?php
require('./services/helper.php');

$posts=[];
$data;

class MyDBRead extends SQLite3 {
    function __construct() {
       $this->open('test.db');
    }
 }
 
 $dbRead = new MyDBRead();
 if(!$dbRead) {
    echo $dbRead->lastErrorMsg();
 } else {
    echo "Opened database successfully\n";
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


 echo "Operation done successfully\n";
 $dbRead->close();

 $title=$_GET['title'];
$new_id=$_GET['id'];
 $author=$_GET['author'];
 $content=$_GET['content'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="view]port" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title><?=$title?></title>
</head>
<body>

<nav>
<a href="login.php">login</a>
<a href="index.php">home</a>

</nav>
<div class="blog">
<div class="side">
      <h2>Posts</h2>      

<?php foreach($posts as $key=>$value):   ?>

    
<div >
    <h4><a href="showPost.php?id=<?= $value->id?>&title=<?= $value->title?>&content=<?= $value->content?>&author=<?= $value->author?>"><?=$value->title?></a></h4>
   
   
</div>

<?php endforeach ?>


        </div>
        
    <main class="main">
       
        <div>
       
        <div class="post">
            <h1><?=$title?></h1>
            <h3><?= $content?></h3>
            <h2><?=$author?></h2>
        </div>
    
    </div>

    </main>
    </div>
</body>
</html>