<?php include_once("head.php"); ?>
<?php

$H = date("H",$strtime);
for($i=1;$i<=5;$i++){
    $sql = "select * from tick where tick_date = '".$_POST["date"]."' and tick_movie = '".$_POST["mv"]."' and tick_site = '".$i."'";
    $c1  = mysqli_query($link,$sql);
    $row = mysqli_num_rows($c1);
    $tt[$i] = 20 - $row ;
}
?>

<select name="sel3" id="ss3">
<option value="1">14:00~16:00 剩餘座位 <?=$tt[1]?></option>
<option value="2">16:00~18:00 剩餘座位 <?=$tt[2]?></option>
<option value="3">18:00~20:00 剩餘座位 <?=$tt[3]?></option>
<option value="4">20:00~22:00 剩餘座位 <?=$tt[4]?></option>
<option value="5">22:00~24:00 剩餘座位 <?=$tt[5]?></option>
</select>
