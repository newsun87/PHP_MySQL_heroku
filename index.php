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
include("query.php"); //引入顯示紀錄檔
?>
<hr/>
<a href="index.php">首頁</a>
| <a href="insert.php">新增紀錄</a>
| <a href="update.php">更新紀錄</a>
| <a href="delete.php">刪除紀錄</a></center>
</body>
</html>
