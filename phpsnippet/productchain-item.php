<?php
// echo "<div>item page</div>";
// This is individual item page (seo friendly url)

$m0val = $urlarr[0];
$itemval = null;
$s1val = null;
$s2val = null;
$s3val = null;
$jointm0 = null;
$joints1 = null;
$itemh1 = null;

$get_cert_img = $wpdb->get_results("SELECT * FROM wp_cert;");

// print_r($urlarr);


switch (@count($urlarr)){
  case 2:
    //[product, m0, item]
    $itemval = $urlarr[1];
    $getlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$m0val';");
    $getprod_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0='$m0val' AND item0='$itemval';");
    $itemh1temp = $wpdb->get_results("SELECT m0h1 FROM wp_m0meta WHERE m0='$m0val';");
    $itemh1 = $itemh1temp[0]->m0h1;

  break;
  case 3:
    //[product,m0,s1,item]
    $s1val = $urlarr[1];
    $itemval = $urlarr[2];
    $getlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$m0val' AND s1='$s1val';");
    $getprod_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0='$m0val' AND s1='$s1val' AND item0='$itemval';");

    $itemh1temp = $wpdb->get_results("SELECT s1h1 from wp_s1meta WHERE m0='$m0val' AND s1='$s1val';");
    $itemh1 = $itemh1temp[0]->s1h1;
    // print_r($getprod_data);
    if(empty($getlegend)){
      //this trigger joint cat. Get joint cat data from legend. Joint cat is m0.
      $getlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$m0val' AND s1='$s1val';");
      $jointm0 = $wpdb->get_results("SELECT DISTINCT m0,m0desc FROM wp_prodlegend WHERE m0='$m0val';");
      $itemh1tempm0 = $getlegend[0]->m0;  //joint cat is m0
      $itemh1temp = $wpdb->get_results("SELECT s1h1 from wp_s1meta WHERE m0='$itemh1tempm0' AND s1='$s1val';");
      // if(empty($itemh1temp)) {  //joint cat is s1
      //   $itemh1temp = $wpdb->get_results("SELECT s1h1 from wp_s1meta WHERE s1='$'")
      // }
      $itemh1 = $itemh1temp[0]->s1h1;
      // echo "<div>Joint cat for m0 triggered</div>";
    }
    if(empty($getprod_data)){
      $getprod_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE jointcat='$m0val' AND item0='$itemval';");
    }
    if(empty($getprod_data)){
      $getprod_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE jointcat='$s1val' AND item0='$itemval';");
      $joints1 = $wpdb->get_results("SELECT DISTINCT s1,s0desc from wp_prodlegend WHERE s1='$s1val';");
    }
  break;
  case 4:
    //[product,m0,s1,s2,item]
    $s1val = $urlarr[1];
    $s2val = $urlarr[2];
    $itemval = $urlarr[3];

    $itemh1temp = $wpdb->get_results("SELECT s2h1 from wp_s2meta WHERE m0='$m0val' AND s1='$s1val' AND s2='$s2val';");
    $itemh1 = $itemh1temp[0]->s2h1;

    $getlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$m0val' AND s1='$s1val' AND s2='$s2val';");
    $getprod_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0='$m0val' AND s1='$s1val' AND s2='$s2val' AND item0='$itemval';");
    if(empty($getlegend)){  //joint cat is s1
      $getlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$s1val' AND s2='$s2val';");
      $itemtemps1 = $getlegend[0]->s1;
      $itemh1temp = $wpdb->get_results("SELECT s2h1 from wp_s2meta WHERE s1='$itemtepms1' AND s2='$s2val';");
      $itemh1 = $itemh1temp[0]->s2h1;
      // echo "<div>Jointcat for s1 triggered</div>";
    }
    if(empty($getprod_data)){
      $getprod_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE jointcat='$s1val' AND item0='$itemval';");
      $joints1 = $wpdb->get_results("SELECT DISTINCT s1,s0desc from wp_prodlegend WHERE s1='$s1val';");
    }

  break;
  case 5:
    //[product,m0,s1,s2,s3,item]
    $s1val = $urlarr[1];
    $s2val = $urlarr[2];
    $s3val = $urlarr[3];
    $itemval = $urlarr[4];
    $getlegend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$m0val' AND s1='$s1val' AND s2='$s2val' AND s3='$s3val';");
    $getprod_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE m0='$m0val' AND s1='$s1val' AND s2='$s2val' AND s3='$s3val' AND item0='$itemval';");

    $itemh1temp = $wpdb->get_results("SELECT s3h1 from wp_s3meta WHERE m0='$m0val' AND s1='$s1val' AND s2='$s2val' AND s3='$s3val';");
    $itemh1 = $itemh1temp[0]->s3h1;
  break;
  default:
  break;
}
echo "<div class='m-title'><a href='".home_url()."/products/'>PRODUCT HOME</a> >> ";
switch(@count($urlarr)){
  case 2:
    echo "<a href='".home_url()."/products/".$m0val."'>".$getlegend[0]->m0desc."</a> >> ";
  break;
  case 3:
    if(empty($jointm0)){
      echo "<a href='".home_url()."/products/".$m0val."'>".$getlegend[0]->m0desc."</a> >> ";
    } else {
      echo "<a href='".home_url()."/products/".$jointm0[0]->m0."'>".$jointm0[0]->m0desc."</a> >> ";
    }
    echo "<a href='".home_url()."/products/".$m0val."/".$s1val."'>".$getlegend[0]->s1desc."</a> >> ";
  break;
  case 4:
    echo "<a href='".home_url()."/products/".$m0val."'>".$getlegend[0]->m0desc."</a> >> ";
    if(empty($joints1)){
      echo "<a href='".home_url()."/products/".$m0val."/".$s1val."'>".$getlegend[0]->s1desc."</a> >> ";
    } else {
      echo "<a href='".home_url()."/products/".$m0val."/".$s1val."'>".$joints1[0]->s1desc."</a> >> ";
    }
    echo "<a href='".home_url()."/products/".$m0val."/".$s1val."/".$s2val."'>".$getlegend[0]->s2desc."</a> >> ";
  break;
  case 5:
    echo "<a href='".home_url()."/products/".$m0val."'>".$getlegend[0]->m0desc."</a> >> ";
    echo "<a href='".home_url()."/products/".$m0val."/".$s1val."'>".$getlegend[0]->s1desc."</a> >> ";
    echo "<a href='".home_url()."/products/".$m0val."/".$s1val."/".$s2val."'>".$getlegend[0]->s2desc."</a> >> ";
    echo "<a href='".home_url()."/products/".$m0val."/".$s1val."/".$s2val."/".$s3val."'>".$getlegend[0]->s3desc."</a> >> ";
  break;
}
echo $getprod_data[0]->item;
echo "</div>";	// end m-title div.



