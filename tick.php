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
$sql = "select * from movie where movie_display='1'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
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
  <form method="post" action="sit.php" target="_blank">
  <table width="40%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="40%" align="left">電影:</td>
    <td align="left"><select name="sel1" id="ss1" onchange="s1()">
    <?php do{ ?>
    <option value="<?=$c2["movie_seq"]?>"  <?php if(!empty($_GET["seq"]) && $_GET["seq"] == $c2["movie_seq"]){ echo "selected"; } ?> > <?=$c2["movie_name"]?></option>
    <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
    </select>
    </td>
  </tr>
  <tr>
    <td width="40%" align="left">日期:</td>
    <td align="left"><span id="s2"></span></td>
  </tr>
  <tr>
    <td width="40%" align="left">場次:</td>
    <td align="left"><span id="s3"></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="確定"><input type="reset" value="重置"></td>
  </tr>
</table>
</form>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>

<script>
s1();
function s1(){
    var mv = $("#ss1").val(); 
    $.post("s1.php",{mv},function(ss){
        $("#s2").html(ss);
    });
}

function s2(){
    var mv = $("#ss1").val();
    var date = $("#ss2").val(); 
    $.post("s2.php",{mv,date},function(er){
        $("#s3").html(er);
    });
}
</script>