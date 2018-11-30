<?php
  // PROD-S1.php
  //Product with only sub category2. m0 and s1 are not empty. This will list all s2 inside given s1.

  echo "<div class='group-container'>";
  echo "<div class='m-title'>";
    echo "<a href='".home_url()."/product'>PRODUCT HOME </a> >> <a href='../categories/?m0=".urlencode($cm0)."'>".stripslashes($cm0)."</a> >> ".stripslashes($cs1);
  echo "</div>";

  $prods2 = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1';");
  // print_r($prods2);
  $descs1 = $wpdb->get_results("SELECT DISTINCT s1desc FROM wp_prodlegend WHERE m0 = '$cm0' AND s1= '$cs1' AND s1desc IS NOT NULL;");
  // print_r($descs1);
  if(!empty($descs1[0]->s1desc)) {
    echo "<div class='prod-cat-desc'>";
      echo "<p>".$descs1[0]->s1desc."</p>";
    echo "</div>";
  }
  echo "<div class='s1-box-background'>";
  echo "<div class='s1-box-flex-container'>";
  if(!empty($prods2[0]->s2)) {
    $counter = 0;
    foreach($prods2 as $prods2) {
      $qs2 = addslashes($prods2->s2);
      $img = $wpdb->get_results("SELECT DISTINCT cat2img FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1' AND s2 = '$qs2' AND cat2img IS NOT NULL;");

      $item_check = $wpdb->get_results("SELECT DISTINCT item FROM wp_prod0 WHERE m0='$cm0' AND s1='$cs1' AND s2 = '$qs2';");

      // print_r(sizeof($img));
      // print_r($img);
      if(count($item_check)==1) {
        echo "<a href='../item/?id=".urlencode($item_check[0]->item)."&m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($prods2->s2)."' class='s1-box'>";
      } else {
        echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($prods2->s2)."' class='s1-box'>";
      }
      echo "<div class='item-img'>";
      if ($img[0]->cat2img==' ' || $img[0]->cat2img=='') {
        echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
      } else {
        echo "<img src='".$img[0]->cat2img."'>";
      };
      // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
      echo "</div>";
      echo "<div class='s1-cat'>".$prods2->s2."</div>";
      echo "</a>";
      $counter++;
    }
    for($k=$counter; $k%4!=0; $k++){
      echo "<a class='s1-box s1-box-filler'></a>";
    }
  } else {
    //s2 is empty. This should display item thumb or item table.
    $item_certdb = $wpdb->get_results("SELECT * FROM wp_cert;");

    // $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1';");
    // $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0 = '$cm0' AND s1 = '$cs1';");
    $jclv = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$cm0' OR jointcat='$cs1';");
    // $jcls1 = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$cs1';");
    $jclvm0 = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$cm0' AND s1='$cs1';"); //joint is m0.
    $jclvs1 = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$cs1';"); //joint is s1.
    // print_r($jointcatlegend);
    // print_r($jointcatdata);

    if(!empty($jclvm0)){
      $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE jointcat='$cm0' AND s1='$cs1';");
      $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$cm0' AND s1='$cs1';");
    }
    if(!empty($jclvs1)){
      // echo "joint is equal s1 cat.";
      $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1';");
      $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0='$cm0' AND s1='$cs1';");
      $jcdv = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE jointcat='$cs1';");
      $catitems = array_merge($catitems,$jcdv);
    }
    if(empty($jclvm0) AND empty($jclvs1)){
      // echo "joint is empty.";
      $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1';");
      $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0 = '$cm0' AND s1 = '$cs1';");
    }

/*
    // if($cm0=='Tools') {
    if((!empty($jcls1)) && ($jcls1[0]->m0 != $cm0)) {
      // This is special case for tools. "MIGHT" or "MIGHT NOT" cause bug......
      // $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE s1 = '$cs1';");
      // $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE s1 = '$cs1';");
      $catlegend = $jcls1;

      $catitems1 = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0='$cm0' AND s1 = '$cs1';");
      $jcds1 = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE jointcat='$cs1';");

      $catitems = array_merge($catitems1,$jcds1);

      // print_r($catitems);
    } else {
      $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$cs1';");
      $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0 = '$cm0' AND s1 = '$cs1';");
    }
*/

    $itemcount = count($catitems);
    include 'prod-itemtable.php';


    // echo "Only s1 for this category. This is rough. need to display table here.";
    // display item table here...
  }
  echo "</div>";	// end s1-box-flex-container
  echo "</div>";	// end s1-box-background
  // $mPos++;
  echo "</div>";  //end group-container div;



?>
