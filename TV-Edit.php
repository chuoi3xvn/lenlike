<?php
session_start();
include 'system/head.php';

if(!$_SESSION['admin']) 
{
header('location: /');
exit;
}
if(!$_GET[edit])
{
?>
<div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">Người Dùng</div>
      <div class="panel-body">
<table class="table">
    <thead>
      <tr>
        <th>Username</th>        
        <th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $infongdung = mysql_query("SELECT * FROM `users`");
while ($getpuaru = mysql_fetch_array($infongdung)){
  
    ?>
    <tr>
        <td><?php echo $getpuaru[username] .' - '.$getpuaru[sodu].' VNĐ '; ?></td>
        <td><a href="?edit=<?php echo $getpuaru[id]; ?>">Chỉnh Sửa</a></td>
      </tr>
      <?php } ?>
      </tbody>
  </table>
      </div>
    </div>
    <?php } if($_GET[edit] && $_SESSION[admin])
{
	$info_user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$_GET['edit'] . "' LIMIT 1"));
	?>
	<div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">Login Admin</div>
      <div class="panel-body">
      <form action="" method="POST">
      <div class="form-group">
  <label for="usr">Money:</label>
  <input type="text" class="form-control" name="sodu" value="<?php echo $info_user['sodu'];?>">
    <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['edit'];?>">

</div>
<button type="submit" class="btn btn-danger">Sửa Tài Khoản: <?php echo $info_user['username'];?></button></form></div></div>
<?php } 
if($_POST[sodu] && $_POST[id] && $_SESSION[admin])
{
mysql_query(
         "UPDATE 
            users
         SET          
            `sodu` = '".$_POST[sodu]."'
      WHERE
            `id` = '" . $_POST[id] . "'
      ");
header('location: TV-Edit.php');
exit;


}




?>