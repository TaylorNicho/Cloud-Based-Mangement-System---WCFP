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
include_once("db_functions.php");

if(isset($_POST['update_status']))
{
    $statusId = $_SESSION['statusId'];
    $statusTbl = $_SESSION['statusTbl'];

    (new DbUpdate())->Status($statusTbl,$statusId);
}
?>
<div class="card-body">
    <?php
    if(!empty($_POST['statusId']))
    {
        $statusId=$_POST['statusId'];
        $statusTbl=$_POST['statusTbl'];
        $_SESSION['statusId']=$_POST['statusId'];
        $_SESSION['statusTbl']=$_POST['statusTbl'];
        $row = (new DbGet())->Status($statusTbl,$statusId);

        ?>
        <form class="forms-new" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="col-a5">
                    <div class="frm-group">
                        <label>Status Name</label>
                        <input type="text" name="s_name" class="form-control" value="<?php echo htmlentities($row[1]);?>" id="s_name" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label>Active <span style="color:red;"></span></label>
                    <select class="frm-control" name="s_active" id="s_active">
                        <?php if($row[2]==1) {?>
                            <option value=0>No</option>
                            <option value=1 Selected>Yes</option>
                        <?php } else {?>
                            <option value=0 Selected>No</option>
                            <option value=1>Yes</option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-3">
                <button type="submit" name="update_status" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
            </div>
        </form>
<?php } ?>
</div>