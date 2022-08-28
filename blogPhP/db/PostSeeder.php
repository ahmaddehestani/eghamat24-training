<?php
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
      INSERT INTO blog (id,title,content,author)
      VALUES (7, 'post1', 'rrrrrrrrrrrrrrrrr', 'ahmad');

      INSERT INTO blog (id,title,content,author)
      VALUES (8, 'post2', 'bbbbbbbbbbbbbb', 'ali');

     
EOF;

   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
?>