<?php
include 'system/head.php';
mysql_query(
         "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenum` varchar(255) NOT NULL,
  `sodu` varchar(32) NOT NULL,
  `soacc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
?>
<div class="container">
  <h2>Đăng Ký Thành Viên | <?php echo $title; ?></h2>
   <div class="row">  
      <div class="col-lg-8">
  <div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">Đăng Kí Thành Viên</div>
      <div class="panel-body">
      <form action="" method="POST">
      <div class="form-group">
  <label for="usr">Tên Tài Khoản:</label>
  <input type="text" class="form-control" name="username">
</div>
<div class="form-group">
  <label for="pwd">Mật Khẩu:</label>
  <input type="password" class="form-control" name="password">
</div>
<button type="submit" class="btn btn-danger">Đăng Ký</button>
</div></div></div></div>
<div class="col-lg-4">
  <div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">Điều Khoản CamXuc.Mobi</div>
      <div class="panel-body">
      <p><li class="list-group-item">Có CL Gì Đâu Mà Đọc.</li></p></div></div></div></div>


      <?php
      if($_POST['username'] && $_POST['password'])
      {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phonenum = $_POST['phonenum'];
        $row = null;
        $result = mysql_query("
         SELECT
         *
         FROM
         users
      WHERE
         username = '" . mysql_real_escape_string($username) . "'
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(!$row)
      {
        mysql_query(
         "INSERT INTO 
            users
         SET
            `username` = '" . mysql_real_escape_string($username) . "',
            `pass` = '" . mysql_real_escape_string($password) . "',            
            `sodu` = '0',
            `soacc` = '1'
      ");
       die('<script>alert("Thành Công!");

  
   window.location = "/"
  </script>');
     }
die('<script>alert("Đăng Kí Không Thành Công, Tài Khoản Đã Tồn Tại!");

  
   window.location = "dangky.php"
  </script>');
      }
  }
      ?>