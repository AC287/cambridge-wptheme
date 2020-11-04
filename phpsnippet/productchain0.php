<?php

  $qurl0 = $urlarr[0];
  $qurl1 = $urlarr[1];
  $qurl2 = $urlarr[2];
  $qurl3 = $urlarr[3];
  $qurl4 = $urlarr[4];

  echo "<div class='group-container'>";


  $s1check = $wpdb->get_var("SELECT COUNT(DISTINCT s1) FROM wp_prodlegend WHERE m0 = '$qurl0';");
  $s1jointcheck = $wpdb->get_var("SELECT COUNT(DISTINCT s1) FROM wp_prodlegend WHERE jointcat = '$qurl0';");
  // print_r($s1check);


  if($s1check) {

    $prodchains1 = $wpdb->get_results("SELECT DISTINCT m0,m0desc,s1, s1desc from wp_prodlegend WHERE m0='$qurl0';");

    echo "<div class='m-title'>";
    echo "<a href='".home_url()."/products'>PRODUCT HOME </a> >> ".$prodchains1[0]->m0desc;
    echo "</div>";

    echo "<div class='s1-box-background'>";
    echo "<div class='s1-box-flex-container'>";

    $counter = 0;

    foreach($prodchains1 as $s1display) {
      $s1val = $s1display->s1;
      $img=$wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE m0='$qurl0' AND s1='$s1val' AND cat1img IS NOT NULL;");
      $s2count = $wpdb->get_var("SELECT COUNT(DISTINCT s2) FROM wp_prodlegend WHERE m0='$qurl0' AND s1 = '$s1val';");

      if(!$s2count) {
        $item_check = $wpdb->get_results("SELECT DISTINCT item0,item FROM wp_prod0 WHERE m0='$qurl0' AND s1='$s1val';");
      } else {
        $item_check=null;
      }

      echo "<a href='".home_url()."/products/".$qurl0."/".$s1val."' class='s1-box'>";
        echo "<div class='item-img'>";
          if ($img[0]->cat1img=='' || $img[0]->cat1img==' ' ) {
            echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
          } else {
            echo "<img src='".$img[0]->cat1img."'>";
          };
        echo "</div>";  // end item-img class.
        echo "<div class='s1-cat'>".$s1display->s1desc."</div>";
      echo "</a>";
      $counter++;
      // print_r();

    } //end foreach loop.

    if($s1jointcheck) {
      $prodchains1j = $wpdb->get_results("SELECT DISTINCT s1,s1desc from wp_prodlegend WHERE jointcat='$qurl0';");

      //this start jointcat
      foreach($prodchains1j as $s1jdisplay) {
        $s1jval = $s1jdisplay->s1;

        $img=$wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE jointcat='$qurl0' AND s1='$s1jval' AND cat1img IS NOT NULL;");
        $s2jcount = $wpdb->get_var("SELECT COUNT(DISTINCT s2) FROM wp_prodlegend WHERE jointcat='$qurl0' AND s1 = '$s1jval';");

        if(!$s2jcount) {
          $item_check = $wpdb->get_results("SELECT DISTINCT item0,item FROM wp_prod0 WHERE jointcat='$qurl0' AND s1='$s1jval';");
        } else {
          $item_check=null;
        }

        echo "<a href='".home_url()."/products/".$qurl0."/".$s1jval."' class='s1-box'>";
          echo "<div class='item-img'>";
            if ($img[0]->cat1img=='' || $img[0]->cat1img==' ' ) {
              echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
            } else {
              echo "<img src='".$img[0]->cat1img."'>";
            };
          echo "</div>";  // end item-img class.
          echo "<div class='s1-cat'>".$s1jdisplay->s1desc."</div>";
        echo "</a>";
        $counter++;
        // print_r();

      }

    } else {
      // code...
    } //this end joint category.

  } else {
    // There is no s1 category. This will get data from item database.
    // $prodchainitem = $wpdb->get_results("SELECT DISTINCT ");
  }



  for($k=$counter; $k%4!=0; $k++){
    echo "<a class='s1-box s1-box-filler'></a>";
  }

  echo "</div>";  //end s1-box-flex-container;
  echo "</div>";  //end s1-box-background;



  echo "</div>";  // end group-container div;

  // print_r($prodchains1);

 ?>
