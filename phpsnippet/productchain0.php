<?php

  //This is the display php insert for m0 category.


  echo "<div class='group-container'>";

  // print_r($curLocationArr);

  $s1check = $wpdb->get_var("SELECT COUNT(DISTINCT s1) FROM wp_prodlegend WHERE m0 = '$qurl0';");
  $s1jointcheck = $wpdb->get_var("SELECT COUNT(DISTINCT s1) FROM wp_prodlegend WHERE jointcat = '$qurl0';");
  // print_r($s1check);

  $m0h1title = $wpdb->get_results("SELECT m0h1 from wp_m0meta WHERE m0='$qurl0';");

  if($s1check) {

    $prodchains1 = $wpdb->get_results("SELECT DISTINCT m0,m0desc,s1, s1desc from wp_prodlegend WHERE m0='$qurl0';");

    echo "<div class='m-title'>";
    echo "<a href='".home_url()."/products/'>PRODUCT HOME </a> >> ".$prodchains1[0]->m0desc;
    echo "</div>";

    echo "<div class='s1-box-background'>";

    echo "<div class='ph1tag'><h1>".$m0h1title[0]->m0h1."</h1></div>";

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
      if(@count($item_check) > 1) {
        echo "<a href='".home_url()."/products/".$qurl0."/".$s1val."' class='s1-box'>";
      } else {
          echo "<a href='".home_url()."/products/".$qurl0."/".$s1val."/".$item_check[0]->item0."' class='s1-box'>";
      }
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

    if($s1jointcheck) { //joint category.
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
    $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$qurl0';");
    $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0 = '$qurl0';");
    $item_certdb = $wpdb->get_results("SELECT * FROM wp_cert;");
    $itemcount = count($catitems);
    // echo $itemcount;
    echo "<div class='group-container'>";
    echo "<div class='m-title'>";
    echo "<a href='".home_url()."/products/'>PRODUCT HOME </a> >> ".$catlegend[0]->m0desc;
    echo "</div>";
    echo "<div class='s1-box-background'>";
    echo "<div class='ph1tag'><h1>".$m0h1title[0]->m0h1."</h1></div>";
    echo "<div class='s1-box-flex-container'>";
    include 'productchain-table.php';
    echo "</div>";
  }



  for($k=$counter; $k%4!=0; $k++){
    echo "<a class='s1-box s1-box-filler'></a>";
  }

  echo "</div>";  //end s1-box-flex-container;
  echo "</div>";  //end s1-box-background;



  echo "</div>";  // end group-container div;

  // print_r($prodchains1);

 ?>
