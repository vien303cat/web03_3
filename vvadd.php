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
    $mv  = $_FILES["mv"]["name"];
    copy($_FILES["mv"]["tmp_name"],"img/".$mv);
    $img  = $_FILES["img"]["name"];
    copy($_FILES["img"]["tmp_name"],"img/".$img);
    $sql = "insert into movie value(null,'$name','$lv','$long','$date','$fa','$dir','$img','$mv','$con','$dis','$desc')";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=vv'</script>";
}

?>

<form method="post" enctype="multipart/form-data">
<table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2" align="center" valign="middle">新增電影</td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">片　　名：</td>
    <td align="left" valign="middle"><input type="text" name="name"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">分　　級：</td>
    <td align="left" valign="middle"><select name="lv">
        <option value="1">普遍級</option>
        <option value="2">輔導級</option>
        <option value="3">保護級</option>
        <option value="4">限制級</option>
    </select></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">片　　長：</td>
    <td align="left" valign="middle"><input type="text" name="long"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">上映日期：</td>
    <td align="left" valign="middle">
    <select name="Y">
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
    </select>年
    <select name="m">
    <?php for($i=1;$i<=12;$i++){
        echo "<option value='".$i."'>".$i."</option>";
    } ?>
    </select>月
    <select name="d"">
    <?php for($i=1;$i<=31;$i++){
        echo "<option value='".$i."'>".$i."</option>";
    } ?>
    </select>日
    </td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">發行商　：</td>
    <td align="left" valign="middle"><input type="text" name="fa"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">導　　演：</td>
    <td align="left" valign="middle"><input type="text" name="dir"></td>
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
    <td align="left" valign="middle"><input type="text" name="desc"></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">顯　　示：</td>
    <td align="left" valign="middle"><select name="dis">
        <option value="1">上架</option>
        <option value="0">下架</option>
    </select></td>
  </tr>
  <tr>
    <td width="20%" align="left" valign="middle">劇情簡介：</td>
    <td align="left" valign="middle"><textarea name="con"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><input type="submit" value="新增"><input type="reset" value="重置"></td>
  </tr>
</table>
</form>