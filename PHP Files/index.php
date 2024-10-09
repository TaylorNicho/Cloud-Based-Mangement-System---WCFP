<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>REFERRAL MANAGEMENT SYSTEM | </title>
        <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <style>
        .imgMain {
            max-width:100%;
            width: 100%;
            height: auto;
            margin: auto auto;
        }
        .block {
            display: block;
            width: 100%;
            border: none;
            background-color: #04AA6D;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
    </style>
    <body>
    <?php include('header.php');?>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-a6 col-b6 col-c12 col-aoffset-3" >
                    <div class="col-a4">
                        <div class="frm-group border center-block">
                            <button type="button" class="block btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#deposit_login_vol" ><i class="fas fa-plus" ></i>Login</button>
                        </div>
                    </div>
                    <div class="col-a4">
                        <div class="frm-group border center-block">
                            <button type="button" class="block btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#deposit_login_org" ><i class="fas fa-plus" ></i>3rd Party Login</button>
                        </div>
                    </div>
                    <div class="col-a4">
                        <div class="frm-group border center-block">
                            <button type="button" class="block btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#deposit_reg" ><i class="fas fa-plus" ></i>Register</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-a10 col-b8 col-c12 col-aoffset-1">
                        <img src="assets/img/img1.png" class="imgMain" id="imgMain" alt="" />
                    </div>
                </div>
            </div>
            <div class="row pad-botm">
            </div>


            <div id="deposit_reg" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            VOLUNTEER REGISTRATION
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php @include("volunteer_reg.php");?>
                        </div>

                    </div>
                </div>
            </div>

            <div id="deposit_login_org" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            ORGANISATION LOGIN
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php @include("login_org.php");?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="deposit_login_vol" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            LOGIN
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php @include("login_vol.php");?>
                        </div>
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
