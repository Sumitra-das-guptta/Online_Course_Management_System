<?php
  include 'inc/headernew.php';

  include 'lib/user.php';
?>
<?php
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
  $usrregi = $user->courseregistration($_POST);
}

?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Save Course</h2>
    </div>
    <div class="panel-body" style="min-height: 390;">
      <div style="max-width: 600px;margin:0 auto">
        <?php
        if (isset($usrregi)) {
          echo $usrregi;
        }

        ?>
    <form action="" method="POST">
    <div class="form-group">
      <label for="coursecode">Course Code</label>
      <input type="text" id="coursecode" class="form-control" name="coursecode" placeholder="code" />
    </div>
    <div class="form-group">
      <label for="coursetitle">Course Title</label>
      <input type="text" id="coursetitle" class="form-control" name="coursetitle" placeholder="course title" />
    </div>

    <div class="form-group">
      <label for="semester">Semester</label>
      <select type="text" id="semester" class="form-control" name="semester">
          <option value="L1-T1">L1-T1</option>
          <option value="L1-T2">L1-T2</option>
          <option value="L2-T1">L2-T1</option>
          <option value="L2-T2">L2-T2</option>
          <option value="L3-T1">L3-T1</option>
          <option value="L3-T2">L3-T2</option>
          <option value="L4-T1">L4-T1</option>
          <option value="L4-T2">L4-T2</option>
        </select>
    </div>
      <div class="form-group">
      <label for="credit">Credit</label>
      <input type="text" id="credit" class="form-control" name="credit" placeholder="credit" />
    </div>



    <button type="submit" name="register" class="btn btn-success">Save</button>

    </form>

  </div>
    </div>
  <?php
     include 'inc/footer.php';

  ?>
</div>
<?php
include 'inc/footer1.php';
?>
