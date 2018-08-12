  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> All Logs</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="styles.css" >
  </head>
  <body scroll="no" style="overflow: hidden">

    <!--header-->
    <?php include('nav-bar.php'); ?>
    <!--show table-->
    <?php

      // connect
      require("dbconfig.php");

      // write the sql query
      $sql = "SELECT * FROM users ORDER BY time_in DESC ";

      //code to sort the table
      $sortby =!empty($_GET['sort']) ? $_GET['sort'] : '';
      if($sortby != NULL){
          $sql = "SELECT * FROM users ORDER BY $sortby ";;
        }

      // execute the query and store the results
      $cmd = $conn->prepare($sql);
      $cmd->execute();
    	$users = $cmd->fetchAll();

      //echo table with sort feature
    	echo '<div class="background" style="height:68%; overflow:auto;""><table class="table table-bordered table-hover table-responsive-lg""><thead>
      <th><a href="log.php?sort=user_id">USER_ID:</a></th>
      <th><a href="log.php?sort=company_name">COMPANY NAME</a></th>
      <th><a href="log.php?sort=date">DATE</a></th>
      <th><a href="log.php?sort=sponsor">SPONSOR</a></th>
      <th><a href="log.php?sort=print_name">PRINT NAME</a></th>
      <th>SIGNATURE</th>
      <th>ID VERIFIED</th>
      <th><a href="log.php?sort=badge_num">BADGE #</a></th>
      <th><a href="log.php?sort=time_in">TIME IN</a></th>
      <th><a href="log.php?sort=time_out">TIME OUT</a></th>
      </thead><tbody>';

      //loop through data to create a new table row for each record
    	foreach ($users as $user) {
          //chaning date, time_in, time_out format
          $date = strtotime( $user['date'] );
          $date = date( 'Y/m/d', $date );

          $time_in = strtotime( $user['time_in'] );
          $time_in = date( 'H:i:s', $time_in );

          $time_out = strtotime( $user['time_out'] );
          $time_out = date( 'H:i:s', $time_out );

          if($user['id'] == 1)
            {$verify = "True";}
          else
            {$verify = "False";}

    		  echo '<tr><td>' . $user['user_id'] . '</td><td>' .
    			$user['company_name'] . '</td><td>' .$date . '</td><td>' .
          $user['sponsor'] . '</td><td>' . $user['print_name'] . '</td><td>' .
          $user['signature'] . '</td><td>' . $verify . '</td><td>' . $user['badge_num'] . '</td><td>' .$time_in . '</td><td>' .$time_out . '</td></tr>' ;}

          echo '</tbody>';
          echo '</table>';

      // disconnect
      $conn = null;
      echo '</div>';

      ?>

      <!--pop up for punch out-->
      <div align="center">
      <button class="myBtn_multi">Punch OUT</button>
      </div>


      <!-- The Modal -->
      <div class="modal modal_multi" align="center">

          <!-- Modal content -->
          <div class="modal-content">
              <span class="close close_multi">×</span>
             <form method="post" class="form-signin" action="punch_out.php">
                <h2 class="form-signin-heading">Punch OUT</h2><hr />
                <div class="form-group">
                <input type="text" class="form-control" name="user_id" placeholder="User ID OR" />
                </div>
                <div class="form-group">
                <input type="text" class="form-control" name="member_num" placeholder="Badge Number" />
                </div>
                <div class="form-group">
                	<button type="submit" class="btn btn-primary" name="btn-signup">
                    	<i class="glyphicon glyphicon-open-file"></i>&nbsp;Punch OUT
                    </button>
                </div>
                <br />
            </form>

          </div>

      </div>
      <script src="script.js"></script>
      <!-- Currently working on the signature part, will be done soon
      <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> -->
  </body>
  </html>
