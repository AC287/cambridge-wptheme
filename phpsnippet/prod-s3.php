<?php
  //Product with only sub category3. m0, s1, and s2 are not empty. This will list all s3 inside given s2.
  // echo $cs2;
  echo "<div class='group-container'>";
  echo "<div class='m-title'>";
    echo "<a href='".home_url()."/product'>PRODUCT HOME </a> >> <a href='../categories/?m0=".urlencode($cm0)."'>".stripslashes($cm0)."</a> >> ";
    echo "<a href='../categories/?m0=".urlencode(stripslashes($cm0))."&s1=".urlencode(stripslashes($cs1))."'>".stripslashes($cs1)."</a> >> ";
    echo "<a href='../categories/?m0=".urlencode(stripslashes($cm0))."&s1=".urlencode(stripslashes($cs1))."&s2=".urlencode(stripslashes($cs2))."'>".stripslashes($cs2)."</a> >> ".stripslashes($cs3);
  echo "</div>";

  // $prods3 = $wpdb->get_results("SELECT DISTINCT s3 FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2';");
  // print_r($prods3);
  // $descs3 = $wpdb->get_results("SELECT DISTINCT s2desc FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s2desc IS NOT NULL;");
  // print_r($descs2);
  if(!empty($descs3[0]->s3desc)) {
    echo "<div class='prod-cat-desc'>";
      echo "<p>".$descs3[0]->s3desc."</p>";
    echo "</div>";
  }
  echo "<div class='s1-box-background'>";
  echo "<div class='s1-box-flex-container'>";

  $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$cs3';");
  $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s3 = '$cs3';");
  $item_certdb = $wpdb->get_results("SELECT * FROM wp_cert;");
  $itemcount = count($catitems);

  include 'prod-itemtable.php';

  echo "</div>";	// end s1-box-flex-container
  echo "</div>";	// end s1-box-background
  // $mPos++;
  echo "</div>";  //end group-container div;



?>
