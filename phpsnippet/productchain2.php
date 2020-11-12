<?php

  //This is the display php insert for s2 category.
  //Product with only sub category3. m0, s1, and s2 are not empty. This will list all s3 inside given s2.
  // echo "productchain2 triggered.";

  $prods3 = $wpdb->get_results("SELECT DISTINCT m0,m0desc,s1,s1desc,s2,s2desc,s3,s3desc FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qurl2';");
  $itemcat = null;
  echo "<div class='group-container'>";

  if(empty($prods3)) {
    //assign value for joint category.
    $prods3 = $wpdb->get_results("SELECT DISTINCT s2,s2desc FROM wp_prodlegend WHERE jointcat = '$qurl1' AND s2='$qurl2';");

    if(!empty($prods3)){
      // echo "not empty triggered.";
      $temp = $wpdb->get_results("SELECT DISTINCT m0,m0desc,s1,s1desc FROM wp_prodlegend WHERE m0='$qurl0' AND s1='$qurl1';");
      $prods3[0]->m0 = $qurl0;
      $prods3[0]->m0desc = $temp[0]->m0desc;
      $prods3[0]->s1 = $qurl1;
      $prods3[0]->s1desc = $temp[0]->s1desc;
    }
  }

  if(!empty($prods3)) {

    $s2h1title = $wpdb->get_results("SELECT s2h1 from wp_s2meta WHERE m0='$qurl0' AND s1='$qurl1' AND s2='$qurl2';");

    //non-item page.

    echo "<div class='m-title'>";
    echo "<a href='".home_url()."/products/'>PRODUCT HOME </a> >> ";
    echo "<a href='".home_url()."/products/".$qurl0."'>".$prods3[0]->m0desc."</a> >> ";
    echo "<a href='".home_url()."/products/".$qurl0."/".$qurl1."'>".$prods3[0]->s1desc."</a> >> ".$prods3[0]->s2desc;
    echo "</div>";


    echo "<div class='s1-box-background'>";

    echo "<div class='ph1tag'><h1>".$s2h1title[0]->s2h1."</h1></div>";

    echo "<div class='s1-box-flex-container'>";

    if(!empty($prods3[0]->s3)) {
      $counter = 0;
      foreach($prods3 as $prods3) {

        $qs3 = $prods3->s3;
        $img = $wpdb->get_results("SELECT DISTINCT cat3img FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qurl2' AND s3 = '$qs3' AND cat3img IS NOT NULL;");
        $item_check = $wpdb->get_results("SELECT DISTINCT item0,item FROM wp_prod0 WHERE m0='$qurl0' AND s1='$qurl1' AND s2 = '$qurl2' AND s3 = '$qs3';");

        if(@count($item_check)==1) {
          echo "<a href='".home_url()."/products/".$qurl0."/".$qurl1."/".$qurl2."/".$qs3."/".$item_check[0]->item0."' class='s1-box'>";
        } else {
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

  } else {
    //item page.
    include 'productchain-item.php';
  }

  // $mPos++;
echo "</div>";  //end group-container div;



?>
