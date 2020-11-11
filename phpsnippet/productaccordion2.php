<?php

  global $wpdb;

  $main_category[0] = $wpdb->get_results("SELECT DISTINCT m0,m0desc FROM wp_prodlegend WHERE m0priority = 0;");
  $main_category[1] = $wpdb->get_results("SELECT DISTINCT m0,m0desc FROM wp_prodlegend WHERE m0priority = 1;");
  $main_category[2] = $wpdb->get_results("SELECT DISTINCT m0,m0desc FROM wp_prodlegend WHERE m0priority = 2;");
  echo "<h4 class='productaccordion-maintitle-container'>";
    echo "<a class='productaccordion-maintitle' href='".home_url()."/products/'>PRODUCT CATEGORIES</a>";
    echo "<div class='productaccordion-mobilemenu'>";
      echo "<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>";
    echo "</div>";
  echo "</h4>";
  echo "<div class='productaccordion-content-container'>";
  for ($m0p = 0; $m0p < 3; $m0p++) {  //Grouping priority. Only 0, 1, 2.
    foreach ($main_category[$m0p] as $each_mc) {

      $s1_category = $wpdb->get_results("SELECT DISTINCT s1,s1desc FROM wp_prodlegend WHERE m0 = '$each_mc->m0';");

      $s1_jcategory= $wpdb->get_results("SELECT DISTINCT s1,s1desc FROM wp_prodlegend WHERE jointcat = '$each_mc->m0';");

      $m0class = $each_mc->m0;
      // $m0class = preg_replace("/[^a-zA-Z0-9]/","",$m0class);

      if(!empty($s1_category[0]->s1)) {
        //This is m0
        echo "<div class='custaccordion m0-$m0class'><img class='chev' src='https://storage.codacambridge.com/files/icons/chev-right.png'>";
        echo "<a class='custaccordion-m0a' href='".home_url()."/products/".$each_mc->m0."'>".$each_mc->m0desc."</a>";
        echo "</div>";
        echo "<div class='custpanel m0i-$m0class'>";

        foreach ($s1_category as $each_s1) {
          $s1class = $each_s1->s1;
          // $s1class = preg_replace("/[^a-zA-Z0-9]/","",$s1class);
          //s1 is not empty > get s2.
          $s2_category = $wpdb->get_results("SELECT DISTINCT s2,s2desc FROM wp_prodlegend WHERE s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
          if(!empty($s2_category[0]->s2)){
            // s2 is not empty
            echo "<div class='custaccordion s1-$s1class'><img class='chev' src='https://storage.codacambridge.com/files/icons/chev-right.png'>";
            echo "<a class='custaccordion-s1a' href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."'>".$each_s1->s1desc."</a></div>";
            echo "<div class='custpanel s1i-$s1class'>";
            foreach($s2_category as $each_s2) {
              $s2class = $each_s2->s2;
              // $s2class = preg_replace("/[^a-zA-Z0-9]/","",$s2class);
              //s2 is not empty > get s3.
              $s3_category = $wpdb->get_results("SELECT DISTINCT s3,s3desc FROM wp_prodlegend WHERE s2 = '$each_s2->s2' AND s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
              if(!empty($s3_category[0]->s3)) {
                echo "<div class='custaccordion s2-$s2class'><img class='chev' src='https://storage.codacambridge.com/files/icons/chev-right.png'>";
                echo "<a class='custaccordion-s2a' href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."/".$each_s2->s2."'>".$each_s2->s2desc."</a></div>";
                echo "<div class='custpanel s2i-$s2class'>";
                foreach($s3_category as $each_s3) {
                  $s3class = $each_s3->s3;
                  // $s3class = preg_replace("/[^a-zA-Z0-9]/","",$s3class);
                  //s3 is not empty > get s4.
                  echo "<div class='custaccordion no-sub s3-$s3class'><a href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."/".$each_s2->s2."/".$each_s3->s3."'>".$each_s3->s3desc."</a></div>";
                } // end foreach for s3 cat.
                echo "</div>";  // end panel
              } else {
                // s3 is empty
                echo "<div class='custaccordion no-sub s2-$s2class'><a href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."/".$each_s2->s2."'>".$each_s2->s2desc."</a></div>";
              }
            } // end foreach for s2_category.
            echo "</div>";  // end panel
          } else {
            // s2 is empty
            echo "<div class='custaccordion no-sub s1-$s1class'><a href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."'>".$each_s1->s1desc."</a></div>";
          }
        } // end foreachs1.

        //jointcat for m0.
        if($s1_jcategory[0]->s1!=''){

          foreach ($s1_jcategory as $each_s1) {
            $s1class = $each_s1->s1;
            // $s1class = preg_replace("/[^a-zA-Z0-9]/","",$s1class);
            //s1 is not empty > get s2.
            $s2_category = $wpdb->get_results("SELECT DISTINCT s2,s2desc FROM wp_prodlegend WHERE s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
            if(!empty($s2_category[0]->s2)){
              // s2 is not empty
              echo "<div class='custaccordion s1-$s1class'><img class='chev' src='https://storage.codacambridge.com/files/icons/chev-right.png'>";
              echo "<a class='custaccordion-s1a' href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."'>".$each_s1->s1desc."</a></div>";
              echo "<div class='custpanel s1i-$s1class'>";
              foreach($s2_category as $each_s2) {
                $s2class = $each_s2->s2;
                // $s2class = preg_replace("/[^a-zA-Z0-9]/","",$s2class);
                //s2 is not empty > get s3.
                $s3_category = $wpdb->get_results("SELECT DISTINCT s3,s3desc FROM wp_prodlegend WHERE s2 = '$each_s2->s2' AND s1 = '$each_s1->s1' AND m0 = '$each_mc->m0';");
                if(!empty($s3_category[0]->s3)) {
                  echo "<div class='custaccordion s2-$s2class'><img class='chev' src='https://storage.codacambridge.com/files/icons/chev-right.png'>";
                  echo "<a class='custaccordion-s2a' href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."/".$each_s2->s2."'>".$each_s2->s2desc."</a></div>";
                  echo "<div class='custpanel s2i-$s2class'>";
                  foreach($s3_category as $each_s3) {
                    $s3class = $each_s3->s3;
                    // $s3class = preg_replace("/[^a-zA-Z0-9]/","",$s3class);
                    //s3 is not empty > get s4.
                    echo "<div class='custaccordion no-sub s3-$s3class'><a href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."/".$each_s2->s2."/".$each_s3->s3."'>".$each_s3->s3desc."</a></div>";
                  } // end foreach for s3 cat.
                  echo "</div>";  // end panel
                } else {
                  // s3 is empty
                  echo "<div class='custaccordion no-sub s2-$s2class'><a href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."/".$each_s2->s2."'>".$each_s2->s2desc."</a></div>";
                }
              } // end foreach for s2_category.
              echo "</div>";  // end panel
            } else {
              // s2 is empty
              echo "<div class='custaccordion no-sub s1-$s1class'><a href='".home_url()."/products/".$each_mc->m0."/".$each_s1->s1."'>".$each_s1->s1desc."</a></div>";
            }
          } // end foreachs1.
        }// end if jointcat exist.


        echo "</div>";  // end panel
      } else {
        // echo "else triggered.";
        // s1 is empty
        echo "<div class='custaccordion m0-$m0class'><a href='".home_url()."/products/".$each_mc->m0."'>".$each_mc->m0desc."</a></div>";
      }

    }

  } // end grouping of m0priority.
  echo "</div>";
?>
