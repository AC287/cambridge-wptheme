<?php

  /*
    NOTES:
      This is a manual input.
      If new page or section is added, you will need to enter manually append below switch/case statement.
      Then update cammetadesc spreadsheet.
  */

  // print_r($curLocationArr);
  global $wp_query, $wpdb;

  // switch ($curLocationArr) {

  switch (true) {
    case (empty($curLocationArr)):
      //GET HOME TITLE & META DESC TAG for live site.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='home';");
      echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('products',$curLocationArr) || in_array('search',$curLocationArr)):

      if(in_array('products',$curLocationArr)) {
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
      }
      if(in_array('search',$curLocationArr)) {
        echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
        echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
      }
    break;

    case (in_array('about', $curLocationArr)):
      //GET ABOUT TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='about';");
      echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('team', $curLocationArr)):
      //GET TEAM TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='team';");
      echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('brands', $curLocationArr)):
      //GET TEAM TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='brands';");
      echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('career', $curLocationArr)):
      //GET TEAM TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='career';");
      echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('contact', $curLocationArr)):
      //GET TEAM TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='contact';");
      echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('tradeshows', $curLocationArr)):
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='tradeshows';");
      echo "<title>".$metatitleDB[0]->title." | Cambridge Resources</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    default:
    $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='home';");
    echo "<title>Cambridge Resources</title>";
    echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;
  }
?>
