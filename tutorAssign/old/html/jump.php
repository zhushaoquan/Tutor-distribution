<?php
  require dirname(__DIR__).'/lib/functions.php';
?>
<?php
	session_start();
	session_destroy();
	jump_success("退出成功", '../index.php');
?>