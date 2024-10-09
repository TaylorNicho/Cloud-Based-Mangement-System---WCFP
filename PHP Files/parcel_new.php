<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(isset($_POST['new_parcel']))
{
    (new DbNew())->Parcel();
}
$cid=$_GET['cid'];
$vid=$_SESSION['acVID'];
?>


<form class="forms-new" method="post" enctype="multipart/form-data">

    <div class="form-row">

        <div class="col-a2">
            <div class="frm-group">
                <label>Volunteer</label>
                <input class="frm-control" type="text" name="parcel_v" id="parcel_v" value="<?php echo $vid ?>" autocomplete="off" readonly />
            </div>
        </div>

        <div class="col-a2">
            <div class="frm-group">
                <label>Client</label>
                <input class="frm-control" type="text" name="parcel_c" id="parcel_c" value="<?php echo $cid ?>" autocomplete="off" readonly />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label>Date/Time</label>
                <input class="frm-control" type="datetime-local" name="parcel_dt" id="parcel_dt" value="<?php echo date('Y-m-d\TH:i:s'); ?>" />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label>Branch<span style="color:red;">*</span></label>
                <select class="frm-control" type="text" name="parcel_b" required>
                    <?php (new DbOptions())->Branch(0); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label for="parcel_n">Note</label>
                <textarea id="parcel_n" name="parcel_n" rows="4" cols="85"></textarea>
            </div>
        </div>
    </div>

    <div class="form-group col-md-3">
        <button type="submit" style="float: left;" name="new_parcel" class="btn btn-primary  mr-2 mb-4">Save</button>
    </div>

</form>