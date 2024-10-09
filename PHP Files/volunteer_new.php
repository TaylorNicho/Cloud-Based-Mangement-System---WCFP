<?php

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
    (new DbNew())->Volunteer();
}
$FourDigitRandomNumber = rand(1000,9999);
?>
<div class="card-body">
<form class="forms-new" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label>User PIN</label>
                <input class="frm-control" type="text" name="UID" value="<?php echo htmlentities($FourDigitRandomNumber)?>" autocomplete="off" required readonly/>
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label>Firstname</label>
                <input class="frm-control" type="text" name="Forenames" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label>Surname</label>
                <input class="frm-control" type="text" name="Surname" autocomplete="off" required />
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label>Enter Password</label>
                <input class="frm-control" type="password" name="Password" autocomplete="off" required />
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label>Confirm Password </label>
                <input class="frm-control"  type="password" name="ConfirmPwd" autocomplete="off" required />
            </div>
         </div>
    </div>

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label>Branch<span style="color:red;">*</span></label>
                <select class="frm-control" type="text" name="BranchID" required >
                    <?php (new DbOptions())->Branch(0); ?>
                </select>
            </div>
        </div>

        <div class="col-a3">
            <div class="frm-group">
                <label>Volunteer Role<span style="color:red;">*</span></label>
                <select class="frm-control" type="text" name="Volunteer_RoleID" required >
                    <?php (new DbOptions())->VolunteerRole(0); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group col-md-3">
        <button type="submit" style="float: left;" name="save" class="btn btn-sm btn-primary  mr-2 mb-4">Save</button>
    </div>

</form>
</div>