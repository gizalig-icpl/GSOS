<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/google-config.php");


require_once("include/header.php");

$data = array();
$user_id = ":user_id";

$data['Name'] = $_POST['Name'];
$data['Description'] = $_POST['Description'];
$data['Platform'] = $_POST['Platform'];
$data['Business Unit'] = $_POST['Business_Unit'];

$data[$_POST['ques_productivity']] = array($_POST['ques_conf_prod'] => $_POST['conf_prod'], $_POST['ques_ia_prod'] => $_POST['ia_prod'], $_POST['ques_notes_prod'] => $_POST['notes_prod']);
$data[$_POST['ques_response']] = array($_POST['ques_conf_prod'] => $_POST['conf_resp'], $_POST['ques_ia_prod'] => $_POST['ia_resp'], $_POST['ques_notes_prod'] => $_POST['notes_resp']);
$data[$_POST['ques_replacement']] = array($_POST['ques_conf_prod'] => $_POST['conf_repl'], $_POST['ques_ia_prod'] => $_POST['ia_repl'], $_POST['ques_notes_prod'] => $_POST['notes_repl']);
$data[$_POST['ques_legal']] = array($_POST['ques_conf_prod'] => $_POST['conf_legal'], $_POST['ques_ia_prod'] => $_POST['ia_legal'], $_POST['ques_notes_prod'] => $_POST['notes_legal']);
$data[$_POST['ques_competitive']] = array($_POST['ques_conf_prod'] => $_POST['conf_compAdv'], $_POST['ques_ia_prod'] => $_POST['ia_compAdv'], $_POST['ques_notes_prod'] => $_POST['notes_compAdv']);
$data[$_POST['ques_reputational']] = array($_POST['ques_conf_prod'] => $_POST['conf_repu'], $_POST['ques_ia_prod'] => $_POST['ia_repu'], $_POST['ques_notes_prod'] => $_POST['notes_repu']);

$data[$_POST['ques_lostsales']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_productivity_min_1'], $_POST['ques_mostlikely'] => $_POST['conf_productivity_most_1'], $_POST['ques_maximum'] => $_POST['conf_productivity_max_1']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_productivity_min_1'], $_POST['ques_mostlikely'] => $_POST['ia_productivity_most_1'], $_POST['ques_maximum'] => $_POST['ia_productivity_max_1']));

$data[$_POST['ques_netcostsales']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_productivity_min_2'], $_POST['ques_mostlikely'] => $_POST['conf_productivity_most_2'], $_POST['ques_maximum'] => $_POST['conf_productivity_max_2']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_productivity_min_2'], $_POST['ques_mostlikely'] => $_POST['ia_productivity_most_2'], $_POST['ques_maximum'] => $_POST['ia_productivity_max_2']));

$data[$_POST['ques_sunkcost']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_productivity_min_3'], $_POST['ques_mostlikely'] => $_POST['conf_productivity_most_3'], $_POST['ques_maximum'] => $_POST['conf_productivity_max_3']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_productivity_min_3'], $_POST['ques_mostlikely'] => $_POST['ia_productivity_most_3'], $_POST['ques_maximum'] => $_POST['ia_productivity_max_3']));

$data[$_POST['ques_opportunitystaffcost']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_productivity_min_4'], $_POST['ques_mostlikely'] => $_POST['conf_productivity_most_4'], $_POST['ques_maximum'] => $_POST['conf_productivity_max_4']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_productivity_min_4'], $_POST['ques_mostlikely'] => $_POST['ia_productivity_most_4'], $_POST['ques_maximum'] => $_POST['ia_productivity_max_4']));

$data[$_POST['ques_opportunityfinancialcost']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_productivity_min_5'], $_POST['ques_mostlikely'] => $_POST['conf_productivity_most_5'], $_POST['ques_maximum'] => $_POST['conf_productivity_max_5']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_productivity_min_5'], $_POST['ques_mostlikely'] => $_POST['ia_productivity_most_5'], $_POST['ques_maximum'] => $_POST['ia_productivity_max_5']));

$data[$_POST['ques_productivityloss']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_productivity_min_6'], $_POST['ques_mostlikely'] => $_POST['conf_productivity_most_6'], $_POST['ques_maximum'] => $_POST['conf_productivity_max_6']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_productivity_min_6'], $_POST['ques_mostlikely'] => $_POST['ia_productivity_most_6'], $_POST['ques_maximum'] => $_POST['ia_productivity_max_6']));

