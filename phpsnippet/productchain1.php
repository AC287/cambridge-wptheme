<?php
  //This is the display php insert for s1 category.
  //Product with only sub category2. m0 and s1 are not empty. This will list all s2 inside given s1.



  $prods2 = $wpdb->get_results("SELECT DISTINCT m0,m0desc,s1,s1desc,s2,s2desc FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1';");

  $itemcat = null;
  echo "<div class='group-container'>";

  if(empty($prods2)) {
    //assign value for joint category.
    $prods2 = $wpdb->get_results("SELECT DISTINCT m0,m0desc,s1,s1desc,s2,s2desc FROM wp_prodlegend WHERE jointcat = '$qurl0' AND s1 = '$qurl1';");
    $tempm0 = $wpdb->get_results("SELECT DISTINCT m0desc FROM wp_prodlegend WHERE m0='$qurl0';");
    if(!empty($prods2)){
      $prods2[0]->m0 = $qurl0;
      $prods2[0]->m0desc = $tempm0[0]->m0desc;
    }
  }

  if(!empty($prods2)){

    $s1h1title = $wpdb->get_results("SELECT s1h1 from wp_s1meta WHERE m0='$qurl0' AND s1='$qurl1';");
    if(empty($s1h1title)) {
      //this is joint category. Where joint cat is m0.

      $s1h1title = $wpdb->get_results("SELECT s1h1 from wp_s1meta WHERE s1='$qurl1';");
    }

    //Non-item page.

    echo "<div class='m-title'>";
    echo "<a href='".home_url()."/products/'>PRODUCT HOME </a> >> <a href='".home_url()."/products/".$qurl0."'>".$prods2[0]->m0desc."</a> >> ".$prods2[0]->s1desc;
    echo "</div>";


    echo "<div class='s1-box-background'>";

    echo "<div class='ph1tag'><h1>".$s1h1title[0]->s1h1."</h1></div>";

    echo "<div class='s1-box-flex-container'>";
    if(!empty($prods2[0]->s2)) {
      $counter = 0;
      foreach($prods2 as $prods2) {
        $qs2 = $prods2->s2;
        $img = $wpdb->get_results("SELECT DISTINCT cat2img FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1' AND s2 = '$qs2' AND cat2img IS NOT NULL;");

        $item_check = $wpdb->get_results("SELECT DISTINCT item0,item FROM wp_prod0 WHERE m0='$qurl0' AND s1='$qurl1' AND s2 = '$qs2';");

        // print_r(sizeof($img));
        // print_r($img);
        if(@count($item_check)==1) {
          // echo "<a href='../item/?id=".urlencode($item_check[0]->item)."&m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($prods2->s2)."' class='s1-box'>";
          echo "<a href='".home_url()."/products/".$qurl0."/".$qurl1."/".$qs2."/".$item_check[0]->item0."' class='s1-box'>";

        } else {
          // echo "<a href='../categories/?m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($prods2->s2)."' class='s1-box'>";
          echo "<a href='".home_url()."/products/".$qurl0."/".$qurl1."/".$qs2."' class='s1-box'>";

        }


        echo "<div class='item-img'>";
        if ($img[0]->cat2img==' ' || $img[0]->cat2img=='') {
          echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
        } else {
          echo "<img src='".$img[0]->cat2img."'>";
        };

        echo "</div>";
        echo "<div class='s1-cat'>".$prods2->s2desc."</div>";
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
      $jclv = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qurl0' OR jointcat='$qurl1';");  //general joint;
      // print_r($jclv);
      // $jcls1 = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$cs1';");
      $jclvm0 = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qurl0' AND s1='$qurl1';"); //joint is m0.
      $jclvs1 = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qurl1';"); //joint is s1.
      // print_r($jointcatlegend);
      // print_r($jointcatdata);

      if(!empty($jclvm0)){
        $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE jointcat='$qurl0' AND s1='$qurl1';");
        $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qurl0' AND s1='$qurl1';");
      }
      if(!empty($jclvs1)){
        $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1';");
        $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0='$qurl0' AND s1='$qurl1';");
        $jcdv = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE jointcat='$qurl1';");
        $catitems = array_merge($catitems,$jcdv);
      }
      if(empty($jclvm0) AND empty($jclvs1)){
        $catlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0 = '$qurl0' AND s1 = '$qurl1';");
        $catitems = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0 = '$qurl0' AND s1 = '$qurl1';");
      }

      $itemcount = count($catitems);
      include 'productchain-table.php';


      // echo "Only s1 for this category. This is rough. need to display table here.";
      // display item table here...
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
