<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>CH12_test2</title>
</head>
<body text="blue">
<center>
<?php
session_start();  // 啟動交談期
   // 開啟MySQL的資料庫連接
   $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
   $server = $url["host"];
   $username = $url["user"];
   $password = $url["pass"];
   $db = substr($url["path"], 1);
   //$servename = getenv('servename');
  // $dbname = getenv('dbname');
  // $username = getenv('username');
  // $password = getenv('password');   
   $link = @mysqli_connect($server, $username, $password) 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, $db);  // 選擇myschool資料庫
   //送出UTF8編碼的MySQL指令
   mysqli_query($link, 'SET NAMES utf8'); 
   // 執行SQL查詢
   $sql = "SELECT * FROM students ORDER BY sno ASC";
   echo "students 資料表的紀錄<br>";
   $result = @mysqli_query($link, $sql); 
   if ( mysqli_errno($link) != 0 ) {
      echo "錯誤代碼: ".mysqli_errno($link)."<br/>";
      echo "錯誤訊息: ".mysqli_error($link)."<br/>";      
   } 
   else { 
      echo "<table border=1>";
      echo "<tr>";
      while ( $meta = mysqli_fetch_field($result) )
         echo "<td><small>".$meta->name."</small></td>";
      echo "</tr>";
      // 取得欄位數
      $total_fields = mysqli_num_fields($result);
      while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
         echo "<tr>";
         for ( $i = 0; $i < $total_fields; $i++ )
            echo "<td><small>".$rows[$i]."</small></td>";
         echo "</tr>";
      }
      echo "</table>";
      // 取得記錄數
      $total_records = mysqli_num_rows($result);
      echo "記錄總數: $total_records 筆<br/></small>";
      mysqli_free_result($result);
   }
   mysqli_close($link); // 關閉資料庫連接
?>
</body>
</html>
