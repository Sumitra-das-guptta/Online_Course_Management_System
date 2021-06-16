
<?php
 include 'lib/user.php';
 include 'inc/headernew.php';
//    session::checksession();

?>
<?php
$loginmsg = session::get("loginmsg");
if (isset($loginmsg)) {
  echo $loginmsg;
}
session::set("loginmsg",NULL);
?>

<div class="panel panel-default">
    <div class="panel-heading">
      <h2><strong> Welcome !</strong> <span>
      <?php
      $name=session::get("name");
      $usertype=session::get("usertype");
      if (isset($name)) {
      echo $name;
      }

      ?>  






      </span></h2>
    </div>


 <center> 
<div style =" height:50%;width: 90%;margin:10px;padding:50px;">
 <h2>Welome To Online Course Management System for CUET,CSE Department</h2>

</div></center>
</div>
<?php
include 'inc/footer1.php';
?>