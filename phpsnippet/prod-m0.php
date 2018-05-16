<?php
  //Product with only sub category1. m0 is not empty. This will list all s1.

  echo "<div class='group-container'>";
  echo "<div class='m-title'>";
    echo "<a href='".home_url()."/product'>PRODUCT HOME </a> >> ".stripslashes($cm0);
  echo "</div>";

  $prods1 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE m0 = '$cm0';");
  $descm0 = $wpdb->get_results("SELECT DISTINCT m0desc FROM wp_prodlegend WHERE m0 = '$cm0' AND m0desc IS NOT NULL;");
  // print_r($descm0);
  if(!empty($descm0[0]->m0desc)) {
    echo "<div class='prod-cat-desc'>";
      echo "<p>".$descm0[0]->m0desc."</p>";
    echo "</div>";
  }
  // print_r($prods1);
  if(!empty($prods1[0]->s1)) {
    echo "<div class='s1-box-background'>";
    echo "<div class='s1-box-flex-container'>";
    $counter = 0;
    foreach($prods1 as $prods1) {
      $qs1 = addslashes($prods1->s1);
      $img = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE m0 = '$cm0' AND s1 = '$qs1' AND cat1img IS NOT NULL;");
      // print_r(sizeof($img));
      echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($prods1->s1)."' class='s1-box'>";
      echo "<div class='item-img'>";
      if ($img[0]->cat1img=='' || $img[0]->cat1img==' ' ) {
        echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
      } else {
        echo "<img src='".$img[0]->cat1img."'>";
      };
      // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
      echo "</div>";
      echo "<div class='s1-cat'>".$prods1->s1."</div>";
      echo "</a>";
      $counter++;
    }
    for($k=$counter; $k%4!=0; $k++){
      echo "<a class='s1-box s1-box-filler'></a>";
    }
    echo "</div>";	// end s1-box-flex-container
    echo "</div>";	// end s1-box-background
    }
    // $mPos++;
    echo "</div>";  //end group-container div;



?>
