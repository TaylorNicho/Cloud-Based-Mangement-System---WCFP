<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

//if(!isset($_SESSION['acVID']) || !isset($_SESSION['acROL']))
//{
//    header('location:index.php');
//    die();
//}
include_once("db_functions.php");
if(isset($_POST['update_referral']))
{
    $refID = $_SESSION['refID'];
    unset($_POST['edit_id']);
    (new DbUpdate())->Referral($refID);
}
?>
<div class="card-body">
    <form class="forms-new" method="post" enctype="multipart/form-data">

            <?php
            $eid=$_POST['edit_id'];
            if(isset($_POST['edit_id']))
            {
            $rowReferral = (new DbGet())->Referral($eid);
            $_SESSION['refID'] = $rowReferral->ReferralID;
            ?>

            <div class="frm1 frm1-type3">
                <div class="frm1-heading">Organisation | <?php echo $rowReferral->O_Name ?> |
                </div>
                <div class="frm1-body">
                    <div class="form-row">
                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Forename<span style="color:red;">*</span></label>
                                <input class="frm-control" type="text" name="Refer_Forenames" value="<?php echo $rowReferral->R_Forenames ?>" autocomplete="off" readonly required />
                            </div>
                        </div>

                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Surname <span style="color:red;">*</span></label>
                                <input class="frm-control" type="text" name="Refer_Surname" value="<?php echo $rowReferral->R_Surname ?>" autocomplete="off" readonly required />
                            </div>
                        </div>

                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Contact_No<span style="color:red;">*</span></label>
                                <input class="frm-control" type="text" name="Refer_Contact_No" value="<?php echo $rowReferral->R_Contact_No ?>" autocomplete="off" readonly required />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-a6">
                            <div class="frm-group">
                                <label>Email<span style="color:red;">*</span></label>
                                    <input class="frm-control" type="text" name="Refer_Email" value="<?php echo $rowReferral->R_Email ?>" autocomplete="off" readonly required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="frm1 frm1-type3">
                <div class="frm1-heading">Client Information ID:<?php echo $rowReferral->ClientID ?>
                </div>
                <div class="frm1-body">
                    <div class="form-row">
                        <input class="frm-control" type="hidden" name="ClientID" value="<?php echo htmlentities($rowReferral->ClientID);?>"/>

                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Forenames <span style="color:red;">*</span></label>
                                <input class="frm-control" type="text" name="Forenames" value="<?php echo htmlentities($rowReferral->C_Forenames);?>" autocomplete="off" required />
                            </div>
                        </div>

                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Surname <span style="color:red;">*</span></label>
                                <input class="frm-control" type="text" name="Surname" value="<?php echo htmlentities($rowReferral->C_Surname);?>" required="required" />
                            </div>
                        </div>

                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Date of Birth<span style="color:red;">*</span></label>
                                <input class="frm-control" type="date" name="DOB" value="<?php echo htmlentities($rowReferral->C_DOB);?>" required="required" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Housing Status<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Housing_StatusID" required >
                                    <?php (new DbOptions())->HousingStatus($rowReferral->C_Housing_StatusID); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-a3">
                            <div class="frm-group">
                                <label>House No/Name <span style="color:red;">*</span></label>
                                <input class="frm-control" type="text" name="House_No" value="<?php echo htmlentities($rowReferral->C_House_No);?>" autocomplete="off" required />
                            </div>
                        </div>

                        <div class="col-a2">
                            <div class="frm-group">
                                <label>Postcode <span style="color:red;">*</span></label>
                                <input class="frm-control" type="text" name="Postcode" value="<?php echo htmlentities($rowReferral->C_Postcode);?>" required="required" />
                            </div>
                        </div>

                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Contact_No<span style="color:red;">*</span></label>
                                <input class="frm-control" type="text" name="Contact_No" value="<?php echo htmlentities($rowReferral->C_Contact_No);?>" autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-a6">
                            <div class="frm-group">
                                <label>Email<span style="color:red;">*</span></label>
                                <input class="frm-control" type="text" name="Email" value="<?php echo htmlentities($rowReferral->C_Email);?>" autocomplete="off"/>
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
                                    <?php (new DbOptions())->Dependants($rowReferral->C_Dependant_0_2); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-a1">
                            <div class="frm-group">
                                <label>3-10<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Dependant_3_10" required >
                                    <?php (new DbOptions())->Dependants($rowReferral->C_Dependant_3_10); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-a1">
                            <div class="frm-group">
                                <label>11-17<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Dependant_11_17" required >
                                    <?php (new DbOptions())->Dependants($rowReferral->C_Dependant_11_17); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-a2">
                            <div class="frm-group">
                                <label>Child 18-25<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Dependant_C18_25" required >
                                    <?php (new DbOptions())->Dependants($rowReferral->C_Dependant_C18_25); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-a2">
                            <div class="frm-group">
                                <label>Adult 18-25<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Dependant_A18_25" required >
                                    <?php (new DbOptions())->Dependants($rowReferral->C_Dependant_A18_25); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-a1">
                            <div class="frm-group">
                                <label>26-50<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Dependant_26_50" required >
                                    <?php (new DbOptions())->Dependants($rowReferral->C_Dependant_26_50); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-a1">
                            <div class="frm-group">
                                <label>50-69<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Dependant_50_69" required >
                                    <?php (new DbOptions())->Dependants($rowReferral->C_Dependant_50_69); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-a1">
                            <div class="frm-group">
                                <label>70+<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Dependant_70" required >
                                    <?php (new DbOptions())->Dependants($rowReferral->C_Dependant_70); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Client Status<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Client_StatusID" required >
                                    <?php (new DbOptions())->ClientStatus($rowReferral->C_Client_StatusID); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-a3">
                            <div class="frm-group">
                                <label>Referral Status<span style="color:red;">*</span></label>
                                <select class="frm-control" type="text" name="Referral_StatusID" required >
                                    <?php (new DbOptions())->ReferralStatus($rowReferral->R_Referral_StatusID); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        <?php
     //   }
?>
        <div class="form-group col-md-3">
            <button type="submit" name="update_referral" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
        </div>

        <?php } ?>
    </form>
</div>