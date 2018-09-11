<style>
#imgtxt{
    width:420px;
    height:30px;
}
#imgg{
    width:420px;
    height:300px;
}
#imgg img{
    display:none;
}
#cli{
    width:420px;
    height:60px;
}
    </style>
<?php 
$sql = "select * from poster where poster_display = '1' order by poster_desc";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);
?>
    <div id="imgtxt" align="center"></div>
    <div id="imgg" align="center"></div>
    <div id="cli" align="center">
        <img src="img/01E01.jpg" width="50px" onclick="pp(1)">
        <?php $uu=0 ;
        do{ 
            $tx = $c2['poster_txt'];
            $an = $c2['poster_ani'];
            $mg = $c2['poster_img'];
            ?>
            <img src="img/<?=$c2["poster_img"]?>" class="im" id="ssaa<?=$uu?>" height="60px" width="60px" onclick="pho('<?=$tx?>','<?=$an?>','<?=$mg?>')" >
        <?php $uu++; }while($c2  = mysqli_fetch_assoc($c1))  ?>
        <img src="img/01E02.jpg" width="50px" onclick="pp(2)">
    </div>
    

    <script>
        
    var w1 = new Array(<?=$row?>); 
    var w2 = new Array(<?=$row?>);
    var w3 = new Array(<?=$row?>);
    <?php 
    $sqll = "select * from poster where poster_display = '1' order by poster_desc";
    $cc1  = mysqli_query($link,$sqll);
    $cc2  = mysqli_fetch_assoc($cc1);
    $cc = 0;
    do{  ?>
        w1[<?=$cc?>] = "<?=$cc2["poster_txt"]?>" ;
        w2[<?=$cc?>] = "<?=$cc2["poster_ani"]?>" ;
        w3[<?=$cc?>] = "<?=$cc2["poster_img"]?>" ;
    <?php  $cc++; }while($cc2  = mysqli_fetch_assoc($cc1)) ?>
    
    
    var ee = 0;
    autorun();
    function autorun(){
        pho(w1[ee],w2[ee],w3[ee]);
        if(ee >= <?=$row?>){
            ee = 0;
        }
        ee++;
        setTimeout("autorun()",3000);
    }
    


                        	var nowpage=0,num=<?=$row?>;
							function pp(x)
							{
								var s,t;
								if(x==1&&nowpage-1>=0)
								{nowpage--;}
								if(x==2&&(nowpage+1)*3<=num*1+2)
								{nowpage++;}
								$(".im").hide()
								for(s=0;s<=3;s++)
								{
									t=s*1+nowpage*1;
									$("#ssaa"+t).show()
								}
							}
							pp(1)

                            
function pho(txt,ani,img){
    $("#imgtxt").html(txt);
    if(ani == 1){
        $("#imgg").html("<img src='img/"+img+"' width='290px' height='290px'  id='ss'>");
        $("#ss").fadeIn(1000);
    }
    if(ani == 2){
        $("#imgg").html("<img src='img/"+img+"' width='290px' height='290px'  id='ss'>");
        $("#ss").slideDown(1000);
    }
    if(ani == 3){
        $("#imgg").html("<img src='img/"+img+"' width='290px' height='290px'  id='ss'>");
        $("#ss").show(1000);
    }
}

    </script>