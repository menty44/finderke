<?php
$host="localhost"; //replace with database hostname
$username="root"; //replace with database username
$password="root"; //replace with database password
$db_name="document_finder"; //replace with database name
 
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "select * from lost_titledeed";
$result = mysql_query($sql);
$json = array();
 
if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
$json['lost_titledeed'][]=$row;
}
}
mysql_close($con);
echo json_encode($json);
?> 
