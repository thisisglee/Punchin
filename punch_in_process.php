<?php
  //get txt
  $company_name = $_POST['company_name'];
  $sponsor = $_POST['sponsor'];
  $print_name = $_POST['print_name'];
  $signature = $_POST['signature'];
  $member_num = $_POST['member_num'];


    $id = 0;
    require_once('dbconfig.php');
  //sql query
  $sql = "INSERT INTO users(company_name, sponsor, print_name, signature, id, badge_num)
                                             VALUES(:company_name, :sponsor, :print_name, :signature, :id, :badge_num)";
  $cmd = $conn->prepare($sql);
  $cmd->bindparam(":company_name", $company_name, PDO::PARAM_STR, 40);
  $cmd->bindparam(":sponsor", $sponsor, PDO::PARAM_STR, 40);
  $cmd->bindparam(":print_name", $print_name, PDO::PARAM_STR, 40);
  $cmd->bindparam(":signature", $signature, PDO::PARAM_STR, 400);
  $cmd->bindparam(":id", $id, PDO::PARAM_INT, 1);
  $cmd->bindparam(":badge_num", $member_num, PDO::PARAM_STR, 40);
  $cmd->execute();

  $conn = null;

  echo '<script type="text/javascript">
           window.location = "log.php"
      </script>';
?>
