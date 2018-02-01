<table class="tn-overall-table">
  <tr>
    <td class="cambridge-white-logo">
      <a href="<?php echo home_url();?>"><img src="<?php bloginfo('template_directory')?>/images/Logo_White.png" height="50px"></a>
    </td>
    <td>
      <table class="tn-inner-table">
        <tr>
          <td>
            <span class="glyphicon glyphicon-earphone ph-icon" aria-hidden="true"></span>
            <span class="navi-ph">877.922.2538</span>
            <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/cambridgeresources/">
              <span class="fa fa-facebook-official"></span>
            </a>
            <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://twitter.com/CambridgeRes">
              <span class="fa fa-twitter-square"></span>
            </a>
            <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/cambridgeresources/">
              <span class="fa fa-linkedin-square"></span>
            </a>
          </td>
        </tr>
        <tr>
          <td class="navi1-btn">
            <a class="home" href="<?php echo home_url();?>">
              <div class="header-navi-title">HOME</div>
              <div class="header-navi-selector"></div>
            </a>
            <a class="products" href="<?php echo home_url();?>/products/">
              <div class="header-navi-title">PRODUCTS</div>
              <div class="header-navi-selector"></div>
            </a>
            <a class="about" href="<?php echo home_url();?>/about/">
              <div class="header-navi-title">ABOUT</div>
              <div class="header-navi-selector"></div>
            </a>
            <a class="industries" href="<?php echo home_url();?>/industries/">
              <div class="header-navi-title">INDUSTRIES</div>
              <div class="header-navi-selector"></div>
            </a>
            <a class="team" href="<?php echo home_url();?>/team/">
              <div class="header-navi-title">OUR TEAM</div>
              <div class="header-navi-selector"></div>
            </a>
            <a class="brands" href="<?php echo home_url();?>/brands/">
              <div class="header-navi-title">BRANDS</div>
              <div class="header-navi-selector"></div>
            </a>
            <a class="contact" href="<?php echo home_url();?>/contact/">
              <div class="header-navi-title">CONTACT</div>
              <div class="header-navi-selector"></div>
            </a>
          </td>
        </tr>
      </table> <!-- end tn-inner-table  -->
    </td>
  </tr>  <!--  end col-4 -->
</table>  <!--  end table -->

<!--      FOOTER PART      -->

<div class="container footer1">
  <div class="row">
    <div class="col-xs-1">
      <a href="<?php echo home_url();?>" class="footer1-maintxt">Home</a>
    </div>
    <div class="col-xs-2">
      <a href="<?php echo home_url();?>/products/" class="footer1-maintxt">Products</a>
      <ul class="footer1-subtxt">
        <li><a href="">Top Seller</a></li>
        <li><a href="">Featured Product</a></li>
        <li><a href="">Catalogs</a></li>
        <li><a href="">Quality</a></li>
        <li><a href="">Warranty</a></li>
      </ul>
    </div>
    <div class="col-xs-2">
      <a href="" class="footer1-maintxt">About</a>
      <ul class="footer1-subtxt">
        <li><a href="">Who We Are</a></li>
        <li><a href="">Retailers Who Carry Us</a></li>
        <li><a href="">Careers</a></li>
        <li><a href="">News</a></li>
      </ul>
    </div>
    <div class="col-xs-1">
      <a href="" class="footer1-maintxt">Brands</a>
    </div>
    <div class="col-xs-2">
      <a href="" class="footer1-maintxt">Contact Us</a>
      <ul class="footer1-subtxt">
        <li><a href="">Customer Service</a></li>
        <li><a href="">Sales</a></li>
        <li><a href="">Technical Support</a></li>
        <li><a href="">Map</a></li>
      </ul>
    </div>
    <div class="col-xs-4 certifications">
      <div class="certifications-txt">CERTIFICATIONS</div>
      <img src="<?php bloginfo('template_directory')?>/images/certifications3.png"></img>
    </div>
  </div>
