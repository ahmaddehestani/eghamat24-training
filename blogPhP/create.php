<?php


require('./services/helper.php');
if(!auth()){
   redirect('login.php');
   }

$message="";

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
    $message=  $db->lastErrorMsg();
 } else {
    $message= "Opened database successfully\n";
 }

 $sql =<<<EOF
    INSERT INTO blog (id , title  , content , author)
    VALUES ($id , $title , $content , $author); 
EOF;

 $ret = $db->exec($sql);
 if(!$ret) {
    $message=  $db->lastErrorMsg();
 } else {
    $message=  "Records created successfully\n";
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
    <textarea  name="content" rows="4" cols="50" placeholder="content" ></textarea>
  
    <input type="text" placeholder="author"  name="author">
   
    <input type="submit" value="save" name="btnSave"/>
    </form>

    <div>
        <h3><?= $message?></h3>
    </div>
  
</body>
</html>