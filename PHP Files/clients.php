<?php
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(!isset($_SESSION['acVID']))
{
    header('location:index.php');
    die();
}
else{

if(isset($_POST['delete_client']))
{
    echo "DEL CLIENT";
    echo $_POST['delete_client'];
    $delID = $_POST["btnDel"];
    (new DbDelete())->Client($delID);
}
if(isset($_POST['edit_client']))
{
    $editID = $_POST["btnEdit"];
    $_SESSION['cid'] = $editID;
    echo "<script>window.location.href = 'client_edit.php?cid=$editID'</script>";
}
$Title = $_SESSION['acROLE'];
unset($_SESSION['bid']);
?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>REFERRER MANAGEMENT SYSTEM | VIEW ALL CLIENT</title>
            <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
            <link href="assets/css/style.css" rel="stylesheet" />
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        </head>

        <body>
            <?php include('header.php');?>
            <div class="content-wrapper">
            <div class="container">
                           <div class="col-a5">
                        <h4 class="header-line"><?php echo $Title ?> | MANAGE CLIENTS</h4>
                    </div>
                    <div class="row">
                            <div class="`">
						<div class="panel-heading">
                            <div class="row">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                            </div>
                                            <div class="col-sm-8">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="submit" value="Filter Records" class="btn btn-sm btn-primary fas fa-plus"/>
                                            </div>
                                        </div>
                                    </div>

                        <div class="">
                            <div class="tbl-resp">
                                <table class="table tbl-strp tbl-brdr tbl-hvr" >

                                        <tr>
                                            <th style="width: 1%">#
                                            </th>
                                            <th style="width: 1%">
                                                <label for="fCId">ID</label>
                                                <input class="form-control-plaintext" style="border-top-color: #0f0f0f; background-color:white" type="text" name="fCId" id="fCId"/>
                                            </th>
                                            <th>
                                                <label for="fForenames">Forenames</label>
                                                <input class="form-control-plaintext" style="border-top-color: #0f0f0f; background-color:white" type="text" name="fForenames" id="fForenames"/>
                                            </th>
                                            <th>
                                                <label for="fSurname">Surname</label>
                                                <input class="form-control-plaintext" style="border-top-color: #0f0f0f; background-color:white" type="text" name="fSurname" id="fSurname"/>
                                            </th>
                                            <th style="column-width: 95px">
                                                <label for="fDOB">DOB</label>
                                                <input class="form-control-plaintext" style="border-top-color: #0f0f0f; background-color:white" type="Date" name="fDOB" id="fDOB"/>
                                            </th>
                                            <th>
                                                <label class="pad-botm1">Registered</label>
                                            </th>
                                            <th>
                                                <label for="fHSID" class="pad-botm1">Housing Status</label>
                                                <select class="border-dark"  name="fHSID" id="fHSID">
                                                    <?php (new DbOptions())->HousingStatus(0); ?>
                                                </select>
                                            </th>
                                            <th>
                                                <label for="fCSID" class="pad-botm1">Client Status</label>
                                                <select class="border-dark" name="fCSID" id="fCSID">
                                                    <?php (new DbOptions())->ClientStatus(0); ?>
                                                </select>
                                            </th>
                                            <th>
                                                Contact No
                                            </th>
                                            <th>
                                                <label for="fFlag" class="pad-botm1">Flag</label>
                                                <select class="border-dark" style="border-color: #0f0f0f; background-color:white" name="fFlag" id="fFlag">
                                                    <option value=""></option>
                                                    <option value=0>No</option>
                                                    <option value=1>Yes</option>
                                                </select>
                                            </th>
                                            <th style="width: 1%">Parcel</th>
                                            <th style="width: 1%">Edit</th>
                                            <th style="width: 1%">Del</th>

                                       </tr>

                                    <?php

                                        $resultClients= (new DbGetList())->Clients();
                                        $cnt=1;
                                        foreach ($resultClients as $resultClient)
                                        {
                                            $tC_DOB= strtotime($resultClient->C_DOB);
                                            $tC_DOB = date('d/m/y',$tC_DOB);
                                            $tC_Registered= strtotime($resultClient->C_Registered);
                                            $tC_Registered = date('d/m/y',$tC_Registered);
                                            ?>
                                            <tr class="odd gradeX">

                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($resultClient->ClientID);?></td>
                                                <td class="center"><?php echo htmlentities($resultClient->C_Forenames);?></td>
                                                <td class="center"><?php echo htmlentities($resultClient->C_Surname);?></td>
                                                <td class="center"><?php echo htmlentities($tC_DOB);?></td>
                                                <td class="center"><?php echo htmlentities($tC_Registered);?></td>
                                                <td class="center"><?php echo htmlentities($resultClient->Hs_Name);?></td>
                                                <td class="center"><?php echo htmlentities($resultClient->Cs_Name);?></td>
                                                <td class="center"><?php echo htmlentities($resultClient->C_Contact_No);?></td>
                                                <td class="center">
                                                    <?php
                                                    if($resultClient->C_Flag=="0")
                                                    {?>
                                                        <img src="assets/img/true.png"/><?php
                                                    }
                                                    elseif($resultClient->C_Flag=="1")
                                                    {?>
                                                        <img src="assets/img/false.png"/><?php
                                                    }?>
                                                </td>
                                                <td class="center">
                                                    <form method="post"> <?php
                                                        if($resultClient->TotalParcels<5) { ?>
                                                            <input type="submit" class="btn btn-sm btn-primary fas fa-plus" value="<?php echo htmlentities($resultClient->TotalParcels);?>" />
                                                        <?php }
                                                        elseif($resultClient->TotalParcels<6) { ?>
                                                            <input type="submit" class="btn btn-sm btn-warning fas fa-plus" style="color: black;" value="<?php echo htmlentities($resultClient->TotalParcels);?>" />
                                                        <?php }
                                                        else { ?>
                                                            <input type="submit" class="btn btn-sm btn-danger fas fa-plus" value="<?php echo htmlentities($resultClient->TotalParcels);?>" />
                                                        <?php } ?>
                                                    </form>
                                                </td>
                                                <td class="center">
                                                    <form method="post">
                                                        <input name="btnEdit" type="hidden" value="<?php echo htmlentities($resultClient->ClientID);?>" />
                                                        <button class="btn btn-dark" type="submit" name="edit_client" >
                                                            <img src="assets/img/edit.png" width="18" height="18" alt="submit" />
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="center">
                                                    <form method="post">
                                                        <input name="btnDel" type="hidden" value="<?php echo htmlentities($resultClient->ClientID);?>" />
                                                        <input type="submit" name="delete_client" class="btn btn-red"  value="X"
                                                               onclick="return confirm('Are you sure you want to delete ?. <?php echo htmlentities($resultClient->ClientID);?>');"/>
                                                    </form>
                                                </td>

                                            </tr>
                                            <?php
                                            $cnt=$cnt+1;
                                        }?>

                                </table>
                            </div>
                        </div>
                    </div>
            </div>

 <?php include('footer.php');?>
                            </div>
        </body>
</html>
    <?php
} ?>