$data[$_POST['ques_conf_productivity_confidence_1']] = $_POST['conf_productivity_confidence_1'];
$data[$_POST['ques_ia_productivity_confidence_1']] = $_POST['ia_productivity_confidence_1'];
$data[$_POST['ques_notes_prod']] = $_POST['productivity_notes_1'];

$data[$_POST['ques_estimatedprodloss']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['ans_confidentialityprodlossmin1'], $_POST['ques_mostlikely'] => $_POST['ans_confidentialityprodlosslikely1'], $_POST['ques_maximum'] => $_POST['ans_confidentialityprodlossmax1']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ans_integrityprodlossmin1'], $_POST['ques_mostlikely'] => $_POST['ans_integrityprodlosslikely1'], $_POST['ques_maximum'] => $_POST['ans_integrityprodlossmax1']));


$data[$_POST['ques_internalstaff']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_response_min_1'], $_POST['ques_mostlikely'] => $_POST['conf_response_most_1'], $_POST['ques_maximum'] => $_POST['conf_response_max_1']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_response_min_1'], $_POST['ques_mostlikely'] => $_POST['ia_response_most_1'], $_POST['ques_maximum'] => $_POST['ia_response_max_1']));

$data[$_POST['ques_contractorexp']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_response_min_2'], $_POST['ques_mostlikely'] => $_POST['conf_response_most_2'], $_POST['ques_maximum'] => $_POST['conf_response_max_2']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_response_min_2'], $_POST['ques_mostlikely'] => $_POST['ia_response_most_2'], $_POST['ques_maximum'] => $_POST['ia_response_max_2']));

$data[$_POST['ques_reqdisclosure']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_response_min_3'], $_POST['ques_mostlikely'] => $_POST['conf_response_most_3'], $_POST['ques_maximum'] => $_POST['conf_response_max_3']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_response_min_3'], $_POST['ques_mostlikely'] => $_POST['ia_response_most_3'], $_POST['ques_maximum'] => $_POST['ia_response_max_3']));

$data[$_POST['ques_primaryrescost']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_response_min_4'], $_POST['ques_mostlikely'] => $_POST['conf_response_most_4'], $_POST['ques_maximum'] => $_POST['conf_response_max_4']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_response_min_4'], $_POST['ques_mostlikely'] => $_POST['ia_response_most_4'], $_POST['ques_maximum'] => $_POST['ia_response_max_4']));

$data[$_POST['ques_conf_productivity_confidence_1']] = $_POST['conf_response_confidence_1'];
$data[$_POST['ques_ia_productivity_confidence_1']] = $_POST['ia_response_confidence_1'];
$data[$_POST['ques_notes_prod']] = $_POST['response_notes_1'];

$data[$_POST['ques_estimatedresponseloss']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['ans_confidentialityprodlossmin2'], $_POST['ques_mostlikely'] => $_POST['ans_confidentialityprodlosslikely2'], $_POST['ques_maximum'] => $_POST['ans_confidentialityprodlossmax2']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ans_integrityprodlossmin2'], $_POST['ques_mostlikely'] => $_POST['ans_integrityprodlosslikely2'], $_POST['ques_maximum'] => $_POST['ans_integrityprodlossmax2']));


$data[$_POST['ques_datarecovery']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_replacement_min_1'], $_POST['ques_mostlikely'] => $_POST['conf_replacement_most_1'], $_POST['ques_maximum'] => $_POST['conf_replacement_max_1']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_replacement_min_1'], $_POST['ques_mostlikely'] => $_POST['ia_replacement_most_1'], $_POST['ques_maximum'] => $_POST['ia_replacement_max_1']));

$data[$_POST['ques_recreationcritical']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_replacement_min_2'], $_POST['ques_mostlikely'] => $_POST['conf_replacement_most_2'], $_POST['ques_maximum'] => $_POST['conf_replacement_max_2']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_replacement_min_2'], $_POST['ques_mostlikely'] => $_POST['ia_replacement_most_2'], $_POST['ques_maximum'] => $_POST['ia_replacement_max_2']));

$data[$_POST['ques_ransomspaid']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_replacement_min_3'], $_POST['ques_mostlikely'] => $_POST['conf_replacement_most_3'], $_POST['ques_maximum'] => $_POST['conf_replacement_max_3']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_replacement_min_3'], $_POST['ques_mostlikely'] => $_POST['ia_replacement_most_3'], $_POST['ques_maximum'] => $_POST['ia_replacement_max_3']));

