<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(!isset($_SESSION['acVID']) || !isset($_SESSION['acROL']))
{
    header('location:index.php');
    die();
}
elseif(isset($_POST['delete_org']))
{
    include_once("db_functions.php");
    $delID = $_POST["btnDelOrg"];
    (new DbDelete())->Organisation($delID);
}
else
{
?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>REFERRER MANAGEMENT SYSTEM | VIEW ALL REFERRERS</title>
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
                        <h4 class="header-line">ADMIN | MANAGE REFERRERS</h4>
                    </div>

                    <div class="row">
                        <div class="">
                            <div class="panel-heading">
                                <div class="row">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deposit" ><i class="fas fa-plus" ></i> Add Referrer</button>
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
                                    <tblhdr>
                                        <tr>
                                            <th style="width: 1%">#</th>
                                            <th style="width: 1%">
                                                <label for="f_oid">ID</label>
                                                <input class="frm-control" type="text" name="f_oid" id="f_oid"/>
                                            </th>
                                            <th>
                                                <label for="f_oname">Organisation</label>
                                                <input class="frm-control" type="text" name="f_oname" id="f_oname"/>
                                            </th>
                                            <th style="width: 1%">PIN</th>
                                            <th style="width: 1%">
                                                <label for="f_oActive" class="pad-botm1">Active</label>
                                                <select class="border-dark" name="f_oActive" id="f_oActive">
                                                    <option value=""></option>
                                                    <option value=0>No</option>
                                                    <option value=1>Yes</option>
                                                </select>
                                            </th>
                                            <th style="width: 1%">Edit</th>
                                            <th style="width: 1%">Del</th>
                                        </tr>
                                    </form>
                                    </tblhdr>
                                    <tbody><?php

                                        $resultOrganisations = (new DbGetList())->Organisations();
                                        $cnt=1;
                                        foreach ($resultOrganisations as $rowOrganisations)
                                        {
                                            ?>
                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($rowOrganisations->OrganisationID);?></td>
                                                <td class="center"><?php echo htmlentities($rowOrganisations->O_Name);?></td>
                                                <td class="center"><?php echo htmlentities($rowOrganisations->O_PIN);?></td>
                                                <td class="center"><?php
                                                    if($rowOrganisations->O_Active=="1")
                                                    {?>
                                                        <img src="assets/img/true.png"/><?php
                                                    }
                                                    elseif($rowOrganisations->O_Active=="0")
                                                    {?>
                                                        <img src="assets/img/false.png"/><?php
                                                    }?>
                                                </td>
                                                <td class="center">
                                                    <a href="#" class="edit btn btn-dark" id="<?php echo ($rowOrganisations->OrganisationID); ?>" title="click to edit">
                                                        <img src="assets/img/edit.png" width="18" height="18" alt="submit" />
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    <form method="post">
                                                        <input name="btnDelOrg" type="hidden" value="<?php echo htmlentities($rowOrganisations->OrganisationID);?>" />
                                                        <input type="submit" name="delete_org" class="btn btn-red" value="X"
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
            </div>

            <div id="deposit" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            NEW REFERRER
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php @include("organisation_new.php");?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mod_edit" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            EDIT REFERRER
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="info_update">
                            <?php @include("organisation_edit.php"); ?>
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
                            url:"organisation_edit.php",
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