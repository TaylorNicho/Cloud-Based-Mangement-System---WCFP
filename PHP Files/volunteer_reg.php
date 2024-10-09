<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");
if(isset($_POST['vol-reg']))
{
    (new DbNew())->VolunteerRegister();

}
$FourDigitRan = (new DbGet())->UUID();
?>
<div class="card-body">
<form class="forms-new" method="post" enctype="multipart/form-data">

    <div class="form-row">
        <div class="col-a3">
            <div class="frm-group">
                <label>User PIN</label>
                <input class="frm-control" type="text" name="UID" value="<?php echo htmlentities($FourDigitRan)?>" autocomplete="off" required readonly/>
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

        <div class="col-a1">
            <div class="frm-group">
                <div class="form-group col-md-3">
                    <button type="submit" style="float: left;" name="vol-reg" class="btn btn-sm btn-primary  mr-2 mb-4">Submit</button>
                </div>
            </div>
        </div>

        <div class="col-a8">
            <div class="frm-group">
                <label> Once registered please contact administration to have your account activated!</label>
            </div>
        </div>
    </div>
</form>

</div>