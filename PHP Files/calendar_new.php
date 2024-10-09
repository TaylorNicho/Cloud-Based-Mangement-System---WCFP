<?php 
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(isset($_POST['cal_save']))
{
    if(isset($_SESSION['cid']))
        (new DbNew())->Appointment(true);
    else
        (new DbNew())->Appointment(false);
    unset($_POST['cal_save']);
}
$cal_end=$_POST['cal_end'];
$cal_start=$_POST['cal_start'];
if(isset($_POST['cal_bid']))
    $cal_bid=$_POST['cal_bid'];
else
    $cal_bid=0;

if(isset($_POST['cal_vid']))
    $cal_vid=$_POST['cal_vid'];
else
    $cal_vid=0;

?>

<form class="forms-new" method="post" enctype="multipart/form-data">



    <div class="form-row"> <?php
        if(isset($_SESSION['cid']))
        { ?>
            <input class="frm-control" type="text" name="cal_cid" id="cal_cid" value="<?php echo $_SESSION['cid'] ?>" autocomplete="off" required hidden readonly/><?php
        }
        else
        { ?>
        <div class="col-a4">
            <div class="frm-group">
                <label for="cal_cid">Client<span style="color:red;"></span></label>
                <select class="frm-control" type="text" name="cal_cid" id="cal_cid" required ><?php (new DbOptions())->Clients(0); ?></select>
            </div>
        </div> <?php
        } ?>


        <div class="col-a6">
            <div class="frm-group">
                <label for="cal_title">Title</label>
                <input class="frm-control" type="text" name="cal_title" id="cal_title" autocomplete="off" required />
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_start">Start Date / Time</label>
                <input class="frm-control" type="datetime-local" name="cal_start" id="cal_start" value="<?php echo $cal_start ?>" autocomplete="off" required />
            </div>
        </div>
        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_end">End Date / Time</label>
                <input class="frm-control" type="datetime-local" name="cal_end" id="cal_end" value="<?php echo $cal_end ?>" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_bid">Branch<span style="color:red;">*</span></label>
                <select class="frm-control" type="text" name="cal_bid" id="cal_bid" required >
                    <?php (new DbOptions())->Branch($cal_bid); ?>
                </select>
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_vid">Volunteer<span style="color:red;">*</span></label>
                <select class="frm-control" type="text" name="cal_vid" id="cal_vid" required >
                    <?php (new DbOptions())->Volunteer($cal_vid); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label for="cal_note">Notes</label>
                <textarea id="cal_note" name="cal_note" rows="4" cols="85"></textarea>
            </div>
        </div>
    </div>

    <div class="form-group col-md-3">
        <button type="submit" style="float: left;" name="cal_save" class="btn btn-primary  mr-2 mb-4">Save</button>
    </div>

</form>