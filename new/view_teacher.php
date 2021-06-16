<?php
 include 'lib/user.php';
 include 'inc/head.php';
   // session::checksession();

?>
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-pencil"></i> TEACHER LIST</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-faded">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-6">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button class="btn btn-primary">Search</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Latest Update</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email Address</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
                <?php
    $user=new user();
    $userdata=$user->getteacherdata();
    if ($userdata) {
      $i=0;
    foreach ($userdata as $sdata) {
      $i++;
        ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata['name'];?></td>
      <td><?php echo $sdata['username'];?></td>
      <td><?php echo $sdata['email'];?></td>
        <td><a class="btn btn-secondary" href="profile.php?id=<?php
       echo $sdata['id'];   ?>"><i class="fa fa-angle-double-right"></i> Details</a></td>
    </tr> 
    <?php     
        }
    }else{
    ?>
    <tr><td colspan="5"><h2>No User Data Found</h2></td></tr>
  <?php } ?>
    
                
               
              </tbody>
            </table>

            <nav class="ml-4">
              <ul class="pagination">
                <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include 'inc/foot.php';
  ?>