$data[$_POST['ques_hardwarerepcost']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_replacement_min_4'], $_POST['ques_mostlikely'] => $_POST['conf_replacement_most_4'], $_POST['ques_maximum'] => $_POST['conf_replacement_max_4']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_replacement_min_4'], $_POST['ques_mostlikely'] => $_POST['ia_replacement_most_4'], $_POST['ques_maximum'] => $_POST['ia_replacement_max_4']));

$data[$_POST['ques_otherrepcost']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_replacement_min_5'], $_POST['ques_mostlikely'] => $_POST['conf_replacement_most_5'], $_POST['ques_maximum'] => $_POST['conf_replacement_max_5']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_replacement_min_5'], $_POST['ques_mostlikely'] => $_POST['ia_replacement_most_5'], $_POST['ques_maximum'] => $_POST['ia_replacement_max_5']));

$data[$_POST['ques_conf_productivity_confidence_1']] = $_POST['conf_replacement_confidence_1'];
$data[$_POST['ques_ia_productivity_confidence_1']] = $_POST['ia_replacement_confidence_1'];
$data[$_POST['ques_notes_prod']] = $_POST['replacement_notes_1'];

$data[$_POST['ques_totalestimatedreploss']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['ans_confidentialityprodlossmin3'], $_POST['ques_mostlikely'] => $_POST['ans_confidentialityprodlosslikely3'], $_POST['ques_maximum'] => $_POST['ans_confidentialityprodlossmax3']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ans_integrityprodlossmin3'], $_POST['ques_mostlikely'] => $_POST['ans_integrityprodlosslikely3'], $_POST['ques_maximum'] => $_POST['ans_integrityprodlossmax3']));


$data[$_POST['ques_regulatoryfines']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_legal_min_1'], $_POST['ques_mostlikely'] => $_POST['conf_legal_most_1'], $_POST['ques_maximum'] => $_POST['conf_legal_max_1']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_legal_min_1'], $_POST['ques_mostlikely'] => $_POST['ia_legal_most_1'], $_POST['ques_maximum'] => $_POST['ia_legal_max_1']));

$data[$_POST['ques_civiljudgements']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_legal_min_2'], $_POST['ques_mostlikely'] => $_POST['conf_legal_most_2'], $_POST['ques_maximum'] => $_POST['conf_legal_max_2']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_legal_min_2'], $_POST['ques_mostlikely'] => $_POST['ia_legal_most_2'], $_POST['ques_maximum'] => $_POST['ia_legal_max_2']));

$data[$_POST['ques_legaldefense']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_legal_min_3'], $_POST['ques_mostlikely'] => $_POST['conf_legal_most_3'], $_POST['ques_maximum'] => $_POST['conf_legal_max_3']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_legal_min_3'], $_POST['ques_mostlikely'] => $_POST['ia_legal_most_3'], $_POST['ques_maximum'] => $_POST['ia_legal_max_3']));

$data[$_POST['ques_courtcompliance']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_legal_min_4'], $_POST['ques_mostlikely'] => $_POST['conf_legal_most_4'], $_POST['ques_maximum'] => $_POST['conf_legal_max_4']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_legal_min_4'], $_POST['ques_mostlikely'] => $_POST['ia_legal_most_4'], $_POST['ques_maximum'] => $_POST['ia_legal_max_4']));

$data[$_POST['ques_otherlegalcost']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_legal_min_5'], $_POST['ques_mostlikely'] => $_POST['conf_legal_most_5'], $_POST['ques_maximum'] => $_POST['conf_legal_max_5']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_legal_min_5'], $_POST['ques_mostlikely'] => $_POST['ia_legal_most_5'], $_POST['ques_maximum'] => $_POST['ia_legal_max_5']));

$data[$_POST['ques_conf_productivity_confidence_1']] = $_POST['conf_legal_confidence_1'];
$data[$_POST['ques_ia_productivity_confidence_1']] = $_POST['ia_legal_confidence_1'];
$data[$_POST['ques_notes_prod']] = $_POST['legal_notes_1'];

