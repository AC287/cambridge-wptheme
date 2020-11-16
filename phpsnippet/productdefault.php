<?php
  // print_r($urlarr);

  for ($m0p = 0; $m0p < 3; $m0p++){
    // print_r($main_category[$m0p]);

    $mPos = 0;

    foreach ($main_category[$m0p] as $main_category2) {
      echo "<div class='group-container'>";

        echo "<div class='m-title'>";
          echo "<h1><a href='".home_url()."/products/".$main_category2->m0."/'>".$main_category2->m0desc."</a></h1>";
        echo "</div>";	//end class m-title.

        $qm0 = $main_category2->m0;
        $s1_category2 = $wpdb->get_results("SELECT DISTINCT s1,s1desc FROM wp_prodlegend WHERE m0 = '$qm0';");
        $s1j_category2 = $wpdb->get_results("SELECT DISTINCT s1,s1desc FROM wp_prodlegend WHERE jointcat = '$qm0';");

        // print_r($s1_category2);
        echo "<div class='s1-box-background'>";
        echo "<div class='s1-box-flex-container'>";
        $counter = 0;
        $counter4 = 0;

          if(!empty($s1_category2[0]->s1)) {	//s1 category is not empty.

          foreach($s1_category2 as $s1_category2) {	//loop through each s1 category.

            $qs1 = $s1_category2->s1;
            $ps1h1 = $wpdb->get_results("SELECT DISTINCT s1h1 from wp_s1meta WHERE m0='$qm0' AND s1='$qs1';");
            $img = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE m0 = '$qm0' AND s1 = '$qs1' AND cat1img IS NOT NULL");	//Get s1 image.
            $s2_check = $wpdb->get_var("SELECT COUNT(DISTINCT s2) FROM wp_prodlegend WHERE m0='$qm0' AND s1='$qs1';");	//Check for s2.

            if(!$s2_check){
              $item_check = $wpdb->get_results("SELECT DISTINCT item0,item FROM wp_prod0 WHERE m0='$qm0' AND s1='$qs1';");
            } else {
              $item_check = null;
            }

            if($counter < 4) {

              if(@sizeof($item_check) == 1){
                // This will determine if link should take user to individual item page or table page.
                echo "<a href='".home_url()."/products/".$main_category2->m0."/".$s1_category2->s1."/".$item_check[0]->item0."/' class='s1-box'>";
              } else {
                echo "<a href='".home_url()."/products/".$main_category2->m0."/".$s1_category2->s1."/' class='s1-box'>";
              }

              echo "<div class='item-img'>";
              if (@sizeof($img) >= 1) {

                echo "<img title='".$ps1h1[0]->s1h1."' src='".$img[0]->cat1img."'>";

              } else {
                echo "<img title='".$ps1h1[0]->s1h1."' src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
              };

              echo "</div>";
              echo "<div class='s1-cat'>".$ps1h1[0]->s1h1."</div>";
              echo "</a>";
              $counter++;
              $counter4++;
            } else {
              // if sub category is more than 4, this add class to hide.
              if(@sizeof($item_check)==1){
                //This will determine if link should take user to individual item page or table page.
                echo "<a href='".home_url()."/products/".$main_category2->m0."/".$s1_category2->s1."/".$item_check[0]->item0."/' class='s1-box extra-box pos".$mPos."'>";
              } else {
                echo "<a href='".home_url()."/products/".$main_category2->m0."/".$s1_category2->s1."/' class='s1-box extra-box pos".$mPos."'>";
              }

              echo "<div class='item-img'>";
              if (@sizeof($img) > 1) {
                echo "<img title='".$ps1h1[0]->s1h1."' src='".$img[0]->cat1img."'>";
              }
              elseif (@sizeof($img)===1) {
                // print_r($img->img0);
                echo "<img title='".$ps1h1[0]->s1h1."' src='".$img[0]->cat1img."'>";
              }
              else {
                echo "<img title='".$ps1h1[0]->s1h1."' src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
              };
              // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
              echo "</div>";
              echo "<div class='s1-cat'>".$ps1h1[0]->s1h1."</div>";
              echo "</a>";
              $counter++;
              $counter4++;
            }
          }	// end foreach.

          if(!empty($s1j_category2[0]->s1)){	//display joint category after displaying all s1 from m0.
            foreach($s1j_category2 as $s1j_category2){
              $jqs1 = $s1j_category2->s1;
              $jimg = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE jointcat = '$qm0' AND s1 = '$jqs1' AND cat1img IS NOT NULL");
              $s2j_check = $wpdb->get_var("SELECT COUNT(DISTINCT s2) FROM wp_prodlegend WHERE jointcat='$qm0' AND s1='$jqs1';");
              $jointcatentry = $wpdb->get_results("SELECT DISTINCT s1h1 from wp_s1meta WHERE s1='$jqs1';");
              // print_r($jointcatentry);

              if(!$s2j_check) {
                $itemj_check = $wpdb->get_results("SELECT DISTINCT item0,item FROM wp_prod0 WHERE jointcat='$qm0' AND s1='$jqs1';");
              } else {
                $itemj_check = null;
              }

              if($counter < 4) {

                // print_r($itemj_check);

                if(@sizeof($itemj_check) == 1){
                  //This will determine if link should take user to individual item page or table page.
                  echo "<a href='".home_url()."/products/".$qm0."/".$s1j_category2->s1."/".$itemj_check[0]->item0."/' class='s1-box'>";

                } else {
                  echo "<a href='".home_url()."/products/".$qm0."/".$s1j_category2->s1."/' class='s1-box'>";

                }

                echo "<div class='item-img'>";
                if (@sizeof($jimg) >= 1) {

                  echo "<img title='".$jointcatentry[0]->s1h1."' src='".$jimg[0]->cat1img."'>";

                } else {
                  echo "<img title='".$jointcatentry[0]->s1h1."' src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
                };

                echo "</div>";
                echo "<div class='s1-cat'>".$jointcatentry[0]->s1h1."</div>";
                echo "</a>";
                $counter++;
                $counter4++;
              } else {
                // if sub category is more than 4, this add class to hide.
                if(@sizeof($itemj_check)==1){
                  //This will determine if link should take user to individual item page or table page.
                  echo "<a href='".home_url()."/products/".$qm0."/".$s1j_category2->s1."/".$itemj_check[0]->item0."/' class='s1-box extra-box pos".$mPos."'>";
                } else {
                  echo "<a href='".home_url()."/products/".$qm0."/".$s1j_category2->s1."/' class='s1-box extra-box pos".$mPos."'>";
                }

                echo "<div class='item-img'>";
                if (@sizeof($jimg) > 1) {
                  echo "<img title='".$jointcatentry[0]->s1h1."' src='".$jimg[0]->cat1img."'>";
                }
                elseif (@sizeof($jimg)===1) {
                  // print_r($img->img0);
                  echo "<img title='".$jointcatentry[0]->s1h1."' src='".$jimg[0]->cat1img."'>";
                }
                else {
                  echo "<img title='".$jointcatentry[0]->s1h1."' src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
                };
                // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
                echo "</div>";
                echo "<div class='s1-cat'>".$jointcatentry[0]->s1h1."</div>";
                echo "</a>";
                $counter++;
                $counter4++;
              }

            }	// end foreach loop for joint cat.


          }

          for($k=$counter4; $k%4!=0; $k++){
            if($k < 4){
              echo "<a class='s1-box s1-box-filler'></a>";
            } else {
              echo "<a class='s1-box s1-box-filler extra-box pos".$mPos."'></a>";
            }
          }

          echo "</div>";	// end s1-box-flex-container

          if($counter > 4) {
            echo "<div class='show-hide'>";
              echo "<span class='sh-chev'><img class='chev' src='https://storage.codacambridge.com/files/icons/chev_down_blue.png'></span>";
              echo "<span class='display-extra pos".$mPos." toggle-class'>SHOW ALL ".strtoupper($main_category2->m0desc)." CATEGORIES</span>";
            echo "</div>";
          }

          echo "</div>";	// end s1-box-background

        } else {
          //s1 is empty. get item data.
          // echo "THERE IS NO CATEGORY IN HERE!";
          // discussion with miriam: if there is no sub category, web should display main category, clicking on main category should take user to table, then to item page.

          $pm0h1 = $wpdb->get_results("SELECT m0h1 from wp_m0meta WHERE m0 = '$qm0';");

          $m0_images = $wpdb->get_results("SELECT img0 FROM wp_prod0 WHERE m0 = '$qm0';");
          $m0_imgarray = array();
          echo "<div class='s1-box-background'>";
            echo "<div class='s1-box-flex-container'>";
              foreach ($m0_images as $tempimg) {
                if($tempimg->img0 != '' || $tempimg->img0 != ' '){
                  $m0_imgarray[] = $tempimg->img0;
                }
              }
              $m0_imgarray = array_values(array_filter($m0_imgarray));
              // print_r($m0_imgarray);
              echo "<a href='".home_url()."/products/".$qm0."/' class='s1-box'>";
                echo "<div class='item-img'>";
                  if(in_array('',$m0_imgarray) || in_array(' ',$m0_imgarray)) {
                    echo "<img title='".$pm0h1[0]->m0h1."' src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
                  } else {
                    echo "<img title='".$pm0h1[0]->m0h1."' src='".$m0_imgarray[array_rand($m0_imgarray,1)]."'>";
                  }
                echo "</div>";	// end item-img class.
                echo "<div class='s1-cat'>".$pm0h1[0]->m0h1."</div>";
              echo "</a>";	// end a tag s1-box class.
              // print_r($m0_images);
              // print_r($m0_imgarray);
              $counter4++;
              for($k=$counter4; $k%4!=0; $k++){
                echo "<a class='s1-box s1-box-filler'></a>";
              }
            echo "</div>";	// end s1-box-flex-container;
          echo "</div>";	// end s1-box-background container;
        }
        $mPos++;

      echo "</div>";	// end group-container div.
    }	// end foreach maincategory loop.
  }	// end for loop for m0priority.


?>
