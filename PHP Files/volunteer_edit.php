<?php
session_start();
include_once("db_functions.php");
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

if(!isset($_SESSION['acVID']) || !isset($_SESSION['acROL']))
{
    header('location:index.php');
    die();
}
include_once("db_functions.php");
if(isset($_POST['update_volunteer']))
{
    $eid=$_POST['edit_id'];
    $eib= $_SESSION['editbid'];
    $VolunteerID=$_POST['VolunteerID'];
    (new DbUpdate())->Volunteer($VolunteerID);
}
?>


<div class="card-body">
    <?php

    $eid=$_POST['edit_id'];
    $rowVolunteer= (new DbGet())->Volunteer($eid);

        $_SESSION['editbid']=$rowVolunteer->VolunteerID;
        ?>
        <form class="forms-new" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label>Volunteer ID <span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="VolunteerID" value="<?php echo htmlentities($rowVolunteer->VolunteerID);?>" autocomplete="off" readonly />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>User ID<span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="UID" value="<?php echo htmlentities($rowVolunteer->V_UID);?>" readonly/>
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Password<span style="color:red;">*</span></label>
                        <input class="frm-control" type="password" name="Password" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label>Forenames<span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Forenames" value="<?php echo htmlentities($rowVolunteer->V_Forenames);?>" required="required" />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Surname<span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Surname" value="<?php echo htmlentities($rowVolunteer->V_Surname);?>" required="required" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label>Joined<span style="color:red;">*</span></label>
                        <input class="frm-control" type="Date" name="Joined" value="<?php echo htmlentities($rowVolunteer->V_Joined);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Branch<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="BranchID" required >
                            <?php (new DbOptions())->Branch($rowVolunteer->V_BranchID); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Volunteer Role<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Volunteer_RoleID" required >
                            <?php (new DbOptions())->VolunteerRole($rowVolunteer->V_Volunteer_RoleID); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a2">
                    <div class="frm-group">
                        <label>Active <span style="color:red;"></span></label>
                        <select class="frm-control" name="Active">
                            <?php if($rowVolunteer->V_Active==1) {?>
                                <option value=0>No</option>
                                <option value=1 Selected>Yes</option>
                            <?php } else {?>
                                <option value=0 Selected>No</option>
                                <option value=1>Yes</option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3">
                <button type="submit" name="update_volunteer" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
            </div>
        </form>

</div>