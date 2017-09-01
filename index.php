<?php
include 'system/head.php';
mysql_query("CREATE TABLE IF NOT EXISTS `idvipmoi` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_user` varchar(32) NOT NULL,
      `limitlike` varchar(32) NOT NULL,      
      `liketrungbinh` varchar(32) NOT NULL,            
      `limitpost` varchar(32) NOT NULL,
      `time` varchar(32) NOT NULL,      
      `thanhtoan` text NOT NULL,      
      `solike` text NOT NULL,
      `ctv` text NOT NULL,
      `ngay` text NOT NULL,
      `ten` text NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
mysql_query("CREATE TABLE IF NOT EXISTS `log_gioihan` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_user` varchar(32) NOT NULL,
      `id_stt` varchar(32) NOT NULL, 
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<div class="container">
  <h2><?php echo $title; ?></h2>
   <div class="row">  
      <div class="col-lg-8">
  <div class="panel-group">
<div class="panel panel-primary">
<?php if(!$_SESSION[id]) 
{ ?>
      <div class="panel-heading"><?php echo $title; ?></div>
      <div class="panel-body">
<li id="trave" class="list-group-item"><center><p>SDT Liên Hệ: 0983544080 Gặp Thịnh <code>hoặc</code> 0868216438 Gặp Phong.!</p><iframe src="https://www.facebook.com/plugins/post.php?href=https://www.facebook.com/photo.php?fbid=647981055385706" width="500" height="207" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></center>
<center><a href="http://m.me/puaru.vn" target="_blank"><button type="button" class="btn btn-danger">Click Để Mua BOT</button></a></center>
</li>
<?php } else {

$info = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_SESSION[id]."' LIMIT 1")); ?>
<div class="panel-heading">Cài BOT</div>
      <div class="panel-body">
      
      <form action="" method="POST">
<div class="form-group">
  <label for="usr">ID User:</label>
  <input type="text" class="form-control" name="id_user">
</div>
<div class="form-group">
  <label for="usr">Tên Khách:</label>
  <input type="text" class="form-control" name="name">
</div>
<div class="form-group">
  <label for="usr">Thuê Bao Nhiêu Ngày: (Gói 3 Ngày Dùng Thử Chỉ Áp Dụng Với Gói 150 Like)</label>
  <select id="ngay" name="ngay">
  <option value="15">15</option>
  <option value="30">30</option>
  <option value="60">60</option>
  <option value="90">120</option>
  <option value="180">180</option>
  <option value="3">3</option>
</select>
</div>
<div class="form-group">
  <label for="usr">Số Like Lên Mỗi Phút:</label>
  <select name="solike">
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="20">20</option>
  <option value="30">30</option>
  <option value="40">40</option>
  <option value="50">50</option>
</select>
</div>
<div class="form-group">
  <label for="usr">Giới Hạn Like:</label>
  <select id="limitlike" name="limitlike">
  <option value="150">150</option>
  <option value="300">300</option>
  <option value="500">500</option>
  <option value="700">700</option>
  <option value="1000">1000</option>
</select>
</div>
<div class="form-group">
  <label for="usr">Giới Hạn Số STT:</label>
  <select name="limitpost">
  <option value="15">15</option>
</select>
</div>
<div  class="form-group">
  <label id="dola" for="dola">Số Tiền Cần Thanh Toán: </label>
</div>
<button type="submit" name="submit" class="btn btn-danger">Kích Hoạt</button>
<button type="button" class="btn btn-danger" onclick="getItems()" >Tính Tiền</button>

</form>

<?php
if($_GET[tb])
{
  echo '<label for="usr">'.$_GET[tb].'</label>';
}






 } ?>

</div></div></div></div>
<div class="col-lg-4">
  <div class="panel-group">
