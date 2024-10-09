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
    (new DbNew())->Organisation();
    echo "<script>window.location.href='organisations.php'</script>";
}
else
{

    ?>
<form class="forms-new" method="post" enctype="multipart/form-data">

    <div class="row ">
        <div class="form-group col-md-5">
            <label for="on_name">Organisation</label>
            <input type="text" name="on_name" class="form-control" value="" id="on_name" placeholder="Enter Organisation" autocomplete="off" required>
        </div>
        <div class="form-group col-md-3">
            <label for="on_pin">PIN</label>
            <input type="text" placeholder="Enter PIN" class="form-control" name="on_pin" id="on_pin" value="<?php echo (new DbGet())->OrgPIN(); ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="on_active">Active <span style="color:red;"></span></label>
            <select class="frm-control" name="on_active" id="on_active">
                <option value=0>No</option>
                <option value=1>Yes</option>
            </select>
        </div>
    </div>

    <div class="form-group col-md-3">
        <button type="submit" style="float: left;" name="save" class="btn btn-primary mr-2 mb-4">Save</button>
    </div>

</form>
    <div class="form-group col-md-3">
        <button style="float: left;" id="newPIN" name="newPIN" onclick="generate()" class="btn btn-primary mr-2 mb-4">New PIN</button>
    </div>

    <script type="text/javascript">
        $(window).on('load', function () {
            generate();
        })
        function generate(){
            document.getElementById("on_pin").value = <?php echo (new DbGet())->OrgPIN(); ?>;
            document.getElementById("newPIN").style.display='none';
        }
    </script>

    <?php
} ?>