<?php

require_once("include/header.php");
include_once('./include/session.php');
?>
<script>
  function fileValidation() {
    var fileInput =
      document.getElementById('id_file');

    var filePath = fileInput.value;
    // Allowing file type
    var allowedExtensions =
      /(\.xls|\.xlsx)$/i;
    $('#div_file').html('');
    if (!allowedExtensions.exec(filePath)) {
      $('#div_file').html('Invalid file type. Please upload file type as xls or xlsx');
      fileInput.value = '';
      return false;
    }
  }
  function fileValidation1() {
    var fileInput =
      document.getElementById('id_file');

    var filePath = fileInput.value;

    if (filePath == '') {
      alert('Please upload CSAT Report file');

      return false;
    }
  }

  function loadtotal1() {
    //alert($('#id_conf_productivity_min_1').val() + $('#id_conf_productivity_min_2').val() + $('#id_conf_productivity_min_3').val() + $('#id_conf_productivity_min_4').val() + $('#id_conf_productivity_min_5').val() + $('#id_conf_productivity_min_6').val());
    $('#span_confidentialityprodlossmin1').html(parseInt($('#id_conf_productivity_min_1').val()) + parseInt($('#id_conf_productivity_min_2').val()) + parseInt($('#id_conf_productivity_min_3').val()) + parseInt($('#id_conf_productivity_min_4').val()) + parseInt($('#id_conf_productivity_min_5').val()) + parseInt($('#id_conf_productivity_min_6').val()));

    $('#span_confidentialityprodlosslikely1').html(parseInt($('#id_conf_productivity_most_1').val()) + parseInt($('#id_conf_productivity_most_2').val()) + parseInt($('#id_conf_productivity_most_3').val()) + parseInt($('#id_conf_productivity_most_4').val()) + parseInt($('#id_conf_productivity_most_5').val()) + parseInt($('#id_conf_productivity_most_6').val()));

    $('#span_confidentialityprodlossmax1').html(parseInt($('#id_conf_productivity_max_1').val()) + parseInt($('#id_conf_productivity_max_2').val()) + parseInt($('#id_conf_productivity_max_3').val()) + parseInt($('#id_conf_productivity_max_4').val()) + parseInt($('#id_conf_productivity_max_5').val()) + parseInt($('#id_conf_productivity_max_6').val()));

    $('#span_integrityprodlossmin1').html(parseInt($('#id_ia_productivity_min_1').val()) + parseInt($('#id_ia_productivity_min_2').val()) + parseInt($('#id_ia_productivity_min_3').val()) + parseInt($('#id_ia_productivity_min_4').val()) + parseInt($('#id_ia_productivity_min_5').val()) + parseInt($('#id_ia_productivity_min_6').val()));

    $('#span_integrityprodlosslikely1').html(parseInt($('#id_ia_productivity_most_1').val()) + parseInt($('#id_ia_productivity_most_2').val()) + parseInt($('#id_ia_productivity_most_3').val()) + parseInt($('#id_ia_productivity_most_4').val()) + parseInt($('#id_ia_productivity_most_5').val()) + parseInt($('#id_ia_productivity_most_6').val()));

    $('#span_integrityprodlossmax1').html(parseInt($('#id_ia_productivity_max_1').val()) + parseInt($('#id_ia_productivity_max_2').val()) + parseInt($('#id_ia_productivity_max_3').val()) + parseInt($('#id_ia_productivity_max_4').val()) + parseInt($('#id_ia_productivity_max_5').val()) + parseInt($('#id_ia_productivity_max_6').val()));

    $('#ans_confidentialityprodlossmin1').val(parseInt($('#id_conf_productivity_min_1').val()) + parseInt($('#id_conf_productivity_min_2').val()) + parseInt($('#id_conf_productivity_min_3').val()) + parseInt($('#id_conf_productivity_min_4').val()) + parseInt($('#id_conf_productivity_min_5').val()) + parseInt($('#id_conf_productivity_min_6').val()));

    $('#ans_confidentialityprodlosslikely1').val(parseInt($('#id_conf_productivity_most_1').val()) + parseInt($('#id_conf_productivity_most_2').val()) + parseInt($('#id_conf_productivity_most_3').val()) + parseInt($('#id_conf_productivity_most_4').val()) + parseInt($('#id_conf_productivity_most_5').val()) + parseInt($('#id_conf_productivity_most_6').val()));

    $('#ans_confidentialityprodlossmax1').val(parseInt($('#id_conf_productivity_max_1').val()) + parseInt($('#id_conf_productivity_max_2').val()) + parseInt($('#id_conf_productivity_max_3').val()) + parseInt($('#id_conf_productivity_max_4').val()) + parseInt($('#id_conf_productivity_max_5').val()) + parseInt($('#id_conf_productivity_max_6').val()));

    $('#ans_integrityprodlossmin1').val(parseInt($('#id_ia_productivity_min_1').val()) + parseInt($('#id_ia_productivity_min_2').val()) + parseInt($('#id_ia_productivity_min_3').val()) + parseInt($('#id_ia_productivity_min_4').val()) + parseInt($('#id_ia_productivity_min_5').val()) + parseInt($('#id_ia_productivity_min_6').val()));

    $('#ans_integrityprodlosslikely1').val(parseInt($('#id_ia_productivity_most_1').val()) + parseInt($('#id_ia_productivity_most_2').val()) + parseInt($('#id_ia_productivity_most_3').val()) + parseInt($('#id_ia_productivity_most_4').val()) + parseInt($('#id_ia_productivity_most_5').val()) + parseInt($('#id_ia_productivity_most_6').val()));

    $('#ans_integrityprodlossmax1').val(parseInt($('#id_ia_productivity_max_1').val()) + parseInt($('#id_ia_productivity_max_2').val()) + parseInt($('#id_ia_productivity_max_3').val()) + parseInt($('#id_ia_productivity_max_4').val()) + parseInt($('#id_ia_productivity_max_5').val()) + parseInt($('#id_ia_productivity_max_6').val()));
  }

  function loadtotal2() {
    //alert($('#id_conf_productivity_min_1').val() + $('#id_conf_productivity_min_2').val() + $('#id_conf_productivity_min_3').val() + $('#id_conf_productivity_min_4').val() + $('#id_conf_productivity_min_5').val() + $('#id_conf_productivity_min_6').val());
    $('#span_confidentialityprodlossmin2').html(parseInt($('#id_conf_response_min_1').val()) + parseInt($('#id_conf_response_min_2').val()) + parseInt($('#id_conf_response_min_3').val()) + parseInt($('#id_conf_response_min_4').val()));

    $('#span_confidentialityprodlosslikely2').html(parseInt($('#id_conf_response_most_1').val()) + parseInt($('#id_conf_response_most_2').val()) + parseInt($('#id_conf_response_most_3').val()) + parseInt($('#id_conf_response_most_4').val()));

    $('#span_confidentialityprodlossmax2').html(parseInt($('#id_conf_response_max_1').val()) + parseInt($('#id_conf_response_max_2').val()) + parseInt($('#id_conf_response_max_3').val()) + parseInt($('#id_conf_response_max_4').val()));

    $('#ans_confidentialityprodlossmin2').val(parseInt($('#id_conf_response_min_1').val()) + parseInt($('#id_conf_response_min_2').val()) + parseInt($('#id_conf_response_min_3').val()) + parseInt($('#id_conf_response_min_4').val()));

    $('#ans_confidentialityprodlosslikely2').val(parseInt($('#id_conf_response_most_1').val()) + parseInt($('#id_conf_response_most_2').val()) + parseInt($('#id_conf_response_most_3').val()) + parseInt($('#id_conf_response_most_4').val()));

    $('#ans_confidentialityprodlossmax2').val(parseInt($('#id_conf_response_max_1').val()) + parseInt($('#id_conf_response_max_2').val()) + parseInt($('#id_conf_response_max_3').val()) + parseInt($('#id_conf_response_max_4').val()));

    $('#span_integrityprodlossmin2').html(parseInt($('#id_ia_response_min_1').val()) + parseInt($('#id_ia_response_min_2').val()) + parseInt($('#id_ia_response_min_3').val()) + parseInt($('#id_ia_response_min_4').val()));

    $('#span_integrityprodlosslikely2').html(parseInt($('#id_ia_response_most_1').val()) + parseInt($('#id_ia_response_most_2').val()) + parseInt($('#id_ia_response_most_3').val()) + parseInt($('#id_ia_response_most_4').val()));

    $('#span_integrityprodlossmax2').html(parseInt($('#id_ia_response_max_1').val()) + parseInt($('#id_ia_response_max_2').val()) + parseInt($('#id_ia_response_max_3').val()) + parseInt($('#id_ia_response_max_4').val()));

    $('#ans_integrityprodlossmin2').val(parseInt($('#id_ia_response_min_1').val()) + parseInt($('#id_ia_response_min_2').val()) + parseInt($('#id_ia_response_min_3').val()) + parseInt($('#id_ia_response_min_4').val()));

    $('#ans_integrityprodlosslikely2').val(parseInt($('#id_ia_response_most_1').val()) + parseInt($('#id_ia_response_most_2').val()) + parseInt($('#id_ia_response_most_3').val()) + parseInt($('#id_ia_response_most_4').val()));

    $('#ans_integrityprodlossmax2').val(parseInt($('#id_ia_response_max_1').val()) + parseInt($('#id_ia_response_max_2').val()) + parseInt($('#id_ia_response_max_3').val()) + parseInt($('#id_ia_response_max_4').val()));


  }

  function loadtotal3() {
    //alert($('#id_conf_productivity_min_1').val() + $('#id_conf_productivity_min_2').val() + $('#id_conf_productivity_min_3').val() + $('#id_conf_productivity_min_4').val() + $('#id_conf_productivity_min_5').val() + $('#id_conf_productivity_min_6').val());
    $('#span_confidentialityprodlossmin3').html(parseInt($('#id_conf_replacement_min_1').val()) + parseInt($('#id_conf_replacement_min_2').val()) + parseInt($('#id_conf_replacement_min_3').val()) + parseInt($('#id_conf_replacement_min_4').val()) + parseInt($('#id_conf_replacement_min_5').val()));

    $('#span_confidentialityprodlosslikely3').html(parseInt($('#id_conf_replacement_most_1').val()) + parseInt($('#id_conf_replacement_most_2').val()) + parseInt($('#id_conf_replacement_most_3').val()) + parseInt($('#id_conf_replacement_most_4').val()) + parseInt($('#id_conf_replacement_most_5').val()));

    $('#span_confidentialityprodlossmax3').html(parseInt($('#id_conf_replacement_max_1').val()) + parseInt($('#id_conf_replacement_max_2').val()) + parseInt($('#id_conf_replacement_max_3').val()) + parseInt($('#id_conf_replacement_max_4').val()) + parseInt($('#id_conf_replacement_max_5').val()));

    $('#span_integrityprodlossmin3').html(parseInt($('#id_ia_replacement_min_1').val()) + parseInt($('#id_ia_replacement_min_2').val()) + parseInt($('#id_ia_replacement_min_3').val()) + parseInt($('#id_ia_replacement_min_4').val()) + parseInt($('#id_ia_replacement_min_5').val()));

    $('#span_integrityprodlosslikely3').html(parseInt($('#id_ia_replacement_most_1').val()) + parseInt($('#id_ia_replacement_most_2').val()) + parseInt($('#id_ia_replacement_most_3').val()) + parseInt($('#id_ia_replacement_most_4').val()) + parseInt($('#id_ia_replacement_most_5').val()));

    $('#span_integrityprodlossmax3').html(parseInt($('#id_ia_replacement_max_1').val()) + parseInt($('#id_ia_replacement_max_2').val()) + parseInt($('#id_ia_replacement_max_3').val()) + parseInt($('#id_ia_replacement_max_4').val()) + parseInt($('#id_ia_replacement_max_5').val()));

    $('#ans_confidentialityprodlossmin3').val(parseInt($('#id_conf_replacement_min_1').val()) + parseInt($('#id_conf_replacement_min_2').val()) + parseInt($('#id_conf_replacement_min_3').val()) + parseInt($('#id_conf_replacement_min_4').val()) + parseInt($('#id_conf_replacement_min_5').val()));

    $('#ans_confidentialityprodlosslikely3').val(parseInt($('#id_conf_replacement_most_1').val()) + parseInt($('#id_conf_replacement_most_2').val()) + parseInt($('#id_conf_replacement_most_3').val()) + parseInt($('#id_conf_replacement_most_4').val()) + parseInt($('#id_conf_replacement_most_5').val()));

    $('#ans_confidentialityprodlossmax3').val(parseInt($('#id_conf_replacement_max_1').val()) + parseInt($('#id_conf_replacement_max_2').val()) + parseInt($('#id_conf_replacement_max_3').val()) + parseInt($('#id_conf_replacement_max_4').val()) + parseInt($('#id_conf_replacement_max_5').val()));

    $('#ans_integrityprodlossmin3').val(parseInt($('#id_ia_replacement_min_1').val()) + parseInt($('#id_ia_replacement_min_2').val()) + parseInt($('#id_ia_replacement_min_3').val()) + parseInt($('#id_ia_replacement_min_4').val()) + parseInt($('#id_ia_replacement_min_5').val()));

    $('#ans_integrityprodlosslikely3').val(parseInt($('#id_ia_replacement_most_1').val()) + parseInt($('#id_ia_replacement_most_2').val()) + parseInt($('#id_ia_replacement_most_3').val()) + parseInt($('#id_ia_replacement_most_4').val()) + parseInt($('#id_ia_replacement_most_5').val()));

    $('#ans_integrityprodlossmax3').val(parseInt($('#id_ia_replacement_max_1').val()) + parseInt($('#id_ia_replacement_max_2').val()) + parseInt($('#id_ia_replacement_max_3').val()) + parseInt($('#id_ia_replacement_max_4').val()) + parseInt($('#id_ia_replacement_max_5').val()));


  }

  function loadtotal4() {
    //alert($('#id_conf_productivity_min_1').val() + $('#id_conf_productivity_min_2').val() + $('#id_conf_productivity_min_3').val() + $('#id_conf_productivity_min_4').val() + $('#id_conf_productivity_min_5').val() + $('#id_conf_productivity_min_6').val());
    $('#span_confidentialityprodlossmin4').html(parseInt($('#id_conf_legal_min_1').val()) + parseInt($('#id_conf_legal_min_2').val()) + parseInt($('#id_conf_legal_min_3').val()) + parseInt($('#id_conf_legal_min_4').val()) + parseInt($('#id_conf_legal_min_5').val()));

    $('#span_confidentialityprodlosslikely4').html(parseInt($('#id_conf_legal_most_1').val()) + parseInt($('#id_conf_legal_most_2').val()) + parseInt($('#id_conf_legal_most_3').val()) + parseInt($('#id_conf_legal_most_4').val()) + parseInt($('#id_conf_legal_most_5').val()));

    $('#span_confidentialityprodlossmax4').html(parseInt($('#id_conf_legal_max_1').val()) + parseInt($('#id_conf_legal_max_2').val()) + parseInt($('#id_conf_legal_max_3').val()) + parseInt($('#id_conf_legal_max_4').val()) + parseInt($('#id_conf_legal_max_5').val()));

    $('#span_integrityprodlossmin4').html(parseInt($('#id_ia_legal_min_1').val()) + parseInt($('#id_ia_legal_min_2').val()) + parseInt($('#id_ia_legal_min_3').val()) + parseInt($('#id_ia_legal_min_4').val()) + parseInt($('#id_ia_legal_min_5').val()));

    $('#span_integrityprodlosslikely4').html(parseInt($('#id_ia_legal_most_1').val()) + parseInt($('#id_ia_legal_most_2').val()) + parseInt($('#id_ia_legal_most_3').val()) + parseInt($('#id_ia_legal_most_4').val()) + parseInt($('#id_ia_legal_most_5').val()));

    $('#span_integrityprodlossmax4').html(parseInt($('#id_ia_legal_max_1').val()) + parseInt($('#id_ia_legal_max_2').val()) + parseInt($('#id_ia_legal_max_3').val()) + parseInt($('#id_ia_legal_max_4').val()) + parseInt($('#id_ia_legal_max_5').val()));

    $('#ans_confidentialityprodlossmin4').val(parseInt($('#id_conf_legal_min_1').val()) + parseInt($('#id_conf_legal_min_2').val()) + parseInt($('#id_conf_legal_min_3').val()) + parseInt($('#id_conf_legal_min_4').val()) + parseInt($('#id_conf_legal_min_5').val()));

    $('#ans_confidentialityprodlosslikely4').val(parseInt($('#id_conf_legal_most_1').val()) + parseInt($('#id_conf_legal_most_2').val()) + parseInt($('#id_conf_legal_most_3').val()) + parseInt($('#id_conf_legal_most_4').val()) + parseInt($('#id_conf_legal_most_5').val()));

    $('#ans_confidentialityprodlossmax4').val(parseInt($('#id_conf_legal_max_1').val()) + parseInt($('#id_conf_legal_max_2').val()) + parseInt($('#id_conf_legal_max_3').val()) + parseInt($('#id_conf_legal_max_4').val()) + parseInt($('#id_conf_legal_max_5').val()));

    $('#ans_integrityprodlossmin4').val(parseInt($('#id_ia_legal_min_1').val()) + parseInt($('#id_ia_legal_min_2').val()) + parseInt($('#id_ia_legal_min_3').val()) + parseInt($('#id_ia_legal_min_4').val()) + parseInt($('#id_ia_legal_min_5').val()));

    $('#ans_integrityprodlosslikely4').val(parseInt($('#id_ia_legal_most_1').val()) + parseInt($('#id_ia_legal_most_2').val()) + parseInt($('#id_ia_legal_most_3').val()) + parseInt($('#id_ia_legal_most_4').val()) + parseInt($('#id_ia_legal_most_5').val()));

    $('#ans_integrityprodlossmax4').val(parseInt($('#id_ia_legal_max_1').val()) + parseInt($('#id_ia_legal_max_2').val()) + parseInt($('#id_ia_legal_max_3').val()) + parseInt($('#id_ia_legal_max_4').val()) + parseInt($('#id_ia_legal_max_5').val()));


  }

  function loadtotal5() {
    //alert($('#id_conf_productivity_min_1').val() + $('#id_conf_productivity_min_2').val() + $('#id_conf_productivity_min_3').val() + $('#id_conf_productivity_min_4').val() + $('#id_conf_productivity_min_5').val() + $('#id_conf_productivity_min_6').val());
    $('#span_confidentialityprodlossmin5').html(parseInt($('#id_conf_comp_adv_min_1').val()) + parseInt($('#id_conf_comp_adv_min_2').val()) + parseInt($('#id_conf_comp_adv_min_3').val()));

    $('#span_confidentialityprodlosslikely5').html(parseInt($('#id_conf_comp_adv_most_1').val()) + parseInt($('#id_conf_comp_adv_most_2').val()) + parseInt($('#id_conf_comp_adv_most_3').val()));

    $('#span_confidentialityprodlossmax5').html(parseInt($('#id_conf_comp_adv_max_1').val()) + parseInt($('#id_conf_comp_adv_max_2').val()) + parseInt($('#id_conf_comp_adv_max_3').val()));

    $('#span_integrityprodlossmin5').html(parseInt($('#id_ia_comp_adv_min_1').val()) + parseInt($('#id_ia_comp_adv_min_2').val()) + parseInt($('#id_ia_comp_adv_min_3').val()));

    $('#span_integrityprodlosslikely5').html(parseInt($('#id_ia_comp_adv_most_1').val()) + parseInt($('#id_ia_comp_adv_most_2').val()) + parseInt($('#id_ia_comp_adv_most_3').val()));

    $('#span_integrityprodlossmax5').html(parseInt($('#id_ia_comp_adv_max_1').val()) + parseInt($('#id_ia_comp_adv_max_2').val()) + parseInt($('#id_ia_comp_adv_max_3').val()));

    $('#ans_confidentialityprodlossmin5').val(parseInt($('#id_conf_comp_adv_min_1').val()) + parseInt($('#id_conf_comp_adv_min_2').val()) + parseInt($('#id_conf_comp_adv_min_3').val()));

    $('#ans_confidentialityprodlosslikely5').val(parseInt($('#id_conf_comp_adv_most_1').val()) + parseInt($('#id_conf_comp_adv_most_2').val()) + parseInt($('#id_conf_comp_adv_most_3').val()));

    $('#ans_confidentialityprodlossmax5').val(parseInt($('#id_conf_comp_adv_max_1').val()) + parseInt($('#id_conf_comp_adv_max_2').val()) + parseInt($('#id_conf_comp_adv_max_3').val()));

    $('#ans_integrityprodlossmin5').val(parseInt($('#id_ia_comp_adv_min_1').val()) + parseInt($('#id_ia_comp_adv_min_2').val()) + parseInt($('#id_ia_comp_adv_min_3').val()));

    $('#ans_integrityprodlosslikely5').val(parseInt($('#id_ia_comp_adv_most_1').val()) + parseInt($('#id_ia_comp_adv_most_2').val()) + parseInt($('#id_ia_comp_adv_most_3').val()));

    $('#ans_integrityprodlossmax5').val(parseInt($('#id_ia_comp_adv_max_1').val()) + parseInt($('#id_ia_comp_adv_max_2').val()) + parseInt($('#id_ia_comp_adv_max_3').val()));


  }

  function loadtotal6() {
    //alert($('#id_conf_productivity_min_1').val() + $('#id_conf_productivity_min_2').val() + $('#id_conf_productivity_min_3').val() + $('#id_conf_productivity_min_4').val() + $('#id_conf_productivity_min_5').val() + $('#id_conf_productivity_min_6').val());
    $('#span_confidentialityprodlossmin6').html(parseInt($('#id_conf_reputation_min_1').val()) + parseInt($('#id_conf_reputation_min_2').val()) + parseInt($('#id_conf_reputation_min_3').val()));

    $('#span_confidentialityprodlosslikely6').html(parseInt($('#id_conf_reputation_most_1').val()) + parseInt($('#id_conf_reputation_most_2').val()) + parseInt($('#id_conf_reputation_most_3').val()));

    $('#span_confidentialityprodlossmax6').html(parseInt($('#id_conf_reputation_max_1').val()) + parseInt($('#id_conf_reputation_max_2').val()) + parseInt($('#id_conf_reputation_max_3').val()));

    $('#span_integrityprodlossmin6').html(parseInt($('#id_ia_reputation_min_1').val()) + parseInt($('#id_ia_reputation_min_2').val()) + parseInt($('#id_ia_reputation_min_3').val()));

    $('#span_integrityprodlosslikely6').html(parseInt($('#id_ia_reputation_most_1').val()) + parseInt($('#id_ia_reputation_most_2').val()) + parseInt($('#id_ia_reputation_most_3').val()));

    $('#span_integrityprodlossmax6').html(parseInt($('#id_ia_reputation_max_1').val()) + parseInt($('#id_ia_reputation_max_2').val()) + parseInt($('#id_ia_reputation_max_3').val()));

    $('#ans_confidentialityprodlossmin6').val(parseInt($('#id_conf_reputation_min_1').val()) + parseInt($('#id_conf_reputation_min_2').val()) + parseInt($('#id_conf_reputation_min_3').val()));

    $('#ans_confidentialityprodlosslikely6').val(parseInt($('#id_conf_reputation_most_1').val()) + parseInt($('#id_conf_reputation_most_2').val()) + parseInt($('#id_conf_reputation_most_3').val()));

    $('#ans_confidentialityprodlossmax6').val(parseInt($('#id_conf_reputation_max_1').val()) + parseInt($('#id_conf_reputation_max_2').val()) + parseInt($('#id_conf_reputation_max_3').val()));

    $('#ans_integrityprodlossmin6').val(parseInt($('#id_ia_reputation_min_1').val()) + parseInt($('#id_ia_reputation_min_2').val()) + parseInt($('#id_ia_reputation_min_3').val()));

    $('#ans_integrityprodlosslikely6').val(parseInt($('#id_ia_reputation_most_1').val()) + parseInt($('#id_ia_reputation_most_2').val()) + parseInt($('#id_ia_reputation_most_3').val()));

    $('#ans_integrityprodlossmax6').val(parseInt($('#id_ia_reputation_max_1').val()) + parseInt($('#id_ia_reputation_max_2').val()) + parseInt($('#id_ia_reputation_max_3').val()));


  }
