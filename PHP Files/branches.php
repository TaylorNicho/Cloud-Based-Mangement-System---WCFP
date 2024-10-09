<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

if(!isset($_SESSION['acVID']) || !isset($_SESSION['acROL']))
{
    header('location:index.php');
    die();
}
else
{
    include_once("db_functions.php");
    if(array_key_exists('btnDel', $_POST)) {
        $delID = $_POST["btnDel"];
        (new DbDelete())->Branch($delID);
    }?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>REFERRER MANAGEMENT SYSTEM | VIEW ALL BRANCHES</title>
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
                    <h4 class="header-line">ADMIN | MANAGE BRANCHES</h4>
                    <div class="row">

                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deposit" ><i class="fas fa-plus" ></i> Add Branch</button>
                                </div>
                            </div>
                        </div>

                        </div>

                        <div class="">
                            <div class="tbl-resp">
                                <table class="table tbl-strp tbl-brdr tbl-hvr">
                                        <tr>
                                            <th style="width: 1%">#</th>
                                            <th style="width: 1%">ID</th>
                                            <th>Name</th>
                                            <th>Building No</th>
                                            <th>Postcode</th>
                                            <th>Manager</th>
                                            <th>Contact No</th>
                                            <th>Email</th>
                                            <th style="width: 1%">Status</th>
                                            <th style="width: 1%">Edit</th>
                                            <th style="width: 1%">Del</th>
                                        </tr>

                                    <tbody><?php
                                        $resultBranches= (new DbGetList())->Branches();
                                        $cnt=1;
                                        foreach ($resultBranches as $rowBranches)
                                        {
                                            ?>
                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($rowBranches->BranchID);?></td>
                                                <td class="center"><?php echo htmlentities($rowBranches->B_Name);?></td>
                                                <td class="center"><?php echo htmlentities($rowBranches->B_Building_No);?></td>
                                                <td class="center"><?php echo htmlentities($rowBranches->B_Postcode);?></td>
                                                <td class="center"><?php echo htmlentities($rowBranches->V_Forenames.' '.$rowBranches->V_Surname);?>
                                                <td class="center"><?php echo htmlentities($rowBranches->B_Contact_No);?></td>
                                                <td class="center"><?php echo htmlentities($rowBranches->B_Email);?></td>
                                                <td class="center"><?php
                                                    if($rowBranches->B_Active=="1")
                                                    {?>
                                                        <img src="assets/img/true.png" alt=""/><?php
                                                    }
                                                    elseif($rowBranches->B_Active=="0")
                                                    {?>
                                                        <img src="assets/img/false.png" alt=""/><?php
                                                    }?>
                                                </td>
                                                <td class="center">
                                                    <a href="#" class="edit btn btn-dark" id="<?php echo ($rowBranches->BranchID); ?>" title="click to edit">
                                                        <img src="assets/img/edit.png" width="18" height="18" alt="submit" /></a>
                                                </td>
                                                <td class="center">
                                                    <form method="post">
                                                        <input name="btnDel" type="hidden" value="<?php echo htmlentities($rowBranches->BranchID);?>" />
                                                        <input type="submit" name="btn btnDel" class="btn btn-red" value="X"
                                                               onclick="return confirm('Are you sure you want to delete ?');"/>
                                                    </form>
                                                </td>
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
                            NEW BRANCH
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php @include("branch_new.php"); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mod_edit" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content frm1-type3">
                        <div class="frm1-heading">
                            EDIT BRANCH
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="info_update">
                            <?php @include("branch_edit.php"); ?>
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
                            url:"branch_edit.php",
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

        </body>
        <?php include('footer.php');?>
    </html>
<?php
} ?>