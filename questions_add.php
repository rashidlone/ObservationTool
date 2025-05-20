



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Questions for Toolset - Foundation World School</title>

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
              <li class="breadcrumb-item active">Add Questions for Toolset </li>
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
          <h1 class="card-title" style=""><b style="font-size:30px;"> &nbsp; Add Questions for Toolset  &nbsp; </b></h1>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
              
          </div>
        </div>
        <div class="card-body">

<!--here will be form body-->
              <form method="post" id="create_questions_form">
                  
            <div class="container">
                <div class="row">
                    
                    <div class="form-group col-md-4">
                      <label for="select_observation_toolset">Select Observation Toolset</label>
                      <select class="form-control text-truncate" id="select_observation_toolset" name="select_observation_toolset" required >
                          <option value="">Select Observation Toolset</option>
                          <option value="value1" > Title 1</option>
                          <option value="value2">Title 2</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="position">Position (Enter Number for ordering)</label>
                      <input class="form-control" type="number" id="position" name="position" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>                      
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="type_of_question">Type of the Question</label>
                      <select class="form-control text-truncate" id="type_of_question" name="type_of_question" required >
                          <option value="">Type of the Question</option>
                          <option value="short_text">Short Text</option>
                          <option value="paragraph">Paragraph</option>
                          <option value="numberic">Numeric</option>
                          <option value="date_type">Date</option>
                          <option value="dropdown_list">Dropdown List</option>
                          <option value="radiobutton_list">Radio Button List</option>
                          <option value="checkbox_list">Check Box List</option>
                          <option value="file_upload">File Upload</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-md-12" id="question_div" style="display:none;">
                      <label for="question">Question?</label>
                      <input class="form-control" type="text" id="question" name="question" required>     
                    </div>
                    
                    <div class="form-group col-md-12" id="file_upload_div" style="display:none;">
                      <label for="question">Type of the file to be uploaded?</label>
                      <select class="form-control text-truncate" id="type_of_file" name="type_of_file" required >
                          <option value="">Type of the file to be uploaded?</option>
                          <option value="pdf">PDF</option>
                          <option value="word">Word</option>
                          <option value="image">Image</option>
                          <option value="other">Other</option>
                      </select>     
                    </div>
                    
                    <div class="form-group col-md-12" id="options_div" style="display:none;">
                      <label for="question">Add Options of the Question</label>
  <button type="button" id="add_option_btn" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Add Option
  </button>
  
  <div id="options_container" >
    <!-- Options will be added here dynamically -->
  </div>         
                      
                    </div>

                    <div class="form-group col-md-12">
                        <br>
                        <button type="submit" id="questions_create_submit" name="questions_create_submit" class="btn btn-primary">Create Question</button>
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
  
  $('#create_questions_form').validate({
    rules: {
      select_observation_toolset: {
        required: true,
      },
      observation_description: {
        required: true,
      },
      type_of_question: {
        required: true,
      },
      position: {
          required: !0,
          number: !0,
      },
      question: {
          required: true,
      },
      type_of_file :{
          required: true,
      },
    },
    messages: {
      select_observation_toolset: {
        required: "Select from the list",
      },
      observation_description: {
        required: "Description is mandatory",
      },
      type_of_question: {
        required: "Select Type of the Question from the list",
      },
      position: {
          required: "Enter Number for ordering",
          number: "Enter Valid Number",
      },
      question: {
          required: "Enter Question",
      },
      type_of_file :{
          required: "Select the file type from the list",
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
   

<script>
$(document).ready(function() {
  $('#type_of_question').change(function() {
    const selectedValue = $(this).val();
    
    // Always hide both divs first
    $('#question_div').hide();
    $('#file_upload_div').hide();   
    $('#options_div').hide();
    
    // If any question type is selected (not empty)
    if (selectedValue !== '') {
      $('#question_div').show();
      
      // If specifically file_upload is selected
      if (selectedValue === 'file_upload') {
        $('#file_upload_div').show();
      }
      
      if (selectedValue === 'dropdown_list' || selectedValue === 'radiobutton_list' || selectedValue === 'checkbox_list' ) {
        $('#options_div').show();
      }
      
    }
  });
});
</script>


<!-- Include required libraries -->



<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->


<script>
$(document).ready(function() {
  let optionCounter = 1;
  
  // Show/hide options div based on question type
  $('#type_of_question').change(function() {
    const selectedValue = $(this).val();
    const showOptions = ['dropdown_list', 'radiobutton_list', 'checkbox_list'].includes(selectedValue);
    $('#options_div').toggle(showOptions);
    
    // Clear existing options when changing question type
    if (!showOptions) {
      $('#options_container').empty();
      optionCounter = 1;
    }
  });
  
  // Add new option
  $('#add_option_btn').click(function() {
    const newOption = `
      <div class="option-item form-group row align-items-center mb-2" data-option-id="${optionCounter}">
        <div class="col-md-9">
          <input type="text" class="form-control" name="option_${optionCounter}" 
                 placeholder="Option ${optionCounter}" required>
        </div>
        <div class="col-md-3 text-right">
          <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-success move-up" title="Move up">
              <i class="fas fa-arrow-up"></i>
            </button>
            <button type="button" class="btn btn-info move-down" title="Move down">
              <i class="fas fa-arrow-down"></i>
            </button>
            <button type="button" class="btn btn-danger remove-option" title="Remove">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    `;
    
    $('#options_container').append(newOption);
    optionCounter++;
  });
  
  // Remove option
  $(document).on('click', '.remove-option', function() {
    $(this).closest('.option-item').remove();
    renumberOptions();
  });
  
  // Move option up
  $(document).on('click', '.move-up', function() {
    const $item = $(this).closest('.option-item');
    const $prev = $item.prev('.option-item');
    
    if ($prev.length) {
      $item.insertBefore($prev);
      renumberOptions();
    }
  });
  
  // Move option down
  $(document).on('click', '.move-down', function() {
    const $item = $(this).closest('.option-item');
    const $next = $item.next('.option-item');
    
    if ($next.length) {
      $item.insertAfter($next);
      renumberOptions();
    }
  });
  
  // Renumber options after sorting or deletion
  function renumberOptions() {
    $('#options_container .option-item').each(function(index) {
      const newNumber = index + 1;
      $(this).attr('data-option-id', newNumber);
      $(this).find('input').attr({
        'placeholder': `Option ${newNumber}`,
        'name': `option_${newNumber}`
      });
    });
    optionCounter = $('#options_container .option-item').length + 1;
  }
});
</script>

<style>
.option-item {
  background: #f8f9fa;
  padding: 10px;
  border-radius: 4px;
  border: 1px solid #dee2e6;
  margin-bottom: 5px;
}
.btn-group-sm .btn {
  padding: 0.25rem 0.5rem;
  font-size: 0.75rem;
}
/* Custom colors for buttons */
.btn-success.move-up {
  background-color: #28a745; /* Green for up */
  color: white;
  border-color: #28a745;
}
.btn-info.move-down {
  background-color: #17a2b8; /* Blue for down */
  color: white;
  border-color: #17a2b8;
}
.btn-danger.remove-option {
  background-color: #dc3545; /* Red for delete */
  color: white;
  border-color: #dc3545;
}
/* Hover effects */
.btn-success.move-up:hover {
  background-color: #218838;
  border-color: #1e7e34;
}
.btn-info.move-down:hover {
  background-color: #138496;
  border-color: #117a8b;
}
.btn-danger.remove-option:hover {
  background-color: #c82333;
  border-color: #bd2130;
}
</style>


</body>
</html>
