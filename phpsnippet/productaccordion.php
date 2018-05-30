<?php

  global $wpdb;
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

        echo "<div class='custaccordion m0-$m0class'>";
          echo "<img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'>";
          echo "<a class='custaccordion-m0a' href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."'>".$each_mc->m0."</a>";
        echo "</div>";
        echo "<div class='custpanel m0i-$m0class'>";

        if($each_mc->m0 == 'Tools') {
          // echo "Tools category.";
          $tools_cats1 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE s1 LIKE '%tools%';");
          foreach($tools_cats1 as $tools_cats1i) {
            $tools_cats1iclass = $tools_cats1i->s1;
            $tools_cats1iclass = preg_replace("/[^a-zA-Z0-9]/","",$tools_cats1iclass);
            echo "<div class='custaccordion no-sub s1-$tools_cats1iclass'>";
            // $tools_s2_check = $wpdb->get_var("SELECT COUNT(DISTINCT s2) FROM wp_prodlegend WHERE s1='$tools_cats1i->s1';");
            // if(!$tools_s2_check){
            //   $tools_item_check = $wpdb->get_results("SELECT DISTINCT item FROM wp_prod0 WHERE s1='$tools_cats1i->s1';");
            // }
            // if(count($tools_item_check)==1){
            //   echo "<a href='".home_url()."/products/item/?id=".urlencode($tools_item_check[0]->item)."&m0=".urlencode($each_mc->m0)."&s1=".urlencode($tools_cats1i->s1)."'>".$tools_cats1i->s1."</a>";
            // } else {
            // }
            echo "<a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($tools_cats1i->s1)."'>".$tools_cats1i->s1."</a>";
            echo "</div>";
          }
        } // end if m0 == tools.
        else {

          foreach ($s1_category as $each_s1) {
            // $s1class = str_replace(' ','',$each_s1->s1);
            // $s1class = str_replace('"','',$s1class);
            // $s1class = str_replace('/','',$s1class);
            // $s1class = str_replace("'","",$s1class);
            $s1class = $each_s1->s1;
            $s1class = preg_replace("/[^a-zA-Z0-9]/","",$s1class);
            //s1 is not empty.
            $s2_category = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
            if(!empty($s2_category[0]->s2)){
              // s2 is not empty
              echo "<div class='custaccordion s1-$s1class'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'><a class='custaccordion-s1a' href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."'>".$each_s1->s1."</div>";
              echo "<div class='custpanel s1i-$s1class'>";
              foreach($s2_category as $each_s2) {
                $s2class = $each_s2->s2;
                $s2class = preg_replace("/[^a-zA-Z0-9]/","",$s2class);
                // $s2_item = $wpdb->get_results("SELECT DISTINCT item FROM wp_prod0 WHERE m0='$each_mc->m0' AND s1='$each_s1->s1' AND s2='$each_s2->s2';");
                echo "<div class='custaccordion no-sub s2-$s2class'>";
                  // if(count($s2_item)==1){
                  //   echo "<a href='".home_url()."/products/item/?id=".urlencode($s2_item[0]->item)."&m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."'>".$each_s2->s2."</a>";
                  // } else {
                  // }
                  echo "<a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."&s2=".urlencode($each_s2->s2)."'>".$each_s2->s2."</a>";
                echo "</div>";
              }
              echo "</div>";  // end panel
            } else {
              // s2 is empty. Item category only have s1.
              // $s1_item = $wpdb->get_results("SELECT DISTINCT item FROM wp_prod0 WHERE m0='$each_mc->m0' AND s1='$each_s1->s1';");
              echo "<div class='custaccordion no-sub s1-$s1class'>";
                // if(count($s1_item)==1){
                //   echo "<a href='".home_url()."/products/item/?id=".urlencode($s1_item[0]->item)."&m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."'>".$each_s1->s1."</a>";
                // } else {
                // }
                echo "<a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."&s1=".urlencode($each_s1->s1)."'>".$each_s1->s1."</a>";
              echo "</div>";
            }
          } // end foreach of s1.

        } //end else for m0==tools.


        echo "</div>";  // end panel
      } else {
        // s1 is empty. Item category only have m0.
        // $m0_item = $wpdb->get_results("SELECT DISTINCT item FROM wp_prod0 WHERE m0='$each_mc->m0';");

        echo "<div class='custaccordion m0-$m0class'>";
        // if(count($m0_item)==1) {
        //   echo "<a href='".home_url()."/products/item/?id=".urlencode($m0_item[0]->item)."&m0=".urlencode($each_mc->m0)."'>".$each_mc->m0."</a>";
        // } else {
        // }
        echo "<a href='".home_url()."/products/categories/?m0=".urlencode($each_mc->m0)."'>".$each_mc->m0."</a>";
        echo "</div>";
      }
    }
  echo "</div>";

?>
