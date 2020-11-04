<?php
  //This is the display php insert for s2 category.
  //Product with only sub category3. m0, s1, and s2 are not empty. This will list all s3 inside given s2.
  // echo $cs2;
  echo "<div class='group-container'>";

  $prods3 = $wpdb->get_results("SELECT DISTINCT m0,m0desc,s1,s1desc,s2,s2desc,s3,s3desc FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qurl2' AND s3 = '$qurl3';");

  echo "<div class='m-title'>";
    echo "<a href='".home_url()."/products'>PRODUCT HOME </a> >> <a href='".home_url()."/products/".$qurl0."'>".$prods3[0]->m0desc."</a> >> ";
    echo "<a href='".home_url()."/products/".$qurl0."/".$qurl1."'>".$prods3[0]->s1desc."</a> >> ";
    echo "<a href='".home_url()."/products/".$qurl0."/".$qurl1."/".$qurl2."/'>".$prods3[0]->s2desc."</a> >> ".$prods3[0]->s3desc;
  echo "</div>";

  // print_r($prods3);
  // $descs3 = $wpdb->get_results("SELECT DISTINCT s2desc FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s2desc IS NOT NULL;");
  // print_r($descs2);
  // if(!empty($descs3[0]->s3desc)) {
  //   echo "<div class='prod-cat-desc'>";
  //     echo "<p>".$descs3[0]->s3desc."</p>";
  //   echo "</div>";
  // }
  echo "<div class='s1-box-background'>";
  echo "<div class='s1-box-flex-container'>";

  $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qurl2' AND s3 = '$qurl3';");
  $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qurl2' AND s3 = '$qurl3';");
  $item_certdb = $wpdb->get_results("SELECT * FROM wp_cert;");
  $itemcount = count($catitems);

  include 'productchain-table.php';

  echo "</div>";	// end s1-box-flex-container
  echo "</div>";	// end s1-box-background
  // $mPos++;
  echo "</div>";  //end group-container div;



?>
