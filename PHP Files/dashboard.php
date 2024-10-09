<?php
session_start();
include("db_functions.php");

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

if(!isset($_SESSION['acVID']))
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
              <h4 class="header-line">USER | HOME</h4>
            </div>
          </div>
            <div class="row">
                <a href="referrals.php?Status=1">
                    <div class="col-a4 col-b4 col-c6">
                        <?php $referralCount = (new DbGet())->ReferralCount(); ?>
                        <h3>PENDING REFERRALS <?php echo htmlentities($referralCount);?></h3>
                        <img src="assets/img/Referral.png" alt="" />
                    </div>
                </a>

            </div>
        </div>
      </div>
      <?php include('footer.php');?>
    </body>
    </html>
<?php 
} ?>