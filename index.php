<?PHP
include_once 'con/portal.php'
?>

<!DOCTYPE html>
<html lang='en'>

<head>

  <?PHP
  include_once 'layout/header.php'
  ?>

</head>

<body>

  <?PHP
  include_once 'layout/nav.php'
  ?>

  <!-- Alert -->
    <div class='alert alert-success alert-dismissable fade show text-center' role='alert'>
        The manager portal is currently in development and will be available soon.</a>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>

  <!-- Log in Form -->
  <div class='container'>
    <div class='d-flex justify-content-center h-100'>
      <div class='card'>
        <div class='card-header'>
          <h3>Production Database</h3>
        </div>
        <div class='card-body'>
          <form action='con/login.php' method='post' id='login'>
            <!-- Username -->
            <div class='input-group form-group'>
              <div class='input-group-prepend'>
                <span class='input-group-text'><i class='fas fa-user'></i></span>
              </div>
              <input type='text' class='form-control input' placeholder='username' name='user_name' required>
            </div>
            <!-- Password -->
            <div class='input-group form-group'>
              <div class='input-group-prepend'>
                <span class='input-group-text'><i class='fas fa-key'></i></span>
              </div>
              <input type='password' class='form-control input' placeholder='password' name='password' required>
            </div>
            <div class='btn-group float-right' role='group'>
              <a value='Request Access' class='btn select_btn' href='mailto:eoghan@thehulbertfiles.info?subject=Production%20Database%20Demo&amp;body=Please%20grant%20me%20access%20to%20the%20Production%20Database%20Demo.%0A%0AFull%20name%3A%20%0ACompany%3A%0ATitle%3A%0AEmail%3A' target='_top' role='button' aria-pressed='true'>Request Access</a>
              <input type='submit' value='Sign In' class='btn float-right login_btn'>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?PHP
  include_once 'layout/footer.php'
  ?>

</body>

</html>
