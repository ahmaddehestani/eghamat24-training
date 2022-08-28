<?php
require('./services/helper.php');
if(!auth()){
    redirect('login.php');
    }
// if(!isset($_GET['id'])){
//     redirect('panel.php');
// }
$id=$_GET['id'];
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
    DELETE from blog where ID = $id;
EOF;
 
 $ret = $db->exec($sql);
 if(!$ret){
   echo $db->lastErrorMsg();
 } else {
    echo $db->changes(), " Record deleted successfully\n";
 }
 $db->close();




redirect('panel.php')
?>