<div class="panel panel-primary">
<?php if(!$_SESSION[id]) 
{ ?>
      <div class="panel-heading">Đăng Nhập / Đăng Ký</div>
      <div class="panel-body">
      <form action="" method="POST">
      <div class="form-group">
  <label for="usr">Username:</label>
  <input type="text" class="form-control" name="username">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" name="password">
</div>
<button type="submit" class="btn btn-danger">Đăng Nhập</button>
<p><li class="list-group-item"><a href="dangky.php">Đăng Ký Tài Khoản </a></li></p></form></div></div></div></div><br>


<?php } else {
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `idvipmoi` WHERE `ctv` ='".$_SESSION[id]."'"), 0); 
$info = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_SESSION[id]."' LIMIT 1"));
 ?>
<div class="panel-heading">Thông Tin Tài Khoản</div>
      <div class="panel-body">
      <div class="form-group">
      <p><li class="list-group-item">ID: <?php echo $_SESSION[id]; ?></li></p>
      <p><li class="list-group-item">Username: <?php echo $_SESSION[user]; ?></li></p>
      <p><li class="list-group-item">Số Dư: <?php echo number_format($info[sodu]); ?> VNĐ</li></p>
      <!--
      <input type="hidden" class="form-control" id="txtuser" name="txtuser" value="<?php echo $_SESSION[id];?>" />
      <div class="form-group">
      <label for="usr">Chọn mạng:</label>
      <select class="form-control" id="chonmang" name="chonmang">

      <option value="VIETEL">Viettel</option>

      <option value="MOBI">Mobifone</option>

      <option value="VINA">Vinaphone</option>

      <option value="GATE">Gate</option>

      <option value="VTC">VTC</option>

    </select>
    </div>
      <div class="form-group">
  <label for="usr">Mã Thẻ:</label>
  <input type="text" class="form-control" id="txtpin">
</div>
<div class="form-group">
  <label for="usr">Seri:</label>
  <input type="text" class="form-control" id="txtseri">
</div><button type="button" class="btn btn-danger" onclick="Puaru_NapThe()"">Nạp Tiền</button>
--><a href="https://www.facebook.com/profile.php?id=100005214523618" target="_blank">  <button type="button" class="btn btn-danger">Nạp Tiền</button></a><a href="/logout.php">  <button type="button" class="btn btn-danger">Đăng Xuất</button></a></div></div></div></div></div>
<div class="col-lg-12">
  <div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading"><?php echo $tong; ?> Người Dùng</div>
      <div class="panel-body">
<table class="table">
    <thead>
      <tr>
        <th>ID FB</th>        
        <th>Tên Khách</th>
        <th>Số Like - Giới Hạn</th>
        <th>Hành Động</th>
        <th>Ngày Hết Hạn</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $infongdung = mysql_query("SELECT * FROM `idvipmoi` WHERE `ctv` = '".$_SESSION[id]."'");
while ($getpuaru = mysql_fetch_array($infongdung)){
  
    ?>
    <tr>
        <td><?php echo $getpuaru[id_user]; ?></td>
        <td><?php echo $getpuaru[ten]; ?></td>
        <td><?php echo $getpuaru[limitlike].' - '.$getpuaru[limitpost]; ?></td>
        <?php
        echo '<td><a href="?del='.$getpuaru[id].'">Xoá ID Này</a></td>';
        ?>
        <td><?php echo date("d-m-Y",$getpuaru[time] + ($getpuaru[ngay] * 24 * 60 * 60)); ?></td>
      </tr>

      <?php } ?>
      </tbody>
  </table>
      </div>
    </div>
      <?php } ?>

