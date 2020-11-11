<?php

switch (@count($curLocationArr)) {
  case 1:
    $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='products';");
    echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
    echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
  break;
  default:
    $url0meta = $curLocationArr[1];
    $metatitlem0 = $wpdb->get_results("SELECT DISTINCT m0desc from wp_prodlegend WHERE m0='$url0meta';");
    $metatitlem0 = $metatitlem0[0]->m0desc." ";

    $url1meta = $curLocationArr[2];
    if(!empty($url1meta)){
      $metatitles1=$wpdb->get_results("SELECT DISTINCT s1desc from wp_prodlegend WHERE s1='$url1meta';");
      if(empty($metatitles1)) {
        $metatitles1=$wpdb->get_results("SELECT DISTINCT item from wp_prod0 WHERE item0='$url1meta';");
        $metatitles1 = $metatitles1[0]->item." ";
      } else {
        $metatitles1=$metatitles1[0]->s1desc." ";
      }
    }

    $url2meta = $curLocationArr[3];
    if(!empty($url2meta)){
      $metatitles2=$wpdb->get_results("SELECT DISTINCT s2desc from wp_prodlegend WHERE s2='$url2meta';");
      if(empty($metatitles2)) {
        $metatitles2=$wpdb->get_results("SELECT DISTINCT item from wp_prod0 WHERE item0='$url2meta';");
        $metatitles2 = $metatitles2[0]->item." ";
      } else {
        $metatitles2=$metatitles2[0]->s2desc." ";
      }
    }

    $url3meta = $curLocationArr[4];
    if(!empty($url3meta)){
      $metatitles3=$wpdb->get_results("SELECT DISTINCT s3desc from wp_prodlegend WHERE s3='$url3meta';");
      if(empty($metatitles3)) {
        $metatitles3=$wpdb->get_results("SELECT DISTINCT item from wp_prod0 WHERE item0='$url3meta';");
        $metatitles3 = $metatitles3[0]->item." ";
      } else {
        $metatitles3=$metatitles3[0]->s3desc." ";
      }
    }

    $url4meta = $curLocationArr[5];
    if(!empty($url4meta)){
      $metatitles4=$wpdb->get_results("SELECT DISTINCT item from wp_prod0 WHERE item0='$url4meta';");

      $metatitles4=$metatitles4[0]->item." ";
    }


    echo "<title>".$metatitlem0.$metatitles1.$metatitles2.$metatitles3.$metatitles4."| Cambridge Resources</title>";
    echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";

  break;
}

 ?>
