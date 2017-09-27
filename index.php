<?php
session_start();
error_reporting(0);
include('config.php');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Wanted Kashan Like Bot</title>
	<meta charset="utf-8">
	<meta http-equiv="cache-control" content="public" />
	<meta http-equiv="pragma" content="public" />
	<meta property="og:description" name="description" content="Hệ thống BOT Facebook miễn phí, KHÔNG SPAM!">
	<link rel="shortcut icon" href="https://www.facebook.com/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<!-- Facebook -->
	<meta property="og:title" content="BOT LIKE FACEBOOK 2016" />
	<meta property="og:url" content="http://nghĩa9x.vn/" />
	<meta property="og:image" content="./css/thumb.jpg" />
	<meta property="og:description" name="description" content="Hệ thống BOT Facebook miễn phí, KHÔNG SPAM!">
	<meta property="og:site_name" content="NGHĨA9X.VN"> </head>

<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<ul class="nav nav-pills">
				<li class="active" data-toggle="tooltip" data-placement="bottom" title="Trang chủ"><a aria-expanded="true" href="#home" data-toggle="tab">Home</a>
				</li>
				<li class="" data-toggle="tooltip" data-placement="bottom" title="Account Detail"><a aria-expanded="false" href="#profile" data-toggle="tab">Profile</a>
				</li>
				<li class="dropdown"> <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">
      Menu <span class="caret"></span>
    </a>
					<ul class="dropdown-menu">
						<li><a href="#" data-toggle="modal" data-target="#gioithieu" title="Introduce">Introduce</a>
						</li>
						<li><a href="#" data-toggle="modal" data-target="#huongdan" title="Guide">Guide</a>
						</li>
						<!--<li class="divider"></li>-->
					</ul>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container">
		<div class="alert alert-danger"> <strong><i class="glyphicon glyphicon-send"></i></strong> Bot Like & Ex Like <b>Wantedkashan.tk</b></div>
	</div>
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade active in" id="home">
			<div class="container">
				<div class="panel panel-default">
				<?php if(($_SESSION['id'])){
include 'menu.php';
}else{
print'<div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <b>Login</b></div>
<div class="panel-body">
<form method="post" action="login.php">
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" name="access_token" class="form-control" placeholder="https://www.facebook.com/token/#access_token=CAAAAPJmB8ZBwBAOvUYsAMT9ZAmj223CjirdRDqZAUVR0uvGV0PeYj4sUiCWL8lzq43AfS3CctwaJjw5x7ZAVq8NB22p&expires_in=0">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit" title="Đăng nhập"><i class="glyphicon glyphicon-ok-sign"></i></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</form>
</div>
<div class="panel-footer">
Click <a href="http://token-ios.ml" target="_blank"><button type="button" class="btn btn-success btn-xs">Here</button></a> To get Access Token log.<br> 
Click <a href="http://tinyium.com/T0g" target="_blank"><button type="button" class="btn btn-success btn-xs">Here</button></a> To see My blog. <br>
Click <a href="http://adf.ly/1mEQty" target="_blank"><button type="button" class="btn btn-success btn-xs">Here</button></a> To Download Script. 
</div>';}?>
</div>
			</div>
		</div>
		<div class="tab-pane fade" id="profile">
			<div class="container">
				<div class="well well-sm">
<?php if(($_SESSION['id'])) {
print '<center><img src="https://graph.facebook.com/'.$_SESSION['id'].'/picture" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"><p><strong>'.$_SESSION['name'].'</strong></p></center>
<ul class="list-group">
  <li class="list-group-item">
    <span class="badge">'.$_SESSION['email'].'</span>
    Email
  </li>
  <li class="list-group-item">
    <span class="badge">'.$_SESSION['birthday'].'</span>
    Date Of Birth
  </li>
  <li class="list-group-item">
    <span class="badge">'.$_SESSION['id'].'</span>
    Profile ID
  </li></ul>';
}else{
print'Please log in to the system';}?>
</div></div></div>

</div>


<div class="container">
<div class="panel panel-default">
 <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <b>Active Users</b>
                            </div>
                            <div class="panel-body">
<div class="row">
<?php 
  $tb= mysql_query("SELECT * FROM Likers ORDER BY id DESC LIMIT 6");
        while($row = mysql_fetch_assoc($tb))
        {

?>
  <div class="col-xs-6 col-md-2">
    <a href="https://www.facebook.com/profile.php?id=<?php echo $row['user_id']; ?>" target="_blank" class="thumbnail">
      <img src="https://graph.facebook.com/<?php echo $row['user_id']; ?>/picture?width=70&height=70" alt="<?php echo $row['name'];?>" title="<?php echo $row['name'];?>">
    </a>
</div>
 <?php }?> 

</div>




                            </div>
                            <div class="panel-footer">
<?php
$babi = mysql_query ("SELECT name, COUNT(name) FROM Likers");
$rober = mysql_fetch_array($babi);
$rec=$rober['COUNT(name)']; 
?>
<center>Currently there are <span class="label label-default"><?php echo $rec; ?></span> user using our system!</center>
                            </div>
                        </div>

</div>
</div>


<div class="footer-copyright">
        <div class="container">
        <center>© 2017<center>
            <center>Made By Wanted Kashan<center>
        </div>
      </div>
	  
<?php if(($_SESSION['id'])) {
print '<!-- Modal -->
<div class="modal fade" id="bat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bot Menu</h4>
      </div>
      <div class="modal-body">
<form method="post" action="botLike.php?access_token='.$_SESSION['access_token'].'">

<div class="checkbox">
  <label><input type="checkbox" name="ex" value="1" checked>Enable Like Bot</label>
</div>
<div class="checkbox">
<label><input type="checkbox" name="like" value="1" checked>Enable Like Bot</label>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" class="btn btn-primary">Active Bot</button>
</form>
      </div>
    </div>
  </div>
</div>';
}else{
print'<!-- Modal -->';}?>


<!-- Modal -->
<div class="modal fade" id="huongdan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Referral system</h4>
      </div>
      <div class="modal-body">
<p>
Note: You should be over 18 years old, if not please <a href="https://www.facebook.com/me/about?section=contact-info&pnref=about" target="_blank" class="text-warning"> <b>Change The Birth</b></a> of over 18 years. Otherwise would not enabled by gender</p> 
<p>
First, you click on <a href="https://www.facebook.com/settings?tab=followers" target="_blank"  class="text-warning"><b>it</b></a> to change the settings by gender. In part: "<b> Who can keep track of me</b>" you select and edit the<span class="label label-warning"><i class="glyphicon glyphicon-globe"></i> Everybody</span></p><p>
		Next part: "<b>Comment of followers</b>" you choose and edit a:  <span class="label label-warning"> <i class="glyphicon glyphicon-globe"></i> Everybody </span>
</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="gioithieu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Referral system</h4>
      </div>
      <div class="modal-body">
<p><b>Megakhan.beget.tech</b> is a system that combines BOT and AUTO Facebook accounts. 
<br/>
The system will help you automatically like, comment the status of your friends when you are not online or increase the number of like for your status, most of the operations are automated to the maximum! You do not need to do anything!

</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Xác nhận</button>-->
      </div>
    </div>
  </div>
</div>
<?php 
switch ($_GET['info']) {
case '1': include('./modal/1.php');
break;
case '2': include('./modal/2.php');
break;
case '3': include('./modal/3.php');
break;
} ;?>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>
