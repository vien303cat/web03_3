<?php

if(!empty($_POST["name"])){
    $name = $_POST["name"] ;
    $long = $_POST["long"] ;
    $lv = $_POST["lv"] ;
    $date = $_POST["Y"]."-".$_POST["m"]."-".$_POST["d"] ;
    $fa = $_POST["fa"] ;
    $dir = $_POST["dir"] ;
    $desc = $_POST["desc"] ;
    $dis = $_POST["dis"] ;
    $con = $_POST["con"];
    if(!empty($_FILES["mv"]["name"])){
        $mv  = $_FILES["mv"]["name"];
        copy($_FILES["mv"]["tmp_name"],"img/".$mv);
        $sql = "update movie set movie_movie ='$mv' where movie_seq = '".$_GET["seq"]."'";
        mysqli_query($link,$sql);
    }
    if(!empty($_FILES["img"]["name"])){
        $img  = $_FILES["img"]["name"];
        copy($_FILES["img"]["tmp_name"],"img/".$img);
        $sql = "update movie set movie_img ='$img' where movie_seq = '".$_GET["seq"]."'";
        mysqli_query($link,$sql);
    }
    $sql = "update movie set movie_name ='$name',movie_long ='$long',movie_lv='$lv',movie_date='$date',movie_fa='$fa',movie_dir='$dir',movie_desc='$desc',movie_display='$dis',movie_con='$con' where movie_seq = '".$_GET["seq"]."'";

    mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=vv'</script>";
}

$sql = "select * from movie where movie_seq='".$_GET["seq"]."'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$Y = explode("-",$c2["movie_date"])[0];
$m = explode("-",$c2["movie_date"])[1];
$d = explode("-",$c2["movie_date"])[2];
?>

<form method="post" enctype="multipart/form-data">
<table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2" align="center" valign="middle">新增電影</td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">片　　名：</td>
    <td align="left" valign="middle"><input type="text" name="name" value="<?=$c2["movie_name"]?>"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">分　　級：</td>
    <td align="left" valign="middle"><select name="lv">
        <option value="1" <?php if($c2["movie_lv"] == 1){ echo "selected"; } ?> >普遍級</option>
        <option value="2" <?php if($c2["movie_lv"] == 2){ echo "selected"; } ?>>輔導級</option>
        <option value="3" <?php if($c2["movie_lv"] == 3){ echo "selected"; } ?>>保護級</option>
        <option value="4" <?php if($c2["movie_lv"] == 4){ echo "selected"; } ?>>限制級</option>
    </select></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">片　　長：</td>
    <td align="left" valign="middle"><input type="text" name="long" value="<?=$c2["movie_long"]?>"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">上映日期：</td>
    <td align="left" valign="middle">
    <select name="Y">
        <option value="2018" <?php if($Y == 2018){ echo "selected"; } ?> >2018</option>
        <option value="2019" <?php if($Y == 2019){ echo "selected"; } ?> >2019</option>
        <option value="2020" <?php if($Y == 2020){ echo "selected"; } ?> >2020</option>
    </select>年
    <select name="m">
    <?php for($i=1;$i<=12;$i++){
        if($m == $i){ $c = "selected"; }else{ $c = "";}
        echo "<option value='".$i."' ".$c." >".$i."</option>";
    } ?>
    </select>月
    <select name="d"">
    <?php for($i=1;$i<=31;$i++){
        if($d == $i){ $c = "selected"; }else{ $c = "";}
        echo "<option value='".$i."' ".$c." >".$i."</option>";
    } ?>
    </select>日
    </td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">發行商　：</td>
    <td align="left" valign="middle"><input type="text" name="fa" value="<?=$c2["movie_fa"]?>"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">導　　演：</td>
    <td align="left" valign="middle"><input type="text" name="dir" value="<?=$c2["movie_dir"]?>"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">預告影片：</td>
    <td align="left" valign="middle"><input type="FILE" name="mv"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">電影海報：</td>
    <td align="left" valign="middle"><input type="FILE" name="img"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">排　　序：</td>
    <td align="left" valign="middle"><input type="text" name="desc" value="<?=$c2["movie_desc"]?>"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">顯　　示：</td>
    <td align="left" valign="middle"><select name="dis">
        <option value="1" <?php if($c2["movie_display"] == 1){ echo "selected"; } ?> >上架</option>
        <option value="0" <?php if($c2["movie_display"] == 0){ echo "selected"; } ?> >下架</option>
    </select></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">劇情簡介：</td>
    <td align="left" valign="middle"><textarea name="con" ><?=$c2["movie_con"]?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><input type="submit" value="新增"><input type="reset" value="重置"></td>
  </tr>
</table>
</form>