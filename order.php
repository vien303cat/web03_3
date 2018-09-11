<?php 
if(!empty($_GET["no"])){
    $sql = "DELETE FROM tick where tick_no = '".$_GET["no"]."'";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";
}

if(!empty($_POST["pp"])){

    if($_POST["pp"] == 1){
        $sql = "DELETE FROM tick where tick_date = '".$_POST["dat"]."'";
        mysqli_query($link,$sql);
        echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";
    }else{
        $sql = "DELETE FROM tick where tick_movie = '".$_POST["dat"]."'";
        mysqli_query($link,$sql);
        echo "<script>document.location.href='admin.php?do=admin&redo=order'</script>";
    }

}


$sql = "select * from tick,movie where tick_movie = movie_seq group by tick_no order by tick_no";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>

<table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="7" align="center">訂單管理</td>
  </tr>
  <tr>
    <td colspan="7" align="center">
        快速刪除:
        <input type="radio" id="r1" name="ee" value="1">依日期<input type="date" id="t1">　
        <input type="radio" id="r2" name="ee" value="2">依電影<select id="t2">
        <?php 
        $sqll = "select * from movie ";
        $cc1  = mysqli_query($link,$sqll);
        $cc2  = mysqli_fetch_assoc($cc1);
        do{
            echo "<option value='".$cc2["movie_seq"]."'>".$cc2["movie_name"]."</option>";
        }while($cc2  = mysqli_fetch_assoc($cc1))
        ?>
        </select>
        <input type="button" onclick="del()" value="刪除">
    </td>
  </tr>
  <tr>
    <td width="13%" align="center">訂單編號</td>
    <td width="13%" align="center">電影名稱</td>
    <td width="13%" align="center">日期</td>
    <td width="13%" align="center">場次時間</td>
    <td width="13%" align="center">訂購數量</td>
    <td width="13%" align="center">訂票位置</td>
    <td width="13%" align="center">操作</td>
  </tr>
  <?php do{ ?>
  <tr>
    <td width="13%" align="center"><?=$c2["tick_no"]?></td>
    <td width="13%" align="center"><?=$c2["movie_name"]?></td>
    <td width="13%" align="center"><?=$c2["tick_date"]?></td>
    <td width="13%" align="center">
<?php if($c2["tick_site"] == 1){
    echo "14:00~16:00";
}else if($c2["tick_site"] == 2){
    echo "16:00~18:00";
}else if($c2["tick_site"] == 3){
    echo "18:00~20:00";
}else if($c2["tick_site"] == 4){
    echo "20:00~22:00";
}else if($c2["tick_site"] == 5){
    echo "22:00~24:00";
}
?>
</td>
<?php 
$sqll = "select * from tick where tick_no = '".$c2["tick_no"]."'";
$cc1  = mysqli_query($link,$sqll);
$cc2  = mysqli_fetch_assoc($cc1);
$row  = mysqli_num_rows($cc1);
?>
    <td width="13%" align="center"><?=$row?></td>
    <td width="13%" align="center">
    <?php do{
        $p = ceil($cc2["tick_sit"]/5);
        if($p == 0 ){ $p = 1 ; }
        $t = $cc2["tick_sit"]%5 ;
        if($t == 0 ){ $t = 5 ; }
        echo $p."排".$t."號<br>";
    }while($cc2  = mysqli_fetch_assoc($cc1)) ?>
    </td>
    
    <td width="13%" align="center"><input type="button" onclick="document.location.href='admin.php?do=admin&redo=order&no=<?=$c2["tick_no"]?>'" value="刪除"></td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>

<script>
    function del(){
        var dd = confirm("確定要刪除");
        if(dd == true){
            var rad = document.getElementById("r1").checked;
            if(rad == 1){
                var dat = document.getElementById("t1").value;
                var pp  = 1 ;
                $.post("admin.php?do=admin&redo=order",{pp,dat},function(){
                    document.location.href='admin.php?do=admin&redo=order';
                });
            }else{
                var dat = document.getElementById("t2").value;
                var pp  = 2 ;
                $.post("admin.php?do=admin&redo=order",{pp,dat},function(){
                    document.location.href='admin.php?do=admin&redo=order';
                }); 
            }
        }else{ alert("沒有刪除"); }
    }
    </script>