</script>

<style type="text/css">
  #regiration_form fieldset:not(:first-of-type) {
    display: none;
  }



  .btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
  }

  .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-top-color: transparent;
    border-right-color: transparent;
    border-bottom-color: transparent;
    border-left-color: transparent;
    border-radius: 4px;
  }
</style>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="wrapper">
  <div class="page-content">
    <div class="content">

      <!-- Start Content-->
      <div class="container-fluid">

        <!-- start page title -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="fs-5 pe-3"><em class="bi bi-file-earmark-lock2-fill"></em><?php echo " ";
          echo _Biaassess; ?></div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
              </ol>
            </nav>
          </div>
        </div>
        <!-- end page title -->
        <div class="container card p-3">
          <h1></h1>
          <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

          <form id="regiration_form" action="index.php?page=biaassessprocess" novalidate method="post" enctype="multipart/form-data">
            <fieldset>
            <legend></legend>
              <h3>Cyber Risk Quantification and the CIS CSAT Ransomware Business Impact Analysis Tool</h3>
              <p>
                The CIS CSAT Ransomware Business Impact Analysis tool (CIS CSAT BIA) is the product of a collaboration between the <a href="https://www.cisecurity.org/">Center for
                  Internet Security</a> (CIS) and <a href="https://www.foresightresiliencestrategies.com">Foresight Resilience Strategies</a>, a consultancy specializing in
                quantifying information risk in financial terms. It is intended to help organizations of all sizes
                self-assess their business risk due to ransomware. Measuring cyber risk is essential to
                meeting the risk management goals described in the National Institute for Standards and
                Technology's <a href="https://www.nist.gov/cyberframework">Cybersecurity Framework</a> (NIST CSF).
                We hope that this tool will introduce a useful risk measurement approach to stakeholders
                responsible for cyber risk, enabling them to:
              </p>
              <ul>
                <li>Characterize and forecast the business impact of a ransomware incident, should it occur.</li>
                <li>Estimate the likelihood of a loss-generating incident in the coming twelve months based on the implementation of CIS Controls.</li>
                <li>Import current implementation status from selected CIS Controls Safeguards from a <a href="https://csat.cisecurity.org/">CSAT</a> assessment (for CIS CSAT users).</li>
                <li>Calculate risk in dollars based on measures of impact and likelihood.</li>
                <li>Make risk-informed decisions about their information security (CSF Implementation Tier 2).</li>
                <li>Develop a standardized, repeatable risk management process (CSF Implementation Tier 3).</li>
                <li>Engage non-technical stakeholders in cyber risk management efforts.</li>
                <li>Prioritize efforts and effectively allocate resources.</li>
              </ul>
              <p></p>
              <h4>Overview</h4>
              <p>
                This assessment will guide you through the process of estimating the business impact of a cyber loss event
                due to ransomware in your organization for an individual asset of your choice. There are four steps in the
                process:

              </p>
              <ol>
                <li>Identify an asset to be assessed. You should select a critical information asset that would
                  have a significant impact on your organization if it were breached, unavailable, or surreptitiously modified.</li>
                <li>Identify the specific categories of loss or cost you would expect to incur in a successful ransomware
                  attack on the asset.</li>
                <li>Estimate the cost in dollars for each category of loss. Because it's impossible to know the exact cost,
                  you will be asked to enter a range of values for each category.</li>
                <li>Your existing controls, documented in CIS CSAT or entered manually, will be used to estimate the likelihood of a successful ransomware attack
                  over the next twelve months. You will have the opportunity to accept this estimate or modify it based on
                  your beliefs in the current threat environment for your organization.</li>
              </ol>
              <p></p>
              <p> Using the information provided about the impact and likelihood of a ransomware incident affecting this selected asset,
                the assessment tool will run a simulation of loss scenarios that could occur over the next twelve months and
                produce a report that characterizes the asset's unique risk profile for your organization. The report will also estimate
                the reduction in the likelihood of a loss event your organization could achieve by increasing the level of implementation
                for a number of CIS Safeguards related to ransomware.
              </p>
              <h4>Requirements</h4>
              <p>
                Gathering the information required for this assessment will likely require the input of a number of senior
                stakeholders including those responsible for information security, business operations, and finance. Depending
                on your organization, it may be possible to complete the assessment in a single 1-to-2-hour session, or it may
                require a number of conversations and emails to gather the information. The actual data entry and report generation
                should take between 30 and 60 minutes. CSAT users who can export their current CIS Controls implementation status can
                save time by uploading this information in the "Upload CIS Safeguards" section.
              </p>
              <h4>The Assessment Report</h4>
              <p>
                The output of the Business Impact Assessment is an asset risk profile report that quantifies the impact and likelihood
                of a ransomware-related loss in annualized dollars.
              </p>
              <h5>Who Should Use the Report</h5>
              <ul>
                <li>Cybersecurity professionals can use this report to assess, report, and propose changes in
                  controls based on a return on investment.</li>
                <li>Financial and operational business leads can better understand how the budget they have
                  deployed to cybersecurity provides financial benefits in terms of concrete loss prevention.</li>
                <li>Directors will recognize the way cyber risk is presented and discussed in this report
                  is consistent with the way they review reports on the company’s financial exposure for other
                  categories of risk.</li>
                <li>Stakeholders at all management levels can communicate about the cyber risk described in
                  this report using a common framework.</li>
              </ul>
              <h5>How to Use the Report</h5>
              <ul>
                <li>Promote discussion, understanding, and consensus among stakeholders on the
                  estimated business impact of a successful ransomware attack and the importance
                  and value of mitigating the risk of such an event.</li>
                <li>Integrate cybersecurity risk management into the overall risk management and
                  risk governance processes by quantifying it in financial terms.</li>
                <li>Prioritize the implementation of additional controls (suggestions included in
                  the Risk Mitigation section).</li>
                <li>Provide a defensible financial risk analysis to support sound resource allocation
                  decisions.</li>

              </ul>
              <input type="button" name="data[password]" class="next btn bg-primary p-2 text-light" value="Next">
            </fieldset>

            <fieldset>
            <legend></legend>
              <h3 class="multisteps-form__title">Asset to Be Analyzed</h3>
              <hr>
              <p><strong>
                  To begin the assessment, please identify an asset for which you wish to estimate
                  the business impact of a successful ransomware attack.
                </strong></p>
              <ul>
                <li>To create a new asset, enter the requested information.</li>
                <li>To edit or run a report for a previously created asset (listed below) please re-enter
                  the asset name and update the asset description, platform, and business unit fields.</li>
              </ul>
              <p>
              </p>
              <p><label for="id_name">Name:</label> <input type="text" name="Name" maxlength="20" class="form-control input" required="" id="id_name"></p><span id="span_name" style="color:red"></span>
              <p><label for="id_description">Description:</label> <input type="text" name="Description" maxlength="50" class="form-control form-control-sm" required="" id="id_description"></p><span id="span_desc" style="color:red"></span>
              <p><label for="id_platform">Platform:</label> <input type="text" name="Platform" maxlength="20" class="form-control form-control-sm" required="" id="id_platform"></p><span id="span_platform" style="color:red"></span>
              <p><label for="id_business_unit">Business unit:</label> <input type="text" name="Business_Unit" maxlength="20" class="form-control form-control-sm" required="" id="id_business_unit"></p><span id="span_busunit" style="color:red"></span>
              <br>
              <input type="button" name="previous" class="previous btn bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next btn btn-info btn bg-primary p-2 text-light" value="Next">



            </fieldset>
            <fieldset>
            <legend></legend>
              <h3>Identify Relevant Cost (Loss) Categories</h3>
              <strong>
                For this part of the assessment, assume that a ransomware attack has occurred. Consider each of the
                categories of loss below and indicate whether or not your organization would likely be impacted by a financial
                cost or loss for each category. Losses are divided into those caused by a loss of asset confidentiality
                (where confidential information is accessed by unauthorized individuals) and those caused by a loss of
                integrity and/or availability (where information is altered, destroyed or made unavailable, such as
                through unauthorized encryption). It's a good idea to document your notes and assumptions in the fields
                provided so you can review them later.
              </strong>
              <div>
                <div class="form-row mt-4">
                  <strong>Net Losses Due to Reduced Productivity</strong>
                  <p>This includes losses that occur when the organization’s ability to generate its primary value
                    is impaired due to a cyber event, such as might occur due to the unavailability of critical
                    data or systems. Losses might include permanently lost sales or revenue, the net cost of delayed
                    sales or revenue, sunk costs associated with idle resources, the opportunity cost of staff time
                    lost responding to the incident, and the opportunity cost of financial or other resources expended
                    on the loss event that could have been better deployed.
                  </p>
                  <p><strong>Please answer below whether or not you believe the described types of compromise of this
                      asset could reasonably result in a loss in <strong>PRODUCTIVITY</strong> for your organization?</strong>
                  </p>
                  <input type="hidden" name="ques_productivity" maxlength="20" class="form-control input" id="ques_productivity" value="Please answer below whether or not you believe the described types of compromise of this asset could reasonably result in a loss in PRODUCTIVITY for your organization?">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <input type="hidden" name="ques_conf_prod" maxlength="20" class="form-control input" id="ques_conf_prod" value="Loss of CONFIDENTIALITY?">
                    <label for="email"><strong>Loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_prod_0"><input type="radio" name="conf_prod" value="Yes" required="" class="radioset" id="id_conf_prod_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_conf_prod_1"><input type="radio" name="conf_prod" value="No" required="" class="radioset" id="id_conf_prod_1">
                      No</label>

                  </div>
                  <input type="hidden" name="ques_ia_prod" maxlength="20" class="form-control input" id="ques_ia_prod" value="Loss of INTEGRITY and/or AVAILABILITY?">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_prod_0"><input type="radio" name="ia_prod" value="Yes" required="" class="radioset" id="id_ia_prod_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_ia_prod_1"><input type="radio" name="ia_prod" value="No" required="" class="radioset" id="id_ia_prod_1">
                      No</label>

                  </div>
                  <input type="hidden" name="ques_notes_prod" maxlength="20" class="form-control input" id="ques_notes_prod" value="Notes and Assumptions">
                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="notes_prod" cols="40" rows="1" class="form-control form-control-sm" id="id_notes_prod"></textarea>

                </div>

                <div class="form-row mt-4">
                  <strong>Direct Costs of Responding to the Incident</strong>
                  <p>
                    This could include the cost of IT staff, contractors, senior management and other staff time;
                    initial legal costs (incurred whether or not the event is disclosed); the initial cost of public
                    relations (incurred whether or not the event becomes known); logistical expenses; primary forensic
                    investigations; cost of submitting insurance claims; cost of required notifications; the cost of
                    temporary workarounds; or other direct costs.
                  </p>
                  <input type="hidden" name="ques_response" maxlength="20" class="form-control input" id="ques_response" value="Please answer below whether or not you believe the described types of compromise of this asset could reasonably result in RESPONSE COSTS to your organization?">

                  <p><strong>Please answer below whether or not you believe the described types of compromise of this
                      asset could reasonably result in RESPONSE COSTS to your organization?</strong>
                  </p>

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_resp_0"><input type="radio" name="conf_resp" value="Yes" required="" class="radioset" id="id_conf_resp_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_conf_resp_1"><input type="radio" name="conf_resp" value="No" required="" class="radioset" id="id_conf_resp_1">
                      No</label>

                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_resp_0"><input type="radio" name="ia_resp" value="Yes" required="" class="radioset" id="id_ia_resp_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_ia_resp_1"><input type="radio" name="ia_resp" value="No" required="" class="radioset" id="id_ia_resp_1">
                      No</label>

                  </div>

                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="notes_resp" cols="40" rows="1" class="form-control form-control-sm" id="id_notes_resp"></textarea>

                </div>

                <div class="form-row mt-4">
                  <strong>Costs of Asset Replacement</strong>
                  <p>This describes the cost of restoring the organization’s capacity for operations to normal by repairing
                    or replacing any impaired assets. This could include reinstalling software, replacing hardware,
                    rebuilding a facility, recovering data, recreating documents or data sets, replacing lost employees,
                    the cost of losses due to fraud and restitution, or other recovery costs.
                  </p>
                  <p><strong>Please answer below whether or not you believe the described types of compromise of this
                      asset could reasonably result in REPLACEMENT COSTS to your organization?</strong>
                  </p>
                  <input type="hidden" name="ques_replacement" maxlength="20" class="form-control input" id="ques_replacement" value="Please answer below whether or not you believe the described types of compromise of this asset could reasonably result in REPLACEMENT COSTS to your organization?">

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_repl_0"><input type="radio" name="conf_repl" value="Yes" required="" class="radioset" id="id_conf_repl_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_conf_repl_1"><input type="radio" name="conf_repl" value="No" required="" class="radioset" id="id_conf_repl_1">
                      No</label>

                  </div>

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_repl_0"><input type="radio" name="ia_repl" value="Yes" required="" class="radioset" id="id_ia_repl_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_ia_repl_1"><input type="radio" name="ia_repl" value="No" required="" class="radioset" id="id_ia_repl_1">
                      No</label>

                  </div>
                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="notes_repl" cols="40" rows="1" class="form-control form-control-sm" id="id_notes_repl"></textarea>

                </div>

                <div class="form-row mt-4">
                  <strong>Legal Costs</strong>
                  <p>This describes the costs of responding to regulatory actions, civil lawsuits, and criminal trials
                    that result from an incident. Examples include regulatory fines, civil judgements, attorney fees,
                    expert witness fees, and staff time spent preparing for hearings or testimony.
                  </p>
                  <input type="hidden" name="ques_legal" maxlength="20" class="form-control input" id="ques_legal" value="Please answer below whether or not you believe the described types of compromise of this asset could reasonably result in LEGAL COSTS to your organization?">
                  <p><strong>Please answer below whether or not you believe the described types of compromise of this
                      asset could reasonably result in LEGAL COSTS to your organization?</strong>
                  </p>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_legal_0"><input type="radio" name="conf_legal" value="Yes" required="" class="radioset" id="id_conf_legal_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_conf_legal_1"><input type="radio" name="conf_legal" value="No" required="" class="radioset" id="id_conf_legal_1">
                      No</label>

                  </div>

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_legal_0"><input type="radio" name="ia_legal" value="Yes" required="" class="radioset" id="id_ia_legal_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_ia_legal_1"><input type="radio" name="ia_legal" value="No" required="" class="radioset" id="id_ia_legal_1">
                      No</label>

                  </div>

                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="notes_legal" cols="40" rows="1" class="form-control form-control-sm" id="id_notes_legal"></textarea>

                </div>

                <div class="form-row mt-4">
                  <strong>Costs of a Loss of Competitive Advantage</strong>
                  <p>This describes losses due to the permanent impairment of strategic assets, including patents,
                    trade secrets and other intellectual property. Examples could also include lost of confidentiality
                    of partner or customer lists, contractual terms, strategic plans, or the compromise of other strategic
                    assets.
                  </p>
                  <input type="hidden" name="ques_competitive" maxlength="20" class="form-control input" id="ques_competitive" value="Please answer below whether or not you believe the described types of compromise of this asset could reasonably result your organization suffering a loss in its COMPETITIVE ADVANTAGE">

                  <p><strong>Please answer below whether or not you believe the described types of compromise of this
                      asset could reasonably result your organization suffering a loss in its COMPETITIVE ADVANTAGE </strong>
                  </p>

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_compAdv_0"><input type="radio" name="conf_compAdv" value="Yes" required="" class="radioset" id="id_conf_compAdv_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_conf_compAdv_1"><input type="radio" name="conf_compAdv" value="No" required="" class="radioset" id="id_conf_compAdv_1">
                      No</label>

                  </div>

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_compAdv_0"><input type="radio" name="ia_compAdv" value="Yes" required="" class="radioset" id="id_ia_compAdv_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_ia_compAdv_1"><input type="radio" name="ia_compAdv" value="No" required="" class="radioset" id="id_ia_compAdv_1">
                      No</label>

                  </div>

                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="notes_compAdv" cols="40" rows="1" class="form-control form-control-sm" id="id_notes_compAdv"></textarea>

                </div>

                <div class="form-row mt-4">
                  <strong>Losses Due to Reputational Damage</strong>
                  <p>This describes costs due to the loss of faith, good will, and/or interest from customers, partners,
                    investors, regulators, legislatures, or others. Examples could include reduced funding, increased cost of
                    capital, reduced market share, the costs of increased competition, and reduced partnership opportunities.
                  </p>
                  <p><strong>Please answer below whether or not you believe the described types of compromise of this
                      asset could reasonably result in a financial impact due to REPUTATIONAL DAMAGE to your organization?</strong>
                  </p>
                  <input type="hidden" name="ques_reputational" maxlength="20" class="form-control input" id="ques_reputational" value="Please answer below whether or not you believe the described types of compromise of this asset could reasonably result in a financial impact due to REPUTATIONAL DAMAGE to your organization?">

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_repu_0"><input type="radio" name="conf_repu" value="Yes" required="" class="radioset" id="id_conf_repu_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_conf_repu_1"><input type="radio" name="conf_repu" value="No" required="" class="radioset" id="id_conf_repu_1">
                      No</label>

                  </div>

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <label for="email"><strong>Loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_repu_0"><input type="radio" name="ia_repu" value="Yes" required="" class="form-check-input" id="id_ia_repu_0" checked="">
                      Yes</label>

                    <br>
                    <label for="id_ia_repu_1"><input type="radio" name="ia_repu" value="No" required="" class="form-check-input" id="id_ia_repu_1">
                      No</label>

                  </div>

                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="notes_repu" cols="40" rows="1" class="form-control form-control-sm" id="id_notes_repu"></textarea>

                </div>

                <hr>



              </div>

              <input type="button" name="previous" class="previous btn bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next btn bg-primary p-2 text-light" value="Next">
            </fieldset>
            <fieldset>
            <legend></legend>
              <h3 class="title">Quantifying Losses -- Introduction</h3>
              <div class="content">
                <div class="form-row mt-4">
                  <!-- step 3 -->
                  <strong>Instructions</strong>
                  <p>
                    For this part of the assessment, you will likely need to collaborate with other business
                    and financial stakeholders. <em>This is a critical component of accurately assessing business impact,
                      and it is a valuable step in building consensus about the consequences of a cyber incident.</em>
                  </p>
                  <p>
                    You will be asked to provide estimates for the itemized costs of a loss incident caused by ransomware for
                    the chosen asset. Each category of loss has been decomposed into sub-categories to make it easier to think about
                    and accurately estimate each loss. Research has shown that this improves the accuracy of estimates.
                  </p>
                  <p>
                    To avoid double counting losses, take care to enter each itemized loss into one, and only one, category. For example,
                    if, in responding to a breach you would expect to call in a forensics team to review system logs, but that same team would also
                    be engaged in restoring system integrity, you might divide the cost proportionately between the "response" and "replacement" categories,
                    but you wouldn't enter the full cost in each category.
                  </p>
                  <p>
                    Because the precise costs of an event cannot be known in advance, you will be asked to submit a low,
                    most likely, and high value to capture the range of possible costs. <em>Since you are only adding these
                      estimates for items where a loss is expected, you should avoid using zero for the minimum value.</em>
                  </p>
                  <ul>
                    <li>The <strong>low</strong> value represents the minimum material cost that you would expect to incur. For
                      example, the low value might represent the cost associated with an event that causes a minor, but
                      measurable business interruption.
                    </li>
                    <li>The <strong>most likely</strong> value represents the cost you would expect to incur in a typical event.
                      For example, if you think a typical ransomware incident would cause the chosen asset to be unavailable
                      for a few days or hours, you might use that as the basis for this response. </li>
                    <li>The <strong>high</strong> value represents the maximum cost you could foresee incurring in a very
                      severe incident. For example, if the data affected by ransomware was unrecoverable, causing
                      significant disruption to critical functions for an extended period such as weeks or months, you would
                      enter an estimate of that cost as the high value.
                    </li>
                  </ul>
                  <hr>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                  </div>
                </div>

              </div> <!-- end content -->

              <input type="button" name="previous" class="previous btn  bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next  btn bg-primary p-2 text-light" value="Next">
            </fieldset>
            <fieldset>
            <legend></legend>
              <!-- PRODUCTIVITY ESTIMATES -->
              <div class="form-row mt-4">
                <h3>Estimating Productivity Losses</h3>
                <p>This includes losses that occur when the organization’s ability to generate its primary value is
                  impaired due to a cyber event, such as might occur due to the unavailability of critical data or
                  systems. Losses might include one or more of the following:
                </p>
                <ul>
                  <li>Permanently lost sales/revenue</li>
                  <li>Net losses from delayed sales/revenue</li>
                  <li>Sunk costs associated with idled resources</li>
                  <li>The opportunity cost of staff time repurposed to respond to the incident</li>
                  <li>The opportunity cost of financial or other resources expended on the loss
                    event that could have been otherwise deployed more productively</li>
                </ul>
                <p><strong>
                    NOTE: You may only estimate losses for categories previously identified as relevant in <em>Step 2 - Types of Losses</em>.
                    Fields for losses not expected for each category will be grayed out. You may go back to Step 2 to make changes if you wish
                    to submit estimates for grayed-out categories.
                  </strong></p>
              </div>
              <hr>
              <div> <!-- Start Estimation Section -->
                <!-- PERMANENTLY LOST SALES -->
                <div class="form-row mt-4">
                  <div class="text-body">
                    <p>
                      <strong>Permanently Lost Sales/Revenue</strong>
                      <br>
                      This could be caused by the inability to process transactions, manufacture goods, provide services,
                      bill or invoice customers, meet contractual obligations, etc.
                    </p>
                  </div>
                  <input type="hidden" name="ques_lostsales" maxlength="20" class="form-control input" id="ques_lostsales" value="Permanently Lost Sales/Revenue - This could be caused by the inability to process transactions, manufacture goods, provide services, bill or invoice customers, meet contractual obligations, etc.">
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <input type="hidden" name="ques_Confidentiality" maxlength="20" class="form-control input" id="ques_Confidentiality" value="Confidentiality (in $000s)">
                      <input type="hidden" name="ques_minimum" maxlength="20" class="form-control input" id="ques_minimum" value="Minimum">
                      <input type="hidden" name="ques_mostlikely" maxlength="20" class="form-control input" id="ques_mostlikely" value="Most Likely">
                      <input type="hidden" name="ques_maximum" maxlength="20" class="form-control input" id="ques_maximum" value="Maximum">

                      <div class="table-responsive">
                        <!-- <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable" width="100%" cellspacing="1"> -->
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                            <th colspan="3" scope="col" style="text-align:center">Confidentiality<br>(in $000s)</th>
                              <!-- <th colspan="3" style="text-align:center">Confidentiality<br>(in $000s)</th> -->
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-valid ng-not-empty ng-touched" id="id_conf_productivity_min_1" autofocus="" ng-model="conf_productivity_min_1" ng-init="conf_productivity_min_1=0" name="conf_productivity_min_1" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_most_1" autofocus="" ng-model="conf_productivity_most_1" ng-init="conf_productivity_most_1=0" name="conf_productivity_most_1" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_max_1" autofocus="" ng-model="conf_productivity_max_1" ng-init="conf_productivity_max_1=0" name="conf_productivity_max_1" onchange="loadtotal1()"></td>




                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <input type="hidden" name="ques_integrity" maxlength="20" class="form-control input" id="ques_integrity" value="Integrity and/or Availability (in $000s)">

                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_min_1" autofocus="" name="ia_productivity_min_1" ng-model="ia_productivity_min_1" ng-init="ia_productivity_min_1=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_most_1" autofocus="" name="ia_productivity_most_1" ng-model="ia_productivity_most_1" ng-init="ia_productivity_most_1=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_max_1" autofocus="" name="ia_productivity_max_1" ng-model="ia_productivity_max_1" ng-init="ia_productivity_max_1=0" onchange="loadtotal1()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- COST OF DELAYED SALES -->
                <div class="form-row mt-4">
                  <div class="text-body">
                    <p>
                      <strong>Net Cost of Delayed Sales/Revenue</strong>
                      <br>
                      This could include costs of capital, interest earned, cost of additional customer service or other
                      accommodations made to customers, uncollected accounts receivable, etc.
                    </p>
                  </div>
                  <input type="hidden" name="ques_netcostsales" maxlength="20" class="form-control input" id="ques_netcostsales" value="Net Cost of Delayed Sales/Revenue - This could include costs of capital, interest earned, cost of additional customer service or other accommodations made to customers, uncollected accounts receivable, etc.">

                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" scope="col" style="text-align:center">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_min_2" autofocus="" name="conf_productivity_min_2" ng-model="conf_productivity_min_2" ng-init="conf_productivity_min_2=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_most_2" autofocus="" name="conf_productivity_most_2" ng-model="conf_productivity_most_2" ng-init="conf_productivity_most_2=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_max_2" autofocus="" name="conf_productivity_max_2" ng-model="conf_productivity_max_2" ng-init="conf_productivity_max_2=0" onchange="loadtotal1()"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" scope="col" style="text-align:center">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_min_2" autofocus="" name="ia_productivity_min_2" ng-model="ia_productivity_min_2" ng-init="ia_productivity_min_2=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_most_2" autofocus="" name="ia_productivity_most_2" ng-model="ia_productivity_most_2" ng-init="ia_productivity_most_2=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_max_2" autofocus="" name="ia_productivity_max_2" ng-model="ia_productivity_max_2" ng-init="ia_productivity_max_2=0" onchange="loadtotal1()"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- SUNK COSTS OF IDLED RESOURCES -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_sunkcost" maxlength="20" class="form-control input" id="ques_sunkcost" value="Sunk costs associated with idle resources - This could include wages, facility or equipment leases, outsourced contractor payments, etc.">
                  <div class="text-body">
                    <p>
                      <strong>Sunk costs associated with idle resources</strong>
                      <br>
                      This could include wages, facility or equipment leases, outsourced contractor payments, etc.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_min_3" autofocus="" name="conf_productivity_min_3" ng-model="conf_productivity_min_3" ng-init="conf_productivity_min_3=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_most_3" autofocus="" name="conf_productivity_most_3" ng-model="conf_productivity_most_3" ng-init="conf_productivity_most_3=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_max_3" autofocus="" name="conf_productivity_max_3" ng-model="conf_productivity_max_3" ng-init="conf_productivity_max_3=0" onchange="loadtotal1()"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_min_3" autofocus="" name="ia_productivity_min_3" ng-model="ia_productivity_min_3" ng-init="ia_productivity_min_3=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_most_3" autofocus="" name="ia_productivity_most_3" ng-model="ia_productivity_most_3" ng-init="ia_productivity_most_3=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_max_3" autofocus="" name="ia_productivity_max_3" ng-model="ia_productivity_max_3" ng-init="ia_productivity_max_3=0" onchange="loadtotal1()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- OPPORTUNITY COST OF HUMAN RESOURCES -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_opportunitystaffcost" maxlength="20" class="form-control input" id="ques_opportunitystaffcost" value="Opportunity cost of staff time lost responding to loss event - The net financial value that staff or employees could have produced had they not been forced to respond to the incident.">

                  <div class="text-body">
                    <p>
                      <strong>Opportunity cost of staff time lost responding to loss event</strong>
                      <br>
                      The net financial value that staff or employees could have produced had they not been forced to respond to the incident.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_min_4" autofocus="" name="conf_productivity_min_4" ng-model="conf_productivity_min_4" ng-init="conf_productivity_min_4=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_most_4" autofocus="" name="conf_productivity_most_4" ng-model="conf_productivity_most_4" ng-init="conf_productivity_most_4=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_max_4" autofocus="" name="conf_productivity_max_4" ng-model="conf_productivity_max_4" ng-init="conf_productivity_max_4=0" onchange="loadtotal1()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_min_4" autofocus="" name="ia_productivity_min_4" ng-model="ia_productivity_min_4" ng-init="ia_productivity_min_4=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_most_4" autofocus="" name="ia_productivity_most_4" ng-model="ia_productivity_most_4" ng-init="ia_productivity_most_4=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_max_4" autofocus="" name="ia_productivity_max_4" ng-model="ia_productivity_max_4" ng-init="ia_productivity_max_4=0" onchange="loadtotal1()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- OPPORTUNITY COST OF NON-HUMAN RESOURCES -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_opportunityfinancialcost" maxlength="20" class="form-control input" id="ques_opportunityfinancialcost" value="Opportunity cost of financial resources expended on the event - The net financial value that could have been realized by deploying financial or other non-human resources expended on the loss event on productive activities.">

                  <div class="text-body">
                    <p>
                      <strong>Opportunity cost of financial resources expended on the event</strong>
                      <br>
                      The net financial value that could have been realized by deploying financial or other non-human
                      resources expended on the loss event on productive activities.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_min_5" autofocus="" name="conf_productivity_min_5" ng-model="conf_productivity_min_5" ng-init="conf_productivity_min_5=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_most_5" autofocus="" name="conf_productivity_most_5" ng-model="conf_productivity_most_5" ng-init="conf_productivity_most_5=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_max_5" autofocus="" name="conf_productivity_max_5" ng-model="conf_productivity_max_5" ng-init="conf_productivity_max_5=0" onchange="loadtotal1()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_min_5" autofocus="" name="ia_productivity_min_5" ng-model="ia_productivity_min_5" ng-init="ia_productivity_min_5=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_most_5" autofocus="" name="ia_productivity_most_5" ng-model="ia_productivity_most_5" ng-init="ia_productivity_most_5=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_max_5" autofocus="" name="ia_productivity_max_5" ng-model="ia_productivity_max_5" ng-init="ia_productivity_max_5=0" onchange="loadtotal1()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- OTHER PRODUCTIVITY LOSSES -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_productivityloss" maxlength="20" class="form-control input" id="ques_productivityloss" value="Additional Productivity Losses - Other losses in productivity attributable to the event not described above. (Please describe in the notes.)">

                  <div class="text-body">
                    <p>
                      <strong>Additional Productivity Losses</strong>
                      <br>
                      Other losses in productivity attributable to the event not described above. (Please describe in the notes.)
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_min_6" autofocus="" name="conf_productivity_min_6" ng-model="conf_productivity_min_6" ng-init="conf_productivity_min_6=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_most_6" autofocus="" name="conf_productivity_most_6" ng-model="conf_productivity_most_6" ng-init="conf_productivity_most_6=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_productivity_max_6" autofocus="" name="conf_productivity_max_6" ng-model="conf_productivity_max_6" ng-init="conf_productivity_max_6=0" onchange="loadtotal1()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_min_6" autofocus="" name="ia_productivity_min_6" ng-model="ia_productivity_min_6" ng-init="ia_productivity_min_6=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_most_6" autofocus="" name="ia_productivity_most_6" ng-model="ia_productivity_most_6" ng-init="ia_productivity_most_6=0" onchange="loadtotal1()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_productivity_max_6" autofocus="" name="ia_productivity_max_6" ng-model="ia_productivity_max_6" ng-init="ia_productivity_max_6=0" onchange="loadtotal1()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6">
                    <input type="hidden" name="ques_conf_productivity_confidence_1" maxlength="20" class="form-control input" id="ques_conf_productivity_confidence_1" value="How confident are you of your estimates for loss of CONFIDENTIALITY?">

                    <label for="email"><strong>How confident are you of your estimates for loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_productivity_confidence_1_0"><input type="radio" name="conf_productivity_confidence_1" value="Not at All Confident" id="id_conf_productivity_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_conf_productivity_confidence_1_1"><input type="radio" name="conf_productivity_confidence_1" value="Somewhat Confident" id="id_conf_productivity_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_conf_productivity_confidence_1_2"><input type="radio" name="conf_productivity_confidence_1" value="Very Confident" id="id_conf_productivity_confidence_1_2">
                      Very Confident</label>

                  </div>
                  <div class="col-6 col-sm-6">
                    <input type="hidden" name="ques_ia_productivity_confidence_1" maxlength="20" class="form-control input" id="ques_ia_productivity_confidence_1" value="How confident are you of your estimates for loss of INTEGRITY and/or AVAILABILITY?">

                    <label for="email"><strong>How confident are you of your estimates for loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_productivity_confidence_1_0"><input type="radio" name="ia_productivity_confidence_1" value="Not at All Confident" id="id_ia_productivity_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_ia_productivity_confidence_1_1"><input type="radio" name="ia_productivity_confidence_1" value="Somewhat Confident" id="id_ia_productivity_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_ia_productivity_confidence_1_2"><input type="radio" name="ia_productivity_confidence_1" value="Very Confident" id="id_ia_productivity_confidence_1_2">
                      Very Confident</label>

                  </div>

                  <div class="col-sm-12 form-group">

                    <label for="asset"><strong>Notes and Assumptions</strong></label>

                    <textarea name="productivity_notes_1" cols="40" rows="3" class="form-control form-control-sm" id="id_productivity_notes_1"></textarea>

                  </div>
                </div>
                <hr>
                <!-- TOTAL ESTIMATED PRODUCTIVITY LOSSES  -->

                <div class="card-body-totals">
                  <input type="hidden" name="ques_estimatedprodloss" maxlength="20" class="form-control input" id="ques_estimatedprodloss" value="Total Estimated Productivity Losses">

                  <h4 class="h4 mb-4 text-gray-900">Total Estimated Productivity Losses</h4>
                  <div class="form-row mt-4">
                    <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                      <div class="card-body-totals">
                        <div class="table-responsive" ng-init="load_productivity_data()">
                          <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                            <thead>
                              <tr>
                                <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                              </tr>
                              <tr>
                                <th scope="col">Minimum</th>
                                <th scope="col">Most Likely</th>
                                <th scope="col">Maximum</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="ng-binding"><span id="span_confidentialityprodlossmin1">0</span><input type="hidden" name="ans_confidentialityprodlossmin1" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmin1" value="0">
                                </td>
                                <td class="ng-binding"><span id="span_confidentialityprodlosslikely1">0</span><input type="hidden" name="ans_confidentialityprodlosslikely1" maxlength="20" class="form-control input" id="ans_confidentialityprodlosslikely1" value="0"></td>
                                <td class="ng-binding"><span id="span_confidentialityprodlossmax1">0</span><input type="hidden" name="ans_confidentialityprodlossmax1" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmax1" value="0"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                      <div class="card-body-totals">
                        <div class="table-responsive" ng-init="load_productivity_data()">
                          <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                            <thead>
                              <tr>
                                <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                              </tr>
                              <tr>
                                <th scope="col">Minimum</th>
                                <th scope="col">Most Likely</th>
                                <th scope="col">Maximum</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="ng-binding"><span id="span_integrityprodlossmin1">0</span><input type="hidden" name="ans_integrityprodlossmin1" maxlength="20" class="form-control input" id="ans_integrityprodlossmin1" value="0">
                                </td>
                                <td class="ng-binding"><span id="span_integrityprodlosslikely1">0</span><input type="hidden" name="ans_integrityprodlosslikely1" maxlength="20" class="form-control input" id="ans_integrityprodlosslikely1" value="0"></td>
                                <td class="ng-binding"><span id="span_integrityprodlossmax1">0</span><input type="hidden" name="ans_integrityprodlossmax1" maxlength="20" class="form-control input" id="ans_integrityprodlossmax1" value="0"></td>

                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>


                <!-- step 4 end -->
              </div> <!--End Estimation -->

              <input type="button" name="previous" class="previous btn  bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next btn bg-primary p-2 text-light" value="Next">
            </fieldset>
            <fieldset>
            <legend></legend>
              <div>
                <h3>Estimating Response Costs</h3>
                <p>
                  This includes the direct costs of your organization's primary response to a cyber incident,
                  and may include one or more of the following costs:
                </p>
                <ul>
                  <li>Internal staff</li>
                  <li>Contractor expenses</li>
                  <li>Required disclosures</li>
                  <li>Other primary response costs</li>
                </ul>
                <p><strong>
                    NOTE: You may only estimate losses for categories previously identified as relevant in <em>Step 2 - Types of Losses</em>.
                    Fields for losses not expected for each category will be grayed out. You may go back to Step 2 to make changes if you wish
                    to submit estimates for grayed-out categories.
                  </strong></p>
              </div>
              <hr>
              <div> <!-- Start Estimation Section -->
                <!-- Internal staff -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_internalstaff" maxlength="20" class="form-control input" id="ques_internalstaff" value="Internal Staff Time - This is the cost of time that internal staff must devote to responding to the incident, and may include the cost of IT staff, senior management, increases in customer service, internal legal staff, etc.">

                  <div class="text-body">
                    <p>
                      <strong>Internal Staff Time</strong>
                      <br>
                      This is the cost of time that internal staff must devote to responding to the incident, and may include
                      the cost of IT staff, senior management, increases in customer service, internal legal staff, etc.
                    </p>
                  </div>
                </div>

                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-valid ng-not-empty ng-touched" id="id_conf_response_min_1" autofocus="" name="conf_response_min_1" ng-model="conf_response_min_1" ng-init="conf_response_min_1=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_most_1" autofocus="" name="conf_response_most_1" ng-model="conf_response_most_1" ng-init="conf_response_most_1=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_max_1" autofocus="" name="conf_response_max_1" ng-model="conf_response_max_1" ng-init="conf_response_max_1=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_min_1" autofocus="" name="ia_response_min_1" ng-model="ia_response_min_1" ng-init="ia_response_min_1=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_most_1" autofocus="" name="ia_response_most_1" ng-model="ia_response_most_1" ng-init="ia_response_most_1=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_max_1" autofocus="" name="ia_response_max_1" ng-model="ia_response_max_1" ng-init="ia_response_max_1=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Contractors -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_contractorexp" maxlength="20" class="form-control input" id="ques_contractorexp" value="Contractor Expenses - This includes the cost of contract IT, forensic investigators, public relations firms, etc.">

                  <div class="text-body">
                    <p>
                      <strong>Contractor Expenses</strong>
                      <br>
                      This includes the cost of contract IT, forensic investigators, public relations firms, etc.
                    </p>
                  </div>
                </div>

                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_min_2" autofocus="" name="conf_response_min_2" ng-model="conf_response_min_2" ng-init="conf_response_min_2=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_most_2" autofocus="" name="conf_response_most_2" ng-model="conf_response_most_2" ng-init="conf_response_most_2=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_max_2" autofocus="" name="conf_response_max_2" ng-model="conf_response_max_2" ng-init="conf_response_max_2=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_min_2" autofocus="" name="ia_response_min_2" ng-model="ia_response_min_2" ng-init="ia_response_min_2=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_most_2" autofocus="" name="ia_response_most_2" ng-model="ia_response_most_2" ng-init="ia_response_most_2=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_max_2" autofocus="" name="ia_response_max_2" ng-model="ia_response_max_2" ng-init="ia_response_max_2=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Required disclosures -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_reqdisclosure" maxlength="20" class="form-control input" id="ques_reqdisclosure" value="Required Disclosures - This includes the costs of required reporting to regulators, notification of affected parties, etc.">

                  <div class="text-body">
                    <p>
                      <strong>Required Disclosures</strong>
                      <br>
                      This includes the costs of required reporting to regulators, notification of affected parties, etc.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_min_3" autofocus="" name="conf_response_min_3" ng-model="conf_response_min_3" ng-init="conf_response_min_3=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_most_3" autofocus="" name="conf_response_most_3" ng-model="conf_response_most_3" ng-init="conf_response_most_3=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_max_3" autofocus="" name="conf_response_max_3" ng-model="conf_response_max_3" ng-init="conf_response_max_3=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_min_3" autofocus="" name="ia_response_min_3" ng-model="ia_response_min_3" ng-init="ia_response_min_3=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_most_3" autofocus="" name="ia_response_most_3" ng-model="ia_response_most_3" ng-init="ia_response_most_3=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_max_3" autofocus="" name="ia_response_max_3" ng-model="ia_response_max_3" ng-init="ia_response_max_3=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Other primary response costs -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_primaryrescost" maxlength="20" class="form-control input" id="ques_primaryrescost" value="Other Primary Response Costs - Other costs your organization would expect to incur responding to a ransomware incident. (Please describe in the notes.)
        ">
                  <div class="text-body">
                    <p>
                      <strong>Other Primary Response Costs</strong>
                      <br>
                      Other costs your organization would expect to incur responding to a ransomware incident. (Please describe in the notes.)
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th scope="col" colspan="3" style="text-align:center">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_min_4" autofocus="" name="conf_response_min_4" ng-model="conf_response_min_4" ng-init="conf_response_min_4=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_most_4" autofocus="" name="conf_response_most_4" ng-model="conf_response_most_4" ng-init="conf_response_most_4=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_response_max_4" autofocus="" name="conf_response_max_4" ng-model="conf_response_max_4" ng-init="conf_response_max_4=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_min_4" autofocus="" name="ia_response_min_4" ng-model="ia_response_min_4" ng-init="ia_response_min_4=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_most_4" autofocus="" name="ia_response_most_4" ng-model="ia_response_most_4" ng-init="ia_response_most_4=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_response_max_4" autofocus="" name="ia_response_max_4" ng-model="ia_response_max_4" ng-init="ia_response_max_4=0" ng-change="load_response_data()" onchange="loadtotal2()"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6">
                    <label for="email"><strong>How confident are you of your estimates for loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_response_confidence_1_0"><input type="radio" name="conf_response_confidence_1" value="Not at All Confident" id="id_conf_response_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_conf_response_confidence_1_1"><input type="radio" name="conf_response_confidence_1" value="Somewhat Confident" id="id_conf_response_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_conf_response_confidence_1_2"><input type="radio" name="conf_response_confidence_1" value="Very Confident" id="id_conf_response_confidence_1_2">
                      Very Confident</label>

                  </div>

                  <div class="col-6 col-sm-6">

                    <label for="email"><strong>How confident are you of your estimates for loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_response_confidence_1_0"><input type="radio" name="ia_response_confidence_1" value="Not at All Confident" id="id_ia_response_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_ia_response_confidence_1_1"><input type="radio" name="ia_response_confidence_1" value="Somewhat Confident" id="id_ia_response_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_ia_response_confidence_1_2"><input type="radio" name="ia_response_confidence_1" value="Very Confident" id="id_ia_response_confidence_1_2">
                      Very Confident</label>

                  </div>
                </div>
                <div class="col-sm-12 form-group">
                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="response_notes_1" cols="40" rows="3" class="form-control form-control-sm" id="id_response_notes_1"></textarea>

                </div>
                <hr>
                <!-- TOTAL ESTIMATED RESPONSE LOSSES  -->
                <div class="card-body-totals">
                  <input type="hidden" name="ques_estimatedresponseloss" maxlength="20" class="form-control input" id="ques_estimatedresponseloss" value="Total Estimated Response Losses">


                  <h4 class="h4 mb-4 text-gray-900">Total Estimated Response Losses</h4>

                  <div class="form-row mt-4">
                    <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                      <div class="card-body-totals">
                        <div class="table-responsive" ng-init="load_response_data()">
                          <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                            <thead>
                              <tr>
                                <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                              </tr>
                              <tr>
                                <th scope="col">Minimum</th>
                                <th scope="col">Most Likely</th>
                                <th scope="col">Maximum</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="ng-binding"><span id="span_confidentialityprodlossmin2">0</span><input type="hidden" name="ans_confidentialityprodlossmin2" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmin2" value="0">
                                </td>
                                <td class="ng-binding"><span id="span_confidentialityprodlosslikely2">0</span><input type="hidden" name="ans_confidentialityprodlosslikely2" maxlength="20" class="form-control input" id="ans_confidentialityprodlosslikely2" value="0"></td>
                                <td class="ng-binding"><span id="span_confidentialityprodlossmax2">0</span><input type="hidden" name="ans_confidentialityprodlossmax2" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmax2" value="0"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                      <div class="card-body-totals">
                        <div class="table-responsive" ng-init="load_response_data()">
                          <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                            <thead>
                              <tr>
                                <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                              </tr>
                              <tr>
                                <th scope="col">Minimum</th>
                                <th scope="col">Most Likely</th>
                                <th scope="col">Maximum</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="ng-binding"><span id="span_integrityprodlossmin2">0</span><input type="hidden" name="ans_integrityprodlossmin2" maxlength="20" class="form-control input" id="ans_integrityprodlossmin2" value="0">
                                </td>
                                <td class="ng-binding"><span id="span_integrityprodlosslikely2">0</span><input type="hidden" name="ans_integrityprodlosslikely2" maxlength="20" class="form-control input" id="ans_integrityprodlosslikely2" value="0"></td>
                                <td class="ng-binding"><span id="span_integrityprodlossmax2">0</span><input type="hidden" name="ans_integrityprodlossmax2" maxlength="20" class="form-control input" id="ans_integrityprodlossmax2" value="0"></td>

                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
              </div> <!-- End Estimation Section -->
              <!-- step 4 end -->

              <input type="button" name="previous" class="previous btn bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next btn btn-info btn bg-primary p-2 text-light" value="Next">
            </fieldset>
            <fieldset>
            <legend></legend>
              <h3>Estimating Replacement Costs</h3>
              <p>
                This includes the costs associated with replacing the asset, and may include one or more of the following:
              </p>
              <ul>
                <li>Data recovery</li>
                <li>Manual recreation of critical data</li>
                <li>Payment of ransoms</li>
                <li>Replacement of hardware</li>
              </ul>
              <p><strong>
                  NOTE: You may only estimate losses for categories previously identified as relevant in <em>Step 2 - Types of Losses</em>.
                  Fields for losses not expected for each category will be grayed out. You may go back to Step 2 to make changes if you wish
                  to submit estimates for grayed-out categories.
                </strong></p>
              <hr>
              <div> <!-- Start Estimation Section-->

                <!-- Data recovery -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_datarecovery" maxlength="20" class="form-control input" id="ques_datarecovery" value="Data Recovery - The costs of restoring and validating data impacted by ransomware, which may include the costs of internal IT staff, contracted IT staff, specialized services, etc.">
                  <div class="text-body">
                    <p>
                      <strong>Data Recovery</strong>
                      <br>
                      The costs of restoring and validating data impacted by ransomware, which may include the
                      costs of internal IT staff, contracted IT staff, specialized services, etc.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-valid ng-not-empty ng-touched" id="id_conf_replacement_min_1" autofocus="" ng-model="conf_replacement_min_1" ng-init="conf_replacement_min_1=0" name="conf_replacement_min_1" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_most_1" autofocus="" ng-model="conf_replacement_most_1" ng-init="conf_replacement_most_1=0" name="conf_replacement_most_1" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_max_1" autofocus="" ng-model="conf_replacement_max_1" ng-init="conf_replacement_max_1=0" name="conf_replacement_max_1" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_min_1" autofocus="" name="ia_replacement_min_1" ng-model="ia_replacement_min_1" ng-init="ia_replacement_min_1=0" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_most_1" autofocus="" name="ia_replacement_most_1" ng-model="ia_replacement_most_1" ng-init="ia_replacement_most_1=0" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_max_1" autofocus="" name="ia_replacement_max_1" ng-model="ia_replacement_max_1" ng-init="ia_replacement_max_1=0" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Manual recreation of critical records -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_recreationcritical" maxlength="20" class="form-control input" id="ques_recreationcritical" value="Manual Recreation of Critical Records - Costs associated with recreating unrecoverable critical records manually if other data recovery methods fail.">

                  <div class="text-body">
                    <p>
                      <strong>Manual Recreation of Critical Records</strong>
                      <br>
                      Costs associated with recreating unrecoverable critical records manually if other data recovery methods fail.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_min_2" autofocus="" name="conf_replacement_min_2" ng-model="conf_replacement_min_2" ng-init="conf_replacement_min_2=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_most_2" autofocus="" name="conf_replacement_most_2" ng-model="conf_replacement_most_2" ng-init="conf_replacement_most_2=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_max_2" autofocus="" name="conf_replacement_max_2" ng-model="conf_replacement_max_2" ng-init="conf_replacement_max_2=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_min_2" autofocus="" name="ia_replacement_min_2" ng-model="ia_replacement_min_2" ng-init="ia_replacement_min_2=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_most_2" autofocus="" name="ia_replacement_most_2" ng-model="ia_replacement_most_2" ng-init="ia_replacement_most_2=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_max_2" autofocus="" name="ia_replacement_max_2" ng-model="ia_replacement_max_2" ng-init="ia_replacement_max_2=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Ransoms paid -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_ransomspaid" maxlength="20" class="form-control input" id="ques_ransomspaid" value="Ransoms Paid - The cost associated with paying a ransom to restore data, including brokerage and transaction costs,the cost of crypto wallets, etc.">

                  <div class="text-body">
                    <p>
                      <strong>Ransoms Paid</strong>
                      <br>
                      The cost associated with paying a ransom to restore data, including brokerage and transaction costs,
                      the cost of crypto wallets, etc.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_min_3" autofocus="" name="conf_replacement_min_3" ng-model="conf_replacement_min_3" ng-init="conf_replacement_min_3=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_most_3" autofocus="" name="conf_replacement_most_3" ng-model="conf_replacement_most_3" ng-init="conf_replacement_most_3=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_max_3" autofocus="" name="conf_replacement_max_3" ng-model="conf_replacement_max_3" ng-init="conf_replacement_max_3=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_min_3" autofocus="" name="ia_replacement_min_3" ng-model="ia_replacement_min_3" ng-init="ia_replacement_min_3=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_most_3" autofocus="" name="ia_replacement_most_3" ng-model="ia_replacement_most_3" ng-init="ia_replacement_most_3=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_max_3" autofocus="" name="ia_replacement_max_3" ng-model="ia_replacement_max_3" ng-init="ia_replacement_max_3=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Hardware replacement costs -->
                <div class="form-row mt-4">
                  <div class="text-body">
                    <input type="hidden" name="ques_hardwarerepcost" maxlength="20" class="form-control input" id="ques_hardwarerepcost" value="Hardware Replacement Costs - This includes the costs associated with replacing permanently damaged hardware, such as storage media, servers, etc.">

                    <p>
                      <strong>Hardware Replacement Costs</strong>
                      <br>
                      This includes the costs associated with replacing permanently damaged hardware, such as storage media, servers, etc.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_min_4" autofocus="" name="conf_replacement_min_4" ng-model="conf_replacement_min_4" ng-init="conf_replacement_min_4=0" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_most_4" autofocus="" name="conf_replacement_most_4" ng-model="conf_replacement_most_4" ng-init="conf_replacement_most_4=0" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_max_4" autofocus="" name="conf_replacement_max_4" ng-model="conf_replacement_max_4" ng-init="conf_replacement_max_4=0" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_min_4" autofocus="" name="ia_replacement_min_4" ng-model="ia_replacement_min_4" ng-init="ia_replacement_min_4=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_most_4" autofocus="" name="ia_replacement_most_4" ng-model="ia_replacement_most_4" ng-init="ia_replacement_most_4=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_max_4" autofocus="" name="ia_replacement_max_4" ng-model="ia_replacement_max_4" ng-init="ia_replacement_max_4=0" onchange="loadtotal3()" ng-change="load_replacement_data()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Other replacement costs -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_otherrepcost" maxlength="20" class="form-control input" id="ques_otherrepcost" value="Other Replacement Costs - Additional costs required to replace the affected asset. (Please describe in the notes.)">

                  <div class="text-body">
                    <p>
                      <strong>Other Replacement Costs</strong>
                      <br>
                      Additional costs required to replace the affected asset. (Please describe in the notes.)
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_min_5" autofocus="" name="conf_replacement_min_5" ng-model="conf_replacement_min_5" ng-init="conf_replacement_min_5=0" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_most_5" autofocus="" name="conf_replacement_most_5" ng-model="conf_replacement_most_5" ng-init="conf_replacement_most_5=0" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_replacement_max_5" autofocus="" name="conf_replacement_max_5" ng-model="conf_replacement_max_5" ng-init="conf_replacement_max_5=0" ng-change="load_replacement_data()" onchange="loadtotal3()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_min_5" autofocus="" name="ia_replacement_min_5" ng-model="ia_replacement_min_5" onchange="loadtotal3()" ng-init="ia_replacement_min_5=0" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_most_5" autofocus="" name="ia_replacement_most_5" ng-model="ia_replacement_most_5" onchange="loadtotal3()" ng-init="ia_replacement_most_5=0" ng-change="load_replacement_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_replacement_max_5" autofocus="" name="ia_replacement_max_5" ng-model="ia_replacement_max_5" onchange="loadtotal3()" ng-init="ia_replacement_max_5=0" ng-change="load_replacement_data()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-row mt-4">

                  <div class="col-6 col-sm-6">
                    <label for="email"><strong>How confident are you of your estimates for loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_replacement_confidence_1_0"><input type="radio" name="conf_replacement_confidence_1" value="Not at All Confident" id="id_conf_replacement_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_conf_replacement_confidence_1_1"><input type="radio" name="conf_replacement_confidence_1" value="Somewhat Confident" id="id_conf_replacement_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_conf_replacement_confidence_1_2"><input type="radio" name="conf_replacement_confidence_1" value="Very Confident" id="id_conf_replacement_confidence_1_2">
                      Very Confident</label>

                  </div>

                  <div class="col-6 col-sm-6">

                    <label for="email"><strong>How confident are you of your estimates for loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_replacement_confidence_1_0"><input type="radio" name="ia_replacement_confidence_1" value="Not at All Confident" id="id_ia_replacement_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_ia_replacement_confidence_1_1"><input type="radio" name="ia_replacement_confidence_1" value="Somewhat Confident" id="id_ia_replacement_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_ia_replacement_confidence_1_2"><input type="radio" name="ia_replacement_confidence_1" value="Very Confident" id="id_ia_replacement_confidence_1_2">
                      Very Confident</label>

                  </div>
                </div>

                <div class="col-sm-12 form-group">
                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="replacement_notes_1" cols="40" rows="3" class="form-control form-control-sm" id="id_replacement_notes_1"></textarea>


                </div>

                <hr>
              </div> <!--End Estimation Section-->
              <!-- TOTAL ESTIMATED REPLACEMENT LOSSES  -->
              <div class="card-body-totals">
                <input type="hidden" name="ques_totalestimatedreploss" maxlength="20" class="form-control input" id="ques_totalestimatedreploss" value="Total Estimated Replacement Losses">

                <h4 class="h4 mb-4 text-gray-900">Total Estimated Replacement Losses</h4>

                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body-totals">
                      <div class="table-responsive" ng-init="load_replacement_data()">
                        <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="ng-binding"><span id="span_confidentialityprodlossmin3">0</span><input type="hidden" name="ans_confidentialityprodlossmin3" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmin3" value="0">
                              </td>
                              <td class="ng-binding"><span id="span_confidentialityprodlosslikely3">0</span><input type="hidden" name="ans_confidentialityprodlosslikely3" maxlength="20" class="form-control input" id="ans_confidentialityprodlosslikely3" value="0"></td>
                              <td class="ng-binding"><span id="span_confidentialityprodlossmax3">0</span><input type="hidden" name="ans_confidentialityprodlossmax3" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmax3" value="0"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body-totals">
                      <div class="table-responsive" ng-init="load_replacement_data()">
                        <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="ng-binding"><span id="span_integrityprodlossmin3">0</span><input type="hidden" name="ans_integrityprodlossmin3" maxlength="20" class="form-control input" id="ans_integrityprodlossmin3" value="0">
                              </td>
                              <td class="ng-binding"><span id="span_integrityprodlosslikely3">0</span><input type="hidden" name="ans_integrityprodlosslikely3" maxlength="20" class="form-control input" id="ans_integrityprodlosslikely3" value="0"></td>
                              <td class="ng-binding"><span id="span_integrityprodlossmax3">0</span><input type="hidden" name="ans_integrityprodlossmax3" maxlength="20" class="form-control input" id="ans_integrityprodlossmax3" value="0"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <input type="button" name="previous" class="previous btn  bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next btn bg-primary p-2 text-light" value="Next" /
              
              
              >
            </fieldset>
            <fieldset>
            <legend></legend>
              <h3>Estimating Legal Costs</h3>
              <p>
                This includes the costs associated with regulatory and other legal actions, and may include one or more of the following costs:
              </p>
              <ul>
                <li>Regulatory fines and penalties</li>
                <li>Civil judgments</li>
                <li>Legal defense costs</li>
                <li>Court costs</li>
                <li>Cost of court-ordered compliance</li>
              </ul>
              <p><strong>
                  NOTE: You may only estimate losses for categories previously identified as relevant in <em>Step 2 - Types of Losses</em>.
                  Fields for losses not expected for each category will be grayed out. You may go back to Step 2 to make changes if you wish
                  to submit estimates for grayed-out categories.
                </strong></p>
              <hr>
              <div> <!-- Estimation Section-->
                <!-- Regulatory fines and penalties -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_regulatoryfines" maxlength="20" class="form-control input" id="ques_regulatoryfines" value="Regulatory Fines and Penalties - This includes civil monetary fines or penalties imposed as a result of a disciplinary or regulatory proceeding.">

                  <div class="text-body">
                    <p>
                      <strong>Regulatory Fines and Penalties</strong>
                      <br>
                      This includes civil monetary fines or penalties imposed as a result of a disciplinary or regulatory proceeding.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-valid ng-not-empty ng-touched" id="id_conf_legal_min_1" autofocus="" ng-model="conf_legal_min_1" ng-init="conf_legal_min_1=0" name="conf_legal_min_1" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_most_1" autofocus="" ng-model="conf_legal_most_1" ng-init="conf_legal_most_1=0" name="conf_legal_most_1" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_max_1" autofocus="" ng-model="conf_legal_max_1" ng-init="conf_legal_max_1=0" name="conf_legal_max_1" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_min_1" autofocus="" name="ia_legal_min_1" ng-model="ia_legal_min_1" ng-init="ia_legal_min_1=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_most_1" autofocus="" name="ia_legal_most_1" ng-model="ia_legal_most_1" ng-init="ia_legal_most_1=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_max_1" autofocus="" name="ia_legal_max_1" ng-model="ia_legal_max_1" ng-init="ia_legal_max_1=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Civil judgments -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_civiljudgements" maxlength="20" class="form-control input" id="ques_civiljudgements" value="Civil Judgments - This includes compensatory and punitive damages, as well as settlements resulting from civil lawsuits.">

                  <div class="text-body">
                    <p>
                      <strong>Civil Judgments</strong>
                      <br>
                      This includes compensatory and punitive damages, as well as settlements resulting from civil lawsuits.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_min_2" autofocus="" name="conf_legal_min_2" ng-model="conf_legal_min_2" ng-init="conf_legal_min_2=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_most_2" autofocus="" name="conf_legal_most_2" ng-model="conf_legal_most_2" ng-init="conf_legal_most_2=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_max_2" autofocus="" name="conf_legal_max_2" ng-model="conf_legal_max_2" ng-init="conf_legal_max_2=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_min_2" autofocus="" name="ia_legal_min_2" ng-model="ia_legal_min_2" ng-init="ia_legal_min_2=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_most_2" autofocus="" name="ia_legal_most_2" ng-model="ia_legal_most_2" ng-init="ia_legal_most_2=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_max_2" autofocus="" name="ia_legal_max_2" ng-model="ia_legal_max_2" ng-init="ia_legal_max_2=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Legal defense costs -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_legaldefense" maxlength="20" class="form-control input" id="ques_legaldefense" value="Legal Defense Costs - This includes attorney fees, expert witnesses, forensic investigations related to legal defense, etc.">

                  <div class="text-body">
                    <p>
                      <strong>Legal Defense Costs</strong>
                      <br>
                      This includes attorney fees, expert witnesses, forensic investigations related to legal defense, etc.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_min_3" autofocus="" name="conf_legal_min_3" ng-model="conf_legal_min_3" ng-init="conf_legal_min_3=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_most_3" autofocus="" name="conf_legal_most_3" ng-model="conf_legal_most_3" ng-init="conf_legal_most_3=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_max_3" autofocus="" name="conf_legal_max_3" ng-model="conf_legal_max_3" ng-init="conf_legal_max_3=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_min_3" autofocus="" name="ia_legal_min_3" ng-model="ia_legal_min_3" ng-init="ia_legal_min_3=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_most_3" autofocus="" name="ia_legal_most_3" ng-model="ia_legal_most_3" ng-init="ia_legal_most_3=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_max_3" autofocus="" name="ia_legal_max_3" ng-model="ia_legal_max_3" ng-init="ia_legal_max_3=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Cost of additional compliance  -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_courtcompliance" maxlength="20" class="form-control input" id="ques_courtcompliance" value="Court-ordered Compliance Costs - This includes the cost of additional operational requirements or constraints resulting from court orders.">

                  <div class="text-body">
                    <p>
                      <strong>Court-ordered Compliance Costs</strong>
                      <br>
                      This includes the cost of additional operational requirements or constraints resulting from court orders.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_min_4" autofocus="" name="conf_legal_min_4" ng-model="conf_legal_min_4" ng-init="conf_legal_min_4=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_most_4" autofocus="" name="conf_legal_most_4" ng-model="conf_legal_most_4" ng-init="conf_legal_most_4=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_max_4" autofocus="" name="conf_legal_max_4" ng-model="conf_legal_max_4" ng-init="conf_legal_max_4=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_min_4" autofocus="" name="ia_legal_min_4" ng-model="ia_legal_min_4" ng-init="ia_legal_min_4=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_most_4" autofocus="" name="ia_legal_most_4" ng-model="ia_legal_most_4" ng-init="ia_legal_most_4=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_max_4" autofocus="" name="ia_legal_max_4" ng-model="ia_legal_max_4" ng-init="ia_legal_max_4=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Other legal costs -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_otherlegalcost" maxlength="20" class="form-control input" id="ques_otherlegalcost" value="Other Legal Costs - These may include court costs, the cost of bail for employees, etc. (Please describe in the notes.)">

                  <div class="text-body">
                    <p>
                      <strong>Other Legal Costs</strong>
                      <br>
                      These may include court costs, the cost of bail for employees, etc. (Please describe in the notes.)
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_min_5" autofocus="" name="conf_legal_min_5" ng-model="conf_legal_min_5" ng-init="conf_legal_min_5=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_most_5" autofocus="" name="conf_legal_most_5" ng-model="conf_legal_most_5" ng-init="conf_legal_most_5=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_legal_max_5" autofocus="" name="conf_legal_max_5" ng-model="conf_legal_max_5" ng-init="conf_legal_max_5=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_min_5" autofocus="" name="ia_legal_min_5" ng-model="ia_legal_min_5" ng-init="ia_legal_min_5=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_most_5" autofocus="" name="ia_legal_most_5" ng-model="ia_legal_most_5" ng-init="ia_legal_most_5=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_legal_max_5" autofocus="" name="ia_legal_max_5" ng-model="ia_legal_max_5" ng-init="ia_legal_max_5=0" ng-change="load_legal_data()" onchange="loadtotal4()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6">
                    <label for="email"><strong>How confident are you of your estimates for loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_legal_confidence_1_0"><input type="radio" name="conf_legal_confidence_1" value="Not at All Confident" id="id_conf_legal_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_conf_legal_confidence_1_1"><input type="radio" name="conf_legal_confidence_1" value="Somewhat Confident" id="id_conf_legal_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_conf_legal_confidence_1_2"><input type="radio" name="conf_legal_confidence_1" value="Very Confident" id="id_conf_legal_confidence_1_2">
                      Very Confident</label>

                  </div>
                  <div class="col-6 col-sm-6">
                    <label for="email"><strong>How confident are you of your estimates for loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_legal_confidence_1_0"><input type="radio" name="ia_legal_confidence_1" value="Not at All Confident" id="id_ia_legal_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_ia_legal_confidence_1_1"><input type="radio" name="ia_legal_confidence_1" value="Somewhat Confident" id="id_ia_legal_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_ia_legal_confidence_1_2"><input type="radio" name="ia_legal_confidence_1" value="Very Confident" id="id_ia_legal_confidence_1_2">
                      Very Confident</label>

                  </div>
                </div>
                <div class="col-sm-12 form-group">
                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="legal_notes_1" cols="40" rows="3" class="form-control form-control-sm" id="id_legal_notes_1"></textarea>

                </div>
                <hr>
              </div> <!-- END Estimation Section -->
              <!-- TOTAL ESTIMATED LEGAL LOSSES  -->
              <div class="card-body-totals">
                <input type="hidden" name="ques_totalestlegalcost" maxlength="20" class="form-control input" id="ques_totalestlegalcost" value="Total Estimated Legal Costs">

                <h4 class="h4 mb-4 text-gray-900">Total Estimated Legal Costs</h4>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body-totals">
                      <div class="table-responsive" ng-init="load_legal_data()">
                        <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="ng-binding"><span id="span_confidentialityprodlossmin4">0</span><input type="hidden" name="ans_confidentialityprodlossmin4" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmin4" value="0">
                              </td>
                              <td class="ng-binding"><span id="span_confidentialityprodlosslikely4">0</span><input type="hidden" name="ans_confidentialityprodlosslikely4" maxlength="20" class="form-control input" id="ans_confidentialityprodlosslikely4" value="0"></td>
                              <td class="ng-binding"><span id="span_confidentialityprodlossmax4">0</span><input type="hidden" name="ans_confidentialityprodlossmax4" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmax4" value="0"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body-totals">
                      <div class="table-responsive" ng-init="load_legal_data()">
                        <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="ng-binding"><span id="span_integrityprodlossmin4">0</span><input type="hidden" name="ans_integrityprodlossmin4" maxlength="20" class="form-control input" id="ans_integrityprodlossmin4" value="0">
                              </td>
                              <td class="ng-binding"><span id="span_integrityprodlosslikely4">0</span><input type="hidden" name="ans_integrityprodlosslikely4" maxlength="20" class="form-control input" id="ans_integrityprodlosslikely4" value="0"></td>
                              <td class="ng-binding"><span id="span_integrityprodlossmax4">0</span><input type="hidden" name="ans_integrityprodlossmax4" maxlength="20" class="form-control input" id="ans_integrityprodlossmax4" value="0"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <input type="button" name="previous" class="previous btn bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next btn bg-primary text-light" value="Next">
            </fieldset>
            <fieldset>
            <legend></legend>
              <h3>Estimating Competitive Advantage Losses</h3>
              <p>
                Losses in competitive advantage result from permanent impairment of strategic assets, such as intellectual property,
                unique capabilities, etc., which may include one or more of the following:
              </p>
              <ul>
                <li>Impairment of patents</li>
                <li>Loss of trade secrets</li>
                <li>Damage to other strategic assets</li>
              </ul>
              <p><strong>
                  NOTE: You may only estimate losses for categories previously identified as relevant in <em>Step 2 - Types of Losses</em>.
                  Fields for losses not expected for each category will be grayed out. You may go back to Step 2 to make changes if you wish
                  to submit estimates for grayed-out categories.
                </strong></p>
              <hr>
              <div> <!-- Estimation Section -->
                <!-- Impairment of patents -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_decreasedpatents" maxlength="20" class="form-control input" id="ques_decreasedpatents" value="Decreased Value of Patents - This can be caused by data loss that inhibits a successful patent filing or defense or by the compromise of information about patented or patentable inventions that allow competitors to compete more effectively.">

                  <div class="text-body">
                    <p>
                      <strong>Decreased Value of Patents</strong>
                      <br>
                      This can be caused by data loss that inhibits a successful patent filing or defense or by the compromise of
                      information about patented or patentable inventions that allow competitors to compete more effectively.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-valid ng-not-empty ng-touched" id="id_conf_comp_adv_min_1" autofocus="" ng-model="conf_comp_adv_min_1" ng-init="conf_comp_adv_min_1=0" name="conf_comp_adv_min_1" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_comp_adv_most_1" autofocus="" ng-model="conf_comp_adv_most_1" ng-init="conf_comp_adv_most_1=0" name="conf_comp_adv_most_1" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_comp_adv_max_1" autofocus="" ng-model="conf_comp_adv_max_1" ng-init="conf_comp_adv_max_1=0" name="conf_comp_adv_max_1" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_comp_adv_min_1" autofocus="" name="ia_comp_adv_min_1" ng-model="ia_comp_adv_min_1" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_comp_adv_most_1" autofocus="" name="ia_comp_adv_most_1" ng-model="ia_comp_adv_most_1" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_comp_adv_max_1" autofocus="" name="ia_comp_adv_max_1" ng-model="ia_comp_adv_max_1" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Loss of trade secrets -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_losstradesecrets" maxlength="20" class="form-control input" id="ques_losstradesecrets" value="Loss of Trade Secrets - Losses due to unrecoverable trade secret data or the compromise of confidentiality of trade secrets that impair your organization's ability to execute its strategy. Examples could include customer lists, strategic plans, formulas, recipes, unique business processes, acquisition targets, employee salary information, vendor lists, etc.">

                  <div class="text-body">
                    <strong>Loss of Trade Secrets</strong>
                    <p>
                      Losses due to unrecoverable trade secret data or the compromise of confidentiality of trade secrets that impair your
                      organization's ability to execute its strategy. Examples could include customer lists, strategic plans, formulas, recipes,
                      unique business processes, acquisition targets, employee salary information, vendor lists, etc.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_comp_adv_min_2" autofocus="" name="conf_comp_adv_min_2" ng-model="conf_comp_adv_min_2" ng-init="conf_comp_adv_min_2=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_comp_adv_most_2" autofocus="" name="conf_comp_adv_most_2" ng-model="conf_comp_adv_most_2" ng-init="conf_comp_adv_most_2=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_comp_adv_max_2" autofocus="" name="conf_comp_adv_max_2" ng-model="conf_comp_adv_max_2" ng-init="conf_comp_adv_max_2=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_comp_adv_min_2" autofocus="" name="ia_comp_adv_min_2" ng-model="ia_comp_adv_min_2" ng-init="ia_comp_adv_min_2=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_comp_adv_most_2" autofocus="" name="ia_comp_adv_most_2" ng-model="ia_comp_adv_most_2" ng-init="ia_comp_adv_most_2=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_comp_adv_max_2" autofocus="" name="ia_comp_adv_max_2" ng-model="ia_comp_adv_max_2" ng-init="ia_comp_adv_max_2=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Damage to other strategic assets -->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_damagestrategicassets" maxlength="20" class="form-control input" id="ques_damagestrategicassets" value="Damage to Other Strategic Assets - This includes losses due to the destruction or impairment of assets that offer long-term competitive advantage. Examples might include damage to a critical physical facility or strategic data store.">

                  <div class="text-body">
                    <p>
                      <strong>Damage to Other Strategic Assets</strong>
                      <br>
                      This includes losses due to the destruction or impairment of assets that offer long-term competitive advantage.
                      Examples might include damage to a critical physical facility or strategic data store.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_comp_adv_min_3" autofocus="" name="conf_comp_adv_min_3" ng-model="conf_comp_adv_min_3" ng-init="conf_comp_adv_min_3=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_comp_adv_most_3" autofocus="" name="conf_comp_adv_most_3" ng-model="conf_comp_adv_most_3" ng-init="conf_comp_adv_most_3=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_comp_adv_max_3" autofocus="" name="conf_comp_adv_max_3" ng-model="conf_comp_adv_max_3" ng-init="conf_comp_adv_max_3=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_comp_adv_min_3" autofocus="" name="ia_comp_adv_min_3" ng-model="ia_comp_adv_min_3" ng-init="ia_comp_adv_min_3=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_comp_adv_most_3" autofocus="" name="ia_comp_adv_most_3" ng-model="ia_comp_adv_most_3" ng-init="ia_comp_adv_most_3=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_comp_adv_max_3" autofocus="" name="ia_comp_adv_max_3" ng-model="ia_comp_adv_max_3" ng-init="ia_comp_adv_max_3=0" ng-change="load_comp_adv_data()" onchange="loadtotal5()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6">
                    <label for="email"><strong>How confident are you of your estimates for loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_comp_adv_confidence_1_0"><input type="radio" name="conf_comp_adv_confidence_1" value="Not at All Confident" id="id_conf_comp_adv_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_conf_comp_adv_confidence_1_1"><input type="radio" name="conf_comp_adv_confidence_1" value="Somewhat Confident" id="id_conf_comp_adv_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_conf_comp_adv_confidence_1_2"><input type="radio" name="conf_comp_adv_confidence_1" value="Very Confident" id="id_conf_comp_adv_confidence_1_2">
                      Very Confident</label>

                  </div>

                  <div class="col-6 col-sm-6">
                    <label for="email"><strong>How confident are you of your estimates for loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_comp_adv_confidence_1_0"><input type="radio" name="ia_comp_adv_confidence_1" value="Not at All Confident" class="radioset" id="id_ia_comp_adv_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_ia_comp_adv_confidence_1_1"><input type="radio" name="ia_comp_adv_confidence_1" value="Somewhat Confident" class="radioset" id="id_ia_comp_adv_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_ia_comp_adv_confidence_1_2"><input type="radio" name="ia_comp_adv_confidence_1" value="Very Confident" class="radioset" id="id_ia_comp_adv_confidence_1_2">
                      Very Confident</label>

                  </div>
                </div>
                <div class="col-sm-12 form-group">
                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="comp_adv_notes_1" cols="40" rows="3" class="form-control form-control-sm" id="id_comp_adv_notes_1"></textarea>

                </div>
                <hr>
                <!-- TOTAL ESTIMATED COMPETITIVE ADVANTAGE LOSSES  -->
              </div> <!-- Estimation Section -->

              <div class="card-body-totals">
                <input type="hidden" name="ques_totalcompetitiveloss" maxlength="20" class="form-control input" id="ques_totalcompetitiveloss" value="Total Estimated Competitive Losses">

                <h4 class="h4 mb-4 text-gray-900">Total Estimated Competitive Losses</h4>

                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body-totals">
                      <div class="table-responsive" ng-init="load_comp_adv_data()">
                        <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="ng-binding"><span id="span_confidentialityprodlossmin5">0</span><input type="hidden" name="ans_confidentialityprodlossmin5" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmin5" value="0">
                              </td>
                              <td class="ng-binding"><span id="span_confidentialityprodlosslikely5">0</span><input type="hidden" name="ans_confidentialityprodlosslikely5" maxlength="20" class="form-control input" id="ans_confidentialityprodlosslikely5" value="0"></td>
                              <td class="ng-binding"><span id="span_confidentialityprodlossmax5">0</span><input type="hidden" name="ans_confidentialityprodlossmax5" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmax5" value="0"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body-totals">
                      <div class="table-responsive" ng-init="load_comp_adv_data()">
                        <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="ng-binding"><span id="span_integrityprodlossmin5">0</span><input type="hidden" name="ans_integrityprodlossmin5" maxlength="20" class="form-control input" id="ans_integrityprodlossmin5" value="0">
                              </td>
                              <td class="ng-binding"><span id="span_integrityprodlosslikely5">0</span><input type="hidden" name="ans_integrityprodlosslikely5" maxlength="20" class="form-control input" id="ans_integrityprodlosslikely5" value="0"></td>
                              <td class="ng-binding"><span id="span_integrityprodlossmax5">0</span><input type="hidden" name="ans_integrityprodlossmax5" maxlength="20" class="form-control input" id="ans_integrityprodlossmax5" value="0"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>


              <input type="button" name="previous" class="previous btn bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next btn bg-primary p-2 text-light" value="Next">
            </fieldset>
            <fieldset>
            <legend></legend>
              <h3>Estimating Reputation Losses</h3>
              <p>
                Reputation losses describe the impact of a decrease in the interest and desire of third
                parties to invest in, buy from, or partner with your organization as a direct result of a cyber incident.
                These may include one or more of the following:
              </p>
              <ul>
                <li>Reduction in market share</li>
                <li>Reduced funding or access to capital </li>
                <li>Decrease in share price</li>
              </ul>
              <p><strong>
                  NOTE: You may only estimate losses for categories previously identified as relevant in <em>Step 2 - Types of Losses</em>.
                  Fields for losses not expected for each category will be grayed out. You may go back to Step 2 to make changes if you wish
                  to submit estimates for grayed-out categories.
                </strong></p>
              <hr>

              <div> <!--Estimation Section-->
                <!--Reduction in  market share-->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_reducedmarketshare" maxlength="20" class="form-control input" id="ques_reducedmarketshare" value="Reduced Market Share - This includes long-term declines in market share resulting from the decisions of customers, supply chain partners and/or distribution channel partners to work with your organization that results from reputational damage caused by a cyber incident.">

                  <div class="text-body">
                    <p>
                      <strong>Reduced Market Share</strong>
                      <br>
                      This includes long-term declines in market share resulting from the decisions of customers,
                      supply chain partners and/or distribution channel partners to work with your organization that
                      results from reputational damage caused by a cyber incident.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-valid ng-not-empty ng-touched" id="id_conf_reputation_min_1" autofocus="" ng-model="conf_reputation_min_1" ng-init="conf_reputation_min_1=0" name="conf_reputation_min_1" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_reputation_most_1" autofocus="" ng-model="conf_reputation_most_1" ng-init="conf_reputation_most_1=0" name="conf_reputation_most_1" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_reputation_max_1" autofocus="" ng-model="conf_reputation_max_1" ng-init="conf_reputation_max_1=0" name="conf_reputation_max_1" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_reputation_min_1" autofocus="" name="ia_reputation_min_1" ng-model="ia_reputation_min_1" ng-init="ia_reputation_min_1=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_reputation_most_1" autofocus="" name="ia_reputation_most_1" ng-model="ia_reputation_most_1" ng-init="ia_reputation_most_1=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_reputation_max_1" autofocus="" name="ia_reputation_max_1" ng-model="ia_reputation_max_1" ng-init="ia_reputation_max_1=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!--Reduced funding or access to capital-->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_reducedfundingcapital" maxlength="20" class="form-control input" id="ques_reducedfundingcapital" value="Reduced Funding or Access to Capital - These are losses due to the decisions of financing partners, such as banks and investors, or, for government agencies, legislators, resulting from reputational damage caused by a cyber incident.  Some of the drivers for losses could be inability to invest in growth, take advantage of favorable interest rates, or finance operations.">

                  <div class="text-body">
                    <p>
                      <strong>Reduced Funding or Access to Capital</strong>
                      <br>
                      These are losses due to the decisions of financing partners, such as banks and investors, or, for
                      government agencies, legislators, resulting from reputational damage caused by a cyber incident. Some of
                      the drivers for losses could be inability to invest in growth, take advantage of favorable interest rates,
                      or finance operations.
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_reputation_min_2" autofocus="" name="conf_reputation_min_2" ng-model="conf_reputation_min_2" ng-init="conf_reputation_min_2=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_reputation_most_2" autofocus="" name="conf_reputation_most_2" ng-model="conf_reputation_most_2" ng-init="conf_reputation_most_2=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_reputation_max_2" autofocus="" name="conf_reputation_max_2" ng-model="conf_reputation_max_2" ng-init="conf_reputation_max_2=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_reputation_min_2" autofocus="" name="ia_reputation_min_2" ng-model="ia_reputation_min_2" ng-init="ia_reputation_min_2=0" ng-change="load_reputation_data()" onchange="loadtotal6()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_reputation_most_2" autofocus="" name="ia_reputation_most_2" ng-model="ia_reputation_most_2" ng-init="ia_reputation_most_2=0" ng-change="load_reputation_data()" onchange="loadtotal6()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_reputation_max_2" autofocus="" name="ia_reputation_max_2" ng-model="ia_reputation_max_2" ng-init="ia_reputation_max_2=0" ng-change="load_reputation_data()" onchange="loadtotal6()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!--Decrease in share price-->
                <div class="form-row mt-4">
                  <input type="hidden" name="ques_decreaseshareprice" maxlength="20" class="form-control input" id="ques_decreaseshareprice" value="Decrease in Share Price - For publicly-traded companies, a decrease in share price resulting from the negative reputational impact of a cyber eventmay be a useful proxy for difficult-to-quantify losses. This is based on the efficient market hypothesis that share prices reflectall information. (Note: if using share price to quantify losses, be careful not to double count by including the same impacts in other categories!)">

                  <div class="text-body">
                    <p>
                      <strong>Decrease in Share Price</strong>
                      <br>
                      For publicly-traded companies, a decrease in share price resulting from the negative reputational impact of a cyber event
                      may be a useful proxy for difficult-to-quantify losses. This is based on the efficient market hypothesis that share prices reflect
                      all information. (Note: if using share price to quantify losses, be careful not to "double count" by including the same impacts in other
                      categories!)
                    </p>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_reputation_min_3" autofocus="" name="conf_reputation_min_3" ng-model="conf_reputation_min_3" ng-init="conf_reputation_min_3=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_reputation_most_3" autofocus="" name="conf_reputation_most_3" ng-model="conf_reputation_most_3" ng-init="conf_reputation_most_3=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_conf_reputation_max_3" autofocus="" name="conf_reputation_max_3" ng-model="conf_reputation_max_3" ng-init="conf_reputation_max_3=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>


                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_reputation_min_3" autofocus="" name="ia_reputation_min_3" ng-model="ia_reputation_min_3" ng-init="ia_reputation_min_3=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_reputation_most_3" autofocus="" name="ia_reputation_most_3" ng-model="ia_reputation_most_3" ng-init="ia_reputation_most_3=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                              <td><input type="number" value="0" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="id_ia_reputation_max_3" autofocus="" name="ia_reputation_max_3" ng-model="ia_reputation_max_3" ng-init="ia_reputation_max_3=0" onchange="loadtotal6()" ng-change="load_reputation_data()"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6">
                    <label for="email"><strong>How confident are you of your estimates for loss of CONFIDENTIALITY?</strong></label>

                    <br>
                    <label for="id_conf_reputation_confidence_1_0"><input type="radio" name="conf_reputation_confidence_1" value="Not at All Confident" id="id_conf_reputation_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_conf_reputation_confidence_1_1"><input type="radio" name="conf_reputation_confidence_1" value="Somewhat Confident" id="id_conf_reputation_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_conf_reputation_confidence_1_2"><input type="radio" name="conf_reputation_confidence_1" value="Very Confident" id="id_conf_reputation_confidence_1_2">
                      Very Confident</label>

                  </div>
                  <div class="col-6 col-sm-6">
                    <label for="email"><strong>How confident are you of your estimates for loss of INTEGRITY and/or AVAILABILITY?</strong></label>

                    <br>
                    <label for="id_ia_reputation_confidence_1_0"><input type="radio" name="ia_reputation_confidence_1" value="Not at All Confident" class="radioset" id="id_ia_reputation_confidence_1_0" checked="">
                      Not at All Confident</label>

                    <br>
                    <label for="id_ia_reputation_confidence_1_1"><input type="radio" name="ia_reputation_confidence_1" value="Somewhat Confident" class="radioset" id="id_ia_reputation_confidence_1_1">
                      Somewhat Confident</label>

                    <br>
                    <label for="id_ia_reputation_confidence_1_2"><input type="radio" name="ia_reputation_confidence_1" value="Very Confident" class="radioset" id="id_ia_reputation_confidence_1_2">
                      Very Confident</label>

                  </div>
                </div>
                <div class="col-sm-12 form-group">
                  <label for="asset"><strong>Notes and Assumptions</strong></label>

                  <textarea name="reputation_notes_1" cols="40" rows="3" class="form-control form-control-sm" id="id_reputation_notes_1"></textarea>

                </div>
                <hr>
              <div class="card-body-totals">
                <input type="hidden" name="ques_totalestimatedreplosses" maxlength="20" class="form-control input" id="ques_totalestimatedreplosses" value="Total Estimated Reputation Losses">

                <h4 class="h4 mb-4 text-gray-900">Total Estimated Reputation Losses</h4>

                <div class="form-row mt-4">
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body-totals">
                      <div class="table-responsive" ng-init="load_reputation_data()">
                        <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Confidentiality<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="ng-binding"><span id="span_confidentialityprodlossmin6">0</span><input type="hidden" name="ans_confidentialityprodlossmin6" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmin6" value="0">
                              </td>
                              <td class="ng-binding"><span id="span_confidentialityprodlosslikely6">0</span><input type="hidden" name="ans_confidentialityprodlosslikely6" maxlength="20" class="form-control input" id="ans_confidentialityprodlosslikely6" value="0"></td>
                              <td class="ng-binding"><span id="span_confidentialityprodlossmax6">0</span><input type="hidden" name="ans_confidentialityprodlossmax6" maxlength="20" class="form-control input" id="ans_confidentialityprodlossmax6" value="0"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                    <div class="card-body-totals">
                      <div class="table-responsive" ng-init="load_reputation_data()">
                        <table class="table-totals table-bordered" aria-label="Semantic Elements" id="dataTable">
                          <thead>
                            <tr>
                              <th colspan="3" style="text-align:center" scope="col">Integrity and/or Availability<br>(in $000s)</th>
                            </tr>
                            <tr>
                              <th scope="col">Minimum</th>
                              <th scope="col">Most Likely</th>
                              <th scope="col">Maximum</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="ng-binding"><span id="span_integrityprodlossmin6">0</span><input type="hidden" name="ans_integrityprodlossmin6" maxlength="20" class="form-control input" id="ans_integrityprodlossmin6" value="0">
                              </td>
                              <td class="ng-binding"><span id="span_integrityprodlosslikely6">0</span><input type="hidden" name="ans_integrityprodlosslikely6" maxlength="20" class="form-control input" id="ans_integrityprodlosslikely6" value="0"></td>
                              <td class="ng-binding"><span id="span_integrityprodlossmax6">0</span><input type="hidden" name="ans_integrityprodlossmax6" maxlength="20" class="form-control input" id="ans_integrityprodlossmax6" value="0"></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <input type="button" name="previous" class="previous btn  bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next btn bg-primary p-2 text-light" value="Next">
            </fieldset>
            <fieldset>
            <legend></legend>
              <h3>Loss Frequency and CIS Implementation Group 1 Safeguards</h3>
              <p>
                In this part of the assessment, we will help you estimate the likelihood your organization will
                experience a loss due to ransomware in the coming twelve months, based on your current threat
                environment and your existing cybersecurity controls.
              </p>
              <ul>
                <li>
                  If you are a <a href="https://csat.cisecurity.org">CIS CSAT</a> user, you will be given the opportunity to upload a file that describes your current level of
                  implementation for the CIS Implementation Group 1 (IG1) Safeguards from CIS Controls v7.1. You will also have the opportunity to review, edit,
                  and add missing data for the implementation status of any IG1 Safeguards not yet assessed in CSAT.
                </li>
                <li>
                  If you are not a current CSAT user, you will need to provide this information on the next page in order to complete the assessment.
                  You may press the Continue button to skip uploading an assessment and advance to the next page to enter the CIS Safeguard scores manually.
                  (You are also highly encouraged to use the CSAT application!).
                </li>
              </ul>

              <h4>Instructions for Downloading Your CSAT Report</h4>
              <p> To obtain your current CIS Controls implementation status directly from the CSAT please perform the following steps:
              </p>
              <ol>
                <li>Log into your CIS CSAT account.</li>
                <li>On the left side of the page, below the Dashboard, click on "Current Assessment."</li>
                <li>Click on "All Controls."</li>
                <li>Save the MS Excel file and remember its location.</li>
              </ol>

              <h4>Upload your CSAT Report (MS Excel file)</h4>
              <ol>
                <li>Click on the "Browse" button below.</li>
                <li>Select the saved MS Excel file. </li>
                <li>Verify the file is correct.</li>
                <li>Click on the "Upload" button below.</li>
                <li>Continue to the next page.</li>
              </ol>

              <label for="id_file">File:</label>
              <input type="file" name="file" required="" id="id_file" onchange="return fileValidation()">

              <div id="div_file" style="color:red"></div>
              </br>
              <input type="button" name="previous" class="previous btn  bg-primary text-light" value="Previous">
              <input type="button" name="next" class="next btn bg-primary p-2 text-light" value="Next">
            </fieldset>
            <fieldset>
            <legend></legend>
              <h3>Confirm Safeguard Implementation Status</h3>
              <p>
                On this page you will confirm the implementation status for your organization of a set of core cybersecurity controls that can reduce the likelihood
                that your organization will experience a loss event caused by ransomware. These controls represent a subset of the Implementation Group 1 (IG1) Safeguards
                within the CIS Controls v7.1 relevant to the threat of ransomware.
              </p>

              <p></p> Reviewing the Controls
              <p></p>
              <ul>
                <li>If you are a current CIS CSAT user who has uploaded your report, this page will reflect your CSAT information. It is <strong>strongly recommended</strong>
                  that you review this information prior to submission in order to improve the accuracy of this risk assessment.
                </li>
                <li>If you did not upload a report, you will need to select an implementation status for each Safeguard listed below in order to complete the assessment.
                </li>
              </ul>
              <p><strong>After selecting an implementation status for each Safeguard below, please click the "Calculate Frequency" button at the bottom of the page</strong>
              </p>
              <div class="row">
                <div class="col-12 col-lg-12 m-auto">
                  <!--<form class="multisteps-form__form" method="POST" action=""> -->

                  <input type="hidden" name="csrfmiddlewaretoken" value="tD5mMjrUgMRqthZPsWTQ7pxXWWXf7IzMt1DjrWtAt4yjDznIxAGxX7b9AZIEhyO2" autocomplete="off">

                  <p>
                    <br>
                    <strong>Address Unapproved Software:
                      <br><em>Ensure that unauthorized software is either removed or the inventory is updated in a timely manner.</em></strong>
                  </p>
                  <input type="hidden" name="ques_addressunapproved" maxlength="20" class="form-control input" id="ques_addressunapproved" value="Address Unapproved Software - Ensure that unauthorized software is either removed or the inventory is updated in a timely manner.">

                  <div class="myradio">
                    <label for="id_two_six_0"><input type="radio" name="two_six" value="Not Implemented" required="" class="radioset" id="id_two_six_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_two_six_1"><input type="radio" name="two_six" value="Parts of Policy Implemented" required="" class="radioset" id="id_two_six_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_two_six_2"><input type="radio" name="two_six" value="Implemented on Some Systems" required="" class="radioset" id="id_two_six_2" checked="">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_two_six_3"><input type="radio" name="two_six" value="Implemented on Most Systems" required="" class="radioset" id="id_two_six_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_two_six_4"><input type="radio" name="two_six" value="Implemented on All Systems" required="" class="radioset" id="id_two_six_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_two_six_5"><input type="radio" name="two_six" value="Not Applicable" required="" class="radioset" id="id_two_six_5">
                      Not Applicable</label>
                  </div>

                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Deploy Automated Operating System Patch Management Tools:
                      <br><em>Deploy automated software update tools in order to ensure that the operating systems are running the most recent security updates provided by the software vendor.</em></strong>
                  </p>
                  <input type="hidden" name="ques_deployoperatingpatchtools" maxlength="20" class="form-control input" id="ques_deployoperatingpatchtools" value="Deploy Automated Operating System Patch Management Tools - Deploy automated software update tools in order to ensure that the operating systems are running the most recent security updates provided by the software vendor.">

                  <div class="myradio">
                    <label for="id_three_four_0"><input type="radio" name="three_four" value="Not Implemented" required="" class="radioset" id="id_three_four_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_four_1"><input type="radio" name="three_four" value="Parts of Policy Implemented" required="" class="radioset" id="id_three_four_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_four_2"><input type="radio" name="three_four" value="Implemented on Some Systems" required="" class="radioset" id="id_three_four_2" checked="">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_four_3"><input type="radio" name="three_four" value="Implemented on Most Systems" required="" class="radioset" id="id_three_four_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_four_4"><input type="radio" name="three_four" value="Implemented on All Systems" required="" class="radioset" id="id_three_four_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_four_5"><input type="radio" name="three_four" value="Not Applicable" required="" class="radioset" id="id_three_four_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Deploy Automated Software Patch Management Tools:
                      <br><em>Deploy automated software update tools in order to ensure that third-party software on all systems is running the most recent security updates provided by the software vendor.</em></strong>
                  </p>
                  <input type="hidden" name="ques_deploysoftwarepatchtools" maxlength="20" class="form-control input" id="ques_deploysoftwarepatchtools" value="Deploy Automated Software Patch Management Tools - Deploy automated software update tools in order to ensure that third-party software on all systems is running the most recent security updates provided by the software vendor.">

                  <div class="myradio">
                    <label for="id_three_five_0"><input type="radio" name="three_five" value="Not Implemented" required="" class="radioset" id="id_three_five_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_five_1"><input type="radio" name="three_five" value="Parts of Policy Implemented" required="" class="radioset" id="id_three_five_1" checked="">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_five_2"><input type="radio" name="three_five" value="Implemented on Some Systems" required="" class="radioset" id="id_three_five_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_five_3"><input type="radio" name="three_five" value="Implemented on Most Systems" required="" class="radioset" id="id_three_five_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_five_4"><input type="radio" name="three_five" value="Implemented on All Systems" required="" class="radioset" id="id_three_five_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_three_five_5"><input type="radio" name="three_five" value="Not Applicable" required="" class="radioset" id="id_three_five_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Change Default Passwords
                      <br><em>Before deploying any new asset, change all default passwords to have values consistent with administrative level accounts.</em></strong>
                  </p>
                  <input type="hidden" name="ques_changepasswords" maxlength="20" class="form-control input" id="ques_changepasswords" value="Change Default Passwords - Before deploying any new asset, change all default passwords to have values consistent with administrative level accounts.">

                  <div class="myradio">
                    <label for="id_four_two_0"><input type="radio" name="four_two" value="Not Implemented" required="" class="radioset" id="id_four_two_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_two_1"><input type="radio" name="four_two" value="Parts of Policy Implemented" required="" class="radioset" id="id_four_two_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_two_2"><input type="radio" name="four_two" value="Implemented on Some Systems" required="" class="radioset" id="id_four_two_2" checked="">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_two_3"><input type="radio" name="four_two" value="Implemented on Most Systems" required="" class="radioset" id="id_four_two_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_two_4"><input type="radio" name="four_two" value="Implemented on All Systems" required="" class="radioset" id="id_four_two_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_two_5"><input type="radio" name="four_two" value="Not Applicable" required="" class="radioset" id="id_four_two_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Ensure the Use of Dedicated Administrative Accounts
                      <br><em>Ensure that all users with administrative account access use a dedicated or secondary account for elevated activities. This account should only be used for administrative activities and not internet browsing, email, or similar activities.</em></strong>
                  </p>
                  <input type="hidden" name="ques_dedicatedadmacc" maxlength="20" class="form-control input" id="ques_dedicatedadmacc" value="Ensure the Use of Dedicated Administrative Accounts - Ensure that all users with administrative account access use a dedicated or secondary account for elevated activities. This account should only be used for administrative activities and not internet browsing, email, or similar activities.">

                  <div class="myradio">
                    <label for="id_four_three_0"><input type="radio" name="four_three" value="Not Implemented" required="" class="radioset" id="id_four_three_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_three_1"><input type="radio" name="four_three" value="Parts of Policy Implemented" required="" class="radioset" id="id_four_three_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_three_2"><input type="radio" name="four_three" value="Implemented on Some Systems" required="" class="radioset" id="id_four_three_2" checked="">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_three_3"><input type="radio" name="four_three" value="Implemented on Most Systems" required="" class="radioset" id="id_four_three_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_three_4"><input type="radio" name="four_three" value="Implemented on All Systems" required="" class="radioset" id="id_four_three_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_four_three_5"><input type="radio" name="four_three" value="Not Applicable" required="" class="radioset" id="id_four_three_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Establish Secure Configurations
                      <br><em>Maintain documented security configuration standards for all authorized operating systems and software.</em></strong>
                  </p>
                  <input type="hidden" name="ques_establishconf" maxlength="20" class="form-control input" id="ques_establishconf" value="Establish Secure Configurations - Maintain documented security configuration standards for all authorized operating systems and software.">

                  <div class="myradio">
                    <label for="id_five_one_0"><input type="radio" name="five_one" value="Not Implemented" required="" class="radioset" id="id_five_one_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_five_one_1"><input type="radio" name="five_one" value="Parts of Policy Implemented" required="" class="radioset" id="id_five_one_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_five_one_2"><input type="radio" name="five_one" value="Implemented on Some Systems" required="" class="radioset" id="id_five_one_2" checked="">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_five_one_3"><input type="radio" name="five_one" value="Implemented on Most Systems" required="" class="radioset" id="id_five_one_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_five_one_4"><input type="radio" name="five_one" value="Implemented on All Systems" required="" class="radioset" id="id_five_one_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_five_one_5"><input type="radio" name="five_one" value="Not Applicable" required="" class="radioset" id="id_five_one_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Use of DNS Filtering Services
                      <br><em>Use Domain Name System (DNS) filtering services to help block access to known malicious domains.</em></strong>
                  </p>
                  <input type="hidden" name="ques_dnsfiltering" maxlength="20" class="form-control input" id="ques_dnsfiltering" value="Use of DNS Filtering Services - Use Domain Name System (DNS) filtering services to help block access to known malicious domains.">

                  <div class="myradio">
                    <label for="id_seven_seven_0"><input type="radio" name="seven_seven" value="Not Implemented" required="" class="radioset" id="id_seven_seven_0" checked="">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seven_seven_1"><input type="radio" name="seven_seven" value="Parts of Policy Implemented" required="" class="radioset" id="id_seven_seven_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seven_seven_2"><input type="radio" name="seven_seven" value="Implemented on Some Systems" required="" class="radioset" id="id_seven_seven_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seven_seven_3"><input type="radio" name="seven_seven" value="Implemented on Most Systems" required="" class="radioset" id="id_seven_seven_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seven_seven_4"><input type="radio" name="seven_seven" value="Implemented on All Systems" required="" class="radioset" id="id_seven_seven_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seven_seven_5"><input type="radio" name="seven_seven" value="Not Applicable" required="" class="radioset" id="id_seven_seven_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Ensure Anti-Malware Software and Signatures are Updated
                      <br><em>Ensure that the organization’s anti-malware software updates its scanning engine and signature database on a regular basis.</em></strong>
                  </p>
                  <input type="hidden" name="ques_antimalware" maxlength="20" class="form-control input" id="ques_antimalware" value="Ensure Anti-Malware Software and Signatures are Updated - Ensure that the organization’s anti-malware software updates its scanning engine and signature database on a regular basis.">

                  <div class="myradio">
                    <label for="id_eight_two_0"><input type="radio" name="eight_two" value="Not Implemented" required="" class="radioset" id="id_eight_two_0" checked="">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_two_1"><input type="radio" name="eight_two" value="Parts of Policy Implemented" required="" class="radioset" id="id_eight_two_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_two_2"><input type="radio" name="eight_two" value="Implemented on Some Systems" required="" class="radioset" id="id_eight_two_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_two_3"><input type="radio" name="eight_two" value="Implemented on Most Systems" required="" class="radioset" id="id_eight_two_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_two_4"><input type="radio" name="eight_two" value="Implemented on All Systems" required="" class="radioset" id="id_eight_two_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_two_5"><input type="radio" name="eight_two" value="Not Applicable" required="" class="radioset" id="id_eight_two_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Configure Anti-Malware Scanning of Removable Devices
                      <br><em>Configure devices so that they automatically conduct an anti-malware scan of removable media when inserted or connected.</em></strong>
                  </p>
                  <input type="hidden" name="ques_malwarescanning" maxlength="20" class="form-control input" id="ques_malwarescanning" value="Configure Anti-Malware Scanning of Removable Devices - Configure devices so that they automatically conduct an anti-malware scan of removable media when inserted or connected.">

                  <div class="myradio">
                    <label for="id_eight_four_0"><input type="radio" name="eight_four" value="Not Implemented" required="" class="radioset" id="id_eight_four_0" checked="">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_four_1"><input type="radio" name="eight_four" value="Parts of Policy Implemented" required="" class="radioset" id="id_eight_four_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_four_2"><input type="radio" name="eight_four" value="Implemented on Some Systems" required="" class="radioset" id="id_eight_four_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_four_3"><input type="radio" name="eight_four" value="Implemented on Most Systems" required="" class="radioset" id="id_eight_four_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_four_4"><input type="radio" name="eight_four" value="Implemented on All Systems" required="" class="radioset" id="id_eight_four_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_eight_four_5"><input type="radio" name="eight_four" value="Not Applicable" required="" class="radioset" id="id_eight_four_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Ensure Regular Automated Backups
                      <br><em>Ensure that all system data is automatically backed up on a regular basis.</em></strong>
                  </p>
                  <input type="hidden" name="ques_automatedbackup" maxlength="20" class="form-control input" id="ques_automatedbackup" value="Ensure Regular Automated Backups - Ensure that all system data is automatically backed up on a regular basis.">

                  <div class="myradio">
                    <label for="id_ten_one_0"><input type="radio" name="ten_one" value="Not Implemented" required="" class="radioset" id="id_ten_one_0" checked="">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_one_1"><input type="radio" name="ten_one" value="Parts of Policy Implemented" required="" class="radioset" id="id_ten_one_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_one_2"><input type="radio" name="ten_one" value="Implemented on Some Systems" required="" class="radioset" id="id_ten_one_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_one_3"><input type="radio" name="ten_one" value="Implemented on Most Systems" required="" class="radioset" id="id_ten_one_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_one_4"><input type="radio" name="ten_one" value="Implemented on All Systems" required="" class="radioset" id="id_ten_one_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_one_5"><input type="radio" name="ten_one" value="Not Applicable" required="" class="radioset" id="id_ten_one_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Perform Complete System Backups
                      <br><em>Ensure that all of the organization’s key systems are backed up as a complete system, through processes such as imaging, to enable the quick recovery of an entire system.</em></strong>
                  </p>
                  <input type="hidden" name="ques_completesystembackup" maxlength="20" class="form-control input" id="ques_completesystembackup" value="Perform Complete System Backups - Ensure that all of the organization’s key systems are backed up as a complete system, through processes such as imaging, to enable the quick recovery of an entire system.">

                  <div class="myradio">
                    <label for="id_ten_two_0"><input type="radio" name="ten_two" value="Not Implemented" required="" class="radioset" id="id_ten_two_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_two_1"><input type="radio" name="ten_two" value="Parts of Policy Implemented" required="" class="radioset" id="id_ten_two_1" checked="">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_two_2"><input type="radio" name="ten_two" value="Implemented on Some Systems" required="" class="radioset" id="id_ten_two_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_two_3"><input type="radio" name="ten_two" value="Implemented on Most Systems" required="" class="radioset" id="id_ten_two_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_two_4"><input type="radio" name="ten_two" value="Implemented on All Systems" required="" class="radioset" id="id_ten_two_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_two_5"><input type="radio" name="ten_two" value="Not Applicable" required="" class="radioset" id="id_ten_two_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Protect Backups
                      <br><em>Ensure that backups are properly protected via physical security or encryption when they are stored, as well as when they are moved across the network. This includes remote backups and cloud services.</em></strong>
                  </p>
                  <input type="hidden" name="ques_protectbackup" maxlength="20" class="form-control input" id="ques_protectbackup" value="Protect Backups - Ensure that backups are properly protected via physical security or encryption when they are stored, as well as when they are moved across the network. This includes remote backups and cloud services.">

                  <div class="myradio">
                    <label for="id_ten_four_0"><input type="radio" name="ten_four" value="Not Implemented" required="" class="radioset" id="id_ten_four_0" checked="">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_four_1"><input type="radio" name="ten_four" value="Parts of Policy Implemented" required="" class="radioset" id="id_ten_four_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_four_2"><input type="radio" name="ten_four" value="Implemented on Some Systems" required="" class="radioset" id="id_ten_four_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_four_3"><input type="radio" name="ten_four" value="Implemented on Most Systems" required="" class="radioset" id="id_ten_four_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_four_4"><input type="radio" name="ten_four" value="Implemented on All Systems" required="" class="radioset" id="id_ten_four_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_four_5"><input type="radio" name="ten_four" value="Not Applicable" required="" class="radioset" id="id_ten_four_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Ensure All Backups Have at Least One Offline Backup Destination
                      <br><em>Ensure that all backups have at least one offline (i.e., not accessible via a network connection) backup destination.</em></strong>
                  </p>
                  <input type="hidden" name="ques_ensureofflinebackup" maxlength="20" class="form-control input" id="ques_ensureofflinebackup" value="Ensure All Backups Have at Least One Offline Backup Destination - Ensure that all backups have at least one offline (i.e., not accessible via a network connection) backup destination.">

                  <div class="myradio">
                    <label for="id_ten_five_0"><input type="radio" name="ten_five" value="Not Implemented" required="" class="radioset" id="id_ten_five_0" checked="">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_five_1"><input type="radio" name="ten_five" value="Parts of Policy Implemented" required="" class="radioset" id="id_ten_five_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_five_2"><input type="radio" name="ten_five" value="Implemented on Some Systems" required="" class="radioset" id="id_ten_five_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_five_3"><input type="radio" name="ten_five" value="Implemented on Most Systems" required="" class="radioset" id="id_ten_five_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_five_4"><input type="radio" name="ten_five" value="Implemented on All Systems" required="" class="radioset" id="id_ten_five_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_ten_five_5"><input type="radio" name="ten_five" value="Not Applicable" required="" class="radioset" id="id_ten_five_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Deny Communication over Unauthorized Ports
                      <br><em>Deny communication over unauthorized TCP or UDP ports or application traffic to ensure that only authorized protocols are allowed to cross the network boundary in or out of the network at each of the organization’s network boundaries.</em></strong>
                  </p>
                  <input type="hidden" name="ques_denyunauthorizedport" maxlength="20" class="form-control input" id="ques_denyunauthorizedport" value="Deny Communication over Unauthorized Ports - Deny communication over unauthorized TCP or UDP ports or application traffic to ensure that only authorized protocols are allowed to cross the network boundary in or out of the network at each of the organization’s network boundaries.">

                  <div class="myradio">
                    <label for="id_twelve_four_0"><input type="radio" name="twelve_four" value="Not Implemented" required="" class="radioset" id="id_twelve_four_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_twelve_four_1"><input type="radio" name="twelve_four" value="Parts of Policy Implemented" required="" class="radioset" id="id_twelve_four_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_twelve_four_2"><input type="radio" name="twelve_four" value="Implemented on Some Systems" required="" class="radioset" id="id_twelve_four_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_twelve_four_3"><input type="radio" name="twelve_four" value="Implemented on Most Systems" required="" class="radioset" id="id_twelve_four_3" checked="">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_twelve_four_4"><input type="radio" name="twelve_four" value="Implemented on All Systems" required="" class="radioset" id="id_twelve_four_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_twelve_four_5"><input type="radio" name="twelve_four" value="Not Applicable" required="" class="radioset" id="id_twelve_four_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Remove Sensitive Data or Systems Not Regularly Accessed by Organization
                      <br><em>Remove sensitive data or systems not regularly accessed by the organization from the network. These systems shall only be used as stand alone systems (disconnected from the network) by the business unit needing to occasionally use the system or completely virtualized and powered off until needed.</em></strong>
                  </p>
                  <input type="hidden" name="ques_removesensitivedata" maxlength="20" class="form-control input" id="ques_removesensitivedata" value="Remove Sensitive Data or Systems Not Regularly Accessed by Organization - Remove sensitive data or systems not regularly accessed by the organization from the network. These systems shall only be used as stand alone systems (disconnected from the network) by the business unit needing to occasionally use the system or completely virtualized and powered off until needed.">

                  <div class="myradio">
                    <label for="id_thirteen_two_0"><input type="radio" name="thirteen_two" value="Not Implemented" required="" class="radioset" id="id_thirteen_two_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_two_1"><input type="radio" name="thirteen_two" value="Parts of Policy Implemented" required="" class="radioset" id="id_thirteen_two_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_two_2"><input type="radio" name="thirteen_two" value="Implemented on Some Systems" required="" class="radioset" id="id_thirteen_two_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_two_3"><input type="radio" name="thirteen_two" value="Implemented on Most Systems" required="" class="radioset" id="id_thirteen_two_3" checked="">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_two_4"><input type="radio" name="thirteen_two" value="Implemented on All Systems" required="" class="radioset" id="id_thirteen_two_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_two_5"><input type="radio" name="thirteen_two" value="Not Applicable" required="" class="radioset" id="id_thirteen_two_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Encrypt Mobile Device Data
                      <br><em>Utilize approved cryptographic mechanisms to protect enterprise data stored on all mobile devices.</em></strong>
                  </p>
                  <input type="hidden" name="ques_encryptmobiledata" maxlength="20" class="form-control input" id="ques_encryptmobiledata" value="Encrypt Mobile Device Data - Utilize approved cryptographic mechanisms to protect enterprise data stored on all mobile devices.">

                  <div class="myradio">
                    <label for="id_thirteen_six_0"><input type="radio" name="thirteen_six" value="Not Implemented" required="" class="radioset" id="id_thirteen_six_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_six_1"><input type="radio" name="thirteen_six" value="Parts of Policy Implemented" required="" class="radioset" id="id_thirteen_six_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_six_2"><input type="radio" name="thirteen_six" value="Implemented on Some Systems" required="" class="radioset" id="id_thirteen_six_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_six_3"><input type="radio" name="thirteen_six" value="Implemented on Most Systems" required="" class="radioset" id="id_thirteen_six_3" checked="">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_six_4"><input type="radio" name="thirteen_six" value="Implemented on All Systems" required="" class="radioset" id="id_thirteen_six_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_thirteen_six_5"><input type="radio" name="thirteen_six" value="Not Applicable" required="" class="radioset" id="id_thirteen_six_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Protect Information through Access Control Lists
                      <br><em>Protect all information stored on systems with file system, network share, claims, application, or database specific access control lists. These controls will enforce the principle that only authorized individuals should have access to the information based on their need to access the information as a part of their responsibilities.</em></strong>
                  </p>
                  <input type="hidden" name="ques_protectaccesscontrol" maxlength="20" class="form-control input" id="ques_protectaccesscontrol" value="Protect Information through Access Control Lists - Protect all information stored on systems with file system, network share, claims, application, or database specific access control lists. These controls will enforce the principle that only authorized individuals should have access to the information based on their need to access the information as a part of their responsibilities.">

                  <div class="myradio">
                    <label for="id_fourteen_six_0"><input type="radio" name="fourteen_six" value="Not Implemented" required="" class="radioset" id="id_fourteen_six_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fourteen_six_1"><input type="radio" name="fourteen_six" value="Parts of Policy Implemented" required="" class="radioset" id="id_fourteen_six_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fourteen_six_2"><input type="radio" name="fourteen_six" value="Implemented on Some Systems" required="" class="radioset" id="id_fourteen_six_2" checked="">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fourteen_six_3"><input type="radio" name="fourteen_six" value="Implemented on Most Systems" required="" class="radioset" id="id_fourteen_six_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fourteen_six_4"><input type="radio" name="fourteen_six" value="Implemented on All Systems" required="" class="radioset" id="id_fourteen_six_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fourteen_six_5"><input type="radio" name="fourteen_six" value="Not Applicable" required="" class="radioset" id="id_fourteen_six_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Create Separate Wireless Network for Personal and Untrusted Devices
                      <br><em>Create a separate wireless network for personal or untrusted devices. Enterprise access from this network should be treated as untrusted and filtered and audited accordingly.</em></strong>
                  </p>
                  <input type="hidden" name="ques_separatewireless" maxlength="20" class="form-control input" id="ques_separatewireless" value="Create Separate Wireless Network for Personal and Untrusted Devices - Create a separate wireless network for personal or untrusted devices. Enterprise access from this network should be treated as untrusted and filtered and audited accordingly.">

                  <div class="myradio">
                    <label for="id_fifteen_ten_0"><input type="radio" name="fifteen_ten" value="Not Implemented" required="" class="radioset" id="id_fifteen_ten_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fifteen_ten_1"><input type="radio" name="fifteen_ten" value="Parts of Policy Implemented" required="" class="radioset" id="id_fifteen_ten_1" checked="">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fifteen_ten_2"><input type="radio" name="fifteen_ten" value="Implemented on Some Systems" required="" class="radioset" id="id_fifteen_ten_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fifteen_ten_3"><input type="radio" name="fifteen_ten" value="Implemented on Most Systems" required="" class="radioset" id="id_fifteen_ten_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fifteen_ten_4"><input type="radio" name="fifteen_ten" value="Implemented on All Systems" required="" class="radioset" id="id_fifteen_ten_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_fifteen_ten_5"><input type="radio" name="fifteen_ten" value="Not Applicable" required="" class="radioset" id="id_fifteen_ten_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Disable Any Unassociated Accounts
                      <br><em>Disable any account that cannot be associated with a business process or business owner.</em></strong>
                  </p>
                  <input type="hidden" name="ques_disableaccounts" maxlength="20" class="form-control input" id="ques_disableaccounts" value="Disable Any Unassociated Accounts - Disable any account that cannot be associated with a business process or business owner.">

                  <div class="myradio">
                    <label for="id_sixteen_eight_0"><input type="radio" name="sixteen_eight" value="Not Implemented" required="" class="radioset" id="id_sixteen_eight_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eight_1"><input type="radio" name="sixteen_eight" value="Parts of Policy Implemented" required="" class="radioset" id="id_sixteen_eight_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eight_2"><input type="radio" name="sixteen_eight" value="Implemented on Some Systems" required="" class="radioset" id="id_sixteen_eight_2" checked="">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eight_3"><input type="radio" name="sixteen_eight" value="Implemented on Most Systems" required="" class="radioset" id="id_sixteen_eight_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eight_4"><input type="radio" name="sixteen_eight" value="Implemented on All Systems" required="" class="radioset" id="id_sixteen_eight_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eight_5"><input type="radio" name="sixteen_eight" value="Not Applicable" required="" class="radioset" id="id_sixteen_eight_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Disable Dormant Accounts
                      <br><em>Automatically disable dormant accounts after a set period of inactivity.</em></strong>
                  </p>
                  <input type="hidden" name="ques_disabledormantaccount" maxlength="20" class="form-control input" id="ques_disabledormantaccount" value="Disable Dormant Accounts - Automatically disable dormant accounts after a set period of inactivity.">

                  <div class="myradio">
                    <label for="id_sixteen_nine_0"><input type="radio" name="sixteen_nine" value="Not Implemented" required="" class="radioset" id="id_sixteen_nine_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_nine_1"><input type="radio" name="sixteen_nine" value="Parts of Policy Implemented" required="" class="radioset" id="id_sixteen_nine_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_nine_2"><input type="radio" name="sixteen_nine" value="Implemented on Some Systems" required="" class="radioset" id="id_sixteen_nine_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_nine_3"><input type="radio" name="sixteen_nine" value="Implemented on Most Systems" required="" class="radioset" id="id_sixteen_nine_3" checked="">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_nine_4"><input type="radio" name="sixteen_nine" value="Implemented on All Systems" required="" class="radioset" id="id_sixteen_nine_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_nine_5"><input type="radio" name="sixteen_nine" value="Not Applicable" required="" class="radioset" id="id_sixteen_nine_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Lock Workstation Sessions After Inactivity
                      <br><em>Automatically lock workstation sessions after a standard period of inactivity.</em></strong>
                  </p>
                  <input type="hidden" name="ques_lockworkstation" maxlength="20" class="form-control input" id="ques_lockworkstation" value="Lock Workstation Sessions After Inactivity - Automatically lock workstation sessions after a standard period of inactivity.">

                  <div class="myradio">
                    <label for="id_sixteen_eleven_0"><input type="radio" name="sixteen_eleven" value="Not Implemented" required="" class="radioset" id="id_sixteen_eleven_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eleven_1"><input type="radio" name="sixteen_eleven" value="Parts of Policy Implemented" required="" class="radioset" id="id_sixteen_eleven_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eleven_2"><input type="radio" name="sixteen_eleven" value="Implemented on Some Systems" required="" class="radioset" id="id_sixteen_eleven_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eleven_3"><input type="radio" name="sixteen_eleven" value="Implemented on Most Systems" required="" class="radioset" id="id_sixteen_eleven_3" checked="">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eleven_4"><input type="radio" name="sixteen_eleven" value="Implemented on All Systems" required="" class="radioset" id="id_sixteen_eleven_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_sixteen_eleven_5"><input type="radio" name="sixteen_eleven" value="Not Applicable" required="" class="radioset" id="id_sixteen_eleven_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Implement a Security Awareness Program
                      <br><em>Create a security awareness program for all workforce members to complete on a regular basis to ensure they understand and exhibit the necessary behaviors and skills to help ensure the security of the organization. The organization’s security awareness program should be communicated in a continuous and engaging manner.</em></strong>
                  </p>
                  <input type="hidden" name="ques_securityawarenesss" maxlength="20" class="form-control input" id="ques_securityawarenesss" value="Implement a Security Awareness Program - Create a security awareness program for all workforce members to complete on a regular basis to ensure they understand and exhibit the necessary behaviors and skills to help ensure the security of the organization. The organization’s security awareness program should be communicated in a continuous and engaging manner.">

                  <div class="myradio">
                    <label for="id_seventeen_three_0"><input type="radio" name="seventeen_three" value="Not Implemented" required="" class="radioset" id="id_seventeen_three_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_three_1"><input type="radio" name="seventeen_three" value="Parts of Policy Implemented" required="" class="radioset" id="id_seventeen_three_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_three_2"><input type="radio" name="seventeen_three" value="Implemented on Some Systems" required="" class="radioset" id="id_seventeen_three_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_three_3"><input type="radio" name="seventeen_three" value="Implemented on Most Systems" required="" class="radioset" id="id_seventeen_three_3" checked="">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_three_4"><input type="radio" name="seventeen_three" value="Implemented on All Systems" required="" class="radioset" id="id_seventeen_three_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_three_5"><input type="radio" name="seventeen_three" value="Not Applicable" required="" class="radioset" id="id_seventeen_three_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Train Workforce on Secure Authentication
                      <br><em>Train workforce members on the importance of enabling and utilizing secure authentication.</em></strong>
                  </p>
                  <input type="hidden" name="ques_trainsecureaut" maxlength="20" class="form-control input" id="ques_trainsecureaut" value="Train Workforce on Secure Authentication - Train workforce members on the importance of enabling and utilizing secure authentication.">

                  <div class="myradio">
                    <label for="id_seventeen_five_0"><input type="radio" name="seventeen_five" value="Not Implemented" required="" class="radioset" id="id_seventeen_five_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_five_1"><input type="radio" name="seventeen_five" value="Parts of Policy Implemented" required="" class="radioset" id="id_seventeen_five_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_five_2"><input type="radio" name="seventeen_five" value="Implemented on Some Systems" required="" class="radioset" id="id_seventeen_five_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_five_3"><input type="radio" name="seventeen_five" value="Implemented on Most Systems" required="" class="radioset" id="id_seventeen_five_3" checked="">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_five_4"><input type="radio" name="seventeen_five" value="Implemented on All Systems" required="" class="radioset" id="id_seventeen_five_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_five_5"><input type="radio" name="seventeen_five" value="Not Applicable" required="" class="radioset" id="id_seventeen_five_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Train Workforce on Identifying Social Engineering Attacks
                      <br><em>Train the workforce on how to identify different forms of social engineering attacks, such as phishing, phone scams and impersonation calls.</em></strong>
                  </p>
                  <input type="hidden" name="ques_trainsocialeng" maxlength="20" class="form-control input" id="ques_trainsocialeng" value="Train Workforce on Identifying Social Engineering Attacks - Train the workforce on how to identify different forms of social engineering attacks, such as phishing, phone scams and impersonation calls.">

                  <div class="myradio">
                    <label for="id_seventeen_six_0"><input type="radio" name="seventeen_six" value="Not Implemented" required="" class="radioset" id="id_seventeen_six_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_six_1"><input type="radio" name="seventeen_six" value="Parts of Policy Implemented" required="" class="radioset" id="id_seventeen_six_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_six_2"><input type="radio" name="seventeen_six" value="Implemented on Some Systems" required="" class="radioset" id="id_seventeen_six_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_six_3"><input type="radio" name="seventeen_six" value="Implemented on Most Systems" required="" class="radioset" id="id_seventeen_six_3" checked="">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_six_4"><input type="radio" name="seventeen_six" value="Implemented on All Systems" required="" class="radioset" id="id_seventeen_six_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_six_5"><input type="radio" name="seventeen_six" value="Not Applicable" required="" class="radioset" id="id_seventeen_six_5">
                      Not Applicable</label>
                  </div>


                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Train Workforce on Sensitive Data Handling
                      <br><em>Train workforce members on how to identify and properly store, transfer, archive and destroy sensitive information.</em></strong>
                  </p>
                  <input type="hidden" name="ques_trainsensitivedata" maxlength="20" class="form-control input" id="ques_trainsensitivedata" value="Train Workforce on Sensitive Data Handling - Train workforce members on how to identify and properly store, transfer, archive and destroy sensitive information.">

                  <div class="myradio">
                    <label for="id_seventeen_seven_0"><input type="radio" name="seventeen_seven" value="Not Implemented" required="" class="radioset" id="id_seventeen_seven_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_seven_1"><input type="radio" name="seventeen_seven" value="Parts of Policy Implemented" required="" class="radioset" id="id_seventeen_seven_1">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_seven_2"><input type="radio" name="seventeen_seven" value="Implemented on Some Systems" required="" class="radioset" id="id_seventeen_seven_2" checked="">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_seven_3"><input type="radio" name="seventeen_seven" value="Implemented on Most Systems" required="" class="radioset" id="id_seventeen_seven_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_seven_4"><input type="radio" name="seventeen_seven" value="Implemented on All Systems" required="" class="radioset" id="id_seventeen_seven_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_seven_5"><input type="radio" name="seventeen_seven" value="Not Applicable" required="" class="radioset" id="id_seventeen_seven_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Train Workforce on Causes of Unintentional Data Exposure
                      <br><em>Train workforce members to be aware of causes for unintentional data exposures, such as losing their mobile devices or emailing the wrong person due to autocomplete in email.</em></strong>
                  </p>
                  <input type="hidden" name="ques_trainunintentionalexp" maxlength="20" class="form-control input" id="ques_trainunintentionalexp" value="Train Workforce on Causes of Unintentional Data Exposure - Train workforce members to be aware of causes for unintentional data exposures, such as losing their mobile devices or emailing the wrong person due to autocomplete in email.">

                  <div class="myradio">
                    <label for="id_seventeen_eight_0"><input type="radio" name="seventeen_eight" value="Not Implemented" required="" class="radioset" id="id_seventeen_eight_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_eight_1"><input type="radio" name="seventeen_eight" value="Parts of Policy Implemented" required="" class="radioset" id="id_seventeen_eight_1" checked="">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_eight_2"><input type="radio" name="seventeen_eight" value="Implemented on Some Systems" required="" class="radioset" id="id_seventeen_eight_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_eight_3"><input type="radio" name="seventeen_eight" value="Implemented on Most Systems" required="" class="radioset" id="id_seventeen_eight_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_eight_4"><input type="radio" name="seventeen_eight" value="Implemented on All Systems" required="" class="radioset" id="id_seventeen_eight_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_eight_5"><input type="radio" name="seventeen_eight" value="Not Applicable" required="" class="radioset" id="id_seventeen_eight_5">
                      Not Applicable</label>
                  </div>



                  <div class="row">
                    <p> </p>
                  </div>
                  <p>
                    <br>
                    <strong>Train Workforce Members on Identifying and Reporting Incidents
                      <br><em>Train workforce members to be able to identify the most common indicators of an incident and be able to report such an incident.</em></strong>
                  </p>
                  <input type="hidden" name="ques_trainreportingincidents" maxlength="20" class="form-control input" id="ques_trainreportingincidents" value="Train Workforce Members on Identifying and Reporting Incidents - Train workforce members to be able to identify the most common indicators of an incident and be able to report such an incident.">

                  <div class="myradio">
                    <label for="id_seventeen_nine_0"><input type="radio" name="seventeen_nine" value="Not Implemented" required="" class="radioset" id="id_seventeen_nine_0">
                      Not Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_nine_1"><input type="radio" name="seventeen_nine" value="Parts of Policy Implemented" required="" class="radioset" id="id_seventeen_nine_1" checked="">
                      Parts of Policy Implemented</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_nine_2"><input type="radio" name="seventeen_nine" value="Implemented on Some Systems" required="" class="radioset" id="id_seventeen_nine_2">
                      Implemented on Some Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_nine_3"><input type="radio" name="seventeen_nine" value="Implemented on Most Systems" required="" class="radioset" id="id_seventeen_nine_3">
                      Implemented on Most Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_nine_4"><input type="radio" name="seventeen_nine" value="Implemented on All Systems" required="" class="radioset" id="id_seventeen_nine_4">
                      Implemented on All Systems</label>
                  </div>

                  <div class="myradio">
                    <label for="id_seventeen_nine_5"><input type="radio" name="seventeen_nine" value="Not Applicable" required="" class="radioset" id="id_seventeen_nine_5">
                      Not Applicable</label>
                  </div>

                  <hr>

                  <!-- /form -->



                </div>
              </div>



              <input type="button" name="previous" class="previous btn btn-default" value="Previous">
              <input type="submit" name="submit" class="submit btn btn-success" value="Submit" id="submit_data">
            </fieldset>
          </form>
        </div>


      </div>
      <!-- end container-fluid -->

    </div>
    <!-- end content -->



    <?php
    // include("include/copyright-footer.php"); 
    ?>

  </div>

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->

