<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include('dbconnect.php');

//If no valid Admin $_session variable is set load index login screen
if(!isset($_SESSION['acVID']) || !isset($_SESSION['acROL']))
{
  header('location:index.php');
}
else
{
  ?><!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>REFERRAL MANAGEMENT SYSTEM | HOME</title>
      <link href="assets/css/style.css" rel="stylesheet" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
      <?php include('header.php');?>
      <div class="content-wrapper">
        <div class="container">
          <div class="row pad-botm">
            <div class="col-a5">
              <h4 class="header-line">REFERRAL | HOME | MY REFERRALS</h4>
            </div>
          </div>
          <div class="row">
            <a href="view_all_referrals.php?Status=1">
              <div class="col-a4 col-b4 col-c6">
                  <?php 
                  //Try to perform operation
                  try
                  {
                    $conn = new PDO("mysql:host=$DbServer;dbname=$DbName", $DbUser, $DbPass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $Id = $_SESSION['stdId'];
                    $stmt = $conn->prepare("SELECT * 
                      FROM Referral
                      WHERE Referral_StatusID=1");
                      
                    //Bind paramaters to variable names
                    //$stmt -> bindParam(':Id', $Id);
                    $stmt -> execute();
                    $ReferralLst=$stmt->rowCount();
                  }
                  catch(PDOException $e)
                  {
                    echo $e->getMessage();
                  }
                  ?>
                <h3>OPEN REFERRALS <?php echo htmlentities($ReferralLst);?></h3>
                <img src="assets/img/open-faults.png" alt="" />
              </div>
            </a>

                <img src="assets/img/closed-faults.png" alt="" />
              </div>
            </a>
          </div>
        </div>
      </div>
      <?php include('footer.php');?>
    </body>
  </html>
<?php 
}
?>