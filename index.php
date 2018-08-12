<!DOCTYPE>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Punch In</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="styles.css" >
  </head>
  <body>
      <?php include('nav-bar.php'); ?>
    <div class"h2_background" align="center">
      <h2>Punch IN</h2>
    </div>

      <!-- Trigger/Open The Modal -->
      <div class"buttons" align="center">
      <button class="myBtn_multi">Employee</button>
      <button class="myBtn_multi">Guest</button>
    </div>

      <!-- The Modal -->
      <div class="modal modal_multi" align="center">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close close_multi">×</span>
          <form method="post" class="emp-guest_punch_in" action="emp_punch_in_process.php">
            <h2 class="form-signin-heading">Employee</h2><hr />
            <div class="form-group">
              <input type="text" class="form-control" name="member_num" placeholder="Badge #" />
            </div>
            <div class="form-group">
              <input type="" class="form-control" name="signature" placeholder="Signature" />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="btn-signup">Punch IN</button>
            </div>
            <br />
          </form>
        </div>

      </div>

      <!-- The Modal -->
      <div  class="modal modal_multi" align="center">

          <!-- Modal content -->
          <div class="modal-content">
              <span class="close close_multi">×</span>
              <form method="post" class="form-guest_punch_in" action="punch_in_process.php" onsubmit="return validateForm()">
              <h2 class="form-signin-heading">Guest</h2><hr />
              <div class="form-group">
              <input type="text" class="form-control" name="company_name" placeholder="Company Name" value="Single Point Group" required />
              </div>
              <div class="form-group">
              <input type="text" class="form-control" name="sponsor" placeholder="Your Sponsor" />
              </div>
              <div class="form-group">
              <input type="text" class="form-control" name="print_name" placeholder="Your Full Name" required />
              </div>
              <div class="form-group">
              <input type="text" class="form-control" name="member_num" placeholder="Badge Number OR any Valid ID" required />
              </div>
              <div class="form-group">
              	<input type="text" class="form-control" name="signature" placeholder="Your Signature" required/>
              </div>
              <div class="form-group">
              	<button type="submit" class="btn btn-primary" name="btn-signup">
                  	<i class="glyphicon glyphicon-open-file"></i>&nbsp;Punch IN
                  </button>
              </div>
              <br />
            </form>
          </div>
      </div>
<script src="script.js"></script>
</div>


</body>
</html>
