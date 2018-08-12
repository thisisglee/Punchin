<?php
$signature = $_POST['signature'];
$member_num = $_POST['member_num'];

try{
    require('dbconfig.php');

    $query = "SELECT count(*) FROM users WHERE badge_num = $member_num AND id = 1";
    $result = $conn->prepare($query);
    $result->execute();
    $number_of_rows = $result->fetchColumn();
     if ($number_of_rows == 0)
         {echo "You are not an Employee, redirecting...";
         $conn = null;
          echo '<meta http-equiv="refresh" content="2;url=index.php" />';}
     else{
        $sql = "INSERT INTO users(company_name,sponsor,print_name,signature,id,badge_num)
        (SELECT company_name, sponsor, print_name, signature, id,badge_num FROM users WHERE badge_num = $member_num AND id = 1 LIMIT 1);)";
        $cmd = $conn->prepare($sql);
        $cmd->execute();
        $conn = null;
        echo 'Welcome'.$member_num.'.  You are Punched IN. Work Hard!! Redirecting..';
         echo '<meta http-equiv="refresh" content="3;url=log.php" />';
           }
         }

   catch (Exception $e)
     { $e->getMessage();}
        ?>
