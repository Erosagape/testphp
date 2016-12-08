<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "pk", "4780", "pk");
$conn->query("SET NAMES UTF8");
$result = $conn->query("SELECT userid, username, userpassword FROM webuser");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Name":"'. $rs["username"].'",';
    $outp .= '"ID":"'. $rs["userid"]. '",';
    $outp .= '"Password":"'. $rs["userpassword"]. '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>