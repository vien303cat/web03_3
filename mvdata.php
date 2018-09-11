<?php include_once("head.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0063)?do=viewmore&id=4 -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="css/css.css">
<link href="Profile page_files/s2.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>
<?php 

$sql = "select * from movie where movie_seq='".$_GET["seq"]."' ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>
<body>
<div id="main">
  <div id="top" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="index.php">首頁</a> <a href="tick.php">線上訂票</a> <a href="#">會員系統</a> <a href="login.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <embed src="img/<?=$c2["movie_movie"]?>" width="300px" height="250px"  style="float:right;"></embed>
        <font style="font-size:24px"> <img src="img/<?=$c2["movie_img"]?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$c2["movie_name"]?>
          <input type="button" value="線上訂票" onclick="document.location.href='tick.php?seq=<?=$c2["movie_seq"]?>'" style="margin-left:50px; padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ： 
        <?php
        if($c2["movie_lv"] == 1){
            echo "<img src='img/03C01.png'>";
        }else if($c2["movie_lv"] == 2){
            echo "<img src='img/03C02.png'>";
        }else if($c2["movie_lv"] == 3){
            echo "<img src='img/03C03.png'>";
        }else if($c2["movie_lv"] == 4){
            echo "<img src='img/03C04.png'>";
        }
        ?>
         </p>
        <p style="margin:3px">影片片長 ：<?=$c2["movie_long"]?></p>
        <p style="margin:3px">上映日期 : <?=$c2["movie_date"]?></p>
        <p style="margin:3px">發行商 ：<?=$c2["movie_fa"]?> </p>
        <p style="margin:3px">導演 ：<?=$c2["movie_dir"]?> </p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<?=nl2br($c2["movie_con"])?><br>
        </p>
        </font>
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td align="center"><input type="button" value="院線片清單" onclick="document.location.href='index.php'"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>