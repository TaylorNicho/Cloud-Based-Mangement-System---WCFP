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


if(isset($_POST['save']))
{
    (new DbNew())->Branch();
}?>

<form class="forms-new" method="post" enctype="multipart/form-data">

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label for="Branch_Name">Branch Name</label>
                <input class="frm-control" type="text" name="Branch_Name" id="Branch_Name" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label for="Building_No">Building No</label>
                <input class="frm-control" type="text" name="Building_No" id="Building_No" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label for="Postcode">Postcode</label>
                <input class="frm-control" type="text" name="Postcode" id="Postcode" autocomplete="off" required />
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label for="ManagerID">Manager<span style="color:red;">*</span></label>
                <select class="frm-control" type="text" name="ManagerID" id="ManagerID" required >
                    <?php (new DbOptions())->Manager(0); ?>
                </select>
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label for="Contact_No">Contact_No</label>
                <input class="frm-control" type="text" name="Contact_No" id="Contact_No" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label for="Email">Email</label>
                <input class="frm-control" type="text" name="Email" id="Email" autocomplete="off" required />
            </div>
        </div>
    </div>

    <label> Open</label>
    <div class="form-row">
        <div class="col-a1">
            <div class="form-group">
                <label>Mon</label>
                <input class="frm-control" type="time" name="OpenMon" id="OpenMon" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <label>Tue</label>
                <input class="frm-control" type="time" name="OpenTue" id="OpenTue" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <label>Wed</label>
                <input class="frm-control" type="time" name="OpenWed" id="OpenWed" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <label>Thu</label>
                <input class="frm-control" type="time" name="OpenThu" id="OpenThu" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <label>Fri</label>
                <input class="frm-control" type="time" name="OpenFri" id="OpenFri" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <label>Sat</label>
                <input class="frm-control" type="time" name="OpenSat" id="OpenSat" autocomplete="off" required />
            </div>
        </div>
    </div>

    <label>Close</label>
    <div class="form-row">
        <div class="col-a1">
            <div class="form-group">
                <input class="frm-control" type="time" name="CloseMon" id="CloseMon" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <input class="frm-control" type="time" name="CloseTue" id="CloseTue" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <input class="frm-control" type="time" name="CloseWed" id="CloseWed" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <input class="frm-control" type="time" name="CloseThu" id="CloseThu" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <input class="frm-control" type="time" name="CloseFri" id="CloseFri" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a1">
            <div class="form-group">
                <input class="frm-control" type="time" name="CloseSat" id="CloseSat" autocomplete="off" required />
            </div>
        </div>
    </div>

    <div class="form-group col-md-3">
        <button type="submit" style="float: left;" name="save" class="btn btn-primary  mr-2 mb-4">Save</button>
    </div>

</form>