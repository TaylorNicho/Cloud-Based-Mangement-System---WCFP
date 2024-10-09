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
else
{
include_once("db_functions.php");

?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REFERRAL MANAGEMENT SYSTEM | REPORTS</title>
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
    .sticky-header {
        background-color: #ffffff;
        width:100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        text-align:left;
    }
    .content-scroll{
        height:1000px;
        padding:100px 0px 0px 50px;
    }
    .content-scroll p{
        height:50px;
    }
</style>

<body>
<div class="sticky-header">
    <?php include('header.php');?>
</div>

<div class="content-wrapper content-scroll">
    <div class="container" id="page">
        <div class="row pad-botm">
            <div class="col-a5">
                <h4 class="header-line">ADMIN | MANAGE REPORTS</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading overflow-y: scroll">
                        <div class="row">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                <?php
                                $opt_A_field = array("ID","Start","End");
                                $opt_B_field = array("ID","Name","Postcode");
                                $opt_C_field = array("ID","Registered","Forenames","Surname","DOB","Postcode","Client Status","Housing Status","Dependants 0-2",
                                    "Dependants 3-10","Dependants 11-17","Dependants C18-C25","Dependants A18-A25","Dependants 26-50","Dependants 50-69","Dependants 70+","Flagged");
                                $opt_N_field = array("ID","Date","Notes");
                                $opt_O_field = array("ID","Name","Postcode");
                                $opt_P_field = array("ID","Collected","Branch","Volunteer","Notes");
                                $opt_R_field = array("ID","Received","Status");
                                $opt_V_field = array("ID","Forenames","Surname");

                                $opt_field = array_merge($opt_B_field, $opt_C_field, $opt_O_field, $opt_P_field, $opt_R_field, $opt_V_field);

                                $ref_A_field = array("AppointmentID","A_Start","A_End");
                                $ref_B_field = array("BranchID","B_Name","B_Postcode");
                                $ref_C_field = array("ClientID","C_Registered","C_Forenames","C_Surname","C_DOB","C_Postcode","Cs_Name","Hs_Name","C_Dependant_0_2",
                                    "C_Dependant_3_10","C_Dependant_11_17","C_Dependant_C18_25","C_Dependant_A18_25","C_Dependant_26_50","C_Dependant_50_69","C_Dependant_70","C_Flag");
                                $ref_N_field = array("Client_HistoryID","Ch_Date","Ch_Notes");
                                $ref_O_field = array("OrganisationID","O_Name","O_Postcode");
                                $ref_P_field = array("ParcelID","P_Collected","P_BranchID","P_VolunteerID","P_Notes");
                                $ref_R_field = array("ReferralID","R_Received","Rs_Name");
                                $ref_V_field = array("VolunteerID","V_Forenames","V_Surname");

                                $ref_field = array_merge($ref_B_field, $ref_C_field, $ref_O_field, $ref_P_field, $ref_R_field, $ref_V_field); ?>

                                <div class="form-row">
                                    <div class="col-a2">
                                        <div class="frm-group">
                                            <a type=button href="reports_export.php?rpt=2" class="btn btn-sm btn-primary  mr-2 mb-4">Export Annual Report</a>
                                        </div>
                                        <div class="frm-group">
                                            <label>From <span style="color:red;"></span></label>
                                            <input class="frm-control" type="Date" name="fSqlFrom"/>
                                        </div>
                                        <div class="frm-group">
                                            <label>Till <span style="color:red;"></span></label>
                                            <input class="frm-control" type="Date" name="fSqlTill"/>
                                        </div>
                                        <div class="frm-group">
                                            <label for="fields[]">Select Fields <span style="color:red;"></span></label>
                                            <select id="fields[]" name="fields[]" multiple="multiple" size="35">
                                                <optgroup label="Branch"> <?php
                                                foreach($opt_B_field as $key => $value) { ?>
                                                    <option value="<?php echo $ref_B_field[$key]; ?>"><?php echo $value ?></option> <?php } ?>
                                                </optgroup>
                                                <optgroup label="Client"> <?php
                                                foreach($opt_C_field as $key => $value) { ?>
                                                    <option value="<?php echo $ref_C_field[$key]; ?>"><?php echo $value ?></option> <?php } ?>
                                                </optgroup>
                                                <optgroup label="Client Notes"> <?php
                                                    foreach($opt_N_field as $key => $value) { ?>
                                                        <option value="<?php echo $ref_N_field[$key]; ?>"><?php echo $value ?></option> <?php } ?>
                                                </optgroup>
                                                <optgroup label="Organisation"> <?php
                                                foreach($opt_O_field as $key => $value) { ?>
                                                    <option value="<?php echo $ref_O_field[$key]; ?>"><?php echo $value ?></option> <?php } ?>
                                                </optgroup>
                                                <optgroup label="Parcel"> <?php
                                                foreach($opt_P_field as $key => $value){ ?>
                                                    <option value="<?php echo $ref_P_field[$key]; ?>"><?php echo $value ?></option> <?php } ?>
                                                </optgroup>
                                                <optgroup label="Referral"> <?php
                                                foreach($opt_R_field as $key => $value){ ?>
                                                    <option value="<?php echo $ref_R_field[$key]; ?>"><?php echo $value ?></option> <?php } ?>
                                                </optgroup>
                                                <optgroup label="Volunteer"> <?php
                                                foreach($opt_V_field as $key => $value) { ?>
                                                    <option value="<?php echo $ref_V_field[$key]; ?>"><?php echo $value ?></option> <?php } ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="frm-group">
                                            <div class="form-group col-md-3">
                                                <button type="submit" style="float: left;" name="update_report" class="btn btn-sm btn-primary  mr-2 mb-4">Submit</button>
                                                <?php if(isset($_POST['fields'])){ ?>
                                                    <a type=button href="reports_export.php?rpt=1" class="btn btn-sm btn-primary  mr-2 mb-4">Export Data</a> <?php
                                                } ?>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-a10">
                                        <div class="tbl-resp">
                                            <?php
                                            if(isset($_POST['fields']))
                                            {
                                            $_SESSION['array_name'] = $_POST['fields'];
                                            $conn = Db::mysqli();
                                            $Sql = null;
                                            $SqlFrom = null;
                                            $aSqlFrom=array();
                                            $aSqlWhere=array();
                                            foreach($ref_B_field as $ref){
                                                if(in_array($ref, $_POST['fields'])){
                                                    if($SqlFrom==null)
                                                        $SqlFrom = ' SELECT * FROM Branch';
                                                    else
                                                        $SqlFrom = $SqlFrom . ' , Branch';
                                                    array_push($aSqlFrom,"Branch");
                                                    break;
                                                }
                                            }

                                            foreach($ref_C_field as $ref){
                                                if(in_array($ref, $_POST['fields'])){
                                                    if($Sql==null)
                                                        $Sql = ' WHERE';
                                                    else
                                                        $Sql = ' AND';
                                                    if($SqlFrom==null)
                                                        $SqlFrom = ' SELECT * FROM Client, Client_Status, Housing_Status';
                                                    else
                                                        $SqlFrom = $SqlFrom . ' , Client, Client_Status, Housing_Status';
                                                    array_push($aSqlFrom,"Client","Client_Status","Housing_Status");
                                                    $Sql = $Sql . " C_Client_StatusID=Client_StatusID AND C_Housing_StatusID=Housing_StatusID";
                                                    array_push($aSqlWhere,"C_Client_StatusID=Client_StatusID","C_Housing_StatusID=Housing_StatusID");
                                                    break;
                                                }
                                            }

                                            foreach($ref_N_field as $ref){
                                                if(in_array($ref, $_POST['fields'])){
                                                    if($Sql==null)
                                                        $Sql = ' WHERE';
                                                    else
                                                        $Sql = ' AND';
                                                    if($SqlFrom==null)
                                                        $SqlFrom = ' SELECT * FROM Client_History, Client, Branch, Volunteer ';
                                                    else
                                                        $SqlFrom = $SqlFrom . ' , Client_History, Client, Branch, Volunteer';
                                                    array_push($aSqlFrom,"Client","Client_History","Branch", "Volunteer");
                                                    $Sql = $Sql . " Ch_ClientID=ClientID AND Ch_BranchID=BranchID AND Ch_VolunteerID=VolunteerID";
                                                    array_push($aSqlWhere,"Ch_ClientID=ClientID","Ch_BranchID=BranchID", "Ch_VolunteerID=VolunteerID" );
                                                    break;
                                                }
                                            }

                                            foreach($ref_O_field as $ref){
                                                if(in_array($ref, $_POST['fields'])){
                                                    if($SqlFrom==null)
                                                        $SqlFrom = ' SELECT * FROM Organisation';
                                                    else
                                                        $SqlFrom = $SqlFrom . ' , Organisation';
                                                    array_push($aSqlFrom,"Organisation");
                                                    break;
                                                }
                                            }

                                            foreach($ref_P_field as $ref){
                                                if(in_array($ref, $_POST['fields'])){
                                                    if($Sql==null)
                                                        $Sql = ' WHERE';
                                                    else
                                                        $Sql = ' AND';
                                                    if($SqlFrom==null)
                                                        $SqlFrom = ' SELECT * FROM Parcel, Branch, Client, Volunteer';
                                                    else
                                                        $SqlFrom = $SqlFrom . ' , Parcel, Branch, Client, Volunteer';
                                                    array_push($aSqlFrom,"Parcel","Branch","Client","Volunteer");
                                                    $Sql = $Sql . " P_BranchID=BranchID AND P_ClientID=ClientID AND P_VolunteerID=VolunteerID";
                                                    array_push($aSqlWhere,"P_BranchID=BranchID","P_ClientID=ClientID","P_VolunteerID=VolunteerID");
                                                    break;
                                                }
                                            }

                                            foreach($ref_R_field as $ref){
                                                if(in_array($ref, $_POST['fields'])){
                                                    if($Sql==null)
                                                        $Sql = ' WHERE';
                                                    else
                                                        $Sql = ' AND';
                                                    if($SqlFrom==null)
                                                        $SqlFrom = ' SELECT * FROM Organisation, Referral, Referral_Status, Volunteer, Client';
                                                    else
                                                        $SqlFrom = $SqlFrom . ' , Organisation, Referral, Referral_Status, Volunteer, Client';
                                                    array_push($aSqlFrom,"Organisation","Referral","Referral_Status","Volunteer","Client");
                                                    array_push($aSqlWhere,"R_Referral_StatusID=Referral_StatusID","R_OrganisationID=OrganisationID","R_ClientID=ClientID");
                                                    $Sql = $Sql . " R_Referral_StatusID=Referral_StatusID AND R_OrganisationID=OrganisationID AND R_ClientID=ClientID";
                                                    break;
                                                }
                                            }

                                            foreach($ref_V_field as $ref){
                                                if(in_array($ref, $_POST['fields'])){
                                                    if($Sql==null)
                                                        $Sql = ' WHERE';
                                                    else
                                                        $Sql = ' AND';
                                                    if($SqlFrom==null)
                                                        $SqlFrom = ' SELECT * FROM Volunteer, Volunteer_Role';
                                                    else
                                                        $SqlFrom = $SqlFrom . ' , Volunteer, Volunteer_Role';
                                                    array_push($aSqlFrom,"Volunteer","Volunteer_Role");
                                                    array_push($aSqlWhere,"V_Volunteer_RoleID=Volunteer_RoleID");
                                                    $Sql = $Sql . " V_Volunteer_RoleID=Volunteer_RoleID";
                                                    break;
                                                }
                                            }

                                            $results = array_unique($aSqlFrom);
                                            $SqlSelect = "SELECT * FROM ";
                                            $SqlFrom = "";
                                            foreach($results as $result) {
                                                if($SqlFrom=="")
                                                    $SqlFrom = $result;
                                                else
                                                    $SqlFrom = $SqlFrom . "," . $result;
                                            }

                                            $SqlWhere = "";
                                            $results = array_unique($aSqlWhere);
                                            foreach($results as $result) {
                                                if($SqlWhere=="")
                                                    $SqlWhere = " Where " . $result;
                                                else
                                                    $SqlWhere = $SqlWhere . " AND " . $result;
                                            }
                                            $Sql = $SqlSelect . $SqlFrom . $SqlWhere; ?>
                                            <table class="table tbl-strp tbl-brdr tbl-hvr">
                                                <tr>
                                                    <th>#</th><?php
                                                    foreach($_POST['fields'] as $seelctedOption) {
                                                        ?><th><?php echo $seelctedOption ?></th> <?php
                                                    } ?>
                                                </tr>
                                                <tbody><?php
                                                $stmt = $conn->prepare($Sql);
                                                $stmt->execute();
                                                $resultReports = $stmt->fetchAll();
                                                $cnt=1;
                                                foreach ($resultReports as $rowReports)
                                                {
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td class="center"><?php echo htmlentities($cnt);?></td><?php
                                                    foreach($_POST['fields'] as $seelctedOption)
                                                    { ?>
                                                        <td class="center"><?php echo htmlentities($rowReports[$seelctedOption]);?></td><?php
                                                    } ?>
                                                    <?php
                                                    $cnt=$cnt+1;
                                                    }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php } ?>
                               </div>
                                <div class="container">
                                </div>

                                <div class="col-a4">
                                    <div class="tbl-resp">
                                        <table class="table tbl-strp tbl-brdr tbl-hvr">
                                            <tr>
                                                <th style="width: 1%">MONTH / YEAR</th>
                                                <th style="width: 1%">Parcels</th>
                                            </tr>
                                            <tbody><?php
                                            $resultReports = (new DbReportsExt())->ParcelsByMonthYear();
                                            $cnt=1;
                                            foreach ($resultReports as $rowReports)
                                            {?>
                                            <tr class="odd gradeX">
                                                <td style="width: 1%" class="center"><?php echo htmlentities($rowReports->parcels_per_momth_and_year);?></td>
                                                <td style="width: 1%" class="center"><?php echo htmlentities($rowReports->count);?></td>
                                            </tr> <?php
                                                $cnt=$cnt+1;
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-a4">
                                    <div class="tbl-resp">
                                        <table class="table tbl-strp tbl-brdr tbl-hvr">
                                            <tr>
                                                <th style="width: 1%">Family Size (Dependants)</th>
                                                <th style="width: 1%">%</th>
                                            </tr>
                                            <tbody><?php
                                            $resultReports = (new DbReportsExt())->FamilySize();
                                            $cnt=1;
                                            foreach ($resultReports as $rowReports)
                                            {?>
                                                <tr class="odd gradeX">
                                                    <td style="width: 1%" class="center"><?php echo htmlentities($rowReports->NoDependants);?></td>
                                                    <td style="width: 1%" class="center"><?php echo htmlentities($rowReports->Perc);?></td>
                                                </tr> <?php
                                                $cnt=$cnt+1;
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-a4">
                                    <div class="tbl-resp">
                                        <table class="table tbl-strp tbl-brdr tbl-hvr">
                                            <tr>
                                                <th style="width: 1%">Postcode Area</th>
                                                <th style="width: 1%">%</th>
                                            </tr>
                                            <tbody><?php
                                            $resultReports = (new DbReportsExt())->PostCodeArea();
                                            $cnt=1;
                                            foreach ($resultReports as $rowReports)
                                            {?>
                                                <tr class="odd gradeX">
                                                    <td style="width: 1%" class="center"><?php echo htmlentities($rowReports->PostcodeArea);?></td>
                                                    <td style="width: 1%" class="center"><?php echo htmlentities($rowReports->Perc);?></td>
                                                </tr> <?php
                                                $cnt=$cnt+1;
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-a4">
                                    <div class="tbl-resp">
                                        <table class="table tbl-strp tbl-brdr tbl-hvr">
                                            <tr>
                                                <th style="width: 1%">Year-Month</th>
                                                <th style="width: 1%">Parcels</th>
                                                <th style="width: 1%">Referrals</th>
                                            </tr>
                                            <tbody><?php
                                            $resultReports = (new DbReportsExt())->ParcelsAndReferralsByMonthYear();
                                            $cnt=1;
                                            foreach ($resultReports as $rowReports)
                                            {?>
                                                <tr class="odd gradeX">
                                                    <td style="width: 1%" class="center"><?php echo htmlentities($rowReports->YearMonth);?></td>
                                                    <td style="width: 1%" class="center"><?php echo htmlentities($rowReports->Parcels);?></td>
                                                    <td style="width: 1%" class="center"><?php echo htmlentities($rowReports->Referrals);?></td>
                                                </tr> <?php
                                                $cnt=$cnt+1;
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
</div>
<?php include('footer.php');?>
</body>
</html>
<?php
} ?>

