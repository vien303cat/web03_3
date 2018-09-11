<?php include_once("head.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="css/css.css">
<link href="home_files/s2.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>
<?php
if(!empty($_POST["mv"])){
    $sql = "select * from tick order by tick_cnt desc";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    $rrr = $c2["tick_cnt"] + 1;
    $no = date("Ymd",$strtime)*10000 + $rrr ;
    for($i=0;$i<count($_POST["sit"]);$i++){
        $sql = "insert into tick value(NULL,'".$_POST["mv"]."','".$_POST["date"]."','".$_POST["site"]."','".$_POST["sit"][$i]."','$no','$rrr')";
        mysqli_query($link,$sql);
    }
}
?>

<body>
<div id="main">
  <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="index.php">首頁</a> <a href="tick.php">線上訂票</a> <a href="#">會員系統</a> <a href="login.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">

<?php 
    $sql = "select * from tick,movie where tick_no = '".$no."' and tick_movie = movie_seq";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
?>
<table width="60%" border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="2" align="left">感謝訂購，您的訂單編號是:<?=$no?></td>
  </tr>
  <tr>
    <td width="30%" align="left">電影名稱:</td>
    <td align="left"><?=$c2["movie_name"]?></td>
  </tr>
  <tr>
    <td width="30%" align="left">日期:</td>
    <td align="left"><?=$_POST["date"]?></td>
  </tr>
  <tr>
    <td width="30%" align="left">場次時間:</td>
    <td align="left">
    <?php if($_POST["site"] == 1){
    echo "14:00~16:00";
}else if($_POST["site"] == 2){
    echo "16:00~18:00";
}else if($_POST["site"] == 3){
    echo "18:00~20:00";
}else if($_POST["site"] == 4){
    echo "20:00~22:00";
}else if($_POST["site"] == 5){
    echo "22:00~24:00";
}
?>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left">座位:<br>
    <?php do{
        $p = ceil($c2["tick_sit"]/5);
        if($p == 0 ){ $p = 1 ; }
        $t = $c2["tick_sit"]%5 ;
        if($t == 0 ){ $t = 5 ; }
        echo $p."排".$t."號<br>";
    }while($c2  = mysqli_fetch_assoc($c1)) ?>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left"><input type="button" value="確認" onclick="document.location.href='index.php'"></td>
  </tr>
</table>

  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
