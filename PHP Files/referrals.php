<?php
session_start();
include_once("db_functions.php");

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

if(!isset($_SESSION['acVID']))
{
    header('location:index.php');
    die();
}
else
{
    $Title = $_SESSION['acROLE'];
    if(array_key_exists('btnDel', $_POST)) {
        $delID = $_POST["btnDel"];
        (new DbDelete())->Referral($delID);
    }?>

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
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        </head>
        <body>
            <?php
            include('header.php');?>
            <div class="content-wrapper">
                <div class="container">
                    <div class="col-a5">
                        <h4 class="header-line"><?php echo $Title ?>  | MANAGE REFERRALS</h4>
                    </div>
                    <div class="row">
                        <div class="">
                            <div class="panel-heading">
                                <div class="row">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deposit" ><i class="fas fa-plus" ></i> Add Referral</button>
                                                </div>
                                                <div class="col-sm-8">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="submit" value="Filter Records" class="btn btn-sm btn-primary fas fa-plus"/>
                                                </div>
                                            </div>
                                        </div>

                                <div class="">
                                    <div class="tbl-resp">
                                        <table class="table tbl-strp tbl-brdr tbl-hvr">
                                        <tr>
                                            <th style="width: 1%">#</th>
                                            <th style="width: 1%">
                                                <label for="fRID">Ref</label>
                                                <input class="frm-control" type="text" name="fRID" id="fRID"/>
                                            </th>
                                            <th style="width: 1%">
                                                <label for="f_oid" class="pad-botm1">Organisation</label>
                                                <select class="border-dark" name="f_oid" id="f_oid">
                                                    <?php (new DbOptions())->Organisations(0); ?>
                                                </select>
                                            </th>
                                            <th>Received</th>
                                            <th>
                                                <label for="fCID">Client ID</label>
                                                <input class="frm-control" type="text" name="fCID" id="fCID"/>
                                            </th>
                                            <th>
                                                <label for="fForenames">Forenames</label>
                                                <input class="frm-control" type="text" name="fForenames" id="fForenames"/>
                                            </th>
                                            <th>
                                                <label for="fSurname">Surname</label>
                                                <input class="frm-control" type="text" name="fSurname" id="fSurname"/>
                                            </th>
                                            <th style="column-width: 95px">
                                                <label for="fDOB">DOB</label>
                                                <input class="form-control-plaintext" style="border-top-color: #0f0f0f; background-color:white" type="Date" name="fDOB" id="fDOB"/>
                                            </th>
                                            <th style="width: 1%">Processed</th>
                                            <th style="width: 1%">
                                                <label for="fRSID" class="pad-botm1">Status</label>
                                                <select class="border-dark" name="fRSID" id="fRSID">
                                                    <?php if(($_SESSION['firstload'])){
                                                        (new DbOptions())->ReferralStatus(0);
                                                    }
                                                    else
                                                        {
                                                            (new DbOptions())->ReferralStatus(0);
                                                            $_SESSION = "set";
                                                        }
                                                        ?>

                                                </select>
                                            </th>
                                            <th style="width: 1%">Edit</th>
                                            <th style="width: 1%">Del</th>
                                        </tr>
                                    </form>
                                    <tbody><?php

                                        $resultReferrals = (new DbGetList())->Referrals();
                                        $cnt=1;
                                        foreach ($resultReferrals as $rowReferral)
                                        {
                                            $tR_Received= strtotime($rowReferral->R_Received);
                                            $tR_Received = date('d/m/y',$tR_Received);
                                            $tC_DOB = strtotime($rowReferral->C_DOB);
                                            $tC_DOB = date('d/m/y',$tC_DOB);
                                            $tR_Processed = strtotime($rowReferral->R_Processed);
                                            $tR_Processed = date('d/m/y',$tR_Processed);

                                            ?>
                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($rowReferral->ReferralID);?></td>
                                                <td class="center"><?php echo htmlentities($rowReferral->O_Name);?></td>
                                                <td class="center"><?php echo htmlentities($tR_Received);?></td>
                                                <td class="center"><?php echo htmlentities($rowReferral->R_ClientID);?></td>
                                                <td class="center"><?php echo htmlentities($rowReferral->C_Forenames);?></td>
                                                <td class="center"><?php echo htmlentities($rowReferral->C_Surname);?></td>
                                                <td class="center"><?php echo htmlentities($tC_DOB);?></td>
                                                <td class="center"><?php echo htmlentities($tR_Processed);?></td>
                                                <td class="center"><?php echo htmlentities($rowReferral->Rs_Name);?></td>
                                                </td>

                                                <td class="center">
                                                    <a href="#" class="edit btn btn-dark" id="<?php echo ($rowReferral->ReferralID); ?>" title="click to edit">
                                                        <img src="assets/img/edit.png" width="18" height="18" alt="submit" />
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    <form method="post">
                                                        <input name="btnDel" type="hidden" value="<?php echo htmlentities($rowReferral->ReferralID);?>" />
                                                        <input type="submit" name="btn btnDel" class="btn btn-red" value="X"
                                                               onclick="return confirm('Are you sure you want to delete ?');"/>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                            $cnt=$cnt+1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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

            <div id="mod_edit" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            EDIT REFERRALS
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="info_update">
                            <?php @include("referral_edit.php"); ?>
                        </div>
                    </div>
                </div>
            </div>

            <script src="assets/css/js/jquery.min.js"></script>
            <script src="assets/css/js/bootstrap-select.min.js"></script>
            <script src="assets/css/js/bootstrap.min.js"></script>
            <script src="assets/css/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $(document).on('click','.edit',function(){
                        var edit_id=$(this).attr('id');
                        $.ajax({
                            url:"referral_edit.php",
                            type:"post",
                            data:{edit_id:edit_id},
                            success:function(data){
                                $("#info_update").html(data);
                                $("#mod_edit").modal('show');
                            }
                        });
                    });
                });
            </script>
            <?php include('footer.php');?>
        </body>
    </html>
<?php
} ?>