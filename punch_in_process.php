<?php
  //get txt
  $company_name = $_POST['company_name'];
  $sponsor = $_POST['sponsor'];
  $print_name = $_POST['print_name'];
  $signature = $_POST['signature'];
  $member_num = $_POST['member_num'];

  //by default verification FALSE
    $id = 0;
    //ok variable to validate entries
    $ok = true;
    if($company_name == Null)
      {$ok = false;
        echo 'Welcome guest '.$company_name.'.not valid. Redirecting..';
         echo '<meta http-equiv="refresh" content="3;url=log.php" />';
      }
    if($sponsor == Null)
      {$ok = false;
        echo 'Welcome guest '.$sponsor.'.not valid. Redirecting..';
         echo '<meta http-equiv="refresh" content="3;url=log.php" />';}
    if($print_name == Null)
      {$ok = false;
        echo 'Welcome guest '.$print_name.'.not valid. Redirecting..';
         echo '<meta http-equiv="refresh" content="3;url=log.php" />';}
    if($member_num == Null)
      {$ok = false;
        echo 'Welcome guest '.$member_num.'.not valid. Redirecting..';
         echo '<meta http-equiv="refresh" content="3;url=log.php" />';}

    if($ok == true){
      try{
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

          echo 'Welcome guest '.$print_name.'.  You are Punched IN. Redirecting..';
           echo '<meta http-equiv="refresh" content="3;url=log.php" />';
}
      catch (Exception $e)
       { $e->getMessage();}}

       else

?>
