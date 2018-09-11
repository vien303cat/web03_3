<?php 

$sql = "select * from movie";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="5"><a href="admin.php?do=admin&redo=vvadd">新增電影</a></td>
  </tr>
  <?php do{ ?>
  <tr>
    <td width="10%" rowspan="3" align="center" valign="middle"><img src="img/<?=$c2["movie_img"]?>" width="70px" height="70px" ></td>
    <td width="10%" rowspan="3" align="center" valign="middle">分級:
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
    </td>
    <td width="20%" align="center">片名:<?=$c2["movie_name"]?></td>
    <td width="20%" align="center">片長:<?=$c2["movie_long"]?></td>
    <td width="20%" align="center">上映時間:<?=$c2["movie_date"]?></td>
  </tr>
  <tr>
    <td width="20%" align="center">排序:<?=$c2["movie_desc"]?></td>
    <td width="20%" align="center">顯示:
    <?php
        if($c2["movie_display"] == 1){
            echo "上架";
        }else{
            echo "下架";
        }
    ?>
    </td>
    <td width="20%" align="center">
        <input type="button" value="編輯電影" onclick="document.location.href='admin.php?do=admin&redo=vvup&seq=<?=$c2['movie_seq']?>' ">
        <input type="button" value="刪除電影" onclick="document.location.href='admin.php?do=admin&redo=vv&seq=<?=$c2['movie_seq']?>' ">

</td>
  </tr>
  <tr>
    <td colspan="3" align="left">劇情介紹:<?=nl2br($c2["movie_con"])?></td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>