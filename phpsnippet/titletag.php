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
        include 'productmetav1.php';
      }
      if(in_array('search',$curLocationArr)) {
        $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='products';");
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