</div>

<!--  header search and logo -->
<table class="tn2-overall-table">
  <td>
    <span class="nav2">OUR BRANDS</span>
    <span class="nav2-logo">
      <a href="http://www.codaresources.com/" target="_blank" rel="noopener noreferrer">
        <img src="<?php bloginfo('template_directory')?>/images/CODA DEV_LOGO.png" height="40px" width="50px">
      </a>
    </span>
    <span class="nav2-logo">
      <a href="" target="_blank" rel="noopener noreferrer">
        <img src="<?php bloginfo('template_directory')?>/images/AMRAM_Logo_001.png" height="20px">
      </a>
    </span>
    <span class="nav2-logo">
      <a href="http://www.ldrind.com/" target="_blank" rel="noopener noreferrer">
        <img src="<?php bloginfo('template_directory')?>/images/LDR_LOGO.png" height="25px">
      </a>
    </span>
    <span class="nav2-logo">
      <a href="" target="_blank" rel="noopener noreferrer">
        <img src="<?php bloginfo('template_directory')?>/images/pipedecor_logo.png" height="12px">
      </a>
    </span>
  </td>
  <td class="nav2-search">
    <span class="glyphicon glyphicon-search nav2-search-icon"></span>
    <span class="nav2-search-txt">PRODUCT SEARCH</span>
  </td>
  <td class="nav2-search">
    <input type="text" class="form-control search-field" placeholder="KEYWORD / PHRASE / PART#"></input>
  </td>
</table>  <!--  end tn2-overall-table  -->




<!--
 - - - - - - - - - - - product-page.php temp codes - - - - - - - - - -
-->
<?php
echo "<table id='product-main-page'>";
  echo "<td class='cat-bar'>";
    include 'phpsnippet/productaccordion.php';
  echo "</td>";

  // THIS END ACCORDION.

  echo "<td class='prod-display'>";
  // echo "<h1> HELLO </h1>";
  $mPos = 0;
  foreach($main_category2 as $main_category2) {
    echo "<div class='group-container'>";
    echo "<div class='m-title'><a href='./pm0/?m0=".urlencode($main_category2->m0)."'>".$main_category2->m0."</a></div>";
    $s1_category2 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prod0 WHERE m0 = '$main_category2->m0';");
    // print_r($s1_category2);
    if(!empty($s1_category2[0]->s1)) {
      echo "<div class='s1-box-background'>";
      echo "<div class='s1-box-flex-container'>";
      $counter = 0;
      $counter4 = 0;
      foreach($s1_category2 as $s1_category2) {
        // $img = $wpdb->get_results("SELECT img0 FROM wp_prod0 WHERE s1 = '$s1_category2->s1' AND img0 IS NOT NULL;");
        $img = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE m0 = '$main_category2->m0' AND s1 = '$s1_category2->s1' AND cat1img IS NOT NULL");
        // echo $img;
        // print_r($img);

        // print_r(sizeof($img));
        $s2_check = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prod0 WHERE m0='$main_category2->m0' AND s1='$s1_category2->s1';");
        // print_r(sizeof($s2_check));
        // print_r($s2_check[0]->s2);
        // print_r($main_category2->m0);
        // print_r($s1_category2->s1);
        if($counter < 4) {
          if((sizeof($s2_check)>=1) && (($s2_check[0]->s2)!="")){  //if s2 is not empty, go to ps1 page. else, go to ps2.
            echo "<a href='./ps1/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box'>";
          } else {
            echo "<a href='./ps2/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box'>";
          }
          echo "<div class='item-img'>";
          if (sizeof($img) > 1) {
            // foreach($img as $img) {
            //   echo "<img src='' height='100' width='100'>";
            // }
            // echo "<img src='".$img[array_rand($img)]->img0."' height='100' width='100'>";
            echo "<img src='".$img[0]->cat1img."' height='100' width='100'>";


          } elseif (sizeof($img)===1) {
            // print_r($img->img0);
            echo "<img src='".$img[0]->cat1img."' height='100' width='100'>";
          } else {
            echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg' height='100' width='100'>";
          };
          // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
          echo "</div>";
          echo "<div class='s1-cat'>".$s1_category2->s1."</div>";
          echo "</a>";
          $counter++;
          $counter4++;
        } else {
          // if sub category is more than 4, this add class to hide.
          if((sizeof($s2_check)>=1)&&(($s2_check[0]->s2)!="")){  //if s2 is not empty, go to ps1 page. else, go to ps2.
            echo "<a href='./ps1/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box extra-box pos".$mPos."'>";
          } else {
            echo "<a href='./ps2/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box extra-box pos".$mPos."'>";
          }
          echo "<div class='item-img'>";
          if (sizeof($img) > 1) {
            echo "<img src='".$img[0]->cat1img."' height='100' width='100'>";
          }
          elseif (sizeof($img)===1) {
            // print_r($img->img0);
            echo "<img src='".$img[0]->cat1img."' height='100' width='100'>";
          }
          else {
            echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg' height='100' width='100'>";
          };
          // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
          echo "</div>";
          echo "<div class='s1-cat'>".$s1_category2->s1."</div>";
          echo "</a>";
          $counter++;
          $counter4++;
        }
      }
      for($k=$counter4; $k%4!=0; $k++){
        if($k < 4){
          echo "<a class='s1-box s1-box-filler'></a>";
        } else {
          echo "<a class='s1-box s1-box-filler extra-box pos".$mPos."'></a>";
        }
      }
      echo "</div>";	// end s1-box-flex-container
      if($counter > 3) {
        echo "<div class='show-hide'>";
          echo "<span class='sh-chev'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev_down_blue.png'></span>";
          echo "<span class='display-extra pos".$mPos." toggle-class'>SHOW ALL ".strtoupper($main_category2->m0)." CATEGORIES</span>";
        echo "</div>";
      }
      echo "</div>";	// end s1-box-background
    }
    $mPos++;
    echo "</div>";  //end group-container div;
  }
  echo "</td>";
