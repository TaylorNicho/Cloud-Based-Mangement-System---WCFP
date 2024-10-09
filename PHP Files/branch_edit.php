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

if(isset($_POST['insert']))
{
    $eid=$_POST['edit_id'];
    $eib= $_SESSION['editbid'];
    $BranchID=$_POST['BranchID'];
    (new DbUpdate())->Branch($BranchID);
}
?>
<div class="card-body">
    <?php

        $eid=$_POST['edit_id'];
    $rowBranch= (new DbGet())->Branch($eid);
        $_SESSION['editbid']=$rowBranch->BranchID;
        ?>
        <form class="forms-new" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label>Branch ID<span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="BranchID" value="<?php echo htmlentities($rowBranch->BranchID);?>" autocomplete="off" readonly />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Branch Name <span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Branch_Name" value="<?php echo htmlentities($rowBranch->B_Name);?>" required="required" />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Manager<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="ManagerID" required >
                            <?php (new DbOptions())->Manager($rowBranch->B_ManagerID); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label>Building No/Name <span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Building_No" value="<?php echo htmlentities($rowBranch->B_Building_No);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Postcode <span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Postcode" value="<?php echo htmlentities($rowBranch->B_Postcode);?>" required="required" />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Contact_No<span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Contact_No" value="<?php echo htmlentities($rowBranch->B_Contact_No);?>" autocomplete="off"/>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a6">
                    <div class="frm-group">
                        <label>Email<span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Email" value="<?php echo htmlentities($rowBranch->B_Email);?>" autocomplete="off"/>
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Active <span style="color:red;"></span></label>
                        <select class="frm-control" name="Active">
                            <?php if($rowBranch->B_Active==1) {?>
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

            <label> Open</label>
            <div class="form-row">
                <div class="col-a1">
                    <div class="form-group">
                        <label for="OpenMon">Mon</label>
                        <input class="frm-control" type="time" name="OpenMon" id="OpenMon" value="<?php echo htmlentities($rowBranch->B_Mon_Open);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <label for="OpenTue">Tue</label>
                        <input class="frm-control" type="time" name="OpenTue" id="OpenTue" value="<?php echo htmlentities($rowBranch->B_Tue_Open);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <label>Wed</label>
                        <input class="frm-control" type="time" name="OpenWed" id="OpenWed" value="<?php echo htmlentities($rowBranch->B_Wed_Open);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <label>Thu</label>
                        <input class="frm-control" type="time" name="OpenThu" id="OpenThu" value="<?php echo htmlentities($rowBranch->B_Thu_Open);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <label>Fri</label>
                        <input class="frm-control" type="time" name="OpenFri" id="OpenFri" value="<?php echo htmlentities($rowBranch->B_Fri_Open);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <label>Sat</label>
                        <input class="frm-control" type="time" name="OpenSat" id="OpenSat" value="<?php echo htmlentities($rowBranch->B_Sat_Open);?>" autocomplete="off" required />
                    </div>
                </div>
            </div>

            <label>Close</label>
            <div class="form-row">
                <div class="col-a1">
                    <div class="form-group">
                        <input class="frm-control" type="time" name="CloseMon" id="CloseMon" value="<?php echo htmlentities($rowBranch->B_Mon_Close);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <input class="frm-control" type="time" name="CloseTue" id="CloseTue" value="<?php echo htmlentities($rowBranch->B_Tue_Close);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <input class="frm-control" type="time" name="CloseWed" id="CloseWed" value="<?php echo htmlentities($rowBranch->B_Wed_Close);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <input class="frm-control" type="time" name="CloseThu" id="CloseThu" value="<?php echo htmlentities($rowBranch->B_Thu_Close);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <input class="frm-control" type="time" name="CloseFri" id="CloseFri" value="<?php echo htmlentities($rowBranch->B_Fri_Close);?>" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a1">
                    <div class="form-group">
                        <input class="frm-control" type="time" name="CloseSat" id="CloseSat" value="<?php echo htmlentities($rowBranch->B_Sat_Close);?>" autocomplete="off" required />
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3">
                <button type="submit" name="insert" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
            </div>
        </form>
        <?php
    //} ?>
</div>