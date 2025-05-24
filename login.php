<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Observation Software - Foundation World School</title>

  <?php include 'css.php'; ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="assets/images/fws_logo.png" style="height:100px;"/>
      <a class="h3"><b>Observation </b>Software</a>
    </div>
    <div class="card-body">
      <!-- Space Error Alert (initially hidden) -->
      <div id="spaceErrorAlert" class="alert alert-danger alert-dismissible fade show" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Error!</strong> Spaces are not allowed in email or password fields.
      </div>

      <p class="login-box-msg">Login to continue</p>

      <form action="#" method="post" id="login_form">
        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="" data-toggle="modal" data-target="#forgot_password_modal">I forgot my password</a>
        
        <!-- Password Reset Modal -->
        <div class="modal fade" id="forgot_password_modal" tabindex="-1" role="dialog" aria-labelledby="forgot_password_modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="forgot_password_modalLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Space Error Alert for Reset Form (initially hidden) -->
                <div id="resetSpaceErrorAlert" class="alert alert-danger alert-dismissible fade show" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>Error!</strong> Spaces are not allowed in email field.
                </div>
                
                <form id="passwordResetForm">
                  <div class="input-group mb-3">
                    <input type="email" id="resetEmail" name="resetEmail" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="sendResetLink">Send Reset Link</button>
              </div>
            </div>
          </div>
        </div>               
        
      </p>
      
      <p class="mb-0" style="display:none;">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<script>
$(function () {
  // Function to show space error alert
  function showSpaceError(alertId) {
    $('#' + alertId).fadeIn();
    // Auto-hide after 5 seconds
    setTimeout(function() {
      $('#' + alertId).fadeOut();
    }, 5000);
  }

  // Prevent spaces in email and password fields (login form)
  $('#email, #password').on('keypress', function(e) {
    if (e.which === 32) { // Space key
      e.preventDefault();
      showSpaceError('spaceErrorAlert');
      return false;
    }
  });
  
  // Prevent spaces in reset email field
  $('#resetEmail').on('keypress', function(e) {
    if (e.which === 32) { // Space key
      e.preventDefault();
      showSpaceError('resetSpaceErrorAlert');
      return false;
    }
  });
  
  // Prevent pasting content with spaces (login form)
  $('#email, #password').on('paste', function(e) {
    var pastedText = undefined;
    if (window.clipboardData && window.clipboardData.getData) { // IE
      pastedText = window.clipboardData.getData('Text');
    } else if (e.originalEvent.clipboardData && e.originalEvent.clipboardData.getData) {
      pastedText = e.originalEvent.clipboardData.getData('text/plain');
    }
    
    if (pastedText && pastedText.indexOf(' ') !== -1) {
      e.preventDefault();
      showSpaceError('spaceErrorAlert');
      return false;
    }
  });
  
  // Prevent pasting content with spaces (reset form)
  $('#resetEmail').on('paste', function(e) {
    var pastedText = undefined;
    if (window.clipboardData && window.clipboardData.getData) { // IE
      pastedText = window.clipboardData.getData('Text');
    } else if (e.originalEvent.clipboardData && e.originalEvent.clipboardData.getData) {
      pastedText = e.originalEvent.clipboardData.getData('text/plain');
    }
    
    if (pastedText && pastedText.indexOf(' ') !== -1) {
      e.preventDefault();
      showSpaceError('resetSpaceErrorAlert');
      return false;
    }
  });
  
  // Validate login form
  $('#login_form').validate({
    rules: {
      email: {
        required: true,
        email: true,
        noSpace: true
      },
      password: {
        required: true,
        minlength: 5,
        noSpace: true
      },
    },
    messages: {
      email: {
        required: "Please enter email address",
        email: "Please enter a valid email address",
        noSpace: "Spaces are not allowed in email"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
        noSpace: "Spaces are not allowed in password"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
  
  // Handle password reset form submission
  $('#sendResetLink').click(function() {
    var email = $('#resetEmail').val();
    
    // Validate email
    if (!email) {
      $('#resetEmail').addClass('is-invalid');
      $('#resetEmail').closest('.input-group').append('<span class="invalid-feedback">Please enter email address</span>');
      return;
    }
    
    // Check for spaces
    if (email.indexOf(' ') >= 0) {
      showSpaceError('resetSpaceErrorAlert');
      $('#resetEmail').addClass('is-invalid');
      $('#resetEmail').closest('.input-group').find('.invalid-feedback').remove();
      $('#resetEmail').closest('.input-group').append('<span class="invalid-feedback">Spaces are not allowed in email</span>');
      return;
    }
    
    // Check email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      $('#resetEmail').addClass('is-invalid');
      $('#resetEmail').closest('.input-group').find('.invalid-feedback').remove();
      $('#resetEmail').closest('.input-group').append('<span class="invalid-feedback">Please enter a valid email address</span>');
      return;
    }
    
    // If validation passes
    $('#resetEmail').removeClass('is-invalid');
    $('#resetEmail').closest('.input-group').find('.invalid-feedback').remove();
    
    // Here you would typically make an AJAX call to your backend
    // For now, we'll just show a success message
    $('#passwordResetForm')[0].reset();
    $('#forgot_password_modal').modal('hide');
    
    // Show success message
    Swal.fire({
      icon: 'success',
      title: 'Reset Link Sent',
      text: 'Password reset link has been sent to ' + email,
      confirmButtonColor: '#3085d6',
    });
  });
  
  // Reset validation when modal is shown
  $('#forgot_password_modal').on('show.bs.modal', function () {
    $('#resetEmail').removeClass('is-invalid');
    $('#resetEmail').closest('.input-group').find('.invalid-feedback').remove();
    $('#resetSpaceErrorAlert').hide();
    $('#passwordResetForm')[0].reset();
  });
  
  // Custom validation method to check for spaces
  $.validator.addMethod("noSpace", function(value, element) { 
    return value.indexOf(" ") < 0; 
  }, "Spaces are not allowed");
});
</script>
</body>
</html>