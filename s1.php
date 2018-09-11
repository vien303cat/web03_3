<?php include_once("head.php"); ?>

<?php
$sql = "select * from movie where movie_seq = '".$_POST["mv"]."'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

$pktime = strtotime($nowday);
$day1 = strtotime($c2['movie_date']);
$day2 = strtotime($c2["movie_date"]."+1day");
$day3 = strtotime($c2["movie_date"]."+2day");

$rday1 = date("Y-m-d",$day1);
$rday2 = date("Y-m-d",$day2);
$rday3 = date("Y-m-d",$day3);
?>
<select name="sel2" id="ss2" onchange='s2()'>
<option>請選擇日期</option>
<?php if($pktime <= $day1){
    echo "<option value='".$rday1."'   >".$rday1."</option>";
} ?>
<?php if($pktime <= $day2){
    echo "<option value='".$rday2."'   >".$rday2."</option>";
} ?>
<?php if($pktime <= $day3){
    echo "<option value='".$rday3."'   >".$rday3."</option>";
} ?>
</select>