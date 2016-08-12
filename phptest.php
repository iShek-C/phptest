<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php

// // echo "我的第一段 PHP 脚本！";

// // echo "变量以 $ 符号开头，其后是变量的名称<br />";
// // echo "变量名称必须以字母或下划线开头<br />";
// // echo "变量名称不能以数字开头<br />";
// // echo "变量名称只能包含字母数字字符和下划线（A-z、0-9 以及 _）<br />";
// // echo "变量名称对大小写敏感（$y 与 $Y 是两个不同的变量）<br />";

// $x=5; // 全局作用域

// function myTest() {
// 	global $x;
//   	$y=10; // 局部作用域
//   	echo "<p>测试函数内部的变量：</p>";
//   	echo "变量 x 是：$x";
//   	echo "<br>";
//   	echo "变量 y 是：$y";
// } 

// myTest();

// echo "<p>测试函数之外的变量：</p>";
// echo "变量 x 是：$x";
// echo "<br>";
// echo "变量 y 是：$y";

// //
// echo "<br />";
// $x = 5985;
// var_dump($x);
// echo "<br />"; 
// $x = -345; // 负数
// var_dump($x);
// echo "<br />"; 
// $x = 0x8C; // 十六进制数
// var_dump($x);
// echo "<br />";
// $x = 047; // 八进制数
// var_dump($x);
// echo "<br /><br />";


$t=date("H");

if ($t<"20") {
  	echo "Have a good day!";
}else{
	echo "Have a good night!";
}
echo "<br /><br /><br />";

?>

<?php

function GM(){
  $shwpwd="";$ucd="";$lcd="";$nmd="";$scd="";$fcd="";$fud="";
  $pv=$_GET["uc"]+$_GET["lc"]+$_GET["nm"]+$_GET["sc"];
  $fLetter=$_GET["fc"]+$_GET["fu"];
  $aSCase=array(chr(33),chr(64),chr(35),chr(36),chr(37),chr(94),chr(38),chr(42),chr(43),chr(44),chr(45),chr(46),chr(63));
  $aUCase=array("A","B","C","D","E","F","G","H","J","K","M","N","P","Q","R","T","U","V","W","X","Y");
  for ($i=0;$i<=9;$i++) {
    $aNum[$i]=chr($i+48);
  }
  for($x=0;$x<count($aUCase);$x++) {
    $aLCase[$x]= strtolower($aUCase[$x]);
  }
  $aConly=array_merge_recursive($aUCase,$aLCase);
  switch ($pv)
  {
  case 1:
    $px=array_merge_recursive($aUCase);
    break;
  case 10:
    $px=array_merge_recursive($aLCase);
    break;
  case 11:
    $px=array_merge_recursive($aUCase,$aLCase);
    break;
  case 100:
    $px=array_merge_recursive($aNum);
    break;
  case 101:
    $px=array_merge_recursive($aUCase,$aNum);
    break;
  case 110:
    $px=array_merge_recursive($aLCase,$aNum);
    break;
  case 111:
    $px=array_merge_recursive($aUCase,$aLCase,$aNum);
    break;
  case 1000:
    $px=array_merge_recursive($aSCase);
    break;
  case 1001:
    $px=array_merge_recursive($aUCase,$aSCase);
    break;
  case 1010:
    $px=array_merge_recursive($aLCase,$aSCase);
    break;
  case 1011:
    $px=array_merge_recursive($aUCase,$aLCase,$aSCase);
    break;
  case 1100:
    $px=array_merge_recursive($aNum,$aSCase);
    break;
  case 1101:
    $px=array_merge_recursive($aUCase,$aNum,$aSCase);
    break;
  case 1110:
    $px=array_merge_recursive($aLCase,$aNum,$aSCase);
    break;
  case 1111:
    $px=array_merge_recursive($aUCase,$aLCase,$aNum,$aSCase);
    break;
  default:
    $px=array_merge_recursive($aUCase);
  }

  shuffle($px);

  if ($fLetter==2) {
    $pwd=$aConly[rand(0,count($aConly)-1)];
    for ($i=1;$i<=$_GET["pLen"]-1;$i++) {
      $pwd.=$px[rand(0,count($px)-1)];
    }
  }elseif ($fLetter>=20){
    $pwd=$aUCase[rand(0,count($aUCase)-1)];
    for ($i=1;$i<=$_GET["pLen"]-1;$i++) {
      $pwd.=$px[rand(0,count($px)-1)];
    }
  }else{
    for ($i=1;$i<=$_GET["pLen"];$i++) {
      $pwd.=$px[rand(0,count($px)-1)];
    }
  }
  return $pwd;
}

// for($x=0;$x<count($aLCase);$x++) {
//   echo $aLCase[$x];
// }
// echo "<br />".count($aLCase)."<br />";
// for($x=0;$x<count($aUCase);$x++) {
//   echo $aUCase[$x];
// }
// echo "<br />".count($aUCase)."<br />";
// for($x=0;$x<count($aNum);$x++) {
//   echo $aNum[$x];
// }
// echo "<br />".count($aNum)."<br />";
// for($x=0;$x<count($aSCase);$x++) {
//   echo $aSCase[$x];
// }
// echo "<br />".count($aSCase)."<br />";
// for($x=0;$x<count($px);$x++) {
//   echo $px[$x];
// }
// echo "<br />";
// echo count($px);
//echo $_GET["uc"]+$_GET["lc"]+$_GET["nm"]+$_GET["sc"];
if ($_GET["uc"]+$_GET["lc"]+$_GET["nm"]+$_GET["sc"]>0) {
  if ($_GET["pLen"]>0) {  
    $shwpwd=gm();
  }
}
echo "S/N: ".$shwpwd."<br />";

if ($_GET["uc"]==1) {
  $ucd="checked=".chr(34).chr(34);
}
if ($_GET["lc"]==10) {
  $lcd="checked=".chr(34).chr(34);
}
if ($_GET["nm"]==100) {
  $nmd="checked=".chr(34).chr(34);
}
if ($_GET["sc"]==1000) {
  $scd="checked=".chr(34).chr(34);
}
if ($_GET["fc"]==2) {
  $fcd="checked=".chr(34).chr(34);
}
if ($_GET["fu"]==20) {
  $fud="checked=".chr(34).chr(34);
}


?>

<form action="" method="get"><br />
<table border="0px">
<tr>
<td><input type="checkbox" name="uc" value="1" <?php echo $ucd ?> />Upper Case</td>
<td><input type="checkbox" name="lc" value="10" <?php echo $lcd ?> />Lower Case</td>
</tr>
<tr>
<td><input type="checkbox" name="nm" value="100" <?php echo $nmd ?> />Digits</td>
<td><input type="checkbox" name="sc" value="1000" <?php echo $scd ?> />Special Char</td>
</tr>
<tr>
<td><input type="checkbox" name="fc" value="2" <?php echo $fcd ?> />Fist letter must be alphabet</td>
</tr>
<tr>
<td><input type="checkbox" name="fu" value="20" <?php echo $fud ?> />Fist letter must be upper case</td>
</tr>
<tr>
<td><input type="text" name="pLen" onkeyup="" value="<?php echo $_GET["pLen"] ?>" /></td>
</tr>
<tr>
<td><input type="submit" /></td>
</tr>
</table>
</form>

</body>
</html>