<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(isset($_POST['update_cal']))
{
    $aid=$_SESSION['aid'];
    $cal_edit_cid=$_SESSION['cal_edit_cid'];
    (new DbUpdate())->Appointment($aid, $cal_edit_cid);
}
else
{
    $aid=$_POST['aid'];
    $_SESSION['aid']=$_POST['aid'];
    $result_cal = (new DbGet())->Appointment($aid);
    ?>

<form class="forms-new" method="post" enctype="multipart/form-data">

    <div class="form-row">
        <div class="col-a4">
            <div class="frm-group">
                <label for="cal_edit_cid">Client</label>
                <input class="frm-control" type="text" name="cal_edit_cid" id="cal_edit_cid" value="<?php echo $result_cal->C_Forenames . " " . $result_cal->C_Surname ?>" readonly />
            </div>
        </div>

        <div class="col-a6">
            <div class="frm-group">
                <label for="cal_edit_title">Title</label>
                <input class="frm-control" type="text" name="cal_edit_title" id="cal_edit_title" value="<?php echo $result_cal->A_Title ?>"autocomplete="off" required />
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_edit_start">Start Date / Time</label>
                <input class="frm-control" type="datetime-local" name="cal_edit_start" id="cal_edit_start" value="<?php echo $result_cal->A_Start ?>" autocomplete="off" required />
            </div>
        </div>
        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_edit_end">End Date / Time</label>
                <input class="frm-control" type="datetime-local" name="cal_edit_end" id="cal_edit_end" value="<?php echo $result_cal->A_End ?>" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_edit_bid">Branch<span style="color:red;">*</span></label>
                <select class="frm-control" type="text" name="cal_edit_bid" id="cal_edit_bid" required >
                    <?php (new DbOptions())->Branch($result_cal->A_BranchID); ?>
                </select>
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_edit_vid">Volunteer<span style="color:red;">*</span></label>
                <select class="frm-control" type="text" name="cal_edit_vid" id="cal_edit_vid" required >
                    <?php (new DbOptions())->Volunteer($result_cal->A_VolunteerID); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_edit_note">Notes</label>
                <textarea id="cal_edit_note" name="cal_edit_note" rows="4"  cols="85"><?php echo $result_cal->A_Note ?></textarea>
            </div>
        </div>
    </div>

    <div class="form-group col-md-3">
        <button type="submit" style="float: left;" name="update_cal" class="btn btn-primary  mr-2 mb-4">Save</button>
    </div>

</form>
<?php  } ?>