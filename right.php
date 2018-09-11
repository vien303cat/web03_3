<style>
.tabb{
    background-color:#000;
    float:left;
    width:200px;
    height:200px;
    margin:5px;
}

    </style>
<?php 

$sql = "select * from movie where movie_display='1' order by movie_desc";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);

if(!empty($_GET["page"])){
    $nowpage = $_GET["page"];
}else{
    $nowpage = 1 ;
}
$addpage = 4 ;
$openpage = ($nowpage - 1 ) * $addpage;
$allpage = ceil($row/$addpage);

if($nowpage == 1){
    $fp = 1;
    $np = $nowpage +1;
}else if($nowpage == $allpage){
    $fp = $nowpage - 1;
    $np = $allpage;
}else{
    $fp = $nowpage - 1;
    $np = $nowpage + 1;
}

$sql = "select * from movie where movie_display='1' order by movie_desc limit $openpage,$addpage";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td  bgcolor="#CCCCCC" height="350">

        <?php do{ ?>

<table width="100%" border="0" cellspacing="2" cellpadding="2" class='tabb'>
  <tr>
    <td colspan="2" align="center" valign="middle">片名：<?=$c2["movie_name"]?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center" valign="middle"><a href='mvdata.php?seq=<?=$c2["movie_seq"]?>'><img src="img/<?=$c2["movie_img"]?>" width="80px" height="80px"></a></td>
    <td align="left" valign="middle">分級:
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
        ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">上映日期:　<?=$c2["movie_date"]?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">
        <input type="button" value="劇情簡介" onclick="document.location.href='mvdata.php?seq=<?=$c2["movie_seq"]?>'">
        <input type="button" value="線上訂票" onclick="document.location.href='tick.php?seq=<?=$c2["movie_seq"]?>'">
</td>
  </tr>
</table>
        <?php }while($c2 = mysqli_fetch_assoc($c1))  ?>
    </td>
  </tr>
  <tr>
    <td align="center">
    <a href="index.php?page=<?=$fp?>"> < </a>    
<?php 
for($i=1;$i<=$allpage;$i++){
    echo "<a href=index.php?page=".$i.">".$i."</a>";
}
?>
    <a href="index.php?page=<?=$np?>"> > </a> 
    </td>
  </tr>
</table>