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
    if(isset($_POST['delete_status']))
    {
        $delID = $_POST['delId'];
        $tbl = $_POST['delTb'];
        (new DbDelete())->Status($tbl, $delID);
    }
    ?><!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>REFERRAL MANAGEMENT SYSTEM | VIEW ALL BRANCHES</title>
            <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
            <link href="assets/css/style.css" rel="stylesheet" />
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        </head>
        <body>
            <?php include('header.php');?>
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-a5">
                            <h4 class="header-line">ADMIN | MANAGE MENU OPTIONS</h4>
                        </div>
                    </div>
                   <div class="row">
                <div class="col-md-12">
                    <?php
                    $tblarray = array("Client Status", "Housing Status", "Referral Status", "Volunteer Role");

                    foreach ($tblarray as $tbl) { ?>
                        <div class="frm1 frm1-type3">
                            <div class="frm1-heading"><?php echo $tbl ?>
                            </div>
                            <div class="frm1-body">
                                <div class="panel-body">
                                    <div class="tbl-resp">
                                        <table class="table tbl-strp tbl-brdr tbl-hvr">
                                            <a href="#" class="new_status btn btn-sm btn-primary" id="<?php echo $tbl ?>" title="click to edit">New <?php echo $tbl ?></a>
                                            <tblhdr>
                                                <tr>
                                                    <th style="width: 1%">#</th>
                                                    <th style="width: 1%">ID</th>
                                                    <th><?php echo $tbl ?></th>
                                                    <th style="width: 1%">Active</th>
                                                    <th style="width: 1%">Edit</th>
                                                    <th style="width: 1%">Del</th>
                                                </tr>
                                            </tblhdr>
                                            <tbody><?php
                                                $cnt=1;
                                                $results = (new DbGetList())->Status($tbl);
                                                foreach ($results as $result)
                                                {
                                                    ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt);?></td>
                                                        <td class="center"><?php echo htmlentities($result[0]);?></td>
                                                        <td class="center"><?php echo htmlentities($result[1]);?></td>
                                                        <td class="center"><?php
                                                            if($result[2]=="1")
                                                            {?>
                                                                <img src="assets/img/true.png"/><?php
                                                            }
                                                            elseif($result[2]=="0")
                                                            {?>
                                                                <img src="assets/img/false.png"/><?php
                                                            }?>
                                                        </td>
                                                        <td class="center">
                                                            <a href="#" class="edit_status btn btn-dark" id="<?php echo htmlentities($result[0]); ?>" title="<?php echo $tbl ?>">
                                                                <img src="assets/img/edit.png" width="18" height="18" alt="submit" />
                                                            </a>
                                                        </td>
                                                        </td>
                                                        <td class="center">
                                                            <form method="post">
                                                                <input name="delTb" type="hidden" value="<?php echo htmlentities($tbl);?>" />
                                                                <input name="delId" type="hidden" value="<?php echo htmlentities($result[0]);?>" />
                                                                <input type="submit" name="delete_status" class="btn btn-red" value="X"
                                                                       onclick="return confirm('Are you sure you want to delete ID:<?php echo $result[0]?>');"/>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $cnt=$cnt+1;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                   <?php }
                    ?>

                       </div>
                </div>
            </div>

                <div id="mod_new_status" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content frm1-type3">
                            <div class="frm1-heading">
                                NEW STATUS
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="inf_new_status">
                                <?php @include("status_new.php");?>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="mod_edit_status" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content frm1-type3">
                            <div class="frm1-heading">
                                EDIT STATUS
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="inf_edit_status">
                                <?php @include("status_edit.php");?>
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
                        $(document).on('click','.edit_status',function(){
                            var statusId=$(this).attr('id');
                            var statusTbl=$(this).attr('title');
                            $.ajax({
                                url:"status_edit.php",
                                type:"post",
                                data:{statusId:statusId,statusTbl:statusTbl},
                                success:function(data){
                                    $("#inf_edit_status").html(data);
                                    $("#mod_edit_status").modal('show');
                                }
                            });
                        });

                        $(document).on('click','.new_status',function(){
                            var tb=$(this).attr('id');
                            $.ajax({
                                url:"status_new.php",
                                type:"post",
                                data:{tb:tb},
                                success:function(data){
                                    $("#inf_new_status").html(data);
                                    $("#mod_new_status").modal('show');
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