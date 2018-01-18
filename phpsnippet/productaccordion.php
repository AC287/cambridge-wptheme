<?php

  global $wpdb;

  $main_category = $wpdb->get_results("SELECT DISTINCT m0 From wp_prodlegend;");
  echo "<h4><a href='".home_url()."/products'>PRODUCT CATEGORIES</a></h4>";
  foreach ($main_category as $each_mc) {
    $s1_category = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE m0 = '$each_mc->m0';");

    if(!empty($s1_category[0]->s1)) {
      //s1 is not empty.
      echo "<div class='custaccordion'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'>&nbsp".$each_mc->m0."</div>";
      echo "<div class='custpanel'>";
      foreach ($s1_category as $each_s1) {
        $s2_category = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE s1 = '$each_s1->s1';");
        if(!empty($s2_category[0]->s2)){
          // s2 is not empty
          echo "<div class='custaccordion'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'>&nbsp".$each_s1->s1."</div>";
          echo "<div class='custpanel'>";
          foreach($s2_category as $each_s2) {
            echo "<div class='custaccordion no-sub'><a class='no-sub' href='".home_url()."/products/ps2/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."'>".$each_s2->s2."</a></div>";
          }
          echo "</div>";  // end panel
        } else {
          // s2 is empty
          echo "<div class='custaccordion'><a class='no-sub' href='".home_url()."/products/ps2/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."'>".$each_s1->s1."</a></div>";
        }
      }
      echo "</div>";  // end panel
    } else {
      // s1 is empty
      echo "<div class='custaccordion'><a href='".home_url()."/products/pm0/?m0=".urlencode($each_mc->m0)."'>".$each_mc->m0."</a></div>";
    }
  }

?>
