<?php
$user_id = $_POST['user_id'];
$member_num = $_POST['member_num'];

require('dbconfig.php');
 if($member_num == NULL)
  { $sql = "UPDATE users SET time_out = CURRENT_TIMESTAMP() WHERE user_id = :user_id AND time_out IS NULL ;";
    $cmd = $conn->prepare($sql);
    $cmd->bindparam(":user_id", $user_id, PDO::PARAM_INT, 11);}
 else
  { $sql = "UPDATE users SET time_out = CURRENT_TIMESTAMP() WHERE badge_num = :member_num AND time_out IS NULL ;";
    $cmd = $conn->prepare($sql);
    $cmd->bindparam(":member_num", $member_num, PDO::PARAM_STR, 40);}

 $cmd->execute();
 $conn = null;

 echo '<script type="text/javascript">
          window.location = "log.php"
     </script>';
?>
