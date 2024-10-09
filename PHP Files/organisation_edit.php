<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");
if(!isset($_SESSION['acVID']) || !isset($_SESSION['acROL']))
{
    header('location:index.php');
    die();
}

if(isset($_POST['insert']))
{
    $eid=$_POST['edit_id'];
    $eib= $_SESSION['editbid'];
    (new DbUpdate())->Organisation($eib);
}
?>
<div class="card-body">
    <?php
    $eid=$_POST['edit_id'];
    $row = (new DbGet())->Organisation($eid);

        $_SESSION['editbid']=$row->OrganisationID;
        ?>
        <form class="forms-new" method="post" enctype="multipart/form-data">
            <div class="row ">
                <div class="form-group col-md-5">
                    <label for="oe_name">Organisation</label>
                    <input type="text" name="oe_name" id="oe_name" class="form-control" value="<?php echo htmlentities($row->O_Name);?>" placeholder="Enter Organisation" autocomplete="off" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="oe_pin" >PIN</label>
                    <input type="text" name="oe_pin" id="oe_pin" value="<?php echo htmlentities($row->O_PIN);?>" placeholder="Enter PIN" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="oe_active">Active <span style="color:red;"></span></label>
                    <select class="frm-control" name="oe_active" id="oe_active">
                        <?php if($row->O_Active==1) {?>
                            <option value=0>No</option>
                            <option value=1 Selected>Yes</option>
                        <?php } else {?>
                            <option value=0 Selected>No</option>
                            <option value=1>Yes</option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-3">
                <button type="submit" name="insert" class="btn btn-primary btn-fw mr-2"  style="float: left;">Update</button>
            </div>

        </form>

    <div class="form-group col-md-3">
        <button style="float: left;" id="new_PIN" name="new_PIN" onclick="generateNew()" class="btn btn-primary mr-2 mb-4">New PIN</button>
    </div>


    <script type="text/javascript">
        $(window).on('load', function () {
            generateNew();
        })
        function generateNew(){
            document.getElementById("oe_pin").value = <?php echo (new DbGet())->OrgPIN(); ?>;
            document.getElementById("new_PIN").style.display='none';
        }
    </script>
</div>