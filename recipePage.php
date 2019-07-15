<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="width" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>Easy Recipe Wizard
</title>
<style>
body{
font-family:arial;
}
#topDiv{
margin-top:0px;
margin-right:0px;
margin-left:0px;
background-color:black;
height:10px;
}
.text{
margin-left:1%;

font-weight:bold;
}
.button {
  background-color: #18191a;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration:none;
  position:absolute;
     top:22px;
     right:0;
  font-size: 16px;
  margin: 4px 2px;
}
.button:hover{
 background-color:#343638;
 text-decoration:none;
  color: white;
}
</style>
</head>
<body>
<div id="topDiv">
</div>
<h1 style='margin-left:1%;'>Easy Recipe Wizard 
</h1>
<!--<div class='c'><h2><a href="index.html" class="button">Home</a></h2></div>-->
<hr style="color:black">
</body>
</html>

<?php

//To link the login page
$name = $_POST["list"];
//echo "qqq";
//echo $name;
//echo "<br>";
//$j and $i used as index values
//$a is the array with value in the single line in the file.

//$name ="|chicken|tomato|onion|";
$name = str_replace("||","|",$name);
//echo "<br>";
//echo $name; 
$name = substr($name,1);
//echo $name; 
//echo "<br>";

$items = explode("|",$name); 
//echo $items[0];
//echo $items[1];
//echo $items[2];
$len = sizeof($items);
$j=0;
$k=0;
echo "<h1 class='text' style='letter-spacing:2px'>Preferred Recipes</h1>";
echo "<br>";

//For Most prefered case
$Myfile = fopen("recipe.csv","r");
$i=0;
$l=0;
while(!feof($Myfile)){
$a=fgets($Myfile);
$a=explode("|",$a);
if((strpos($a[2],$items[0])>0)&&(strpos($a[2],$items[1])>0)&&(strpos($a[2],$items[2])>0)){
   $d[$i]=$a[0];
   $i++;
 }
}
fclose($Myfile);

//For second preferred case
$Myfile = fopen("recipe.csv","r");
$l=0;

while(!feof($Myfile)){
$flag=0;
$a=fgets($Myfile);
$a=explode("|",$a);
if(((strpos($a[2],$items[0])>0)&&(strpos($a[2],$items[1])>0))||((strpos($a[2],$items[0])>0)&&(strpos($a[2],$items[2])>0))){
   for($m=0;$m<=$i;$m++){
     if($a[0]==$d[$m]){
       $flag =1;
	 }
   }
   if($flag==0){
   $e[$l]=$a[0];
       $l++;
   }
 }
}
fclose($Myfile);
$q =0;
//For Displaying most preferred and Prefered recipes
$Myfile = fopen("recipe.csv","r");
while(!feof($Myfile)){
$a=fgets($Myfile);
$a=explode("|",$a);

for($j=0;$j<$i;$j++){
 $MostPreferred=$d[$j];
 
 if($a[0]==$MostPreferred){
   echo "<br>";
   echo "<div class='text'><h2 style='margin-left:2%;'>";
   $q=$q+1;
   echo $q;
   echo ") ";
   echo $a[1];
   echo "</h2></div>";
   echo "<br>";
   print "<center> <img src=$a[5] width='30%' height='30%' class='img-thumbnail'> </center>";
   echo "<div class='text'><h3 style='margin-left:7%;'>";
   echo "Ingredients";
   echo "</h3></div>";
   echo "<br>";
   echo "<div class='container'>";
   echo $a[3];
   echo "</div>";
   echo "<br>";
   echo "<br>";
   echo "<div class='text'><h3 style='margin-left:7%;'>";
   echo "Recipe";
   echo "</h3></div>";
   echo "<br>";
   echo "<div class='container'>";
   echo $a[4];
   echo "</div>";
 }
}

for($j=0;$j<$l;$j++){
 $Preferred=$e[$j];
  if($a[0]==$Preferred){
   echo "<br>";
   echo "<div class='text'><h2 style='margin-left:2%;'>";
   $q=$q+1;
   echo $q;
   echo ") ";
   echo $a[1];
   echo "</h2></div>";
   echo "<br>";
   print "<center><img src=$a[5] width='30%' height='30%' class='img-thumbnail'></center>";
   echo "<div class='text'><h3 style='margin-left:7%;'>";
   echo "Ingredients";
   echo "</h3></div>";
   echo "<br>";
   echo "<div class='container'>";
   echo $a[3];
   echo "</div>";
   echo "<br>";
   echo "<br>";
   echo "<div class='text'><h3 style='margin-left:7%;'>";
   echo "Recipe";
   echo "</h3></div>";
   echo "<br>";
   echo "<div class='container'>";
   echo $a[4];
   echo "</div>";
}
}

}
echo "<br>";
echo "<br>";
?>