echo "<div class='s1-box-background'>";



  echo "<div id='each-img-data-container'>";
  echo "<div id='each-img-data'>";
    echo "<div class='item-image'>";
      echo "<div class='img-content-box'>";
      /* - - - THIS IS MAIN VIEW - - - */

        $imgExist = 0;
        for ($y = 0; $y<=9; $y++){
          $imgtemp = 'img'.$y;
          if($getprod_data[0]->$imgtemp != '') {
            $imgExist++;
            // echo $imgExist;
          }
        }	//Checking to see if image exist

        if ($imgExist == 0) {
          echo "<img class='main-view-lg main-imgnone' src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
        } else {
          $displayCounter = 0;
          for ($x=0; $x<=9; $x++) {
            $img = "img".$x;
            // This will assign default image at main.
            switch ($x) {
              case (0):
              {
                if(($getprod_data[0]->$img) !=""){
                  echo "<img class='main-view-lg main-$img' src='".$getprod_data[0]->$img."' style='display:initial'>";
                  $displayCounter++;
                } else {
                  break;
                }
              }
              break;
              default:
              {
                if(($x > 0) && ($displayCounter == 0) && ($getprod_data[0]->$img !="")){
                  echo "<img class='main-view-lg main-$img' src='".$getprod_data[0]->$img."' style='display:initial'>";
                  $displayCounter++;
                } else {
                  if(($getprod_data[0]->$img) !=""){
                    echo "<img class='main-view-lg main-$img' src='".$getprod_data[0]->$img."' style='display:none'>";
                  }
                }
              }
              // endswitch;
            }
          }
        }

        // Start thumbnail SECTION
        echo "<div class='img-thumbnail-section'>";
          $thumbCounter = 0;
          for ($x=0; $x<=9; $x++) {
            $img = "img".$x;
            if(($getprod_data[0]->$img) !=""){
              echo "<img class='single-thumb thumb-$img' src='".$getprod_data[0]->$img."'>";
              $thumbCounter++;
            }
          }
          if ($thumbCounter == 0) {
            echo "<img class='single-thumb' src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
          }
        echo "</div>";	// end img-thumbnail-section;

      echo "</div>";	// end img-content-box.

    echo "</div>";	// end item-image class tag.

    echo "<div class='each-item-data'>";
      echo "<div class='item-spec-container'>";
        echo "<div class='ip-title'>";

        echo "<div class='ipt-h1'><h1>".$itemh1."</h1></div>";

        $ip_sku = $getprod_data[0]->SKU;
        $ip_item = $getprod_data[0]->item;
        if($ip_sku == '' || $ip_sku == 'N/A' || $ip_sku == ' ' || $ip_sku == $ip_item) {
          echo "<p class='ipt-sku'>".$ip_item."</p>";
        } else {
          echo "<p class='ipt-sku'>".$ip_sku."</p>";
          echo "<p class='ipt-item'>".$ip_item."</p>";
        }
        echo "</div>";
        // echo "<div class='ip-type'>".$getprod_data[0]->s1." ".$getprod_data[0]->s2." ".$getprod_data[0]->m0."</div>";
        echo "<table class='ip-each-data-table'>";
        for ($x=1; $x <=9; $x++) {
          $d = "d".$x;
          echo "<tr class='ip-each-data'>";
          if ($getprod_data[0]->$d !=""){
            # Need to revise this here if datatable will be updated.;
            // if legend has break tag, this will remove and replace it with space.
            // $splitlegend = explode("<br/>",$get_item_legend[0]->$d);
            // $joinlegend = implode(" ",$splitlegend);
            // print_r($splitlegend);
            echo "<th class='ip-legend'>".$getlegend[0]->$d.": </th>";
            // echo "<th class='ip-legend'>".$joinlegend.": </th>";
            // $splitdata = explode(" <br>",$getprod_data[0]->$d);
            // $joindata = implode("; ",$splitdata);
            echo "<td class='ip-spec'>".$getprod_data[0]->$d."</td>";
            // echo "<td class='ip-spec'>".$joindata."</td>";
          }
          echo "</tr>";	// end ip-each-data;
        }
        echo "</table>";
        echo "<br/>";
        if((($getprod_data[0]->spec)!='' || ($getprod_data[0]->spec)) && ($getprod_data[0]->spec)!=" "){
          // echo "spec is not empty";
          echo "<div class='ip-pdf'><a class='spec-sheet' href='".$getprod_data[0]->spec."' rel='noopener noreferrer' target='_blank'>SPEC SHEET</a></div>";
        }
        if(($getprod_data[0]->usermanual)!='' || ($getprod_data[0]->usermanual)) {
          echo "<div class='ip-pdf'><a class='usermanual' href='".$getprod_data[0]->usermanual."' rel='noopener noreferrer' target='_blank'>USER MANUAL</a></div>";
        }

      echo "</div>";	// end item-spec-container div;
    echo "</div>";	// end each-item-data;

  echo "</div>";	// end each-img-data.
  echo "</div>";	// end each-img-data-container.

  if(($getprod_data[0]->cert0)!='' || ($getprod_data[0]->cert0)) {
    // Display only when certification value exist.

    echo "<div class='ip-certification'>";
      echo "<div class='ip-certitle'>CERTIFIED:</div>";
      echo "<div >";
      // print_r(sizeof($get_cert_img));
      for ($x=0; $x<=9; $x++) {	//this get total list of certified from item db.
        $cert = "cert".$x;
        $cert_type = $getprod_data[0]->$cert;
        // print_r($cert_type);
        // This data check against certification db one by one and if equal, display image.
        if($cert_type != ""){
          for ($y=0; $y < sizeof($get_cert_img); $y++) {
            if ($get_cert_img[$y]->type == $cert_type){
              echo "<img class='ip-cert-img' src='".$get_cert_img[$y]->link."'>";
            }
          }// end check loop for $get_cert_img;
        }
      }
      echo "</div>";
    echo "</div>";	// end ip-certification
  }	// end if selection for certification.

  if(($getprod_data[0]->d0)!='' || ($getprod_data[0]->d0)) {
    // Display only when product description is available.
    echo "<div class='ip-description'>";
      echo "<div class='ip-desctitle'>PRODUCT DESCRIPTION</div>";
      echo "<p class='ip-detaildescription'>".$getprod_data[0]->d0."</p>";
    echo "</div>";	// end ip-description;
  }	// end if selection for product description.

