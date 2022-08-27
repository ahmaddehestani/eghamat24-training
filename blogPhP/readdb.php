<?php
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
      SELECT * from blog;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "ID = ". $row['id'] . "\n";
      echo "title = ". $row['title'] ."\n";
      echo "content = ". $row['content'] ."\n";
      echo "author = ".$row['author'] ."\n\n";
   }
   echo "Operation done successfully\n";
   $db->close();
?>