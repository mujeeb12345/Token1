<div class="panel-heading"><i class="glyphicon glyphicon-ok-sign"></i> <b>BOT PANEL</b></div>
<?php
$iduser=$_SESSION['id'];
$dem = mysql_result(mysql_query("select count(*) from `BotLike` where `user_id`='$iduser' "),0);
if($dem == 1){
 ?>
                            <div class="panel-body">

<span class="text-default"><b><?php echo $_SESSION['name']?></b>  account has successfully enabled BOT on the system, please update regularly for BOT to work well.</span>


                            </div>
                            <div class="panel-footer">
                                <a href="../tatbot.php?access_token=<?php echo $_SESSION['access_token'];?>" class="btn btn-warning "> <i class="glyphicon glyphicon-off"></i>Turn Off</a>
                                <a href="#" data-toggle="modal" data-target="#bat" class="btn btn-success"> <i class="glyphicon glyphicon-arrow-up"></i> Update </a>
                                <a href="../logout.php" class="btn btn-danger"> <i class="glyphicon glyphicon-user"></i> Exit</a>
                            </div>
  <?php
} else {?>
                            <div class="panel-body">

<span class="text-default"><b><?php echo $_SESSION['name']?></b> Account have not installed on the system BOT.</span>


                            </div>
                            <div class="panel-footer">
                                <a href="#" data-toggle="modal" data-target="#bat" class="btn btn-success"><i class="glyphicon glyphicon-off"></i> Enable Bot</a>

                                <a href="../logout.php" class="btn btn-danger"> <i class="glyphicon glyphicon-user"></i> Quit</a>
                            </div>
<?php
}?>