</div>
<!-- END wrapper -->
</div>
<!-- Right Sidebar -->

<script>
  $(document).ready(function() {
    var current = 1,
      current_step, next_step, steps;

    steps = $("fieldset").length;
    $(".next").click(function() {

      if (current == 2) {
        var name = $('#id_name').val();
        var desc = $('#id_description').val();
        var platform = $('#id_platform').val();
        var bus = $('#id_business_unit').val();
        $('#span_name').html('');
        $('#span_desc').html('');
        $('#span_platform').html('');
        $('#span_busunit').html('');
        var valid = 1;

        if (name == '') {
          $('#span_name').html('This is required');
          valid = 0;
        }
        if (desc == '') {
          $('#span_desc').html('This is required');
          valid = 0;
        }
        if (platform == '') {
          $('#span_platform').html('This is required');
          valid = 0;
        }
        if (bus == '') {
          $('#span_busunit').html('This is required');
          valid = 0;
        }

        if (valid == 0) {
          return false;
        }
      }

      if (current == 11) {
        var fileInput =
          document.getElementById('id_file');

        var filePath = fileInput.value;
        $('#div_file').html('');

        if (filePath == '') {
          $('#div_file').html('This is required');
          return false;
        }
      }
      current_step = $(this).parent();
      next_step = $(this).parent().next();
      next_step.show();
      current_step.hide();
      setProgressBar(++current);
    });
    $(".previous").click(function() {
      current_step = $(this).parent();
      next_step = $(this).parent().prev();
      next_step.show();
      current_step.hide();
      setProgressBar(--current);
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep) {
      var percent = parseFloat(100 / steps) * curStep;
      percent = percent.toFixed();
      $(".progress-bar")
        .css("width", percent + "%")
        .html(percent + "%");
    }
  });
</script>
<?php
// include "include/footer.php"; 
?>
<?php
// include "include/theame-cutomizer.php";
?>