<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(isset($_POST['update_note']))
{
    $eid=$_POST['edit_id'];
    $h_id= $_SESSION['edithid'];
    $c_id= $_SESSION['editcid'];
}
?>
<div class="card-body">
    <?php
    $eid=$_POST['edit_id'];
    $row = (new DbGet())->ClientHistory($eid);

        $_SESSION['edithid']=$row->Client_HistoryID;
        $_SESSION['editcid']=$row->Ch_ClientID;
        ?>
        <form class="forms-new" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="col-a2">
                    <div class="frm-group">
                        <label>Volunteer</label>
                        <input class="frm-control" type="text" name="note_v" id="note_v" value="<?php echo $row->Ch_VolunteerID ?>" autocomplete="off" readonly />
                    </div>
                </div>

                <div class="col-a2">
                    <div class="frm-group">
                        <label>Client</label>
                        <input class="frm-control" type="text" name="note_c" id="note_c" value="<?php echo $row->Ch_ClientID ?>" autocomplete="off" readonly />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Date/Time</label>
                        <input class="frm-control" type="datetime-local" name="note_dt" id="dateTime" value="<?php echo date($row->Ch_Date); ?>" />
                    </div>
                </div>

                <div class="col-a3">
                    <div class="frm-group">
                        <label>Branch<span style="color:red;">*</span></label>
                        <select class="frm-control" type="text" name="note_b" required>
                            <?php (new DbOptions())->Branch($row->Ch_BranchID); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-a3">
                    <div class="frm-group">
                        <label for="note">Note</label>
                        <textarea id="note" name="note" rows="4" cols="85"><?php echo htmlspecialchars($row->Ch_Notes); ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3">
                <button type="submit" name="update_note" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
            </div>
        </form>
        <?php
   // } ?>
</div>