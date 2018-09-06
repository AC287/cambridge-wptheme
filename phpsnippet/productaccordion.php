<?php

  global $wpdb;
  // $test_cat = $wpdb->get_results("SELECT * From wp_prodlegend;");
  // print_r(array_unique($test_cat->m0));
  // print_r($test_cat);

  //  https://stackoverflow.com/questions/4742903/php-find-entry-by-object-property-from-a-array-of-objects/4742925


  $main_category = $wpdb->get_results("SELECT DISTINCT m0 From wp_prodlegend;");
  echo "<h4 class='productaccordion-maintitle-container'>";
    echo "<a class='productaccordion-maintitle' href='".home_url()."/products'>PRODUCT CATEGORIES</a>";
    echo "<div class='productaccordion-mobilemenu'>";
      echo "<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>";
    echo "</div>";
  echo "</h4>";
  echo "<div class='productaccordion-content-container'>";
  foreach ($main_category as $each_mc) {
    $s1_category = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE m0 = '$each_mc->m0';");
    $m0class = $each_mc->m0;
    $m0class = preg_replace("/[^a-zA-Z0-9]/","",$m0class);
    if(!empty($s1_category[0]->s1)) {
      //This is m0
      echo "<div class='custaccordion m0-$m0class'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'>";
      echo "<a class='custaccordion-m0a' href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."'>".$each_mc->m0."</a>";
      echo "</div>";
      echo "<div class='custpanel m0i-$m0class'>";
      foreach ($s1_category as $each_s1) {
        $s1class = $each_s1->s1;
        $s1class = preg_replace("/[^a-zA-Z0-9]/","",$s1class);
        //s1 is not empty > get s2.
        $s2_category = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
        if(!empty($s2_category[0]->s2)){
          // s2 is not empty
          echo "<div class='custaccordion s1-$s1class'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'>";
          echo "<a class='custaccordion-s1a' href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."'>".$each_s1->s1."</a></div>";
          echo "<div class='custpanel s1i-$s1class'>";
          foreach($s2_category as $each_s2) {
            $s2class = $each_s2->s2;
            $s2class = preg_replace("/[^a-zA-Z0-9]/","",$s2class);
            //s2 is not empty > get s3.
            $s3_category = $wpdb->get_results("SELECT DISTINCT s3 FROM wp_prodlegend WHERE s2 = '$each_s2->s2' AND s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
            if(!empty($s3_category[0]->s3)) {
              echo "<div class='custaccordion s2-$s2class'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'>";
              echo "<a class='custaccordion-s2a' href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."'>".$each_s2->s2."</a></div>";
              echo "<div class='custpanel s2i-$s2class'>";
              foreach($s3_category as $each_s3) {
                $s3class = $each_s3->s3;
                $s3class = preg_replace("/[^a-zA-Z0-9]/","",$s3class);
                //s3 is not empty > get s4.
                echo "<div class='custaccordion no-sub s3-$s3class'><a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."&s3=".urlencode($each_s3->s3)."'>".$each_s3->s3."</a></div>";
              } // end foreach for s3 cat.
              echo "</div>";  // end panel
            } else {
              // s3 is empty
              echo "<div class='custaccordion no-sub s2-$s2class'><a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."'>".$each_s2->s2."</a></div>";
            }
          }
          echo "</div>";  // end panel
        } else {
          // s2 is empty
          echo "<div class='custaccordion no-sub s1-$s1class'><a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."'>".$each_s1->s1."</a></div>";
        }
      }
      echo "</div>";  // end panel
    } else {
      // s1 is empty
      echo "<div class='custaccordion m0-$m0class'><a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."'>".$each_mc->m0."</a></div>";
    }
  }
  echo "</div>";

?>