echo "</table>";
?>


<!--
 - - - - - - - - - - prod-page2 - - - - - - - - - -
-->
<?php
echo "<table class='p2-divider'><tr>";
  if ($item_data_legend[0]->imgdivider != ""){
    echo "<td class='p2-divider-img col-xs-8'><img src='".$item_data_legend[0]->imgdivider."'></td>";
  }
  // echo "<td>".$item_data."</td>";
  $certDisplay = $item_data;
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
  echo "<td class='p2-divider-cert col-xs-4'>";
    for ($iCert=0; $iCert<count($certArr); $iCert++){
      for($iCertdb = 0; $iCertdb < sizeof($item_certdb); $iCertdb++){
        if($item_certdb[$iCertdb]->type == $certArr[$iCert]) {
          echo "<img class='p2-cert-img' src='".$item_certdb[$iCertdb]->link."'>";
        }
      }
    }
  echo "</td>";
echo "</tr></table>";

 ?>


<!--
- - - - - - - - - - - prod-pageitem.php - - - - - - - - - -
-->

<?php
echo "<table id='each-item-spec'>";
  echo "<tr>";
  echo "<td class='item-image'>";
    echo "<div class='img-content-box'>";

    /* - - - THIS IS MAIN VIEW - - - */

      $imgExist = 0;
      for ($y = 0; $y<=9; $y++){
        $imgtemp = 'img'.$y;
        // echo $get_item_data[0]->$imgtemp;
        if($get_item_data[0]->$imgtemp != '') {
          $imgExist++;
          // echo $imgExist;
        }
      }	//Checking to see if image exist

      if ($imgExist == 0) {
        echo "<img class='main-view-lg main-imgnone' src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
      } else {
        $displayCounter = 0;
        for ($x=0; $x<=9; $x++) {
          $img = "img".$x;
          // This will assign default image at main.
          /*
          if(($get_item_data[0]->img2)!=""){
            switch ($x) {
              case (2):
              {
                if(($get_item_data[0]->$img) !=""){
                  echo "<img class='main-view-lg main-$img' src='".$get_item_data[0]->$img."'>";
                }
              }
              break;
              default:
              {
                if(($get_item_data[0]->$img) !=""){
                  echo "<img class='main-view-lg main-$img' src='".$get_item_data[0]->$img."' style='display:none'>";
                }
              }
              // endswitch;
            }
          }	// end if there is no img2.
          else {
          }
          */
          switch ($x) {
            case (0):
            {
              if(($get_item_data[0]->$img) !=""){
                echo "<img class='main-view-lg main-$img' src='".$get_item_data[0]->$img."'>";
                $displayCounter++;
              } else {
                break;
              }
            }
            break;
            default:
            {
              if(($x > 0) && ($displayCounter == 0) && ($get_item_data[0]->$img !="")){
                echo "<img class='main-view-lg main-$img' src='".$get_item_data[0]->$img."'>";
                $displayCounter++;
              } else {
                if(($get_item_data[0]->$img) !=""){
                  echo "<img class='main-view-lg main-$img' src='".$get_item_data[0]->$img."' style='display:none'>";
                }
              }
            }
            // endswitch;
          }
        }
      }
    echo "</div>";	// end main-view-lg
  echo "</td>";	// end item-image.
  echo "<td class='item-data'>";
  // echo "<p>DATA HERE</p>";
    echo "<div class='item-spec-container'>";
      echo "<div class='ip-title'>".$get_item_data[0]->item."</div>";
      echo "<div class='ip-type'>".$get_item_data[0]->s1." ".$get_item_data[0]->s2." ".$get_item_data[0]->m0."</div>";
      for ($x=1; $x <=8; $x++) {
        $d = "d".$x;
        echo "<div class='ip-each-data'>";
        if ($get_item_data[0]->$d !=""){
          # Need to revise this here if datatable will be updated.;
          // if legend has break tag, this will remove and replace it with space.
          $splitlegend = explode("<br/>",$get_item_legend[0]->$d);
          $joinlegend = implode(" ",$splitlegend);
          // print_r($splitlegend);
          // echo "<span class='ip-legend'>".$get_item_legend[0]->$d.": </span>";
          echo "<span class='ip-legend'>".$joinlegend.": </span>";
          echo "<span class='ip-spec'>".$get_item_data[0]->$d."</span>";
        }
        echo "</div>";	// end ip-spec;
      }
      echo "<br/>";
      echo "<a class='spec-sheet' href='".$get_item_data[0]->d9."'>SPEC SHEET</a>";

    echo "</div>";	// end item-spec-container div;
  echo "</td>";	// end item-data.
  echo "</tr>";
  echo "<tr>";
  // This is thumbnail selection image.
    echo "<td colspan='2'>";
    echo "<div class='img-thumbnail-section'>";
      for ($x=0; $x<=9; $x++) {
        $img = "img".$x;
        if(($get_item_data[0]->$img) !=""){
          echo "<img class='single-thumb thumb-$img' src='".$get_item_data[0]->$img."'>";
        }
      }
      /*
      for ($y=2; $y<=9; $y++) {
        $img = "img".$y;
        if(($get_item_data[0]->$img) !=""){
          echo "<img class='single-thumb thumb-$img' src='".$get_item_data[0]->$img."'>";
        }
      }
      for ($z=0; $z<2; $z++) {
        $img = "img".$z;
        if(($get_item_data[0]->$img) !=""){
          echo "<img class='single-thumb thumb-$img' src='".$get_item_data[0]->$img."'>";
        }
      }
      */
    echo "</div>";	// end img-thumbnail-section;
    echo "</td>";
  echo "</tr>";
echo "</table>";	// end each-item-spec table.
 ?>
