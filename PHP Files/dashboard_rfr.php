<?php
session_start();
include_once("db_functions.php");

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

if(!isset($_SESSION['rlogin']))
{
    header('location:index.php');
    die();
}
else
{?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>REFERRER MANAGEMENT SYSTEM | VIEW ALL REFERRALS</title>
            <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
            <link href="assets/css/style.css" rel="stylesheet" />
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        </head>
        <body>
        <?php include('header.php');?>
            <div class="content-wrapper">
                <div class="container">
                    <div class="col-a5">
                        <h4 class="header-line">3rd Party | REFERRALS
                            <div class="card-tools" style="float: right;">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deposit" ><i class="fas fa-plus" ></i> Add Referral</button>
                            </div>
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-a5">
                            <div class="frm1 frm1-default">
						<div class="panel-heading">
                            <div class="row">

                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div id="deposit" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            NEW REFERRALS
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php @include("referral_new.php");?>
                        </div>
                    </div>
                </div>
            </div>

            <script src="assets/css/js/jquery.min.js"></script>
            <script src="assets/css/js/bootstrap-select.min.js"></script>
            <script src="assets/css/js/bootstrap.min.js"></script>
            <script src="assets/css/js/dataTables.bootstrap.min.js"></script>

            <?php include('footer.php');?>
        </body>
    </html>
<?php
} ?>