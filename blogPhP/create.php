<?php


require('./services/helper.php');


if(isset($_POST['btnSave'])&& $_POST['btnSave']=="save")
{
 $title=$_POST['title'];
 $id=$_POST['id'];
 $author=$_POST['author'];
 $content=$_POST['content'];
}

class MyDB extends SQLite3 {
    function __construct() {
       $this->open('test.db');
    }
 }
 
 $db = new MyDB();
 if(!$db){
    echo $db->lastErrorMsg();
 } else {
    echo "Opened database successfully\n";
 }

 $sql =<<<EOF
    INSERT INTO blog (id,title  , content , author)
    VALUES ($id, $title, $content, $author); 
EOF;

 $ret = $db->exec($sql);
 if(!$ret) {
    echo $db->lastErrorMsg();
 } else {
    echo "Records created successfully\n";
 }
 $db->close();






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE POST</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
<input type="text" placeholder="id"  name="id">
    <input type="text" placeholder="title"  name="title">
    <input type="text" placeholder="content"  name="content">
    <input type="text" placeholder="author"  name="author">
   
    <input type="submit" value="save" name="btnSave"/>
    </form>
  
</body>
</html>