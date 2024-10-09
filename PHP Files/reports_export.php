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
$Rpt = $_GET['rpt'];

if($Rpt==1) {

    $filename = "WCFP-CustomReport" . date('Y-m-d') . ".csv";
    $conn = Db::mysqli();
    $opt_A_field = array("ID", "Start", "End");
    $opt_B_field = array("ID", "Name", "Postcode");
    $opt_C_field = array("ID", "Registered", "Forenames", "Surname", "DOB", "Postcode", "Client Status", "Housing Status", "Dependants 0-2",
        "Dependants 3-10", "Dependants 11-17", "Dependants C18-C25", "Dependants A18-A25", "Dependants 26-50", "Dependants 50-69", "Dependants 70+", "Flagged");
    $opt_O_field = array("ID", "Name", "Postcode");
    $opt_N_field = array("ID", "Name", "Postcode");
    $opt_P_field = array("ID", "Collected", "Branch", "Volunteer");
    $opt_R_field = array("ID", "Received", "Status");
    $opt_V_field = array("ID", "Forenames", "Surname");

    $opt_field = array_merge($opt_B_field, $opt_C_field, $opt_O_field, $opt_P_field, $opt_R_field, $opt_V_field);

    $ref_A_field = array("AppointmentID", "A_Start", "A_End");
    $ref_B_field = array("BranchID", "B_Name", "B_Postcode");
    $ref_C_field = array("ClientID", "C_Registered", "C_Forenames", "C_Surname", "C_DOB", "C_Postcode", "Cs_Name", "Hs_Name", "C_Dependant_0_2",
        "C_Dependant_3_10", "C_Dependant_11_17", "C_Dependant_C18_25", "C_Dependant_A18_25", "C_Dependant_26_50", "C_Dependant_50_69", "C_Dependant_70", "C_Flag");
    $ref_O_field = array("OrganisationID", "O_Name", "O_Postcode");
    $ref_N_field = array("Client_HistoryID", "Ch_Date", "Ch_Notes");
    $ref_P_field = array("ParcelID", "P_Collected", "P_BranchID", "P_VolunteerID");
    $ref_R_field = array("ReferralID", "R_Received", "Rs_Name");
    $ref_V_field = array("VolunteerID", "V_Forenames", "V_Surname");

    $ref_field = array_merge($ref_B_field, $ref_C_field, $ref_O_field, $ref_P_field, $ref_R_field, $ref_V_field);
    $conn = Db::mysqli();
    $Sql = null;
    $SqlFrom = null;
    $aSqlFrom = array();
    $aSqlWhere = array();
    foreach ($ref_B_field as $ref) {
        if (in_array($ref, $_SESSION['array_name'])) {
            if ($SqlFrom == null)
                $SqlFrom = ' SELECT * FROM Branch';
            else
                $SqlFrom = $SqlFrom . ' , Branch';
            array_push($aSqlFrom, "Branch");
            break;
        }
    }

    foreach ($ref_C_field as $ref) {
        if (in_array($ref, $_SESSION['array_name'])) {
            if ($Sql == null)
                $Sql = ' WHERE';
            else
                $Sql = ' AND';
            if ($SqlFrom == null)
                $SqlFrom = ' SELECT * FROM Client, Client_Status, Housing_Status';
            else
                $SqlFrom = $SqlFrom . ' , Client, Client_Status, Housing_Status';
            array_push($aSqlFrom, "Client", "Client_Status", "Housing_Status");
            $Sql = $Sql . " C_Client_StatusID=Client_StatusID AND C_Housing_StatusID=Housing_StatusID";
            array_push($aSqlWhere, "C_Client_StatusID=Client_StatusID", "C_Housing_StatusID=Housing_StatusID");
            break;
        }
    }

    foreach ($ref_O_field as $ref) {
        if (in_array($ref, $_SESSION['array_name'])) {
            if ($SqlFrom == null)
                $SqlFrom = ' SELECT * FROM Organisation';
            else
                $SqlFrom = $SqlFrom . ' , Organisation';
            array_push($aSqlFrom, "Organisation");
            break;
        }
    }

    foreach ($ref_N_field as $ref) {
        if (in_array($ref, $_SESSION['array_name'])) {
            if ($Sql == null)
                $Sql = ' WHERE';
            else
                $Sql = ' AND';
            if ($SqlFrom == null)
                $SqlFrom = ' SELECT * FROM Client_History, Client, Branch, Volunteer ';
            else
                $SqlFrom = $SqlFrom . ' , Client_History, Client, Branch, Volunteer';
            array_push($aSqlFrom, "Client", "Client_History", "Branch", "Volunteer");
            $Sql = $Sql . " Ch_ClientID=ClientID AND Ch_BranchID=BranchID AND Ch_VolunteerID=VolunteerID";
            array_push($aSqlWhere, "Ch_ClientID=ClientID", "Ch_BranchID=BranchID", "Ch_VolunteerID=VolunteerID");
            break;
        }
    }

    foreach ($ref_P_field as $ref) {
        if (in_array($ref, $_SESSION['array_name'])) {
            if ($Sql == null)
                $Sql = ' WHERE';
            else
                $Sql = ' AND';
            if ($SqlFrom == null)
                $SqlFrom = ' SELECT * FROM Parcel, Branch, Client, Volunteer';
            else
                $SqlFrom = $SqlFrom . ' , Parcel, Branch, Client, Volunteer';
            array_push($aSqlFrom, "Parcel", "Branch", "Client", "Volunteer");
            $Sql = $Sql . " P_BranchID=BranchID AND P_ClientID=ClientID AND P_VolunteerID=VolunteerID";
            array_push($aSqlWhere, "P_BranchID=BranchID", "P_ClientID=ClientID", "P_VolunteerID=VolunteerID");
            break;
        }
    }

    foreach ($ref_R_field as $ref) {
        if (in_array($ref, $_SESSION['array_name'])) {
            if ($Sql == null)
                $Sql = ' WHERE';
            else
                $Sql = ' AND';
            if ($SqlFrom == null)
                $SqlFrom = ' SELECT * FROM Organisation, Referral, Referral_Status, Volunteer, Client';
            else
                $SqlFrom = $SqlFrom . ' , Organisation, Referral, Referral_Status, Volunteer, Client';
            array_push($aSqlFrom, "Organisation", "Referral", "Referral_Status", "Volunteer", "Client");
            array_push($aSqlWhere, "R_Referral_StatusID=Referral_StatusID", "R_OrganisationID=OrganisationID", "R_ClientID=ClientID");
            $Sql = $Sql . " R_Referral_StatusID=Referral_StatusID AND R_OrganisationID=OrganisationID AND R_ClientID=ClientID";
            break;
        }
    }

    foreach ($ref_V_field as $ref) {
        if (in_array($ref, $_SESSION['array_name'])) {
            if ($Sql == null)
                $Sql = ' WHERE';
            else
                $Sql = ' AND';
            if ($SqlFrom == null)
                $SqlFrom = ' SELECT * FROM Volunteer, Volunteer_Role';
            else
                $SqlFrom = $SqlFrom . ' , Volunteer, Volunteer_Role';
            array_push($aSqlFrom, "Volunteer", "Volunteer_Role");
            array_push($aSqlWhere, "V_Volunteer_RoleID=Volunteer_RoleID");
            $Sql = $Sql . " V_Volunteer_RoleID=Volunteer_RoleID";
            break;
        }
    }

    $results = array_unique($aSqlFrom);
    $SqlSelect = "SELECT * FROM ";
    $SqlFrom = "";
    foreach ($results as $result) {
        if ($SqlFrom == "")
            $SqlFrom = $result;
        else
            $SqlFrom = $SqlFrom . "," . $result;
    }

    $SqlWhere = "";
    $results = array_unique($aSqlWhere);
    foreach ($results as $result) {
        if ($SqlWhere == "")
            $SqlWhere = " Where " . $result;
        else
            $SqlWhere = $SqlWhere . " AND " . $result;
    }
    $Sql = $SqlSelect . $SqlFrom . $SqlWhere;

    $stmt = $conn->prepare($Sql);
    $stmt->execute();
    $resultReports = $stmt->fetchAll();
    $cnt = 1;

    header('Content-type: text/csv');
    header("Content-Disposition: attachment; filename=.$filename");

    $separator = ",";

    $output = fopen('php://output', 'w');
    $lineData = array();

    foreach ($_SESSION['array_name'] as $columnheader) {
        array_push($lineData, $columnheader);
    }

    fputcsv($output, $lineData, $separator);

    $lineData = array();

    foreach ($resultReports as $result_) {
        $lineData = array();
        foreach ($_SESSION['array_name'] as $field) {
            array_push($lineData, $result_[$field]);
        }
        fputcsv($output, $lineData, $separator);
    }
    fclose($output);
    exit();
}
elseif($Rpt=2)
{
    $filename = "WCFP-AnnualReport" . date('Y-m-d') . ".csv";
    header('Content-type: text/csv');
    header("Content-Disposition: attachment; filename=.$filename");
    $separator = ",";
    $output = fopen('php://output', 'w');

    $lineData = array("MONTH / YEAR","Parcels");
    fputcsv($output, $lineData, $separator);
    $lineData = array();
    $resultReports = (new DbReportsExt())->ParcelsByMonthYear();
    foreach ($resultReports as $result_) {
        $lineData = array($result_->parcels_per_momth_and_year,$result_->count);
        fputcsv($output, $lineData, $separator);
    }
    $lineData = array(" "," ");
    fputcsv($output, $lineData, $separator);
    fputcsv($output, $lineData, $separator);

    $lineData = array("Family Size","%");
    fputcsv($output, $lineData, $separator);
    $lineData = array();
    $resultReports = (new DbReportsExt())->FamilySize();
    foreach ($resultReports as $result_) {
        $lineData = array($result_->NoDependants,$result_->Perc);
        fputcsv($output, $lineData, $separator);
    }
    $lineData = array(" "," ");
    fputcsv($output, $lineData, $separator);
    fputcsv($output, $lineData, $separator);

    $lineData = array("Postcode Area","%");
    fputcsv($output, $lineData, $separator);
    $lineData = array();
    $resultReports = (new DbReportsExt())->PostCodeArea();
    foreach ($resultReports as $result_) {
        $lineData = array($result_->PostcodeArea,$result_->Perc);
        fputcsv($output, $lineData, $separator);
    }
    $lineData = array(" "," ");
    fputcsv($output, $lineData, $separator);
    fputcsv($output, $lineData, $separator);

    $lineData = array("Year-Month","Parcels","Referrals");
    fputcsv($output, $lineData, $separator);
    $lineData = array();
    $resultReports = (new DbReportsExt())->ParcelsAndReferralsByMonthYear();
    foreach ($resultReports as $result_) {
        $lineData = array($result_->YearMonth,$result_->Parcels,$result_->Referrals);
        fputcsv($output, $lineData, $separator);
    }
    $lineData = array(" "," ");
    fputcsv($output, $lineData, $separator);
    fputcsv($output, $lineData, $separator);

    fclose($output);
    exit();
}


?>