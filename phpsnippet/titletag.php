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
      echo "<title>Cambridge | ".$metatitleDB[0]->title."</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('products',$curLocationArr) || in_array('search',$curLocationArr)):
      //GET PRODUCTS TITLE & META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='products';");
      switch ($curLocationArr) {

        case (((count($curLocationArr) <=2) && (in_array('products',$curLocationArr))) || (in_array('search',$curLocationArr))):
          echo "<title>Cambridge | ".$metatitleDB[0]->title."</title>";
        break;

        case (in_array('categories', $curLocationArr)):
          $m0 = $wp_query->query_vars['m0'];
          echo "<title>Cambridge | ".$m0."</title>";
        break;

        case (in_array('item',$curLocationArr)):
          $item = $wp_query->query_vars['id'];
          echo "<title>Cambridge | ".$id."</title>";
        break;

        case (in_array('catalogs', $curLocationArr)):
          echo "<title>Cambridge | Catalogs</title>";
        break;

      }
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('about', $curLocationArr)):
      //GET ABOUT TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='about';");
      echo "<title>Cambridge | ".$metatitleDB[0]->title."</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('team', $curLocationArr)):
      //GET TEAM TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='team';");
      echo "<title>Cambridge | ".$metatitleDB[0]->title."</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('brands', $curLocationArr)):
      //GET TEAM TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='brands';");
      echo "<title>Cambridge | ".$metatitleDB[0]->title."</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('career', $curLocationArr)):
      //GET TEAM TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='career';");
      echo "<title>Cambridge | ".$metatitleDB[0]->title."</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('contact', $curLocationArr)):
      //GET TEAM TITLE AND META DESC TAG.
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='contact';");
      echo "<title>Cambridge | ".$metatitleDB[0]->title."</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case (in_array('tradeshows', $curLocationArr)):
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='tradeshows';");
      echo "<title>Cambridge | ".$metatitleDB[0]->title."</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    case(count($curLocationArr)==3 && (gettype($curLocationArr[0])=='integer' && gettype($curLocationArr[1]=='integer'))):
      $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='tradeshows';");
      echo "<title>Cambridge | ".$metatitleDB[0]->title."</title>";
      echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;

    default:
    $metatitleDB = $wpdb->get_results("SELECT * FROM wp_cammetadesc WHERE page='home';");
    echo "<title>Cambridge Resources</title>";
    echo "<meta name='description' content='".htmlspecialchars($metatitleDB[0]->metadesc,ENT_QUOTES)."'>";
    break;
  }
?>
