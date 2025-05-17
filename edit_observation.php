

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Observation - Foundation World School</title>

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
              <li class="breadcrumb-item active">Edit Observation</li>
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
          <h1 class="card-title" style=""><b class="alert-info" > &nbsp; Edit Observation Toolset &nbsp; </b></h1>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
              
          </div>
        </div>
        <div class="card-body">

<!--here will be form body-->

              <form method="post">
                  
            <div class="container">
                <div class="row">
                    
                    <div class="form-group col-md-12">
                      <label for="observation_title">Title of the Observation</label>
                      <input type="text" class="form-control" id="observation_title" name="observation_title" required placeholder="Write title of observation here">
                    </div>

                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea class="form-control" id="observation_description" name="observation_description" required placeholder="Write title of observation here"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <br>
                        <button type="submit" id="create_observation_submit" name="create_observation_submit" class="btn btn-primary">Save Changes</button>
                        <a href="javascript:cancel()" class="btn btn-danger  " name="btn_cancel">Cancel</a>
                            <script type="text/javascript">
                                function cancel()
                                {
                                    window.location.href='view_observation_toolset.php';
                                }
                            </script>
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
    // Summernote
    $('#observation_description').summernote()
    
  })
</script>

</body>
</html>
