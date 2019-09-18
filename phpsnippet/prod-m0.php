<?php
  //Product with only sub category1. m0 is not empty. This will list all s1.

  echo "<div class='group-container'>";
  echo "<div class='m-title'>";
    echo "<a href='".home_url()."/product'>PRODUCT HOME </a> >> ".stripslashes($cm0);
  echo "</div>";

  $prods1 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE m0 = '$cm0';");
  $descm0 = $wpdb->get_results("SELECT DISTINCT m0desc FROM wp_prodlegend WHERE m0 = '$cm0' AND m0desc IS NOT NULL;");

  $prods1j = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE jointcat = '$cm0';");
  $descm0j = $wpdb->get_results("SELECT DISTINCT m0desc FROM wp_prodlegend WHERE jointcat = '$cm0' AND m0desc IS NOT NULL;");

  // print_r($descm0);
  echo "<div class='prod-cat-desc'>";
  if(!empty($descm0[0]->m0desc)) {
    foreach($descm0 as $descm0i){
      echo "<p>".$descm0i->m0desc."</p>";
    }
    if(!empty($descm0j[0]->m0desc)) {
      foreach($descm0j as $descm0ji) {
        echo "<p>".$descm0ji->m0desc."</p>";
      }
    }
  }
  echo "</div>";

  echo "<div class='s1-box-background'>";
  echo "<div class='s1-box-flex-container'>";
  // print_r($prods1);
  if(!empty($prods1[0]->s1)) {
    //s1 is not empty. s1 category exits here.

    $counter = 0;

    foreach($prods1 as $prods1) {
      $qs1 = addslashes($prods1->s1);
      $img = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$qs1' AND cat1img IS NOT NULL;");
      $s2count = $wpdb->get_var("SELECT COUNT(DISTINCT s2) FROM wp_prodlegend WHERE m0='$cm0' AND s1 = '$qs1';");
      if(!$s2count){
        $item_check = $wpdb->get_results("SELECT DISTINCT item FROM wp_prod0 WHERE m0='$cm0' AND s1='$qs1';");
      } else {
        $item_check = null;
      }
      // echo $s2count;
      // print_r(sizeof($img));
      if(count($item_check)==1){
        echo "<a href='../item/?id=".urlencode($item_check[0]->item)."&m0=".urlencode($cm0)."&s1=".urlencode($prods1->s1)."' class='s1-box'>";
      } else {
        echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($prods1->s1)."' class='s1-box'>";
      }
      echo "<div class='item-img'>";
      if ($img[0]->cat1img=='' || $img[0]->cat1img==' ' ) {
        echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
      } else {
        echo "<img src='".$img[0]->cat1img."'>";
      };
      // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
      echo "</div>";
      echo "<div class='s1-cat'>".$prods1->s1."</div>";
      echo "</a>";
      $counter++;
    }

    if(!empty($prods1j[0]->s1)) {   //start jointcat.

      foreach($prods1j as $prods1j) {
        $qs1j = addslashes($prods1j->s1);
        $imgj = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE jointcat='$cm0' AND s1 = '$qs1j' AND cat1img IS NOT NULL;");
        $s2countj = $wpdb->get_var("SELECT COUNT(DISTINCT s2) FROM wp_prodlegend WHERE jointcat='$cm0' AND s1 = '$qs1j';");
        if(!$s2countj){
          $itemj_check = $wpdb->get_results("SELECT DISTINCT item FROM wp_prod0 WHERE jointcat='$cm0' AND s1='$qs1j';");
        } else {
          $itemj_check = null;
        }
        if(count($itemj_check)==1){
          echo "<a href='../item/?id=".urlencode($itemj_check[0]->item)."&m0=".urlencode($cm0)."&s1=".urlencode($prods1j->s1)."&jc=".urlencode($cm0)."' class='s1-box'>";
        } else {
          echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($prods1j->s1)."&jc=".urlencode($cm0)."' class='s1-box'>";
        }
        echo "<div class='item-img'>";
        if ($imgj[0]->cat1img=='' || $imgj[0]->cat1img==' ' ) {
          echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
        } else {
          echo "<img src='".$imgj[0]->cat1img."'>";
        };
        // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
        echo "</div>";
        echo "<div class='s1-cat'>".$prods1j->s1."</div>";
        echo "</a>";
        $counter++;
      }
    } // end jointcat.

    for($k=$counter; $k%4!=0; $k++){
      echo "<a class='s1-box s1-box-filler'></a>";
    }
  } else {
    //s1 category is empty. display graph.
    $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$cm0';");
    $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0 = '$cm0';");
    $item_certdb = $wpdb->get_results("SELECT * FROM wp_cert;");
    $itemcount = count($catitems);

    include 'prod-itemtable.php';

  }
  echo "</div>";	// end s1-box-flex-container
  echo "</div>";	// end s1-box-background

    // $mPos++;
  echo "</div>";  //end group-container div;



?>