echo "</div>";	// end s1-box-background div;
// $mPos++;
echo "</div>";  //end group-container div;
echo "</div>";
echo "</div>";

/* - - - IMAGE MODAL - - - */
echo "<div id='itemModal' class='ip-modal'>";
echo "<span class='ip-close'>&times;</span>";
echo "<div class='ip-modal-content'>";
  if($imgExist == 0) {
    echo "<div class='ip-slides modal-imgnone'>";
      echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg' style='width: 100%'>";
    echo "</div>";
  } else {
    for($m=0; $m<=9; $m++){
      $imgLg = 'img'.$m;
      if($getprod_data[0]->$imgLg!=""){
        // echo $getprod_data[0]->$imgLg;
        echo "<div class='ip-slides modal-$imgLg'>";
        echo "<img src='".$getprod_data[0]->$imgLg."' style='width:100%'>";
        echo "</div>";	// end ip-slides;
      }
    }
  }
  // echo "<a class='ip-prev'>&#10094;</a>";
  // echo "<a class='ip-next'>&#10095;</a>";
echo "</div>";	// end ip-modal-content
echo "</div>";	// end #itemModal.




//
// print_r(findObjectbym0($qurl0, $main_category));
// function findObjectBym0($val, $arrayval){
//   foreach($arrayval as $arrayvalsearch){
//     foreach ($arrayvalsearch as $element) {
//       if ($val==$element->m0){
//         return $element;
//       }
//     }
//   }
//   return false;
// }


?>
