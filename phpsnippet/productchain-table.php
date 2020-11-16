<?php
echo "<div class='prod-tt-container'>";
  echo "<div class='p2-header'>";

  echo "<div class='p2-description-txt'>".$catitems[0]->d0."</div>";
  echo "</div>";	// end p2-header.

    $certDisplay = $catitems;

    $certArr=array();
    $certArrCounter = 0;
    foreach ($certDisplay as $certDisplay){
      if($certDisplay->cert0 !="") {
        $certArrCounter += 1;
      }
      // $certArrCounter += 1;
      for($c=0; $c<=9; $c++){	//There are only 0-9 certification slots at database.

        $cert = "cert".$c;

        if( $certDisplay->$cert !="" && in_array($certDisplay->$cert, $certArr)!= TRUE){
          array_push($certArr, $certDisplay->$cert);
        }
      }
    }

    echo "<div class='p2-divider-cert'>";
    if($certArrCounter == count($catitems)) {  // Display certification if all items have cert. If some dont have certification, icon will not display.
      for ($iCert=0; $iCert<count($certArr); $iCert++){
        for($iCertdb = 0; $iCertdb < sizeof($item_certdb); $iCertdb++){
          if($item_certdb[$iCertdb]->type == $certArr[$iCert]) {
            echo "<img class='p2-cert-img' src='".$item_certdb[$iCertdb]->link."'>";
          }
        }
      }
    }
    echo "</div>";
  echo "</div>";
echo "</div>";


echo "<table class='item-data-sheet'>";
echo "<tr >";
// Labeling cells.
echo "<th class='col-xs'>".$catlegend[0]->SKU."</th>";
echo "<th class='col-xs'>".$catlegend[0]->item."</th>";
$thcounter = 0;
for ($x=1; $x <= 9; $x++) {
  $cell_data = "d".$x;

  if(($catlegend[0]->$cell_data)!=""){
    echo "<th class='col-xs'>".$catlegend[0]->$cell_data."</th>";
    $thcounter++;
  }
}
echo "</tr>";
foreach($catitems as $item_data) {

  $m0url = '/'.$qurl0;
  (!empty($qurl1) ? $s1url = '/'.$qurl1 : $s1url);
  (!empty($qurl2) ? $s2url = '/'.$qurl2 : $s2url);
  (!empty($qurl3) ? $s3url = '/'.$qurl3 : $s3url);
  $itemurl = '/'.$item_data->item0;

  echo "<tr>";
  $ipt_class = $item_data->item0;
  $imgCounter = 0;
  for($i = 0; $i <= 9; $i++) {
    $img = "img".$i;
    if ($item_data->$img !="" && $imgCounter == 0 ) {
      $preview_img = "<img src=".$item_data->$img.">";
      $imgCounter++;
      break;
    }
  }
  if($imgCounter == 0) {
      $preview_img = "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
  }
  echo "<td class='prod-itemnum'>"; //this will display sku#.
    $sku = $item_data->SKU;
    if ($sku == '' || $sku == 'N/A') {
      echo "N/A";
    } else {
      echo "<a class='ipt $ipt_class' href='".home_url()."/products".$m0url.$s1url.$s2url.$s3url.$itemurl."/'>";
        echo $item_data->SKU;
        echo "<p class='item-preview-thumb ipt-$ipt_class'>";
          echo $preview_img;
        echo "</p>";
      echo "</a>";
    }
  echo "</td>";
  echo "<td class='prod-itemnum'>";

    echo "<a class='ipt $ipt_class' href='".home_url()."/products".$m0url.$s1url.$s2url.$s3url.$itemurl."/'>";
      echo $item_data->item;
      echo "<p class='item-preview-thumb ipt-$ipt_class'>";
        echo $preview_img;
      echo "</p>";
    echo "</a>";
  echo "</td>";
  for ($y=1; $y<=$thcounter; $y++) {
    $cell_data2 = "d".$y;
    echo "<td class='prod-data'>".$item_data->$cell_data2."</td>";

  }
  echo "</tr>";
}
echo "</table>";


 ?>
