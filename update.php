<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>CH12_test2</title>
</head>
<body>
<?php
// 是否是表單送回
if (!isset($_POST["Update"])) {
	include_once("query.php"); //引入檔案，顯示紀錄
}
else{
   // 開啟MySQL的資料庫連接
   $link = @mysqli_connect("localhost","root","admin")
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "myschool");  // 選擇資料庫
   // 建立更新記錄的SQL指令字串
   $sql = "UPDATE students SET ";
   $sql.= "address='".$_POST["Address"]."'";
   $sql.= " WHERE sno = '".$_POST["Sno"]."'";
   echo "<b>SQL指令: $sql</b><br/>";
   //送出UTF8編碼的MySQL指令
   mysqli_query($link, 'SET NAMES utf8'); 
   if ( mysqli_query($link, $sql) ) // 執行SQL指令
      echo "資料庫更新記錄成功, 影響記錄數: ". 
           mysqli_affected_rows($link) . "<br/>";
   else
      die("資料庫更新記錄失敗<br/>");
   include_once("query.php"); //引入檔案，顯示紀錄
   mysqli_close($link);      // 關閉資料庫連接
}
?>
<form action="update.php" method="post">
學號: <input type="text" name="Sno" size ="6"/>
<table border="1">
<tr><td>住址:</td>
   <td><input type="text" name="Address" size="25"/>
	 </td></tr>
</table><hr/>
<input type="submit" name="Update" value="更新"/>
</form>
<hr/>
<a href="index.php">首頁</a>
| <a href="insert.php">新增紀錄</a>
| <a href="delete.php">刪除紀錄</a></center>
</body>
</html>
