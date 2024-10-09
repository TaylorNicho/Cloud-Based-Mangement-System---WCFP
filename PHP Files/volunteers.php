<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

//Include for Database functions
include_once("db_functions.php");

if(!isset($_SESSION['acVID']) || !isset($_SESSION['acROL']))
{
    header('location:index.php');
    die();
}
else
{
    if(array_key_exists('btnDel', $_POST)) {
        $delID = $_POST["btnDel"];
        (new DbDelete())->Volunteer($delID);
    }?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>REFERRER MANAGEMENT SYSTEM | VIEW ALL VOLUNTEER</title>
            <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
            <link href="assets/css/style.css" rel="stylesheet" />
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        </head>
        <body>
        <?php include('header.php');?>
            <div class="content-wrapper">
                <div class="container">
                    <div class="col-a5">
                        <h4 class="header-line">ADMIN | MANAGE VOLUNTEER</h4>
                    </div>
                    <div class="row">
                        <div class="">
						<div class="panel-heading">
                            <div class="row">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deposit" ><i class="fas fa-plus" ></i> Add Volunteer</button>
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
                                        <th style="width: 1%">#
                                        </th>
                                        <th style="width: 1%">
                                            <label>VID</label>
                                        </th>
                                        <th>
                                            <label>UID</label>
                                        </th>
                                        <th>
                                            <label for="fForenames">Forenames</label>
                                            <input class="frm-control" type="text" name="fForenames" id="fForenames"/>
                                        </th>
                                        <th>
                                            <label for="fSurname">Surname</label>
                                            <input class="frm-control" type="text" name="fSurname" id="fSurname"/>
                                        </th>
                                        <th>
                                            <label>Joined</label>
                                        </th>
                                        <th>
                                            <label for="fBID" class="pad-botm1">Branch</label>
                                            <select class="border-dark" name="fBID" id="fBID">
                                                <?php (new DbOptions())->Branch(0); ?>
                                            </select>
                                        </th>
                                        <th>
                                            <label for="fVRID" class="pad-botm1">Role</label>
                                            <select class="border-dark" name="fVRID" id="fVRID">
                                                <?php (new DbOptions())->VolunteerRole(0); ?>
                                            </select>
                                        </th>
                                        <th style="width: 1%">
                                            <label for="fActive" class="pad-botm1">Active</label>
                                            <select class="border-dark" name="fActive" id="fActive">
                                                <option value=""></option>
                                                <option value=0>No</option>
                                                <option value=1>Yes</option>
                                            </select>
                                        </th>
                                        <th style="width: 1%">
                                            <label>Edit</label>
                                        </th>
                                        <th style="width: 1%">
                                            <label>Del</label>
                                        </th>
                                    </tr>
                                    </form>
                                    <tbody><?php

                                        $results = (new DbGetList())->Volunteers();
                                        $cnt=1;
                                        foreach ($results as $result)
                                        {
                                            ?>
                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($result->VolunteerID);?></td>
                                                <td class="center"><?php echo htmlentities($result->V_UID);?></td>
                                                <td class="center"><?php echo htmlentities($result->V_Forenames);?></td>
                                                <td class="center"><?php echo htmlentities($result->V_Surname);?></td>
                                                <td class="center"><?php echo htmlentities($result->V_Joined);?></td>
                                                <td class="center"><?php echo htmlentities($result->B_Name);?></td>
                                                <td class="center"><?php echo htmlentities($result->Vr_Name);?></td>
                                                <td class="center"><?php
                                                    if($result->V_Active=="1")
                                                    {?>
                                                        <img src="assets/img/true.png" alt=""/><?php
                                                    }
                                                    elseif($result->V_Active=="0")
                                                    {?>
                                                        <img src="assets/img/false.png" alt=""/><?php
                                                    }?>
                                                </td>

                                                <td class="center">
                                                    <a href="#" class="edit btn btn-dark" id="<?php echo ($result->VolunteerID); ?>" title="click to edit">
                                                        <img src="assets/img/edit.png" width="18" height="18" alt="submit" /></a>
                                                </td>
                                                <td class="center">
                                                    <form method="post">
                                                        <input name="btnDel" type="hidden" value="<?php echo htmlentities($result->VolunteerID);?>" />
                                                        <input type="submit" name="btn btnDel" class="btn btn-red" value="X"
                                                               onclick="return confirm('Are you sure you want to delete ?');"/>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                            $cnt=$cnt+1;
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>

            <div id="deposit" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            NEW VOLUNTEER
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php @include("volunteer_new.php");?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mod_edit" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            EDIT VOLUNTEER
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="info_update">
                            <?php @include("volunteer_edit.php"); ?>
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
                            url:"volunteer_edit.php",
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