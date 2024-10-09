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

if(isset($_POST['new_status']))
{
    $tb = $_SESSION['tb'];
    (new DbNew())->Status($tb);
}
$tb=$_POST['tb'];
$_SESSION['tb']=$_POST['tb'];
?>
<div class="card-body">
    <form class="forms-new" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-a6">
                <div class="frm-group">
                    <label for="item"><?php echo $tb ?></label>
                    <input class="frm-control" type="text" name="item" id="item" autocomplete="off" required />
                </div>
            </div>
        </div>

        <div class="form-group col-md-3">
            <button type="submit" name="new_status" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
        </div>
    </form>
</div>