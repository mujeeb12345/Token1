<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include('config.php');

$int=intval($_GET['id']);
$sql=mysql_query("SELECT `id` FROM `BotLike` WHERE `id`='$int' ");
$row=mysql_fetch_assoc($sql);
$post = mysql_fetch_array(mysql_query("select * from `BotLike` WHERE  `id` = '$int' LIMIT 0,1"));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `BotLike`"), 0);
$res = mysql_query("SELECT * FROM `BotLike` LIMIT $tong");
while ($post = mysql_fetch_array($res)){
$result = mysql_query("SELECT * FROM BotLike ORDER BY RAND() LIMIT 0,1");
if($result){
while($row = mysql_fetch_array($result))
  {
$name_token = $row[name];	  
$token= $post['access_token'];
//**Like**//
$stat = json_decode(auto('https://graph.facebook.com/me/home?fields=id&access_token='.$token.'&offset=0&limit=5'),true);
for($i=1;$i<=count($stat[data]);$i++){
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/likes?access_token='.$token.'&method=post');
}
//**LikeEnd**//
echo ' OK! '.$name_token.'</br> ';
}}}
function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER,1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>