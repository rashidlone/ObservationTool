

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password - Foundation World School</title>

  <?php include 'css.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
<!--  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->

<?php
    include 'navbar.php';
    include 'sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h1 class="card-title" style=""><b style="font-size:30px;"> &nbsp; Change Password &nbsp; </b></h1>

          <div class="card-tools">
              
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
              
          </div>
            
        </div>
        <div class="card-body">

<!--here will be form body-->

              <form method="post" id="change_password_form">
                  
            <div class="container">
                <div class="row">
                    
                    <div class="form-group col-md-4">
                      <label for="current_password">Current Password</label>
                      <input type="password" class="form-control" id="current_password" name="current_password" required placeholder="Current Password?">
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="new_password">New Password</label>
                      <input type="password" class="form-control" id="new_password" name="new_password" required placeholder="New Password?">
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="confirm_new_password">Confirm New Password</label>
                      <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required placeholder="Confirm New Password?">
                    </div>

                    <div class="form-group col-md-4">
                        <br>
                        <button type="submit" id="current_password_submit" name="current_password_submit" class="btn btn-primary">Change Password</button>
                    </div>                          
                </div>
            </div>
                      

                  

              </form>


        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php
    include 'footer.php';
?>  

</div>
<!-- ./wrapper -->

<?php
    include 'js.php';
?>

<script>
$(function () {
  
  $('#change_password_form').validate({
    rules: {
      current_password: {
        required: true,
      },
      new_password: {
        required: true,
      },
      confirm_new_password: {
        required: true,
        equalTo: "#new_password",
      },
    },
    messages: {
      current_password: {
        required: "Current Password Needed",
      },
      new_password: {
        required: "Enter New Password",
      },
      confirm_new_password: {
        required: "Confirm New Password",
        equalTo: "New Password & Confirm Password must match",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

</body>
</html>
