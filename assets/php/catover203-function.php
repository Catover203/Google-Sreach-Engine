<?php
$ver = "1.0.2";
$catdb_ver = "1.0.5";
echo '<p style="font-size:120%; text-align:left; background-color:gray; color:white">Included Catover203-Function v'.$ver.' with catdb(database) v'.$catdb_ver.'</p>';
$query_command = '
<br>
<p>catdb_fetch_assoc($query) : like mysqli_fet_assoc</p>
<p>catdb_connect ($host, $username, $password, $database[if needed]) : connect to your sql database</p>
<p>catdb_query($connect, $sql_command) : query to your sql database, it like mysqli_query</p>
<p>string_check($text, $contain) : check the string contain values</p>';
function catdb_connect($host, $username, $password, $database){
if(isset($database)){
$connect = mysqli_connect($host, $username, $password, $database);
}
if(!isset($database)){
$connect = mysqli_connect($host, $username, $password);
}
return $connect;
}
function catdb_query($connect, $sql){
$query = mysqli_query($connect, $sql);
return $query;
}
function catdb_info(){
$infoversion = $ver;
$infoquery = 'mysql and mysqli';
$infosql_connect = "using catdb_connect('HOST', 'USERNAME', 'PASSWORD', 'DATABASE') 'DATABASE' can empty for only connect to sql";
$infodoquery = 'the query can do like mysqli_query but i use catdb_query';
$infofinal = 
'<p>Version: <a style="color:blue">'.$infoversion.'</a></p>
<br>
<p>Connect type: '.$infosql_connect.'</p>
<br>
<p>query: '.$infodoquery.'</p>
<br>
<br>
<br>
<br>
<p>Query command:</p>'.$query_command;
return  $infofinal;
}
function catdb_fetch_assoc($query){
$query_fetch = mysqli_fetch_assoc($query);
return $query_fetch;
}
function catdb_version(){
$catdb_version = $catdb_ver;
return $catdb_version;
}
function catover203_function_version(){
$version = $ver;
return $version;
}
function convertDate($datetime, $full = false) {
$now = new DateTime;
$ago = new DateTime($datetime);
$diff = $now->diff($ago);
$diff->w = floor($diff->d / 7);
$diff->d -= $diff->w * 7;
$string = array('y' => 'year','m' => 'month','w' => 'week','d' => 'day','h' => 'hour','i' => 'minute','s' => 'second');
foreach ($string as $k => &$v) {
if ($diff->$k) {
$v = $diff->$k.' '.$v.($diff->$k > 1 ? 's' : '');
}else{
unset($string[$k]);
}
}
if (!$full) $string = array_slice($string, 0, 1);
return $string ? implode(', ', $string) : 'just now';
}
function string_check($string, $contain){
$result = strstr($string, $contain);
if ($result){
return true;
}else{
return false;
}
}
function equal_check($value1, $value2){
if($value1 === $value2){
return true;
}else{
return false;
}
}
?>