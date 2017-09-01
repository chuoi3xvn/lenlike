<?php
session_start();
include 'system/head.php';

if($_SESSION['admin']) 
{
header('location: TV-Edit.php');
}
if($_POST['user'] && $_POST['pass'])
{
$user= $_POST['user'];
$pass= $_POST['pass'];
if($user == 'PhongThinh' && $pass == 'ThinhPhong')
{
$_SESSION['admin'] = $user;
header('location: TV-Edit.php');
exit;
}
}
?>
<div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">Login Admin</div>
      <div class="panel-body">
      <form action="" method="POST">
      <div class="form-group">
  <label for="usr">Username:</label>
  <input type="text" class="form-control" name="user">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" name="pass">
</div>
<button type="submit" class="btn btn-danger">Đăng Nhập</button></form></div></div>