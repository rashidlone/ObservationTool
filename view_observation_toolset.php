

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Observation - Foundation World School</title>

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
              <li class="breadcrumb-item active">View Observation</li>
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
          <h1 class="card-title" style=""><b style="font-size:30px;"> &nbsp; View Observation Toolset &nbsp; </b></h1>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
              
          </div>
        </div>
        <div class="card-body">

<!--here will be form body-->


                  
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                <table id="view_observation_table" class="table table-bordered table-striped " style="width:100%;">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                  <tr>
                      
                    <td>1</td>
                    
                    <td>
                        Observation 1
                        
                        <br>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#view_question_modal">View Questions</a><hr>
<!-- Modal -->
<div class="modal fade" id="view_question_modal" tabindex="-1" role="dialog" aria-labelledby="view_question_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" style="max-height: 90vh; margin: auto;">
    <div class="modal-content" style="height: 90vh;">
      <div class="modal-header">
        <h5 class="modal-title" id="view_Description_ModalLabel">Questions of this Toolset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: auto;">
        
<!--Here will be the description-->
          
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>                        
                    </td>
                    
                    <td>

                        
<a class="btn btn-success" data-toggle="modal" data-target="#view_Description_Modal">View Description</a>

<!-- Modal -->
<div class="modal fade" id="view_Description_Modal" tabindex="-1" role="dialog" aria-labelledby="view_Description_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" style="max-height: 90vh; margin: auto;">
    <div class="modal-content" style="height: 90vh;">
      <div class="modal-header">
        <h5 class="modal-title" id="view_Description_ModalLabel">View Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: auto;">
        
<!--Here will be the description-->
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



                        
                    </td>
                    
                    <td>
                        <a class="btn btn-outline-primary" href="javascript:edit_observation_toolset('id')"> Edit</a>
                        <a class="btn btn-outline-danger" href="javascript:delete_observation_toolset('id')">Delete</a>
                    </td>
                    
                  </tr>
                  
                  
                  </tbody>
                  
                </table>                    
                    </div>
                </div>
            </div>
                      

                  




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

<!--<script>
  $(function () {
    $("#view_observation_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#view_observation_table_wrapper .col-md-6:eq(0)');
  });
</script>-->

<script>
  $(function () {
    $("#view_observation_table").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "dom": '<"top"f>rt<"bottom"lip><"clear">' // This controls the layout (f = filtering input)
    });
  });
</script>

            <script type="text/javascript">
                function edit_observation_toolset(id)
                {                    
                    Swal.fire({
                        title: 'Are you sure you want to edit?',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Edit'
                      }).then((result) => {
                        if (result.isConfirmed) 
                        {      
                            $.ajax({          
                                type: "GET",
                                url: "edit_observation_toolset.php",
                                data:'id='+id,               
                                success: function(data){
                                    window.location.href='edit_observation_toolset.php?id='+id;
                                }
                            });        
                        }
                      });
                }                                    
                 
                function delete_observation_toolset(id)
                {
                    Swal.fire({
                        title: 'Are you sure you want to delete this?',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, Delete'
                      }).then((result) => {
                        if (result.isConfirmed) 
                        {      
                            $.ajax({          
                                type: "POST",
                                url: "delete_observation_toolset.php",
                                data:'id='+id,               
                                success: function(data){
                                Swal.fire(
                                    'Deleted Successfully!',
                                    '',
                                    'success');
                                window.setTimeout(function(){ 
                                    location.reload();
                                } ,2000);
                                }
                            });        
                        }
                      });
                }         
                
                 
                
                
            </script>


</body>
</html>