<?php
if($_GET[del])
  {
    $infongdung = mysql_fetch_array(mysql_query("SELECT * FROM `idvipmoi` WHERE `id` = '".$_GET[del]."' LIMIT 1"));
    if($infongdung[ctv] != $_SESSION[id])
    {
      die('<script>alert("Không Thể Xoá Tài Khoản Của Người Khác"); </script>');
      exit;
    }
    else
    {
    mysql_query("
DELETE FROM
`idvipmoi`
WHERE
id='" . mysql_real_escape_string($_GET[del]) . "'
");
    die('<script>alert("Xóa Thành Công!");

  
   window.location = "/"
  </script>');
    exit;
  }
  }
if($_POST['username'] && $_POST['password'])
{
$username = mysql_real_escape_string($_POST['username']);
$password = $_POST['password'];
$req = mysql_query("SELECT * FROM `users` WHERE `username`='" . trim(mb_strtolower($username)) . "' LIMIT 1");
        if (mysql_num_rows($req)) {
            $user = mysql_fetch_assoc($req);
if (md5($password) == $user['pass']) {

$_SESSION['id'] = $user['id'];
$_SESSION['user'] = $username;
$apikey = md5($username.''.$password);
mysql_query(
         "UPDATE 
            users
         SET          
            `apikey` = '" . $apikey . "'
      WHERE
            `id` = '" . $_SESSION['id'] . "'
      ");
?>
<meta http-equiv=refresh content="0; URL=index.php">
<?php
}}
else
{
  die('<script>alert("Tài Khoản Hoặc Mật Khẩu Không Đúng, Vui Lòng Nhập Lại!"); </script>');
}
}
if($_POST['id_user'] && $_POST['limitlike']  && $_POST['limitpost'] && $_SESSION['id'])
{
  $tongtien = file_get_contents("http://lenlike.net/tinhtien.php?like=".$_POST['limitlike']."&ngay=".$_POST['ngay']);
$info = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_SESSION[id]."' LIMIT 1"));
if(!$tongtien)
{
  die('<script>alert("Định Bug À. Còn Khuya.");

  
   window.location = "/"
  </script>');
      exit;
}
if($info[sodu] < $tongtien)
{
  die('<script>alert("Bạn phải có '.$tongtien.' VNĐ để thanh toán.");

  
   window.location = "/"
  </script>');
      exit;
}

$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `idvipmoi` WHERE `id_user` ='" . $_POST['id_user'] . "'"), 0);  
if($tong == 1)
{
  mysql_query(
         "UPDATE 
            idvipmoi
         SET
            `limitlike` = '" . $_POST['limitlike'] . "',
            `liketrungbinh` = '50',
            `ngay` = '" . $_POST['ngay'] . "',
            `ten` = '" . $_POST['name'] . "',            
            `solike` = '" . $_POST['solike']. "',  
            `ctv` = '" . $_SESSION['id'] . "',           
            `limitpost` = '" . $_POST['limitpost'] . "'
      WHERE
            `id_user` = '" . $_POST['id_user'] . "'
      ");
  mysql_query(
         "UPDATE 
            users
         SET          
            `sodu` = `sodu` - '".$tongtien."'
      WHERE
            `id` = '" . $_SESSION['id'] . "'
      ");
die('<script>alert("Thành Công!");

  
   window.location = "/"
  </script>');
}
else
{
  

mysql_query(
         "INSERT INTO 
            idvipmoi
         SET
            `id_user` = '" . $_POST['id_user'] . "',
            `limitlike` = '" . $_POST['limitlike'] . "',          
            `ctv` = '" .$_SESSION['id'] . "',
             `ngay` = '" . $_POST['ngay'] . "',

            `solike` = '" . $_POST['solike']. "', 
             `time` = '" . time() . "',
            `ten` = '" . $_POST['name'] . "',
            `liketrungbinh` = '50',
            `limitpost` = '" . $_POST['limitpost'] . "'
      ");
mysql_query(
         "UPDATE 
            users
         SET          
            `sodu` = `sodu` - '".$tongtien."'
      WHERE
            `id` = '" . $_SESSION['id'] . "'
      ");
die('<script>alert("Thành Công!");

  
   window.location = "/"
  </script>');
}
}
?>
<script type="text/javascript">
 function getItems()
 {
var ngay = document.getElementById("ngay").value;
var limitlike = document.getElementById("limitlike").value;
var sotien = httpGet("http://lenlike.net/tinhtien.php?like="+limitlike+"&ngay="+ngay);
document.getElementById('dola').innerHTML  = "Số tiền cần thanh toán: "+sotien +" VNĐ";

 }

 getItems(); 

 function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
</script>