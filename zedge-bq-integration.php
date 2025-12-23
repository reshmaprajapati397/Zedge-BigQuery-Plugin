<?php
/**
* Plugin Name: Zedge BigQuery Integration
* Plugin URI: https://thezedge.com/
* Description: Zedge BigQuery Integration.
* Version: 1.0
* Author: Reshma P
*/

require plugin_dir_path(__FILE__).'vendor/autoload.php';
use Google\Cloud\BigQuery\BigQueryClient;

function Zumper_widget_enqueue_script()
{   
    wp_register_style( 'add-bigquery-css', plugin_dir_url( __FILE__ ) . 'assets/bigquery/css/bigquery.css',array(), wp_get_theme()->get( 'Version' ), 'all' );
    wp_enqueue_style( 'add-bigquery-css' );
    wp_enqueue_script( 'add-bigquery-js', plugin_dir_url( __FILE__ ) . 'assets/bigquery/js/bigquery.js', array('jquery') );
    wp_localize_script( 'add-bigquery-js', 'bq_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'add-bigqueryajax-js', plugin_dir_url( __FILE__ ) . 'assets/bigquery/js/bigqueryajax.js', array('add-bigquery-js') );
    wp_enqueue_script( 'jquery-serializejson', plugin_dir_url( __FILE__ ) . 'assets/bigquery/js/jquery.serializejson.js', array('jquery') );
}
add_action('wp_enqueue_scripts', 'Zumper_widget_enqueue_script');

add_filter('query_vars', 'parameter_queryvars');
function parameter_queryvars( $qvars ) {
    $qvars[] = 'page';
    return $qvars;
}

function getMaxMinLogic($data, $field, $fromElem, $toElem){
    if(isset($data[$fromElem]) && $data[$fromElem] != '' && isset($data[$toElem]) && $data[$toElem] != ''){
        $queryString = $field." BETWEEN ". $data[$fromElem] ." AND ". $data[$toElem];
    }else if(isset($data[$fromElem]) && $data[$fromElem] != '' && isset($data[$toElem]) && $data[$toElem] == ''){
        $queryString = $field." >= ". $data[$fromElem];
    }else if(isset($data[$fromElem]) && $data[$fromElem] == '' && isset($data[$toElem]) && $data[$toElem] != ''){
        $queryString = $field." <= ". $data[$toElem];
    }else{
        $queryString = false;
    }
    return $queryString;
}

function getFilterString($data){
    $filterArr = [];

    // Horse Data Filter

    if(isset($data['zHName']) && $data['zHName'] != ''){
        $filterArr[] = "LOWER(v3.name) LIKE '%". strtolower($data['zHName']) ."%'";
    }
    
    if( isset($data['fromHId']) && $data['fromHId'] != '' && isset($data['toHId']) && $data['toHId'] != '' ){
        $filterArr[] = "v3.ID BETWEEN ". $data['fromHId'] ." AND ". $data['toHId'];
    }else if(isset($data['fromHId']) && $data['fromHId'] != '' && isset($data['toHId']) && $data['toHId'] == ''){
        $filterArr[] = "v3.ID >= ". $data['fromHId'];
    }else if(isset($data['fromHId']) && $data['fromHId'] == '' && isset($data['toHId']) && $data['toHId'] != ''){
        $filterArr[] = "v3.ID <= ". $data['toHId'];
    }else if(isset($data['zHID']) && $data['zHID'] != ''){
        $filterArr[] = "v3.ID = ". $data['zHID'];
    }

    if(isset($data['selectedStables']) && $data['selectedStables'] != ''){
        // $filterArr[] = "LOWER(v3.stable_name) LIKE '%". strtolower($data['zHStable']) ."%'";
        $stablesArray = explode(",", $data['selectedStables']);
        $filterArr[] = "v3.stable_name IN ('". implode("','", $stablesArray) ."')";
    }

    if(isset($data['hBreedingChange']) && $data['hBreedingChange'] != ''){
        $filterArr[] = "v3.breed_version = ". $data['hBreedingChange'];
    }
    if(isset($data['hUnracedChange']) && $data['hUnracedChange'] != ''){
        if($data['hUnracedChange'] == '0'){
            $filterArr[] = "v3.unraced_horse is null";
        }else{
            $filterArr[] = "v3.unraced_horse = ". $data['hUnracedChange'];
        }
    }

    if(isset($data['listingPrices']) && $data['listingPrices'] != ''){
        if($data['listingPrices'] == 'sales'){
            $filterArr[] = "li.ListPrice IS NOT NULL";
        }else if($data['listingPrices'] == 'stud'){
            $filterArr[] = "st.mating_price IS NOT NULL";
        }/* else{
            $filterArr[] = "li.ListPrice IS NOT NULL AND st.mating_price IS NOT NULL";
        }
    }else{
        $filterArr[] = "li.ListPrice IS NOT NULL AND st.mating_price IS NOT NULL"; */   
    } 

    if(getMaxMinLogic($data, 'v3.Z', 'fromHZ', 'toHZ') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.Z', 'fromHZ', 'toHZ');
    }
    if(isset($data['filterHBloodline']) && !empty($data['filterHBloodline'])){
        $filterArr[] = "v3.Bloodline IN ('".implode("','", $data['filterHBloodline'])."')";
    }
    if(isset($data['filterHBreed']) && !empty($data['filterHBreed'])){
        $filterArr[] = "v3.Breed IN ('".implode("','", $data['filterHBreed'])."')";
    }
    if(isset($data['filterHType']) && !empty($data['filterHType'])){  
        $filterArr[] = "v3.Type IN ('".implode("','", $data['filterHType'])."')";
    }
    if(getMaxMinLogic($data, ' v3.startingClassLevel', 'fromHLevel', 'toHLevel') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.startingClassLevel', 'fromHLevel', 'toHLevel');
    }
    if(getMaxMinLogic($data, ' v3.evo', 'fromHEvo', 'toHEvo') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.evo', 'fromHEvo', 'toHEvo');
    }
    if(getMaxMinLogic($data, 'v3.race_count', 'fromHRaceCount', 'toHRaceCount') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.race_count', 'fromHRaceCount', 'toHRaceCount');
    }
    if(getMaxMinLogic($data, 'v3.logic_eBA_100', 'fromHeBA', 'toHeBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.logic_eBA_100', 'fromHeBA', 'toHeBA');
    }
    if(getMaxMinLogic($data, 'v3.logic_BA_100', 'fromHBA', 'toHBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.logic_BA_100', 'fromHBA', 'toHBA');
    }
    if(getMaxMinLogic($data, 'v3.wBA', 'fromHwBA', 'toHwBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.wBA', 'fromHwBA', 'toHwBA');
    }
    if(getMaxMinLogic($data, 'v3.logic_DP_100', 'fromHDP', 'toHDP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.logic_DP_100', 'fromHDP', 'toHDP');
    }
    if(getMaxMinLogic($data, 'v3.wDP', 'fromHwDP', 'toHwDP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.wDP', 'fromHwDP', 'toHwDP');
    }
    if(getMaxMinLogic($data, 'v3.logic_VAR_100', 'fromHVAR', 'toHVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.logic_VAR_100', 'fromHVAR', 'toHVAR');
    }
    if(getMaxMinLogic($data, 'v3.wVAR', 'fromHwVAR', 'toHwVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.wVAR', 'fromHwVAR', 'toHwVAR');
    }
    if(getMaxMinLogic($data, 'v3.Real_Zedge', 'fromHZedge', 'toHZedge') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.Real_Zedge', 'fromHZedge', 'toHZedge');
    }
    if(getMaxMinLogic($data, 'v3.wZedge', 'fromHwZedge', 'toHwZedge') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.wZedge', 'fromHwZedge', 'toHwZedge');
    }
    if(getMaxMinLogic($data, 'li.ListPrice', 'fromHSalePrice', 'toHSalePrice') !== false){
        $filterArr[] = getMaxMinLogic($data, 'li.ListPrice', 'fromHSalePrice', 'toHSalePrice');
    }
    if(getMaxMinLogic($data, 'st.mating_price', 'fromHStudPrice', 'toHStudPrice') !== false){
        $filterArr[] = getMaxMinLogic($data, 'st.mating_price', 'fromHStudPrice', 'toHStudPrice');
    }
    if(getMaxMinLogic($data, 'v3.MoVav', 'fromHaMoV', 'toHaMoV') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.MoVav', 'fromHaMoV', 'toHaMoV');
    }
    if(getMaxMinLogic($data, 'v3.MoVmax', 'fromHmaxMov', 'toHmaxMov') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.MoVmax', 'fromHmaxMov', 'toHmaxMov');
    }
    if(getMaxMinLogic($data, 'v3.Wins', 'fromHWins', 'toHWins') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.Wins', 'fromHWins', 'toHWins');
    }
    if(getMaxMinLogic($data, 'v3.Win_pc', 'fromHWinPercentage', 'toHWinPercentage') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.Win_pc', 'fromHWinPercentage', 'toHWinPercentage');
    }

    // Parents (Father) Data Filter
    if(isset($data['PSID']) && $data['PSID'] != ''){
        $filterArr[] = "father.ID = ". $data['PSID'];
    }
    if(getMaxMinLogic($data, 'father.Z', 'fromPSZ', 'toPSZ') !== false){
        $filterArr[] = getMaxMinLogic($data, 'father.Z', 'fromPSZ', 'toPSZ');
    }
    if(isset($data['filterPSBloodline']) && !empty($data['filterPSBloodline'])){
        $filterArr[] = "father.Bloodline IN ('".implode("','", $data['filterPSBloodline'])."')";
    }
    if(isset($data['filterPSBreed']) && !empty($data['filterPSBreed'])){
        $filterArr[] = "father.Breed IN ('".implode("','", $data['filterPSBreed'])."')";
    }
    if(getMaxMinLogic($data, 'father.logic_BA_100', 'fromPSBA', 'toPSBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'father.logic_BA_100', 'fromPSBA', 'toPSBA');
    }
    if(getMaxMinLogic($data, 'father.wBA', 'fromPSwBA', 'toPSwBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'father.wBA', 'fromPSwBA', 'toPSwBA');
    }
    if(getMaxMinLogic($data, 'father.logic_DP_100', 'fromPSDP', 'toPSDP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'father.logic_DP_100', 'fromPSDP', 'toPSDP');
    }
    if(getMaxMinLogic($data, 'father.wDP', 'fromPSwDP', 'toPSwDP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'father.wDP', 'fromPSwDP', 'toPSwDP');
    }
    if(getMaxMinLogic($data, 'father.logic_VAR_100', 'fromPSVAR', 'toPSVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'father.logic_VAR_100', 'fromPSVAR', 'toPSVAR');
    }
    if(getMaxMinLogic($data, 'father.wVAR', 'fromPSwVAR', 'toPSwVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'father.wVAR', 'fromPSwVAR', 'toPSwVAR');
    }
    if(getMaxMinLogic($data, 'father.Real_Zedge', 'fromPSZedge', 'toPSZedge') !== false){
        $filterArr[] = getMaxMinLogic($data, 'father.Real_Zedge', 'fromPSZedge', 'toPSZedge');
    }
    if(getMaxMinLogic($data, 'father.wZedge', 'fromPSwZedge', 'toPSwZedge') !== false){
        $filterArr[] = getMaxMinLogic($data, 'father.wZedge', 'fromPSwZedge', 'toPSwZedge');
    }

    // Parents (Mother) Data Filter
    if(isset($data['PDID']) && $data['PDID'] != ''){
        $filterArr[] = "mother.ID = ". $data['PDID'];
    }
    if(getMaxMinLogic($data, 'mother.Z', 'fromPDZ', 'toPDZ') !== false){
        $filterArr[] = getMaxMinLogic($data, 'mother.Z', 'fromPDZ', 'toPDZ');
    }
    if(isset($data['filterPDBloodline']) && !empty($data['filterPDBloodline'])){
        $filterArr[] = "mother.Bloodline IN ('".implode("','", $data['filterPDBloodline'])."')";
    }
    if(isset($data['filterPDBreed']) && !empty($data['filterPDBreed'])){
        $filterArr[] = "mother.Breed IN ('".implode("','", $data['filterPDBreed'])."')";
    }
    if(getMaxMinLogic($data, 'mother.logic_BA_100', 'fromPDBA', 'toPDBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'mother.logic_BA_100', 'fromPDBA', 'toPDBA');
    }
    if(getMaxMinLogic($data, '"mother.wBA', 'fromPDwBA', 'toPDwBA') !== false){
        $filterArr[] = getMaxMinLogic($data, '"mother.wBA', 'fromPDwBA', 'toPDwBA');
    }
    if(getMaxMinLogic($data, 'mother.logic_DP_100', 'fromPDDP', 'toPDDP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'mother.logic_DP_100', 'fromPDDP', 'toPDDP');
    }
    if(getMaxMinLogic($data, 'mother.wDP', 'fromPDwDP', 'toPDwDP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'mother.wDP', 'fromPDwDP', 'toPDwDP');
    }
    if(getMaxMinLogic($data, 'mother.logic_VAR_100', 'fromPDVAR', 'toPDVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'mother.logic_VAR_100', 'fromPDVAR', 'toPDVAR');
    }
    if(getMaxMinLogic($data, 'mother.wVAR', 'fromPDwVAR', 'toPDwVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'mother.wVAR', 'fromPDwVAR', 'toPDwVAR');
    }
    if(getMaxMinLogic($data, 'mother.Real_Zedge', 'fromPDZedge', 'toPDZedge') !== false){
        $filterArr[] = getMaxMinLogic($data, 'mother.Real_Zedge', 'fromPDZedge', 'toPDZedge');
    }
    if(getMaxMinLogic($data, 'mother.wZedge', 'fromPDwZedge', 'toPDwZedge') !== false){
        $filterArr[] = getMaxMinLogic($data, 'mother.wZedge', 'fromPDwZedge', 'toPDwZedge');
    }
    
    //Breeding filter 
    if(getMaxMinLogic($data, 'v3.O_zBA', 'fromBAOzBA', 'toBAOzBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.O_zBA', 'fromBAOzBA', 'toBAOzBA');
    }
    if(getMaxMinLogic($data, 'v3.O_eBA_100', 'fromBAOeBA', 'toBAOeBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.O_eBA_100', 'fromBAOeBA', 'toBAOeBA');
    }
    if(getMaxMinLogic($data, 'v3.O_zDP', 'fromBAOzDP', 'toBAOzDP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.O_zDP', 'fromBAOzDP', 'toBAOzDP');
    }
    if(getMaxMinLogic($data, 'v3.O_eDP_100', 'fromBAOeDP', 'toBAOeDP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.O_eDP_100', 'fromBAOeDP', 'toBAOeDP');
    }
    if(getMaxMinLogic($data, 'v3.O_zVAR BETWEEN', 'fromBAOzVAR', 'toBAOzVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.O_zVAR BETWEEN', 'fromBAOzVAR', 'toBAOzVAR');
    }
    if(getMaxMinLogic($data, 'v3.O_eVAR_100', 'fromBAOeVAR', 'toBAOeVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.O_eVAR_100', 'fromBAOeVAR', 'toBAOeVAR');
    }
    if(getMaxMinLogic($data, 'v3.wZedge', 'fromBAwZedge', 'toBAwZedge') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.wZedge', 'fromBAwZedge', 'toBAwZedge');
    }
    if(getMaxMinLogic($data, 'v3.Off_BA', 'fromBAOSBA', 'toBAOSBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.Off_BA', 'fromBAOSBA', 'toBAOSBA');
    }
    if(getMaxMinLogic($data, 'v3.O_BA_100', 'fromBAOBA', 'toBAOBA') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.O_BA_100', 'fromBAOBA', 'toBAOBA');
    }
    if(getMaxMinLogic($data, 'v3.Off_DP', 'fromBAOSDP', 'toBAOSDP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.Off_DP', 'fromBAOSDP', 'toBAOSDP');
    }
    if(getMaxMinLogic($data, 'v3.O_DP_100', 'fromBAODP', 'toBAODP') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.O_DP_100', 'fromBAODP', 'toBAODP');
    }
    if(getMaxMinLogic($data, 'v3.Off_VAR', 'fromBAOSVAR', 'toBAOSVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.Off_VAR', 'fromBAOSVAR', 'toBAOSVAR');
    }
    if(getMaxMinLogic($data, 'v3.O_VAR_100', 'fromBAOVAR', 'toBAOVAR') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.O_VAR_100', 'fromBAOVAR', 'toBAOVAR');
    }
    if(getMaxMinLogic($data, 'v3.Real_Zedge', 'fromBAZedge', 'toBAZedge') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.Real_Zedge', 'fromBAZedge', 'toBAZedge');
    }
    if(getMaxMinLogic($data, ' v3.Total_OS', 'fromTotalOS', 'ToTotalOS') !== false){
        $filterArr[] = getMaxMinLogic($data, ' v3.Total_OS', 'fromTotalOS', 'ToTotalOS');
    }
    if(getMaxMinLogic($data, 'v3.OS_v2', 'fromOSV2', 'toOSV2') !== false){
        $filterArr[] = getMaxMinLogic($data, 'v3.OS_v2', 'fromOSV2', 'toOSV2');
    }

    // echo "<pre>";
    // print_r($filterArr);
    // exit;

    if(count($filterArr) > 0){
        return " WHERE 1 = 1 AND ".implode(" AND ", $filterArr);
    }else{
        return " WHERE 1 = 1 ";
    }
}

function zedge_bigquery_tabledata_function($atts){
    ob_start();
    
    extract( shortcode_atts( array(
        'bloodline' => 'Nakamoto,Szabo,Finney,Buterin',
    ), $atts ) );
 

    //echo "<pre>";
    //print_r($atts['bloodline']);
    //exit;


    $bigQuery = new BigQueryClient([
        'keyFile' => json_decode(file_get_contents(plugin_dir_path(__FILE__).'skbloodstock-34da2c174c49.json'), true)
    ]);

    //min and max value code
    $countQuery = $bigQuery->query('SELECT COUNT(*) totals FROM `skbloodstock.zedge.all_breeds_v3`');
    $countResults = $bigQuery->runQuery($countQuery);

    
    $page = 1;
    $limit = 25; // Note: If you change the limit here please change it at file /assets/bigquery/js/bigqueryajax.js
    $offset = 0;
    $totals = 0;
    
    $countQuery = $bigQuery->query('SELECT COUNT(*) totals FROM `skbloodstock.zedge.all_breeds_v3`');
    $countResults = $bigQuery->runQuery($countQuery);
    foreach ($countResults as $countRow) {
        $totals = $countRow['totals'];
    }

    $totalPages = $totals / $limit;

    $filterBloodLines = '';
   
    if(isset($atts['bloodline']) && $atts['bloodline'] != ''){  
        $bloodLines = explode(',', $atts['bloodline']);
        $filterBloodLines = " AND v3.Bloodline IN ('".implode("','", $bloodLines)."')";
    }else{
        $bloodLines = ['Nakamoto', 'Szabo', 'Finney', 'Buterin'];
    }

    $minMaxLogic = $bigQuery->query('SELECT min(v3.ID) minid,
     max(v3.ID) maxid,
     min(v3.Z) minz,  
     max(v3.Z) maxz,
     min(v3.race_count) minrc,
     max(v3.race_count) maxrc,
     min(v3.logic_eBA_100) mineba,
     max(v3.logic_eBA_100) maxeba,
     min(v3.logic_BA_100) minba,
     max(v3.logic_BA_100) maxba, 
     min(v3.wBA) minwba,
     max(v3.wBA) maxwba,
     min(v3.logic_DP_100) mindp,
     max(v3.logic_DP_100) maxdp,
     min(v3.wBA) minwba,
     max(v3.wBA) maxwba,
     min(v3.wDP) minwdp,
     max(v3.wDP) maxwdp,
     min(v3.logic_VAR_100) minvar,
     max(v3.logic_VAR_100) maxvar,
     min(v3.wVAR) minwvar,
     max(v3.wVAR) maxwvar,
     min(li.ListPrice) minsaleprice,
     max(li.ListPrice) maxsaleprice,
     min(st.mating_price) minstudprice,
     max(st.mating_price) maxstudprice,
     min(v3.MoVav) minmovav,
     max(v3.MoVav) maxmovav,
     min(v3.MoVmax) minmovmax,
     max(v3.MoVmax) maxmovmax,
     min(v3.Wins) minwins,
     max(v3.Wins) maxwins,
     min(v3.Win_pc) minwinpc,
     max(v3.Win_pc) maxwinpc,
     min(mother.ID) minmid,
     max(mother.ID) maxmid,
     min(v3.m_genotype) minmgenotype,
     max(v3.m_genotype) maxmgenotype,
     min(mother.M_BA) minmba,
     max(mother.M_BA) maxmba,
     min(v3.M_wBA) minmwba,
     max(v3.M_wBA) maxmwba,
     min(mother.M_DP) minmdp,
     max(mother.M_DP) maxmdp,
     min(v3.M_wDP) minmwdp,
     max(v3.M_wDP) maxmwdp,
     min(mother.M_VAR) minmvar,
     max(mother.M_VAR) maxmvar,
     min(mother.M_wVAR) minmwvar,
     max(mother.M_wVAR) maxmwvar,
     min(father.ID) minfid,
     max(father.ID) maxfid,
     min(v3.f_genotype) minfgenotype,
     max(v3.f_genotype) maxfgenotype,
     min(father.D_BA) minfba,
     max(father.D_BA) maxfba,
     min(v3.D_wBA) minfwba,
     max(v3.D_wBA) maxfwba,
     min(father.D_DP) minfdp,
     max(father.D_DP) maxfdp,
     min(v3.D_wDP) minfwdp,
     max(v3.D_wDP) maxfwdp,
     min(father.D_VAR) minfvar,
     max(father.D_VAR) maxfvar,
     min(father.D_wVAR) minfwvar,
     max(father.D_wVAR) maxfwvar,
     min(v3.O_zBA) minozba,
     max(v3.O_zBA) maxozba,
     min(v3.Off_BA) minoffba,
     max(v3.Off_BA) maxoffba,
     min(v3.O_eBA_100) minoeba100,
     max(v3.O_eBA_100) maxoeba100,
     min(v3.O_BA_100) minoba100,
     max(v3.O_BA_100) maxoba100,
     min(v3.O_zDP) minozdp,
     max(v3.O_zDP) maxozdp,
     min(v3.O_DP_100) minodp100,
     max(v3.O_DP_100) maxodp100,
     min(v3.O_eDP_100) minoedp100,
     max(v3.O_eDP_100) maxoedp100,
     min(v3.O_zVAR) minozvar,
     max(v3.O_zVAR) maxozvar,
     min(v3.Off_VAR) minoffvar,
     max(v3.Off_VAR) maxoffvar,
     min(v3.O_DP_100) minodp100, 
     max(v3.O_DP_100) maxodp100,
     min(v3.O_eVAR_100) minoevar100,
     max(v3.O_eVAR_100) maxoevar100,
     min(v3.O_VAR_100) minovar100,
     max(v3.O_VAR_100) maxovar100,
     min(v3.wZedge) minwzedge,
     max(v3.wZedge) maxwzedge,
     min(v3.Real_Zedge) minrealzedge,
     max(v3.Real_Zedge) maxrealzedge,
     min(v3.Total_OS) mintotalos,
     max(v3.Total_OS) maxtotalos,
     min(v3.OS_v2) minosv2,
     max(v3.OS_v2) maxosv2,
     min(v3.startingClassLevel) minstartingClassLevel,
     max(v3.startingClassLevel) maxstartingClassLevel,
     min(v3.evo) minevo,
     max(v3.evo) maxevo
    from `skbloodstock.zedge.all_breeds_v3` v3
    LEFT JOIN skbloodstock.zedge.hawku_listings as li on li.token_id = v3.id 
    LEFT JOIN skbloodstock.zedge.stud_test as st on st.horse_id = v3.id
    LEFT JOIN `skbloodstock.zedge.all_breeds_v3` as mother on mother.id = v3.mother
    LEFT JOIN `skbloodstock.zedge.all_breeds_v3` as father on father.id = v3.father
    LEFT JOIN `skbloodstock.zedge.offspring` as os on os.parent = v3.id');
    $minMaxResults = $bigQuery->runQuery($minMaxLogic);
    foreach ($minMaxResults as $countRow) {
        $minMax = $countRow;
    }

    // exit;
    if(isset($_POST['paged']) && $_POST['paged'] > 1){
        $page = $_POST['paged'];
        $offset = ($page - 1) * $limit;
    }

    $orderString = '';
    if(isset($_POST['orderBy']) && $_POST['orderBy'] != ''){
        $limit = $limit * $_POST['paged'];
        $orderBy = $_POST['orderBy'];
        $order = $_POST['order'];
        if($order != 'rand'){
            $orderString = 'order by v3.'.$orderBy.' '. $order;
        }
    }

    if(isset($_POST['zsort_by']) && !empty($_POST['zsort_by'])){
        $sorter = explode('|', $_POST['zsort_by']);
        $orderString = " order by ".$sorter[0]." ".$sorter[1];
    }

    $filterString = getFilterString($_POST);
    // echo $filterString;
    $sql = 'SELECT 
        v3.ID, 
        v3.name, 
        v3.Z, 
        v3.Bloodline,
        v3.Breed, 
        v3.Type,
        v3.stable_name,
        li.ListPrice salePrice,
        v3.race_count,
        v3.Win_pc,
        v3.logic_eBA_100,
        v3.logic_BA_100,
        v3.logic_DP_100,
        v3.logic_VAR_100,
        v3.distcount_1600,
        v3._16BA,
        v3.DPBA_100,
        v3.u1400_count,
        v3.SA,
        v3.o1800_count,
        v3.LA,
        v3.wF,
        v3.Type,
        v3._1_12_pc,
        mother.name as mother,
        v3.M_BA,
        v3.M_DP,
        v3.M_VAR,
        father.name as father,
        v3.D_BA,
        v3.D_DP,
        v3.D_VAR,
        v3.Paid_Win_pc,
        v3.Free_Win_pc,
        st.mating_price as studPrice,
        v3.distcount_1600,
        v3._1418_low_count,
        v3.DPBA_low_count,
        v3._16BA,
        v3._1418AB_100,
        v3.DPBA_100,
        v3.u1400_count,
        v3.o1800_count,
        v3.wZedge,
        v3.SA,
        v3.LA,
        v3.wF,
        v3.MoVav,
        v3.MoVmax,
        v3._1_12_pc,
        v3._10BA,
        v3._12BA,
        v3._14BA,
        v3._16BA,
        v3._18BA,
        v3._20BA,
        v3._22BA,
        v3._24BA,
        v3._26BA,
        v3.distcount_1000,
        v3.distcount_1200,
        v3.distcount_1400,
        v3.distcount_1600,
        v3.distcount_1800,
        v3.distcount_2000,
        v3.distcount_2200,
        v3.distcount_2400,
        v3.distcount_2600,
        v3.All3,
        v3.v2_horse,
        v3.breed_version,
        v3.m_genotype,
        v3.f_genotype,
        mother.name mother_name,
        mother.Z mother_z,
        mother.Bloodline mother_bloodline,
        mother.Breed mother_breed,
        mother.Type mother_type,
        mother.stable_name mother_stablename,
        mother.race_count m_race_count,
        mother.logic_eBA_100 m_logic_eBA_100,
        mother.Win_pc m_Win_pc,
        mother.M_BA mm_ba,
        mother.M_DP mm_dp,
        mother.M_VAR mm_var,
        mother.D_BA mf_ba,
        mother.D_DP mf_dp,
        mother.D_VAR mf_var,
        mother.ID m_id,
        mother.Real_Zedge m_real_Zedge,
        v3.M_BA mother_ba,
        v3.M_DP mother_dp,
        v3.M_VAR mother_var,
        father.name father_name,
        father.Z father_z,
        father.Bloodline father_bloodline,
        father.Breed father_breed,
        father.Type father_type,
        father.stable_name father_stablename,
        father.race_count f_race_count,
        father.logic_eBA_100 f_logic_eBA_100,
        father.Win_pc f_Win_pc,
        father.M_BA fm_ba,
        father.M_DP fm_dp,
        father.M_VAR fm_var,
        father.D_BA ff_ba,
        father.D_DP ff_dp,
        father.D_VAR ff_var,
        father.ID f_id,
        father.Real_Zedge f_real_Zedge,
        v3.D_BA father_ba,
        v3.D_DP father_dp,
        v3.D_VAR father_var,
        v3.wBA,
        v3.wDP,
        v3.wVAR,
        v3.Wins,
        v3.ability_1600,	
        v3.long_races,
        v3.short_races,
        v3.M_wBA,
        v3.M_wDP,
        v3.M_wVAR,
        v3.D_wBA,
        v3.D_wDP,
        v3.D_wVAR,
        v3.mother,
        v3.father,
        v3.Off_BA,
        v3.O_eBA_100,
        v3.O_zBA,
        v3.O_BA_100,
        v3.Off_DP,
        v3.O_eDP_100,
        v3.O_zDP,
        v3.O_DP_100,
        v3.Off_VAR,
        v3.O_eVAR_100,
        v3.O_zVAR,
        v3.O_VAR_100,
        v3.Real_Zedge,
        v3.decay_level,
        v3.Total_OS,
        v3.OS_v2,
        v3.unraced_horse,
        os.horse_id offsprings,
        v3.evo,
        v3.m_start_level,
        v3.f_start_level,
        v3.m_evo,  	
        v3.f_evo,
        v3.startingClassLevel
    FROM `skbloodstock.zedge.all_breeds_v3` as v3 
    LEFT JOIN skbloodstock.zedge.hawku_listings as li on li.token_id = v3.id 
    LEFT JOIN skbloodstock.zedge.stud_test as st on st.horse_id = v3.id
    LEFT JOIN `skbloodstock.zedge.all_breeds_v3` as mother on mother.id = v3.mother
    LEFT JOIN `skbloodstock.zedge.all_breeds_v3` as father on father.id = v3.father
    LEFT JOIN `skbloodstock.zedge.offspring` as os on os.parent = v3.id 
    '. $filterString .' '. $filterBloodLines .'
    '. $orderString .'
    LIMIT '.$limit.' OFFSET '.$offset;
    // exit;

    $queryJobConfig = $bigQuery->query($sql);
    $queryResults = $bigQuery->runQuery($queryJobConfig);
    
    if (defined('DOING_AJAX') && DOING_AJAX) {
        include dirname( __FILE__ ) . '/templates/horse/index.php';;
        exit;
    }else{
        include dirname( __FILE__ ) . '/templates/zedge_content_template.php';
    }
    return ob_get_clean();
}
add_shortcode('zedge_bigquery_tabledata', 'zedge_bigquery_tabledata_function');
add_action('wp_ajax_getMoreHorseInfo', 'zedge_bigquery_tabledata_function');
add_action('wp_ajax_nopriv_getMoreHorseInfo', 'zedge_bigquery_tabledata_function');

add_action('wp_ajax_getStablesBySearch', 'getStablesList');
add_action('wp_ajax_nopriv_getStablesBySearch', 'getStablesList');
function getStablesList(){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $limit = 50;
    $bigQuery = new BigQueryClient([
        'keyFile' => json_decode(file_get_contents(plugin_dir_path(__FILE__).'skbloodstock-34da2c174c49.json'), true)
    ]);
    $where[] = 'WHERE 1 = 1';
    $limitsql = ' LIMIT '.$limit.' ';
    $offset = '';
    if(isset($_GET['search']) && $_GET['search'] != ''){
        $where[] = "LOWER(stable_name) like '%".strtolower($_GET['search'])."%'";
    }

    $defaults = [];
    if($_GET['defaults'] != ''){
        $defaults = explode(',', $_GET['defaults']);
    }

    if(isset($_GET['page']) && intval($_GET['page']) > 1){
        $offsetCount = (intval($_GET['page']) - 1) * $limit;
        $offset = ' OFFSET '.$offsetCount;
    }

    $countQuery = 'SELECT DISTINCT(stable_name) stable, COUNT(ID) cnt from `skbloodstock.zedge.all_breeds_v3` '.implode(' AND ', $where).' and stable_name is not null group by stable_name order by stable_name asc';
    $countData = $bigQuery->query($countQuery);
    $counts = $bigQuery->runQuery($countData);
    $count = $counts->info()['totalRows'];

    // $sqlQuery = 'SELECT DISTINCT(stable_name) stable from `skbloodstock.zedge.all_breeds_v3` '.implode(' AND ', $where).' and stable_name is not null order by stable_name asc '.$limitsql.' '.$offset;

    $sqlQuery = 'SELECT DISTINCT(stable_name) stable, COUNT(ID) cnt from `skbloodstock.zedge.all_breeds_v3` '.implode(' AND ', $where).' and stable_name is not null group by stable_name order by stable_name asc';
    
    $stableData = $bigQuery->query($sqlQuery);
    $stables = $bigQuery->runQuery($stableData);
    
    $data = [];
    $html = '<ul class="stableSuggestion">';
    if(count($defaults) > 0){
        $html .= '<li class="chosenCount">' . count($defaults) . ' Selected</li>';
    }

    if($count == 0){
        $html .= '<li><div class="zstb-empty">Stable Data Not Found !</div></li>';
    }else{
    foreach($stables as $key => $stable){
        $data['results'][$key]['id'] = $stable['stable'];
        $data['results'][$key]['text'] = $stable['stable'];
        $selected = '';
        if(in_array($stable['stable'], $defaults)){
            $selected = 'checked';
        }
        $html .= '<li>
        <div class="zr">
          <div class="zc-auto zff-stb-checkbox">
            <input class="stableChoice keep" '.$selected.' type="checkbox" value="'.$stable['stable'].'" />
             </div>
             <div class="zc zff-stb-name">'.$stable['stable'].
            '</div>
            <div class="zc-auto zff-stb-qty">'. $stable['cnt'] .'</div>
</div>
    </li>';
    }
}
    $html .= '</ul>';
    $data['options'] = $html;
    $data['pagination']['more'] = true;
    $data['total_count'] = $count;
    wp_send_json($data); exit;
    // return $data;
}

function getClosestDecimalTraitVar($val){
    if($val == ''){
        return 'empty';
    }
    $val = intval($val);
    $val = abs($val);

    if($val <= 24 && $val >= 0){
        return 0;
    }else if($val <= 49 && $val >= 25){
        return 25;
    }else if($val <= 99 && $val >= 50){
        return 50;
    }else if($val >= 100){
        return 100;
    }     
}
function getClosestDecimalTrait($val){
    if($val == ''){
        return 'empty';
    }
    $val = intval($val);
    $val = abs($val);

    if($val <= 9 && $val >= 0){
        return 0;
    }else if($val <= 24 && $val >= 10){
        return 10;
    }else if($val <= 49 && $val >= 25){
        return 25;
    } else if($val >= 50){
        return 50;
    } 
}
function getClosestDecimal($val){
    if($val == ''){
        return 'empty';
    }

    /*if(intval($val) < 10 && intval($val) > 0){
        return 10;
    } */
    $val = intval($val);
    $val = abs($val);
    
    if($val <= 9 && $val >= 0){
        return 0;
    }else if($val <= 19 && $val >= 10){
        return 10;
    }else if($val <= 29 && $val >= 20){
        return 20;
    } else if($val <= 39 && $val >= 30){
        return 30;
    } else if($val <= 49 && $val >= 40){
        return 40;
    } else if($val <= 59 && $val >= 50){
        return 50;
    } else if($val <= 69 && $val >= 60){
        return 60;
    }else if($val <= 79 && $val >= 70){
        return 70;
    } else if($val <= 89 && $val >= 80){
        return 80;
    } else if($val >= 90){
        return 90;
    }    
   
}

function getdecaylevel($decay_level){

    if($decay_level!=0){ 
        return "class='tm-v-n'";
    }
}

function getHorseAbility($ability, $range,$race_count){
    ?>
<div class="zc">
  <div class="prm">
    <div class="prm-top"><strong><?= $ability ?></strong>
      <span><?php if($race_count){ echo '('.$race_count.')'; } ?></span>
    </div>
    <div data-ability="<?= $ability ?>" class="prm-pk mt-vl-<?= getClosestDecimal(intval($ability)) ?>"
      style="height:<?= $ability * 1.5 ?>px;"></div>
    <div class="prm-bottom"><?= $range * 100 ?></div>
  </div>
</div>
<?php
}
function nBetween($varToCheck, $high, $low) {
    if($varToCheck < $low) return false;
    if($varToCheck > $high) return false;
    return true;
    }
function getOffSprintHorses($horseIds){
    $bigQuery = new BigQueryClient([
        'keyFile' => json_decode(file_get_contents(plugin_dir_path(__FILE__).'skbloodstock-34da2c174c49.json'), true)
    ]);
    $queryJobConfig = $bigQuery->query('
        select 
            v3.*, 
            li.ListPrice salePrice, 
            (st.mating_price - v3.min_cover) as studPrice
        from skbloodstock.zedge.all_breeds_v3 v3 
        LEFT JOIN skbloodstock.zedge.hawku_listings as li on li.token_id = v3.id 
        LEFT JOIN skbloodstock.zedge.stud_test as st on st.horse_id = v3.id
        where ID in ('.$horseIds.') order by ID DESC');
    $queryResults = $bigQuery->runQuery($queryJobConfig);
    return $queryResults;
}

add_action('wp_ajax_getMoreHorseDetails', 'getMoreHorseDetails');
add_action('wp_ajax_nopriv_getMoreHorseDetails', 'getMoreHorseDetails');
function getMoreHorseDetails(){
    $bigQuery = new BigQueryClient([
        'keyFile' => json_decode(file_get_contents(plugin_dir_path(__FILE__).'skbloodstock-34da2c174c49.json'), true)
    ]);
    if(isset($_GET['horseId']) && $_GET['horseId'] != ''){ 

        $queryJobConfig = $bigQuery->query('SELECT 
            v3.ID, 
            v3.name, 
            v3.Z, 
            v3.Bloodline,
            v3.Breed,
            v3.stable_name,
            li.ListPrice salePrice,
            v3.race_count,
            v3.Win_pc,
            v3.logic_eBA_100,
            v3.logic_BA_100,
            v3.logic_DP_100,
            v3.logic_VAR_100,
            v3.distcount_1600,
            v3._16BA,
            v3.DPBA_100,
            v3.u1400_count,
            v3.SA,
            v3.o1800_count,
            v3.LA,
            v3.wF,
            v3._1_12_pc,
            mother.name as mother,
            v3.M_BA,
            v3.M_DP,
            v3.M_VAR,
            father.name as father,
            v3.D_BA,
            v3.D_DP,
            v3.D_VAR,
            v3.Paid_Win_pc,
            v3.Free_Win_pc,
            st.mating_price as studPrice,
            v3.distcount_1600,
            v3._1418_low_count,
            v3.DPBA_low_count,
            v3._16BA,
            v3._1418AB_100,
            v3.DPBA_100,
            v3.u1400_count,
            v3.o1800_count,
            v3.wZedge,
            v3.SA,
            v3.All3,
            v3.v2_horse,
            v3.breed_version,
            v3.LA,
            v3.wF,
            v3.MoVav,
            v3.MoVmax,
            v3._1_12_pc,
            v3._10BA,
            v3._12BA,
            v3._14BA,
            v3._16BA,
            v3._18BA,
            v3._20BA,
            v3._22BA,
            v3._24BA,
            v3._26BA,
            v3.distcount_1000,
            v3.distcount_1200,
            v3.distcount_1400,
            v3.distcount_1600,
            v3.distcount_1800,
            v3.distcount_2000,
            v3.distcount_2200,
            v3.distcount_2400,
            v3.distcount_2600,
            v3.m_genotype,
            v3.f_genotype,
            mother.name mother_name,
            mother.Z mother_z,
            mother.Bloodline mother_bloodline,
            mother.Breed mother_breed,
            mother.Type mother_type,
            mother.stable_name mother_stablename,
            mother.race_count m_race_count,
            mother.logic_eBA_100 m_logic_eBA_100,
            mother.Win_pc m_Win_pc,
            mother.M_BA mm_ba,
            mother.M_DP mm_dp,
            mother.M_VAR mm_var,
            mother.D_BA mf_ba,
            mother.D_DP mf_dp,
            mother.D_VAR mf_var,
            mother.ID m_id,
            mother.Real_Zedge m_real_Zedge,
            v3.M_BA mother_ba,
            v3.M_DP mother_dp,
            v3.M_VAR mother_var,
            father.name father_name,
            father.Z father_z,
            father.Bloodline father_bloodline,
            father.Breed father_breed,
            father.Type father_type,
            father.stable_name father_stablename,
            father.race_count f_race_count,
            father.logic_eBA_100 f_logic_eBA_100,
            father.Win_pc f_Win_pc,
            father.M_BA fm_ba,
            father.M_DP fm_dp,
            father.M_VAR fm_var,
            father.D_BA ff_ba,
            father.D_DP ff_dp,
            father.D_VAR ff_var,
            father.ID f_id,
            father.Real_Zedge f_real_Zedge,
            v3.D_BA father_ba,
            v3.D_DP father_dp,
            v3.D_VAR father_var,
            v3.wBA,
            v3.wDP,
            v3.wVAR,
            v3.Wins,
            v3.ability_1600,	
            v3.long_races,
            v3.short_races,
            v3.M_wBA,
            v3.M_wDP,
            v3.M_wVAR,
            v3.D_wBA,
            v3.D_wDP,
            v3.D_wVAR,
            v3.mother,
            v3.father,
            v3.Off_BA,
            v3.O_eBA_100,
            v3.O_zBA,
            v3.O_BA_100,
            v3.Off_DP,
            v3.O_eDP_100,
            v3.O_zDP,
            v3.O_DP_100,
            v3.Off_VAR,
            v3.O_eVAR_100,
            v3.O_zVAR,
            v3.O_VAR_100,
            v3.Real_Zedge,
            v3.decay_level,
            v3.Total_OS,
            v3.OS_v2,
            v3.unraced_horse,
            os.horse_id offsprings,
            v3.evo,
            v3.m_start_level,
            v3.f_start_level,
            v3.m_evo,  	
            v3.f_evo,
            v3.startingClassLevel,
            v3.e50_1000_pc,
            v3.e50_1200_pc,
            v3.e50_1400_pc,
            v3.e50_1600_pc,
            v3.e50_1800_pc,
            v3.e50_2000_pc,
            v3.e50_2200_pc,
            v3.e50_2400_pc,
            v3.e50_2600_pc,
            v3.e67_1000_pc,
            v3.e67_1200_pc,
            v3.e67_1400_pc,
            v3.e67_1600_pc,
            v3.e67_1800_pc,
            v3.e67_2000_pc,
            v3.e67_2200_pc,
            v3.e67_2400_pc,
            v3.e67_2600_pc,
            v3.e84_1000_pc,
            v3.e84_1200_pc,
            v3.e84_1400_pc,
            v3.e84_1600_pc,
            v3.e84_1800_pc,
            v3.e84_2000_pc,
            v3.e84_2200_pc,
            v3.e84_2400_pc,
            v3.e84_2600_pc
        FROM `skbloodstock.zedge.all_breeds_v3` as v3 
        LEFT JOIN skbloodstock.zedge.hawku_listings as li on li.token_id = v3.id 
        LEFT JOIN skbloodstock.zedge.stud_test as st on st.horse_id = v3.id
        LEFT JOIN `skbloodstock.zedge.all_breeds_v3` as mother on mother.id = v3.mother
        LEFT JOIN `skbloodstock.zedge.all_breeds_v3` as father on father.id = v3.father
        LEFT JOIN `skbloodstock.zedge.offspring` as os on os.parent = v3.id 
            WHERE v3.ID = '.$_GET['horseId']
        );
        $queryResults = $bigQuery->runQuery($queryJobConfig);
        $resData = [];
        
        foreach($queryResults as $row){
            // $resData = $row;
            // print_r($row);
            include dirname( __FILE__ ) . '/templates/horse/details.php'; 
        }

    }
    exit();
}
function is_decimal( $val )
{
    return is_numeric( $val ) && floor( $val ) != $val;
}
function findClosest($arr, $n, $target)
{
    // Corner cases
    if ($target <= $arr[0])
        return $arr[0];
    if ($target >= $arr[$n - 1])
        return $arr[$n - 1];
 
    // Doing binary search
    $i = 0;
    $j = $n;
    $mid = 0;
    while ($i < $j)
    {
        $mid = ($i + $j) / 2;
 
        if ($arr[$mid] == $target)
            return $arr[$mid];
 
        /* If target is less than array element,
            then search in left */
        if ($target < $arr[$mid])
        {
 
            // If target is greater than previous
            // to mid, return closest of two
            if ($mid > 0 && $target > $arr[$mid - 1])
                return getClosest($arr[$mid - 1],
                                  $arr[$mid], $target);
 
            /* Repeat for left half */
            $j = $mid;
        }
 
        // If target is greater than mid
        else
        {
            if ($mid < $n - 1 &&
                $target < $arr[$mid + 1])
                return getClosest($arr[$mid],
                                  $arr[$mid + 1], $target);
            // update i
            $i = $mid + 1;
        }
    }
 
    // Only single element left after search
    return $arr[$mid];
}
 
// Method to compare which one is the more close.
// We find the closest by taking the difference
// between the target and both values. It assumes
// that val2 is greater than val1 and target lies
// between these two.
function getClosest($val1, $val2, $target)
{
    if ($target - $val1 >= $val2 - $target)
        return $val2;
    else
        return $val1;
}
function width_count($eval,$startnum,$endnum,$increment){
    $numarray = array();
  for ($startnum; $startnum <= $endnum; $startnum += $increment) {
         
        if (is_decimal($startnum) ||  $increment == 5 || $startnum==0) {
           $numarray[] =  $startnum;
        } else {
            $numarray[] =  $startnum . ".0";
        }

    }

    $width = 100;
    $i = number_format($width / count($numarray),2);
    if($increment == 0.5 ){
       $f = $i/5;
    }else{
      $f = $i/10;
    }
   //return $numarray;
   if (in_array($eval, $numarray)){
     $index = array_search($eval, $numarray);
        $index += 1;
        $result = $index * $i;
        return $result."%";
   }else if($increment == 0.5){
        $n = $eval;
       $whole = floor($eval);  
       $fraction = explode('.', number_format($eval, 1))[1];
       if($fraction==8 || $fraction== 9){
         $eval = $whole.'.5';
       }
      $closest = findClosest($numarray, sizeof($numarray), $eval);
        if (in_array($closest, $numarray)) {
            $index = array_search($closest, $numarray);
            $index += 1;
            $fraction = $f * (explode('.', number_format($n, 1))[1]- explode('.', number_format($closest, 1))[1]);
            $result = ($index * $i) + $fraction;
            return $result."%";      
            //return   $fraction."% ".   $closest ." ". explode('.', number_format($closest, 1))[1];
        }
   }else if($increment == 5){
        $result = $eval;
    return  $result."%";
   }else{
        $whole = floor($eval); // 1
        if (in_array($whole, $numarray)) {
            $index = array_search($whole, $numarray);
            $index += 1;
            $fraction = $f * explode('.', number_format($eval, 1))[1];
            $result = ($index * $i) + $fraction;
           return $result."%";            
        }
   }   
}
function chart_status($eval,$arnumbers){ 
          $index =  array_search($eval,array_keys($arnumbers));
          if($index == 0){
             echo "ptv-high";
          }else if($index == 1){
             echo "ptv-mid";
          }else if($index == 2){
             echo "ptv-low";
         }
}
function zedge_bigquery_breed_calculator_function(){
    ob_start();
    $bigQuery = new BigQueryClient([
        'keyFile' => json_decode(file_get_contents(plugin_dir_path(__FILE__).'skbloodstock-34da2c174c49.json'), true)
    ]);
    $sql = 'SELECT 
        v3.ID, 
        v3.name, 
        v3.Z
    FROM `skbloodstock.zedge.all_breeds_v3` as v3 
    LEFT JOIN skbloodstock.zedge.hawku_listings as li on li.token_id = v3.id 
    LEFT JOIN skbloodstock.zedge.stud_test as st on st.horse_id = v3.id
    LEFT JOIN `skbloodstock.zedge.all_breeds_v3` as mother on mother.id = v3.mother
    LEFT JOIN `skbloodstock.zedge.all_breeds_v3` as father on father.id = v3.father
    LEFT JOIN `skbloodstock.zedge.offspring` as os on os.parent = v3.id';
    // exit;

    $queryJobConfig = $bigQuery->query($sql);
    $queryResults = $bigQuery->runQuery($queryJobConfig);
    
        include dirname( __FILE__ ) . '/templates/breed/index.php';;
        
    return ob_get_clean();
}
add_shortcode('zedge_bigquery_breed_calculator', 'zedge_bigquery_breed_calculator_function');