$data[$_POST['ques_totalestlegalcost']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['ans_confidentialityprodlossmin4'], $_POST['ques_mostlikely'] => $_POST['ans_confidentialityprodlosslikely4'], $_POST['ques_maximum'] => $_POST['ans_confidentialityprodlossmax4']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ans_integrityprodlossmin4'], $_POST['ques_mostlikely'] => $_POST['ans_integrityprodlosslikely4'], $_POST['ques_maximum'] => $_POST['ans_integrityprodlossmax4']));





$data[$_POST['ques_decreasedpatents']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_comp_adv_min_1'], $_POST['ques_mostlikely'] => $_POST['conf_comp_adv_most_1'], $_POST['ques_maximum'] => $_POST['conf_comp_adv_max_1']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_comp_adv_min_1'], $_POST['ques_mostlikely'] => $_POST['ia_comp_adv_most_1'], $_POST['ques_maximum'] => $_POST['ia_comp_adv_max_1']));

$data[$_POST['ques_losstradesecrets']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_comp_adv_min_2'], $_POST['ques_mostlikely'] => $_POST['conf_comp_adv_most_2'], $_POST['ques_maximum'] => $_POST['conf_comp_adv_max_2']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_comp_adv_min_2'], $_POST['ques_mostlikely'] => $_POST['ia_comp_adv_most_2'], $_POST['ques_maximum'] => $_POST['ia_comp_adv_max_2']));

$data[$_POST['ques_damagestrategicassets']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_comp_adv_min_3'], $_POST['ques_mostlikely'] => $_POST['conf_comp_adv_most_3'], $_POST['ques_maximum'] => $_POST['conf_comp_adv_max_3']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_comp_adv_min_3'], $_POST['ques_mostlikely'] => $_POST['ia_comp_adv_most_3'], $_POST['ques_maximum'] => $_POST['ia_comp_adv_max_3']));

$data[$_POST['ques_conf_productivity_confidence_1']] = $_POST['conf_comp_adv_confidence_1'];
$data[$_POST['ques_ia_productivity_confidence_1']] = $_POST['ia_comp_adv_confidence_1'];
$data[$_POST['ques_notes_prod']] = $_POST['comp_adv_notes_1'];

$data[$_POST['ques_totalcompetitiveloss']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['ans_confidentialityprodlossmin5'], $_POST['ques_mostlikely'] => $_POST['ans_confidentialityprodlosslikely5'], $_POST['ques_maximum'] => $_POST['ans_confidentialityprodlossmax5']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ans_integrityprodlossmin5'], $_POST['ques_mostlikely'] => $_POST['ans_integrityprodlosslikely5'], $_POST['ques_maximum'] => $_POST['ans_integrityprodlossmax5']));

$data[$_POST['ques_reducedmarketshare']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_reputation_min_1'], $_POST['ques_mostlikely'] => $_POST['conf_reputation_most_1'], $_POST['ques_maximum'] => $_POST['conf_reputation_max_1']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_reputation_min_1'], $_POST['ques_mostlikely'] => $_POST['ia_reputation_most_1'], $_POST['ques_maximum'] => $_POST['ia_reputation_max_1']));

$data[$_POST['ques_reducedfundingcapital']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_reputation_min_2'], $_POST['ques_mostlikely'] => $_POST['conf_reputation_most_2'], $_POST['ques_maximum'] => $_POST['conf_reputation_max_2']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_reputation_min_2'], $_POST['ques_mostlikely'] => $_POST['ia_reputation_most_2'], $_POST['ques_maximum'] => $_POST['ia_reputation_max_2']));

