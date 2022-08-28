<?php
require('./services/helper.php');
if(!auth()){
    redirect('login.php');
    }
// if(!isset($_GET['id'])){
//     redirect('panel.php');
// }
$id=$_GET['id'];
// $title="999";
// $content="888";
// $author="666";
if(isset($_POST['btnSave'])&& $_POST['btnSave']=="save")
{
 $title=$_POST['title'];
$new_id=$_POST['id'];
 $author=$_POST['author'];
 $content=$_POST['content'];
}
echo $id;
echo $title;
echo  $author;
echo  $content;


class MyDB extends SQLite3 {
    function __construct() {
       $this->open('test.db');
    }
 }
 
 $db = new MyDB();
 if(!$db) {
    echo $db->lastErrorMsg();
 } else {
    echo "Opened database successfully\n";
 }
 $sql =<<<EOF
    UPDATE blog SET title = $title , content = $content , author = $author where id=$new_id;
EOF;
 $ret = $db->exec($sql);
 if(!$ret) {
    echo $db->lastErrorMsg();
 } else {
    echo $db->changes(), " Record updated successfully\n";
 }
 $db->close();


 echo "idi is:  ".$id." \n ";
 echo "  new id  is:  ".$new_id."  \n";
// echo $title;
// echo  $author;
// echo  $content;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>EDIT PAGE</title>
</head>
<body>
<nav>
    <a href="logout.php">log out</a>
    <a href="create.php">create Post</a>
    <a href="panel.php">panel admin</a>
    </nav>
   
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <input type="text" value="<?= $id?>"  name="id">
    <input type="text" placeholder="title"  name="title">
    <textarea  name="content" rows="4" cols="50" placeholder="content" ></textarea>
  
    <input type="text" placeholder="author"  name="author">
   
    <input type="submit" value="save" name="btnSave"/>
    </form>

</body>
</html>