<?php
$user_id = $_POST['user_id'];
$member_num = $_POST['member_num'];

try{
    require('dbconfig.php');
//check for user id entry
    if($member_num == NULL)
    { //user id valdiation
      $query = "SELECT count(*) FROM users WHERE user_id = $user_id";
        $result = $conn->prepare($query);
        $result->execute();
        $number_of_rows = $result->fetchColumn();

        if ($number_of_rows == 0)
          { echo "user Id invalid, redirecting...";
            $conn = null;
            echo '<meta http-equiv="refresh" content="2;url=log.php" />';}

        else{//user id correct
          $sql = "UPDATE users SET time_out = CURRENT_TIMESTAMP() WHERE user_id = :user_id AND time_out IS NULL";
          $cmd = $conn->prepare($sql);
          $cmd->bindparam(":user_id", $user_id, PDO::PARAM_INT, 11);
          $cmd->execute();
          echo 'Punched Out! Have a Great Day. redirecting..';
           echo '<meta http-equiv="refresh" content="2;url=log.php" />';
          $conn = null;}
      }
      else{//member id validation
        $query = "SELECT count(*) FROM users WHERE badge_num = $member_num";
          $result = $conn->prepare($query);
          $result->execute();
          $number_of_rows = $result->fetchColumn();
           if ($number_of_rows == 0)
               {echo "member Id invalid, redirecting...";
                echo '<meta http-equiv="refresh" content="2;url=log.php" />';
              $conn = null;}

           else{//member id correct
             $sql = "UPDATE users SET time_out = CURRENT_TIMESTAMP() WHERE badge_num = :member_num AND time_out IS NULL ORDER BY time_in DESC  LIMIT 1;";
             $cmd = $conn->prepare($sql);
             $cmd->bindparam(":member_num", $member_num, PDO::PARAM_STR, 40);
             $cmd->execute();
             echo 'Punched Out. Have a Great Day. redirecting..';

              echo '<meta http-equiv="refresh" content="2;url=log.php" />';
             $conn = null;}}
      }

catch (Exception $e)
{ $e->getMessage();}
?>
