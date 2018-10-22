<?php
echo "<div class='prod-tt-container'>";
  echo "<div class='p2-header'>";
  switch ($totalquery) {
    case 1:
      echo "<div class='p2-title'>".stripslashes($cm0)."</div>";
    break;
    case 2:
      echo "<div class='p2-title'>".stripslashes($cs1)."</div>";
    break;
    case 3:
      echo "<div class='p2-title'>".stripslashes($cs2)."</div>";
    break;
    case 4:
      echo "<div class='p2-title'>".stripslashes($cs3)."</div>";
    break;
    default:
    break;
  }
  echo "<div class='p2-description-txt'>".$catitems[0]->d0."</div>";
  echo "</div>";	// end p2-header.

  echo "<div class='p2-divider'>";
    if ($catlegend[0]->imgdivider != ""){
      echo "<div class='p2-divider-img'><img src='".$catlegend[0]->imgdivider."'></div>";
    }
    // echo "<td>".$item_data."</td>";
    $certDisplay = $catitems;
    $certArr=array();
    foreach ($certDisplay as $certDisplay){
      for($c=0; $c<=9; $c++){	//There are only 0-9 certification slots at database.
        // echo $c;
        $cert = "cert".$c;
        if( $certDisplay->$cert !="" && in_array($certDisplay->$cert, $certArr)!= TRUE){
          array_push($certArr, $certDisplay->$cert);
        }
      }
    }
    // print_r(count($certArr));
    echo "<div class='p2-divider-cert'>";
    for ($iCert=0; $iCert<count($certArr); $iCert++){
      for($iCertdb = 0; $iCertdb < sizeof($item_certdb); $iCertdb++){
        if($item_certdb[$iCertdb]->type == $certArr[$iCert]) {
          echo "<img class='p2-cert-img' src='".$item_certdb[$iCertdb]->link."'>";
        }
      }
    }
    echo "</div>";
  echo "</div>";
echo "</div>";


echo "<table class='item-data-sheet'>";
echo "<tr >";
// Labeling cells.
echo "<th class='col-xs'>".$catlegend[0]->item."</th>";
$thcounter = 0;
for ($x=1; $x <= 9; $x++) {
  $cell_data = "d".$x;
  // print_r($catlegend[0]->$cell_data);
  // if(($catlegend[0]->d.$x)) {
  // 	print_r($x);
  // }
  if(($catlegend[0]->$cell_data)!=""){
    echo "<th class='col-xs'>".$catlegend[0]->$cell_data."</th>";
    $thcounter++;
  }
}
echo "</tr>";
foreach($catitems as $item_data) {
  echo "<tr>";
  echo "<td class='prod-itemnum'>";
    // $ipt_class = str_replace (' ','',$item_data->item);
    // $ipt_class = str_replace ('/','',$ipt_class);
    // $ipt_class = str_replace ('-','',$ipt_class);
    // $ipt_class = str_replace ('*','',$ipt_class);
    $ipt_class = preg_replace("/[^a-zA-Z0-9]/","",$item_data->item);
    // echo $ipt_class;
    // echo $cm0;
    echo "<a class='ipt $ipt_class' href='../item/?id=".urlencode($item_data->item)."&m0=".urlencode($cm0)."&s1=".urlencode($cs1)."&s2=".urlencode($cs2)."&s3=".urlencode($cs3)."'>";
      echo $item_data->item;
      // $ipt_img = $item_data->img0;
      echo "<p class='item-preview-thumb ipt-$ipt_class'>";
        $imgCounter = 0;
        for($i = 0; $i <= 9; $i++) {
          $img = "img".$i;
          if ($item_data->$img !="" && $imgCounter == 0 ) {
            echo "<img src=".$item_data->$img.">";
            $imgCounter++;
            break;
          }
        }
        if($imgCounter == 0) {
            echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
        }
      echo "</p>";
    echo "</a>";
  echo "</td>";
  for ($y=1; $y<=$thcounter; $y++) {
    $cell_data2 = "d".$y;
    echo "<td class='prod-data'>".$item_data->$cell_data2."</td>";

    // if(($item_data->$cell_data2)!="") {
    //   echo "<td class='prod-data'>".$item_data->$cell_data2."</td>";
    // }
  }
  echo "</tr>";
}
echo "</table>";


 ?>
