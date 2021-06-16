<?php
 include 'lib/user.php';
 include 'inc/headernew.php';
    session::checksession();
$usertype=session::get("usertype");
$usersemi=session::get("semester");
$userassign=session::get("name");
?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>VIEW ALL COURSES</h3>
    </div>
    <div class="panel-body" style="min-height: 390;">
    <table class="table table-striped" method="POST">
      <tr>
      <th width="20%">Course Code</th>
      <th width="20%">Course Name/Title</th>
      <th width="20%">Semester</th>
      <th width="20%">Credit</th>
      <th width="20%">Assign To</th>
    </tr>
    
    <?php
    $user=new user();
    $userdata=$user->getcoursedata();
    if ($userdata) {
      $i=0;

    foreach ($userdata as $sdata) {
      $i++;
        $ta=$sdata['assignto'];
       $ts =$sdata['semester'];?>
    
      <?php
      if($usertype=="admin" || ($usertype=="student" && $usersemi==$sdata['semester']) || ($usertype=="teacher" && $userassign== $ta)){ ?>
        <tr>
      <td><?php echo $sdata['coursecode'];?></td>
      <td><?php echo $sdata['coursetitle'];?></td>
      <td><?php echo $ts;?></td>
      <td><?php echo $sdata['credit'];?></td>
      <td><?php echo $ta ;?></td>
  </tr>
   <?php } ?>
  
    
    <?php     
        }
    }else{
    ?>
    <tr><td colspan="5"><h2>No User Data Found</h2></td></tr>
  <?php } ?>
    
    </table>  
    </div>
  <?php
     include 'inc/footer.php';

  ?>
</div>
<?php
include 'inc/footer1.php';
?>