$data[$_POST['ques_decreaseshareprice']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['conf_reputation_min_3'], $_POST['ques_mostlikely'] => $_POST['conf_reputation_most_3'], $_POST['ques_maximum'] => $_POST['conf_reputation_max_3']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ia_reputation_min_3'], $_POST['ques_mostlikely'] => $_POST['ia_reputation_most_3'], $_POST['ques_maximum'] => $_POST['ia_reputation_max_3']));

$data[$_POST['ques_conf_productivity_confidence_1']] = $_POST['conf_reputation_confidence_1'];
$data[$_POST['ques_ia_productivity_confidence_1']] = $_POST['ia_reputation_confidence_1'];
$data[$_POST['ques_notes_prod']] = $_POST['reputation_notes_1'];

$data[$_POST['ques_totalestimatedreplosses']] = array($_POST['ques_Confidentiality'] => array($_POST['ques_minimum'] => $_POST['ans_confidentialityprodlossmin6'], $_POST['ques_mostlikely'] => $_POST['ans_confidentialityprodlosslikely6'], $_POST['ques_maximum'] => $_POST['ans_confidentialityprodlossmax6']), $_POST['ques_integrity'] => array($_POST['ques_minimum'] => $_POST['ans_integrityprodlossmin6'], $_POST['ques_mostlikely'] => $_POST['ans_integrityprodlosslikely6'], $_POST['ques_maximum'] => $_POST['ans_integrityprodlossmax6']));

$data[$_POST['ques_addressunapproved']] = $_POST['two_six'];
$data[$_POST['ques_deployoperatingpatchtools']] = $_POST['three_four'];
$data[$_POST['ques_deploysoftwarepatchtools']] = $_POST['three_five'];
$data[$_POST['ques_changepasswords']] = $_POST['four_two'];
$data[$_POST['ques_dedicatedadmacc']] = $_POST['four_three'];
$data[$_POST['ques_establishconf']] = $_POST['five_one'];
$data[$_POST['ques_dnsfiltering']] = $_POST['seven_seven'];
$data[$_POST['ques_antimalware']] = $_POST['eight_two'];
$data[$_POST['ques_malwarescanning']] = $_POST['eight_four'];
$data[$_POST['ques_automatedbackup']] = $_POST['ten_one'];
$data[$_POST['ques_completesystembackup']] = $_POST['ten_two'];
$data[$_POST['ques_protectbackup']] = $_POST['ten_four'];
$data[$_POST['ques_ensureofflinebackup']] = $_POST['ten_five'];
$data[$_POST['ques_denyunauthorizedport']] = $_POST['twelve_four'];
$data[$_POST['ques_removesensitivedata']] = $_POST['thirteen_two'];
$data[$_POST['ques_encryptmobiledata']] = $_POST['thirteen_six'];
$data[$_POST['ques_protectaccesscontrol']] = $_POST['fourteen_six'];
$data[$_POST['ques_separatewireless']] = $_POST['fifteen_ten'];
$data[$_POST['ques_disableaccounts']] = $_POST['sixteen_eight'];
$data[$_POST['ques_disabledormantaccount']] = $_POST['sixteen_nine'];
$data[$_POST['ques_lockworkstation']] = $_POST['sixteen_eleven'];
$data[$_POST['ques_securityawarenesss']] = $_POST['seventeen_three'];
$data[$_POST['ques_trainsecureaut']] = $_POST['seventeen_six'];
$data[$_POST['ques_trainsensitivedata']] = $_POST['seventeen_seven'];
$data[$_POST['ques_trainunintentionalexp']] = $_POST['seventeen_eight'];
$data[$_POST['ques_trainreportingincidents']] = $_POST['seventeen_nine'];

$datajson = json_encode($data, true);

$sql = "SELECT count(*) AS cnt FROM biaassessment WHERE user_id = :user_id ";
$stmt = $dbh->prepare($sql);
$stmt->execute(
    array(
        ":user_id" => $_SESSION['id']
    )
);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $result['cnt'] + 1;
$title = 'BIA Assessment Report' . $count;

if (isset($_FILES["file"]["name"]) && $_FILES["file"]["name"] != '') {
    $biadoc = $_FILES["file"]["name"];
    $target_dir = "biadoc/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $_FILES["file"]["tmp_name"];
    $uploadOk = 1;

    $response = fileUpload($_FILES["file"], $target_dir);
    if ($response->msg === "success") {

        $filename = $response->filename;
        try {
            $sql = "INSERT INTO biaassessment(title,biadata,biadoc,user_id) values (:title,:biadata,:biadoc,:user_id) ";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(
                array(
                    ":title" => $title,
                    ":biadata" => $datajson,
                    ":biadoc" => $filename,
                    ":user_id" => $_SESSION['id']
                )
            );
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    $biadoc = '';
    try {
        $sql = "INSERT INTO biaassessment(title,biadata,biadoc,user_id) values (:title,:biadata,:biadoc,:user_id) ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(
            array(
                ":title" => $title,
                ":biadata" => $datajson,
                ":biadoc" => $biadoc,
                ":user_id" => $_SESSION['id']
            )
        );
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

?>

<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <div class="container-fluid">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="fs-5 pe-3"><em class="bi bi-file-earmark-lock2-fill"></em>
                        <?php echo " ";
                        echo _Biaassess; ?>
                    </div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="container card p-3">
                    <div>
                        <h3>BIA Assessment is Successfully Sumitted</h3>
                    </div>
                    <img src="images/Successfull.gif" alt="Successful" style="display: block;
                      margin-left: auto;
                      margin-right: auto;
                      width: 50%;">
                </div>
            </div>
        </div>
    </div>
</div>


<?php
?>
<?php
?>