<?php 
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(isset($_POST['new_note']))
{
    (new DbNew())->History();
}
$cid=$_GET['cid'];
$vid=$_SESSION['acVID']
?>


<form class="forms-new" method="post" enctype="multipart/form-data">

    <div class="form-row">

        <div class="col-a2">
            <div class="frm-group">
                <label>Volunteer</label>
                <input class="frm-control" type="text" name="note_v" id="note_v" value="<?php echo $vid ?>" autocomplete="off" readonly />
            </div>
        </div>

        <div class="col-a2">
            <div class="frm-group">
                <label>Client</label>
                <input class="frm-control" type="text" name="note_c" id="note_c" value="<?php echo $cid ?>" autocomplete="off" readonly />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label>Date/Time</label>
                <input class="frm-control" type="datetime-local" name="note_dt" id="dateTime" value="<?php echo date('Y-m-d\TH:i:s'); ?>" />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label>Branch<span style="color:red;">*</span></label>
                <select class="frm-control" type="text" name="note_b" required>
                    <?php (new DbOptions())->Branch(0); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label for="note">Note</label>
                <textarea id="note" name="note" rows="4" cols="85"></textarea>
            </div>
        </div>
    </div>


    <div class="form-group col-md-3">
        <button type="submit" style="float: left;" name="new_note" class="btn btn-primary  mr-2 mb-4">Save</button>
    </div>

</form>