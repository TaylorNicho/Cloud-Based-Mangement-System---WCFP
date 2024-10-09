<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

if(!isset($_SESSION['acVID']))
{
    header('location:index.php');
    die();
}
elseif(isset($_POST['update_client']))
{
    include_once("db_functions.php");
    $frmID = $_SESSION['frmId'];
    (new DbUpdate())->Client($frmID);
}
elseif(isset($_POST['delete_note']))
{
    include_once("db_functions.php");
    $delID = $_POST["btnDelNote"];
    $cid = $_SESSION["cid"];
    (new DbDelete())->ClientHistory($delID, $cid);
}
elseif(isset($_POST['delete_parcel']))
{
    include_once("db_functions.php");
    $delID = $_POST["btnDelParcel"];
    $cid = $_SESSION["cid"];
    (new DbDelete())->Parcel($delID, $cid);
}
elseif(isset($_POST['delete_appointment']))
{
    include_once("db_functions.php");
    $delID = $_POST["btnDelAppointment"];
    $cid = $_SESSION["cid"];
    (new DbDelete())->Appointment($delID, $cid);
}
else
{
    include_once("db_functions.php");
    $_SESSION['cid'] = $_GET['cid'];
    $cid=$_GET['cid'];
    $_SESSION['frmId'] = $_GET['cid'];
  //  $_SESSION['CliID'] = $_GET['clientId'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REFERRER MANAGEMENT SYSTEM | VIEW CLIENT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .collapsible {
            background-color: #038603;
            color: white;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active, .collapsible:hover {
            background-color: #04572b;
        }

        .content {
            padding: 0 10px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<?php include('header.php');?>
    <div class="content-wrapper">
        <div class="container">
            <div class="col-a5">
                <h4 class="header-line">ADMIN | MANAGE CLIENT
                    <div class="card-tools" style="float: right;">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deposit_note" ><i class="fas fa-plus" ></i> Add Note</button>
                    </div>

                    <div class="card-tools" style="float: right;">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deposit_parcel" ><i class="fas fa-plus" ></i> Add Parcel</button>
                    </div>

                </h4>
            </div>
            <div class="row">
                <div class="col-a5">
                    <div class="frm1 frm1-default">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <?php
                            $row= (new DbGet())->Client($cid);
                            $cnt=1;
                            ?>
                            <div class="frm1 frm1-type3">
                                <div class="frm1-heading" id="clicolor">Client Information ID:<?php echo $row->ClientID ?>
                                </div>
                                <div class="frm1-body">
                                    <div class="form-row">
                                        <input class="frm-control" type="hidden" name="ClientID" value="<?php echo htmlentities($row->ClientID);?>"/>

                                        <div class="col-a3">
                                            <div class="frm-group">
                                                <label>Forenames <span style="color:red;">*</span></label>
                                                <input class="frm-control" type="text" name="Forenames" value="<?php echo htmlentities($row->C_Forenames);?>" autocomplete="off" required />
                                            </div>
                                        </div>

                                        <div class="col-a3">
                                            <div class="frm-group">
                                                <label>Surname <span style="color:red;">*</span></label>
                                                <input class="frm-control" type="text" name="Surname" value="<?php echo htmlentities($row->C_Surname);?>" required="required" />
                                            </div>
                                        </div>

                                        <div class="col-a3">
                                            <div class="frm-group">
                                                <label>Date of Birth<span style="color:red;">*</span></label>
                                                <input class="frm-control" type="date" name="DOB" value="<?php echo htmlentities($row->C_DOB);?>" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-a3">
                                            <div class="frm-group">
                                                <label>Housing Status<span style="color:red;">*</span></label>
                                                <select class="frm-control" type="text" name="Housing_StatusID" required >
                                                    <?php (new DbOptions())->HousingStatus($row->C_Housing_StatusID); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-a3">
                                            <div class="frm-group">
                                                <label>House No/Name <span style="color:red;">*</span></label>
                                                <input class="frm-control" type="text" name="House_No" value="<?php echo htmlentities($row->C_House_No);?>" autocomplete="off" required />
                                            </div>
                                        </div>

                                        <div class="col-a2">
                                            <div class="frm-group">
                                                <label>Postcode <span style="color:red;">*</span></label>
                                                <input class="frm-control" type="text" name="Postcode" value="<?php echo htmlentities($row->C_Postcode);?>" required="required" />
                                            </div>
                                        </div>

                                        <div class="col-a3">
                                            <div class="frm-group">
                                                <label>Contact_No<span style="color:red;">*</span></label>
                                                <input class="frm-control" type="text" name="Contact_No" value="<?php echo htmlentities($row->C_Contact_No);?>" autocomplete="off"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-a6">
                                            <div class="frm-group">
                                                <label>Email<span style="color:red;">*</span></label>
                                                <input class="frm-control" type="text" name="Email" value="<?php echo htmlentities($row->C_Email);?>" autocomplete="off"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-a6">
                                            <div class="frm-group">
                                                <label>Dependants by Age<span style="color:red;"></span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-a1">
                                            <div class="frm-group">
                                                <label>0-2<span style="color:red;">*</span></label>
                                                <select class="frm-control" type="text" name="Dependant_0_2" required >
                                                    <?php (new DbOptions())->Dependants($row->C_Dependant_0_2); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-a1">
                                            <div class="frm-group">
                                                <label>3-10<span style="color:red;">*</span></label>
                                                <select class="frm-control" type="text" name="Dependant_3_10" required >
                                                    <?php (new DbOptions())->Dependants($row->C_Dependant_3_10); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-a1">
                                            <div class="frm-group">
                                                <label>11-17<span style="color:red;">*</span></label>
                                                <select class="frm-control" type="text" name="Dependant_11_17" required >
                                                    <?php (new DbOptions())->Dependants($row->C_Dependant_11_17); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-a2">
                                            <div class="frm-group">
                                                <label>Child 18-25<span style="color:red;">*</span></label>
                                                <select class="frm-control" type="text" name="Dependant_C18_25" required >
                                                    <?php (new DbOptions())->Dependants($row->C_Dependant_C18_25); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-a2">
                                            <div class="frm-group">
                                                <label>Adult 18-25<span style="color:red;">*</span></label>
                                                <select class="frm-control" type="text" name="Dependant_A18_25" required >
                                                    <?php (new DbOptions())->Dependants($row->C_Dependant_A18_25); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-a1">
                                            <div class="frm-group">
                                                <label>26-50<span style="color:red;">*</span></label>
                                                <select class="frm-control" type="text" name="Dependant_26_50" required >
                                                    <?php (new DbOptions())->Dependants($row->C_Dependant_26_50); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-a1">
                                            <div class="frm-group">
                                                <label>50-69<span style="color:red;">*</span></label>
                                                <select class="frm-control" type="text" name="Dependant_50_69" required >
                                                    <?php (new DbOptions())->Dependants($row->C_Dependant_50_69); ?>
                                                </select>
                                            </div>
                                        </div>

                                            <div class="col-a1">
                                                <div class="frm-group">
                                                    <label>70+<span style="color:red;">*</span></label>
                                                    <select class="frm-control" type="text" name="Dependant_70" required >
                                                        <?php (new DbOptions())->Dependants($row->C_Dependant_70); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-a3">
                                                <div class="frm-group">
                                                    <label>Client Status<span style="color:red;">*</span></label>
                                                    <select class="frm-control" type="text" name="Client_StatusID" required >
                                                        <?php (new DbOptions())->ClientStatus($row->C_Client_StatusID); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-a1">
                                                <div class="frm-group">
                                                    <label>Flag<span style="color:red;">*</span></label>
                                                    <select class="frm-control" id="Flag" type="text" name="Flag" onchange="myFlag()" required >
                                                        <option value="0" <?php if ($row->C_Flag == 0) { echo 'selected="selected"'; } ?> >No</option>
                                                        <option value="1" <?php if ($row->C_Flag == 1) { echo 'selected="selected"'; } ?> >Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="submit" name="update_client" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
                                        </div>
                                    </div>
                                 </div>
                                <?php //}
                            ?>
                        </form>


                        <div class="frm1 frm1-type3">
                            <div class="frm1-heading collapsible">Client Notes</div>
                            <div class="frm1-body content">
                               <?php
                                $resultsList = (new DbGetList())->ClientHistory($cid);
                                if(!$resultsList)
                                { ?>
                                    <div class="frm1-heading">No Client Notes</div>
                                    <?php }
                                else
                                {?>
                                <div class="tbl-resp">
                                    <table class="table tbl-strp tbl-brdr tbl-hvr">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">#</th>
                                                <th style="width: 1%">ID</th>
                                                <th>Date</th>
                                                <th>Volunteer</th>
                                                <th>Branch</th>
                                                <th style="width: 1%">Edit</th>
                                                <th style="width: 1%">Del</th>
                                            </tr>
                                        </thead>

                                        <?php
                                        $resultsList = (new DbGetList())->ClientHistory($cid);
                                        $cnt=1;
                                        foreach ($resultsList as $result)
                                        {
                                            $t = strtotime($result->Ch_Date);
                                            $t = date('d/m/y H:i',$t);
                                        ?>
                                        <tr class="border">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->Client_HistoryID);?></td>
                                            <td class="center"><?php echo htmlentities($t);?></td>
                                            <td class="center"><?php echo htmlentities($result->V_Forenames.' '.$result->V_Surname);?></td>
                                            <td class="center"><?php echo htmlentities($result->B_Name);?></td>
                                            <td style="width:auto">
                                                <a href="#" class="edit_note btn btn-dark" id="<?php echo ($result->Client_HistoryID); ?>" title="EDIT">
                                                    <img src="assets/img/edit.png" width="18" height="18" alt="submit" />
                                                </a>
                                            </td>
                                            <td style="flex-wrap: wrap">
                                                <form method="post">
                                                    <input name="btnDelNote" type="hidden" value="<?php echo htmlentities($result->Client_HistoryID);?>" />
                                                    <input type="submit" name="delete_note" class="btn btn-red"  value="X"
                                                           onclick="return confirm('Are you sure you want to delete ?. <?php echo htmlentities($result->Client_HistoryID);?>');"/>
                                                </form>
                                            </td>
                                        </tr>
                                            <td colspan="7" style="background-color: #ffffff;"> <?php echo htmlentities($result->Ch_Notes);?></td>


                                            <?php
                                            $cnt=$cnt+1;
                                            }?>
                                        </tbody>
                                    </table>
                                </div> <?php } ?>
                            </div>
                        </div>


                        <div class="frm1 frm1-type3">
                            <div class="frm1-heading collapsible">Parcel Information</div>
                            <div class="frm1-body content"><?php
                                $resultsList = (new DbGetList())->Parcels($cid, false);
                                if(!$resultsList)
                                { ?>
                                    <div class="frm1-heading">No Client Parcels</div> <?php
                                }
                                else
                                { ?>
                                <div class="tbl-resp">
                                    <table class="table tbl-strp tbl-brdr tbl-hvr">

                                        <tr>
                                            <th style="width: 1%">#</th>
                                            <th style="width: 1%">ID</th>
                                            <th>Date</th>
                                            <th>Volunteer</th>
                                            <th>Branch</th>
                                            <th style="width: 1%">Edit</th>
                                            <th style="width: 1%">Del</th>
                                        </tr>

                                        <tbody><?php
                                        $resultsList = (new DbGetList())->Parcels($cid, false);
                                        $cnt=1;
                                        foreach ($resultsList as $result)
                                        {
                                            $t = strtotime($result->P_Collected);
                                            $t = date('d/m/y H:i',$t);
                                            ?>
                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($result->ParcelID);?></td>
                                                <td class="center"><?php echo htmlentities($t);?></td>
                                                <td class="center"><?php echo htmlentities($result->V_Surname);?></td>
                                                <td class="center"><?php echo htmlentities($result->B_Name);?></td>
                                                <td class="center">
                                                    <a href="#" class="edit_parcel btn btn-dark" id="<?php echo ($result->ParcelID); ?>" title="click to edit">
                                                        <img src="assets/img/edit.png" width="18" height="18" alt="submit" />
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    <form method="post">
                                                        <input name="btnDelParcel" type="hidden" value="<?php echo htmlentities($result->ParcelID);?>" />
                                                        <input type="submit" name="delete_parcel" class="btn btn-red"  value="X"
                                                               onclick="return confirm('Are you sure you want to delete ?. <?php echo htmlentities($result->ParcelID);?>');"/>
                                                    </form>
                                                </td>
                                            </tr>
                                            <td colspan="7" style="background-color: #ffffff;"> <?php echo htmlentities($result->P_Notes);?></td>

                                            <?php
                                            $cnt=$cnt+1;
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                                    <?php
                                } ?>
                            </div>
                        </div>


                        <div class="frm1 frm1-type3">
                            <div class="frm1-heading collapsible">Appointment Information</div>
                            <div class="frm1-body content"><?php
                                $resultAppointment = (new DbGetList())->Appointments("","","",$cid,"", false);
                                if(!$resultAppointment)
                                { ?>
                                    <div class="frm1-heading">No Appointments</div>
                                    <?php }
                                else
                                {?>
                                <div class="tbl-resp">
                                    <table class="table tbl-strp tbl-brdr tbl-hvr">

                                        <tr>
                                            <th style="width: 1%">#</th>
                                            <th style="width: 1%">ID</th>
                                            <th>Date</th>
                                            <th>Volunteer</th>
                                            <th>Branch</th>
                                            <th style="width: 1%">Edit</th>
                                            <th style="width: 1%">Del</th>
                                        </tr>

                                        <tbody><?php
                                        $resultsAppointment = (new DbGetList())->Appointments("","","",$cid,"", false);
                                        $cnt=1;
                                        foreach ($resultsAppointment as $result)
                                        {
                                            $t = strtotime($result->A_Start);
                                            $t = date('d/m/y H:i',$t);
                                            ?>
                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($result->AppointmentID);?></td>
                                                <td class="center"><?php echo htmlentities($t);?></td>
                                                <td class="center"><?php echo htmlentities($result->V_Forenames . $result->V_Surname);?></td>
                                                <td class="center"><?php echo htmlentities($result->B_Name);?></td>
                                                <td class="center">
                                                    <a href="#" class="edit_appointment btn btn-dark" id="<?php echo ($result->AppointmentID); ?>" title="click to edit">
                                                        <img src="assets/img/edit.png" width="18" height="18" alt="submit" />
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    <form method="post">
                                                        <input name="btnDelAppointment" type="hidden" value="<?php echo htmlentities($result->AppointmentID);?>" />
                                                        <input type="submit" name="delete_appointment" class="btn btn-red"  value="X"
                                                               onclick="return confirm('Are you sure you want to delete ?. <?php echo htmlentities($result->AppointmentID);?>');"/>
                                                    </form>
                                                </td>
                                            </tr>
                                            <td colspan="7" style="background-color: #ffffff;"> <?php echo htmlentities($result->A_Note);?></td>

                                            <?php
                                            $cnt=$cnt+1;
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    <?php } ?>
                </div>
            </div>

        <div id="deposit_note" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content frm1-type3">
                    <div class="frm1-heading">
                        NEW NOTE
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php @include("note_new.php");?>
                    </div>
                </div>
            </div>
        </div>

        <div id="mod_edit_note" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content frm1-type3">
                    <div class="frm1-heading">
                        EDIT NOTE
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="info_update_note">
                        <?php  @include("note_edit.php"); ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="deposit_parcel" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content frm1-type3">
                    <div class="frm1-heading">
                        NEW PARCEL
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php @include("parcel_new.php");?>
                    </div>
                </div>
            </div>
        </div>

        <div id="mod_edit_parcel" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content frm1-type3">
                    <div class="frm1-heading">
                        EDIT PARCEL
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="info_update_parcel">
                        <?php @include("parcel_edit.php");?>
                    </div>
                </div>
            </div>
        </div>

        <div id="mod_cal_new" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content frm1-type3">
                    <div class="frm1-heading">
                        NEW CALENDAR APPOINTMENT
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="info_cal_new">
                        <?php @include("calendar_new.php"); ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="mod_cal_edit" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content frm1-type3">
                    <div class="frm1-heading">
                        EDIT CALENDAR APPOINTMENT
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="info_cal_edit">
                        <?php @include("calendar_edit.php"); ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/css/js/jquery.min.js"></script>
        <script src="assets/css/js/bootstrap-select.min.js"></script>
        <script src="assets/css/js/bootstrap.min.js"></script>
        <script src="assets/css/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
            $(window).on('load', function () {
                myFlag();
            })
            function myFlag() {
                if(document.getElementById("Flag").selectedIndex === 0)
                {
                    document.getElementById("clicolor").style.color = "black";
                    document.getElementById("clicolor").style.backgroundColor = "#90ff82";
                }
                else
                {
                    document.getElementById("clicolor").style.color = "white";
                    document.getElementById("clicolor").style.backgroundColor = "#d00e0e";
                }
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function(){


        </script>

        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            }
        </script>
            <script src="assets/css/js/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
            <script>
                $(document).ready(function() {
                    $(document).on('click','.edit_note',function(){
                        var edit_id=$(this).attr('id');
                        $.ajax({
                            url:"note_edit.php",
                            type:"post",
                            data:{edit_id:edit_id},
                            success:function(data){
                                $("#info_update_note").html(data);
                                $("#mod_edit_note").modal('show');
                            }
                        });
                    });
                    $(document).on('click','.edit_parcel',function(){
                        var edit_id=$(this).attr('id');
                        $.ajax({
                            url:"parcel_edit.php",
                            type:"post",
                            data:{edit_id:edit_id},
                            success:function(data){
                                $("#info_update_parcel").html(data);
                                $("#mod_edit_parcel").modal('show');
                            }
                        });
                    });
                    var calendar = $('#calendar').fullCalendar({
                        firstDay: 1,
                        editable:true,
                        defaultEventMinutes: 30,
                        defaultTimedEventDuration: '00:30:00',
                        slotMinutes: 30,
                        businessHours:
                            {
                                start: '9:00',
                                end:   '17:00',
                                dow: [ 1, 2, 3, 4, 5, 6]
                            },
                        header:{
                            left:'prev,next today',
                            center:'title',
                            right:'agendaDay,agendaWeek,month,'
                        },
                        defaultView: 'agendaWeek',
                        eventSources: [
                            {
                                events: <?php echo (new DbGetList())->Appointments("","","",$cid,"",true); ?>
                            },
                            {
                                events: <?php echo (new DbGetList())->Parcels($cid,true); ?>,
                                color: 'red',
                                textColor: 'white'
                            }
                        ],
                        selectable:true,
                        selectHelper:true,
                        select: function(start, end)
                        {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                            $.ajax({
                                url:"calendar_new.php",
                                type:"post",
                                data:{cal_start:start,cal_end:end},
                                success:function(data){
                                    $("#info_cal_new").html(data);
                                    $("#mod_cal_new").modal('show');
                                }
                            });
                        },
                        editable:true,
                        eventResize:function(event)
                        {
                            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                            var title = event.title;
                            var id = event.id;
                            $.ajax({
                                url:"calendar_update.php",
                                type:"POST",
                                data:{title:title, start:start, end:end, id:id},
                                success:function(){
                                    calendar.fullCalendar('refetchEvents');
                                    alert('Event Update');
                                }
                            })
                        },
                        eventDrop:function(event)
                        {
                            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                            var title = event.title;
                            var id = event.id;
                            $.ajax({
                                url:"calendar_update.php",
                                type:"POST",
                                data:{title:title, start:start, end:end, id:id},
                                success:function()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Event Updated");
                                }
                            });
                        },
                        eventClick:function(event)
                        {
                            if(confirm("Are you sure you want to edit it?"))
                            {
                                var cal_id = event.id;
                                if(event.title=="PARCEL")
                                {
                                    var cal_id = event.id;
                                    $.ajax({
                                        url:"parcel_edit.php",
                                        type:"post",
                                        data:{edit_id:cal_id},
                                        success:function(data){
                                            $("#info_update_parcel").html(data);
                                            $("#mod_edit_parcel").modal('show');
                                        }
                                    });
                                }
                                else {
                                    $.ajax({
                                        url: "calendar_edit.php",
                                        type: "post",
                                        data: {aid: cal_id},
                                        success: function (data) {
                                            $("#info_cal_new").html(data);
                                            $("#mod_cal_new").modal('show');
                                        }
                                    });
                                }
                            }
                        },
                    });
                });
            </script>
            <div id="calendar"></div>


            <script src="assets/css/js/bootstrap-select.min.js"></script>
            <script src="assets/css/js/bootstrap.min.js"></script>
            <script src="assets/css/js/dataTables.bootstrap.min.js"></script>
    </body>
    <?php include('footer.php');?>
</html>
    <?php
} ?>