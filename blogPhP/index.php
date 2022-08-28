<?php

$posts=[];
$data;





// $posts= [
// 	[
// 		'Name' => 'Derek Emmanuel',
// 		'Reg_No' => 'FE/30304',
// 		'Email' => 'derekemmanuel@gmail.com'
// 	],
// 	[
// 		'Name' => 'Rubecca Michealson',
// 		'Reg_No' => 'FE/20003',
// 		'Email' => 'rmichealsongmail.com'
// 	],
// 	[
// 		'Name' => 'Frank Castle',
// 		'Reg_No' => 'FE/10002',
// 		'Email' => 'fcastle86@gmail.com'
// 	]
// ];



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
//     echo "<div>ID = ". $rowRead['id'] . "\n</div>";
//     echo "title = ". $rowRead['title'] ."\n";
//     echo "content = ". $rowRead['content'] ."\n";
//     echo "author = ".$rowRead['author'] ."\n\n";
array_push($posts, (object)[
    'id' => $rowRead['id'],
    'title' => $rowRead['title'],
    'content' => $rowRead['content'],
    'author' => $rowRead['author'],
]);

 }


 echo "Operation done successfully\n";
 $dbRead->close();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="view]port" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>BLOG</title>
</head>
<body>


    <main class="main">
       
<?php foreach($posts as $key=>$value):   ?>

    </div>
        <div class="post">
            <h1><?=$value->title?></h1>
            <h3><?= get_summary($value->content,40)?><a href="#">more</a></h3>
            <h2><?=$value->author?></h2>
        </div>
 
    <?php endforeach ?>
    
  

    </main>

</body>
</html>