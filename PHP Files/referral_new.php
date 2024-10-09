<?php 
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(isset($_POST['save-referral']))
{
    (new DbNew())->Referral();
}
if(isset($_SESSION['acVID']))
{
    $ReferrerID=1;
    $Refer_Forenames = $_SESSION['acFOR'];
    $Refer_Surname = $_SESSION['acSUR'];
    $Refer_Contact_No = "N/A";
    $Refer_Email = "N/A";
    $hRef="dashboard_rfr.php";
}
?>
<form class="forms-new" method="post" enctype="multipart/form-data">

    <div class="frm1 frm1-type3">
        <div class="frm1-heading">Organisation Information
        </div>
        <div class="frm1-body">
            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label>Forename<span style="color:red;">*</span></label>
                        <?php if(isset($_SESSION['acVID']))
                        { ?>
                            <input class="frm-control" type="text" name="Refer_Forenames" value="<?php echo $_SESSION['acFOR'] ?>" autocomplete="off" readonly required />
                        <?php }
                        else { ?>
                            <input class="frm-control" type="text" name="Refer_Forenames" autocomplete="off" required />
                        <?php } ?>
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Surname <span style="color:red;">*</span></label>
                        <?php if(isset($_SESSION['acVID']))
                        { ?>
                            <input class="frm-control" type="text" name="Refer_Surname" value="<?php echo $_SESSION['acSUR'] ?>" autocomplete="off" readonly required />
                        <?php }
                        else { ?>
                            <input class="frm-control" type="text" name="Refer_Surname" autocomplete="off" required />
                        <?php } ?>
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Contact_No<span style="color:red;">*</span></label>
                        <?php if(isset($_SESSION['acVID']))
                        { ?>
                            <input class="frm-control" type="text" name="Refer_Contact_No" value="N/A" autocomplete="off" readonly required />
                        <?php }
                        else { ?>
                            <input class="frm-control" type="text" name="Refer_Contact_No" autocomplete="off" required />
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a6">
                    <div class="frm-group">
                        <label>Email<span style="color:red;">*</span></label>
                        <?php if(isset($_SESSION['acVID']))
                        { ?>
                            <input class="frm-control" type="text" name="Refer_Email" value="N/A" autocomplete="off" readonly required />
                        <?php }
                        else { ?>
                            <input class="frm-control" type="text" name="Refer_Email" autocomplete="off" required />
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="frm1 frm1-type3">
        <div class="frm1-heading">Client Information
        </div>
        <div class="frm1-body">
            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label>Forenames <span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Forenames" value="" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Surname <span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Surname" value="" required="required" />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Date of Birth<span style="color:red;">*</span></label>
                        <input class="frm-control" type="date" name="DOB" value="" required="required" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label>Housing Status<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Housing_StatusID" required >
                            <?php (new DbOptions())->HousingStatus(0); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>House No/Name <span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="House_No" value="" autocomplete="off" required />
                    </div>
                </div>

                <div class="col-a2">
                    <div class="frm-group">
                        <label>Postcode <span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Postcode" value="" required="required" />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Contact_No<span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Contact_No" value="" autocomplete="off"/>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a6">
                    <div class="frm-group">
                        <label>Email<span style="color:red;">*</span></label>
                        <input class="frm-control" type="text" name="Email" value="" autocomplete="off"/>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a6">
                    <div class="frm-group">
                        <label>Dependants by Age<span style="color:red;"></span></label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a1">
                    <div class="frm-group">
                        <label>0-2<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Dependant_0_2" required >
                            <?php (new DbOptions())->Dependants(0); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a1">
                    <div class="frm-group">
                        <label>3-10<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Dependant_3_10" required >
                            <?php (new DbOptions())->Dependants(0); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a1">
                    <div class="frm-group">
                        <label>11-17<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Dependant_11_17" required >
                            <?php (new DbOptions())->Dependants(0); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a2">
                    <div class="frm-group">
                        <label>Child 18-25<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Dependant_C18_25" required >
                            <?php (new DbOptions())->Dependants(0); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a2">
                    <div class="frm-group">
                        <label>Adult 18-25<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Dependant_A18_25" required >
                            <?php (new DbOptions())->Dependants(0); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a1">
                    <div class="frm-group">
                        <label>26-50<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Dependant_26_50" required >
                            <?php (new DbOptions())->Dependants(0); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a1">
                    <div class="frm-group">
                        <label>50-69<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Dependant_50_69" required >
                            <?php (new DbOptions())->Dependants(0); ?>
                        </select>
                    </div>
                </div>

                <div class="col-a1">
                    <div class="frm-group">
                        <label>70+<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="Dependant_70" required >
                            <?php (new DbOptions())->Dependants(0); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-md-3">
        <button type="submit" style="float: left;" name="save-referral" class="btn btn-primary  mr-2 mb-4">Save</button>
    </div>
</form>