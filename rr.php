<?php 

if(!empty($_POST["name"])){
    $sql = "insert into poster value(NULL,'".$_POST["name"]."','".$_FILES["img"]["name"]."','1','1','1')";
    copy($_FILES["img"]["tmp_name"],"img/".$_FILES["img"]["name"]);
    mysqli_query($link,$sql);
    
}


if(!empty($_POST["no"][0])){
    for($i=0;$i<count($_POST["no"]);$i++){
        $sql = "update poster set poster_display = 0 where poster_seq = '".$_POST["no"][$i]."'";
        mysqli_query($link,$sql);
        $sql = "update poster set poster_desc = '".$_POST["desc"][$i]."' where poster_seq = '".$_POST["no"][$i]."'";
        mysqli_query($link,$sql);
        $sql = "update poster set poster_ani = '".$_POST["ani"][$i]."' where poster_seq = '".$_POST["no"][$i]."'";
        mysqli_query($link,$sql);
    }
    if(!empty($_POST["dis"][0])){
        for($i=0;$i<count($_POST["dis"]);$i++){
            $sql = "update poster set poster_display = 1 where poster_seq = '".$_POST["dis"][$i]."'";
            mysqli_query($link,$sql);
        }
    }
    if(!empty($_POST["del"][0])){
        for($i=0;$i<count($_POST["del"]);$i++){
            $sql = "DELETE FROM poster where poster_seq = '".$_POST["del"][$i]."'";
            mysqli_query($link,$sql);
        }
    }
}

$sql = "select * from poster";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>
<form method="post">
<table width="100%" border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="5" align="center" valign="middle">預告片清單</td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">預告片海報</td>
    <td width="20%" align="center" valign="middle">預告片片名</td>
    <td width="20%" align="center" valign="middle">預告片排序</td>
    <td width="20%" align="center" valign="middle">預告片動畫1~3</td>
    <td width="20%" align="center" valign="middle">操作</td>
  </tr>
  <?php do{ ?>
  <tr>
      <input type="hidden" name="no[]" value="<?=$c2["poster_seq"]?>" >
    <td width="20%" align="center" valign="middle"><img src="img/<?=$c2["poster_img"]?>" width="50px" weight="50px"></td>
    <td width="20%" align="center" valign="middle"><?=$c2["poster_txt"]?></td>
    <td width="20%" align="center" valign="middle"><input type="text" name="desc[]" value="<?=$c2["poster_desc"]?>"></td>
    <td width="20%" align="center" valign="middle"><input type="text" name="ani[]" value="<?=$c2["poster_ani"]?>"></td>
    <td width="20%" align="center" valign="middle">
        <input type="checkbox" name="dis[]" value="<?=$c2["poster_seq"]?>" <?php if($c2["poster_display"] == '1'){ echo "checked"; }?> >顯示
    <input type="checkbox" name="del[]" value="<?=$c2["poster_seq"]?>">刪除</td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
  <tr>
    <td colspan="5" align="center" valign="middle"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
  </tr>
</table>
  </form>
<br><br><br>

<form method="post" enctype="multipart/form-data">
<table width="100%" border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="2" align="center">新增預告片海報</td>
  </tr>
  <tr>
    <td width="50%" align="left">預告片海報:<input type="FILE" name="img"></td>
    <td width="50%" align="left">預告片片名:<input type="text" name="name"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="新增"><input type="reset" value="重置"></td>
  </tr>
</table>
  </form>