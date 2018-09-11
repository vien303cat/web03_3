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
$sql = "select * from movie where movie_seq='".$_POST["sel1"]."'";
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
  <form method="post" action="end.php">

  <table width="60%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="2" align="center">
    <input type="hidden" name="mv" value="<?=$_POST["sel1"]?>">
    <input type="hidden" name="date" value="<?=$_POST["sel2"]?>">
    <input type="hidden" name="site" value="<?=$_POST["sel3"]?>">
    <div>
    <?php 
    for($i=1;$i<=4;$i++){
        for($j=1;$j<=5;$j++){ 
            $ma = ( $i - 1 )*5 + $j;
            ?>
            <div style="width:18%;display:inline-block;">
            <?php 
            $sqll = "select * from tick where tick_movie = '".$_POST["sel1"]."' and tick_date = '".$_POST["sel2"]."' and tick_date = '".$_POST["sel3"]."' and tick_sit = '$ma' ";
            $cc1  = mysqli_query($link,$sqll);
            $roww = mysqli_num_rows($cc1);
            if($roww == ""){ ?>
            <?=$i?>排<?=$j?>號<br>
            <img src="img/03D02.png"><br><input type="checkbox" name="sit[]" value="<?=$ma?>" >
            <?php }else{ ?>
                <?=$i?>排<?=$j?>號<br>
            <img src="img/03D03.png"><br>
    <?php    } ?>
    </div> 
        <?php } ?>
             
    <?php } 
    
    ?>
    </div>
    </td>
  </tr>
  <tr>
    <td width="40%" align="center">您選擇的電影:</td>
    <td align="center"><?=$c2["movie_name"]?></td>
  </tr>
  <tr>
    <td width="40%" align="center">您選擇的時間是:</td>
    <td align="center">
    <?php if($_POST["sel3"] == 1){
    echo "14:00~16:00";
}else if($_POST["sel3"] == 2){
    echo "16:00~18:00";
}else if($_POST["sel3"] == 3){
    echo "18:00~20:00";
}else if($_POST["sel3"] == 4){
    echo "20:00~22:00";
}else if($_POST["sel3"] == 5){
    echo "22:00~24:00";
}
?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="訂購"><input type="button" value="上一步" onclick="window.close()"></td>
  </tr>
</table>

</form>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
