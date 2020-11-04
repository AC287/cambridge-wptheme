<?php

  //This is the display php insert for s2 category.
  //Product with only sub category3. m0, s1, and s2 are not empty. This will list all s3 inside given s2.

  echo "<div class='group-container'>";

  $prods3 = $wpdb->get_results("SELECT DISTINCT m0,m0desc,s1,s1desc,s2,s2desc,s3,s3desc FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qurl2';");

  echo "<div class='m-title'>";
  echo "<a href='".home_url()."/products'>PRODUCT HOME </a> >> ";
  echo "<a href='".home_url()."/products/".$qurl0."'>".$prods3[0]->m0desc."</a> >> ";
  echo "<a href='".home_url()."/products/".$qurl0."/".$qurl1."'>".$prods3[0]->s1desc."</a> >> ".$prods3[0]->s2desc;
  echo "</div>";

  // print_r($prods3);
  // $descs2 = $wpdb->get_results("SELECT DISTINCT s2desc FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$cs2' AND s2desc IS NOT NULL;");
  // print_r($descs2);
  // if(!empty($descs2[0]->s2desc)) {
  //   echo "<div class='prod-cat-desc'>";
  //     echo "<p>".$descs2[0]->s2desc."</p>";
  //   echo "</div>";
  // }
  echo "<div class='s1-box-background'>";
  echo "<div class='s1-box-flex-container'>";

  if(!empty($prods3[0]->s3)) {
    $counter = 0;
    foreach($prods3 as $prods3) {
      // print_r($prods3);
      $qs3 = addslashes($prods3->s3);
      // print_r($qs3);
      // echo $cm0.$cs1.$cs2;
      $img = $wpdb->get_results("SELECT DISTINCT cat3img FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qurl2' AND s3 = '$qurl3' AND cat3img IS NOT NULL;");

      // print_r($img);

      $item_check = $wpdb->get_results("SELECT DISTINCT item0,item FROM wp_prod0 WHERE m0='$qurl0' AND s1='$qurl1' AND s2 = '$qurl2' AND s3 = '$qurl3';");

      // print_r(sizeof($img));
      // print_r($img);
      if(count($item_check)==1) {
        // echo "<a href='../item/?id=".urlencode($item_check[0]->item)."&m0=".urlencode(stripslashes($cm0))."&s1=".urlencode(stripslashes($cs1))."&s2=".urlencode(stripslashes($cs2))."&s3=".urlencode($prods3->s3)."' class='s1-box'>";
        echo "<a href='".home_url()."/products/".$qurl0."/".$qurl1."/".$qurl2."/".$qs3."/".$item_check[0]->item0."' class='s1-box'>";

      } else {
        // echo $cs2;
        // echo $prods3->s3;
        // echo "<a href='../categories/?m0=".urlencode(stripslashes($cm0))."&s1=".urlencode(stripslashes($cs1))."&s2=".urlencode(stripslashes($cs2))."&s3=".urlencode($prods3->s3)."' class='s1-box'>";
        echo "<a href='".home_url()."/products/".$qurl0."/".$qurl1."/".$qurl2."/".$qs3."' class='s1-box'>";

      }
      echo "<div class='item-img'>";
      if ($img[0]->cat3img==' ' || $img[0]->cat3img=='') {
        echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
      } else {
        echo "<img src='".$img[0]->cat3img."'>";
      };

      echo "</div>";
      echo "<div class='s1-cat'>".$prods3->s3desc."</div>";
      echo "</a>";
      $counter++;
    }
    for($k=$counter; $k%4!=0; $k++){
      echo "<a class='s1-box s1-box-filler'></a>";
    }
  } else {
    // s3 is empty.

    $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qurl2';");
    $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qurl2';");
    $item_certdb = $wpdb->get_results("SELECT * FROM wp_cert;");
    $itemcount = count($catitems);

    include 'productchain-table.php';

  }


  echo "</div>";	// end s1-box-flex-container
  echo "</div>";	// end s1-box-background
  // $mPos++;
  echo "</div>";  //end group-container div;



?>
