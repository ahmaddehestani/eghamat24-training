<?php
require('./services/helper.php');
if(!auth()){
    redirect('login.php');
    }
// if(!isset($_GET['id'])){
//     redirect('panel.php');
// }
$id=$_GET['id'];
$old_title=$_GET['title'];
$old_content=$_GET['content'];
$old_author=$_GET['author'];


if(isset($_POST['btnSave'])&& $_POST['btnSave']=="save")
{
 $title=$_POST['title'];
$new_id=$_POST['id'];
 $author=$_POST['author'];
 $content=$_POST['content'];

}



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
    <label>id</label>
    <input type="text" value="<?= $id?>"  name="id">
    <label>title</label>
    <input type="text" value="<?= $old_title?>"  name="title">
    <label>content</label>
    <textarea  name="content" rows="8" cols="50"  ><?= $old_content?></textarea>
    <label>author</label>
    <input type="text" value="<?= $old_author?>"   name="author">
   
    <input type="submit" value="save" name="btnSave"/>
    </form>

</body>
</html>