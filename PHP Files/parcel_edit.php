<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(isset($_POST['update_parcel']))
{
    //  require('db_upd2.php');
    $eid=$_POST['edit_id'];
    $PiD= $_SESSION['pid'];
    $CiD = $_SESSION['cid'];
    (new DbUpdate())->Parcel($PiD,$CiD);
}
?>
<div class="card-body">
    <?php
    $eid=$_POST['edit_id'];
    echo $eid;
    $row = (new DbGet())->Parcel($eid);

    $_SESSION['pid']=$row->ParcelID;

        ?>
        <form class="forms-new" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="col-a2">
                    <div class="frm-group">
                        <label for="edit_parcel_C">ClientID</label>
                        <input class="frm-control" type="text" name="edit_parcel_c" id="edit_parcel_C" value="<?php echo $row->P_ClientID ?>" autocomplete="off" readonly />
                    </div>
                </div>
                <div class="col-a2">
                    <div class="frm-group">
                        <label>VolunteerID</label>
                        <input class="frm-control" type="text" name="edit_parcel_v" id="edit_parcel_v" value="<?php echo $row->P_VolunteerID ?>" autocomplete="off" readonly />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label for="edit_parcel_dt">Date/Time</label>
                        <input class="frm-control" type="datetime-local" name="edit_parcel_dt" id="edit_parcel_dt" value="<?php echo date($row->P_Collected); ?>" />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label for="edit_parcel_b">Branch<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="edit_parcel_b" required >
                            <?php (new DbOptions())->Branch($row->P_BranchID); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label for="edit_parcel_n">Note</label>
                        <textarea id="edit_parcel_n" name="edit_parcel_n" rows="4" cols="85"><?php echo htmlspecialchars($row->P_Notes); ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3">
                <button type="submit" name="update_parcel" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
            </div>
        </form>

</div>