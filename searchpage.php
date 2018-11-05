<!--  Template Name: Search Page  -->

<?php get_header();?>
<div class="container">

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div id="product-main-page">

        <div class="cat-bar">
          <?php include 'phpsnippet/productaccordion.php';?>
        </div>

        <div class="search-display">

          <?php
          // print_r(is_numeric('14\"'));
          // $searchValue = strtoupper($_REQUEST['isearch']);
          $searchValue = $_REQUEST['isearch'];
          // echo $searchValue;
          global $wp_query, $wpdb;
          //help link: https://wordpress.stackexchange.com/questions/53194/wordpress-paginate-wpdb-get-results

          $searchArray = explode(" ", $searchValue);
          // print_r(count($searchArray));

          $prodqueryArr = array();
          $prodquery = "";

          for ($i=0; $i < count($searchArray); $i++) {
            // $prodqueryArr[] = "
            // WHERE
            // p.item LIKE '%$searchArray[$i]%'
            // OR p.m0 LIKE '%$searchArray[$i]%'
            // OR p.s1 LIKE '%$searchArray[$i]%'
            // OR p.s2 LIKE '%$searchArray[$i]%'
            // OR p.s3 LIKE '%$searchArray[$i]%'
            // OR p.prodkeyword  LIKE '%$searchArray[$i]%'
            // OR l.catkeyword LIKE '%$searchArray[$i]%'
            // OR p.d1 LIKE '%$searchArray[$i]%'
            // OR p.d2 LIKE '%$searchArray[$i]%'
            // OR p.d3 LIKE '%$searchArray[$i]%'
            // OR p.d4 LIKE '%$searchArray[$i]%'
            // OR p.d5 LIKE '%$searchArray[$i]%'
            // OR p.d6 LIKE '%$searchArray[$i]%'
            // OR p.d7 LIKE '%$searchArray[$i]%'
            // OR p.d8 LIKE '%$searchArray[$i]%'
            // OR p.d9 LIKE '%$searchArray[$i]%'
            // ";
            if ($i==0) {
              $prodqueryArr[] = "
              WHERE
              p.item LIKE '%$searchArray[$i]%'
              OR p.m0 LIKE '%$searchArray[$i]%'
              OR p.s1 LIKE '%$searchArray[$i]%'
              OR p.s2 LIKE '%$searchArray[$i]%'
              OR p.s3 LIKE '%$searchArray[$i]%'
              OR p.jointcat LIKE '%$searchArray[$i]%'
              OR p.prodkeyword  LIKE '%$searchArray[$i]%'
              OR l.catkeyword LIKE '%$searchArray[$i]%'
              OR p.d1 LIKE '%$searchArray[$i]%'
              OR p.d2 LIKE '%$searchArray[$i]%'
              OR p.d3 LIKE '%$searchArray[$i]%'
              OR p.d4 LIKE '%$searchArray[$i]%'
              OR p.d5 LIKE '%$searchArray[$i]%'
              OR p.d6 LIKE '%$searchArray[$i]%'
              OR p.d7 LIKE '%$searchArray[$i]%'
              OR p.d8 LIKE '%$searchArray[$i]%'
              OR p.d9 LIKE '%$searchArray[$i]%'
              ";
            } else {

              $prodqueryArr[] = "
              WHERE
              item LIKE '%$searchArray[$i]%'
              OR m0 LIKE '%$searchArray[$i]%'
              OR s1 LIKE '%$searchArray[$i]%'
              OR s2 LIKE '%$searchArray[$i]%'
              OR s3 LIKE '%$searchArray[$i]%'
              OR jointcat LIKE '%$searchArray[$i]%'
              OR prodkeyword  LIKE '%$searchArray[$i]%'
              OR catkeyword LIKE '%$searchArray[$i]%'
              OR d1 LIKE '%$searchArray[$i]%'
              OR d2 LIKE '%$searchArray[$i]%'
              OR d3 LIKE '%$searchArray[$i]%'
              OR d4 LIKE '%$searchArray[$i]%'
              OR d5 LIKE '%$searchArray[$i]%'
              OR d6 LIKE '%$searchArray[$i]%'
              OR d7 LIKE '%$searchArray[$i]%'
              OR d8 LIKE '%$searchArray[$i]%'
              OR d9 LIKE '%$searchArray[$i]%'
              ";
            }
          }

          // NESTED SELECT SQL FUNCTION
          for ($j=0; $j < count($searchArray); $j++) {
            switch ($j) {
              case 0:
                //First search or very inner search.
                if (count($searchArray) > 1) {
                  $prodquery = "(SELECT p.*,l.catkeyword FROM wp_prod0 p LEFT JOIN wp_prodlegend l ON p.m0=l.m0 AND p.s1<=>l.s1 AND p.s2<=>l.s2 AND p.s3<=>l.s3 ".$prodqueryArr[$j].") AS tempTable$j";
                  // $prodquery = "(SELECT p.*,l.catkeyword FROM wp_prod0 as p LEFT JOIN wp_prodlegend AS l ON p.m0=l.m0 AND p.s1=l.s1 AND p.s2=l.s2 AND p.s3=l.s3 ".$prodqueryArr[$j]." UNION SELECT * FROM wp_prod0 AS p RIGHT JOIN wp_prodlegend AS l ON p.m0=l.m0 AND p.s1=l.s1 AND p.s2=l.s2 AND p.s3=l.s3 ".$prodqueryArr[$j].") AS tempTable$j";
                } else {
                  $prodquery = "SELECT p.*,l.catkeyword FROM wp_prod0 p LEFT JOIN wp_prodlegend l ON p.m0=l.m0 AND p.s1<=>l.s1 AND p.s2<=>l.s2 AND p.s3<=>l.s3 ".$prodqueryArr[$j];
                  // $prodquery = "SELECT p.*,l.catkeyword FROM wp_prod0 AS p LEFT JOIN wp_prodlegend AS l ON p.m0=l.m0 AND p.s1=l.s1 AND p.s2=l.s2 AND p.s3=l.s3 ".$prodqueryArr[$j]." UNION SELECT * FROM wp_prod0 AS RIGHT JOIN wp_prodlegend AS l ON p.m0=l.m0 AND p.s1=l.s1 AND p.s2=l.s2 AND p.s3=l.s3 ".$prodqueryArr[$j];
                }

              break;
              case (count($searchArray)-1):
                //This is the outer search.
                $prodquery = "SELECT * FROM ".$prodquery." ".$prodqueryArr[$j];

              break;
              default:
                // default search.
                $prodquery = "(SELECT * FROM ".$prodquery." ".$prodqueryArr[$j].") AS tempTable$j";
              break;
            }
          }

          // if(count($searchArray) == 1) {
          //   $prodquery = $prodquery."
          //   ORDER BY ((concat_ws(p.m0,p.s1,p.s2,p.s3) LIKE '%$searchValue%')) DESC
          //   ";
          // } else {
          //   $prodquery = $prodquery."
          //   ORDER BY (";
          //   for($k=0; $k < count($searchArray); $k++) {
          //     switch($k) {
          //       // case 0:
          //       //   $prodquery = $prodquery."(concat_ws(p.m0,p.s1,p.s2,p.s3) LIKE '%$searchArray[$k]%')";
          //       // break;
          //       case (count($searchArray)-1):
          //         $prodquery = $prodquery."(concat_ws(m0,s1,s2,s3) LIKE '%$searchArray[$k]%'))";
          //       break;
          //       default:
          //         $prodquery = $prodquery."(concat_ws(m0,s1,s2,s3) LIKE '%$searchArray[$k]%') + ";
          //       break;
          //     }
          //   }
          //   $prodquery = $prodquery." DESC";
          // }

          // $prodquery = $prodquery."
          // ORDER BY (concat_ws(m0,s1,s2,s3) LIKE '%$searchValue%')
          // ";

          // $prodquery = $prodquery."
          // ORDER BY (m0 LIKE '%$searchValue%') DESC
          // ";

/*
          SELECT * FROM (SELECT p.*,l.catkeyword FROM wp_prod0 p LEFT JOIN wp_prodlegend l ON p.m0=l.m0 AND p.s1<=>l.s1 AND p.s2<=>l.s2 AND p.s3<=>l.s3 WHERE p.item LIKE '%electrical%' OR p.m0 LIKE '%electrical%' OR p.s1 LIKE '%electrical%' OR p.s2 LIKE '%electrical%' OR p.s3 LIKE '%electrical%' OR p.jointcat LIKE '%electrical%' OR p.prodkeyword LIKE '%electrical%' OR l.catkeyword LIKE '%electrical%' OR p.d1 LIKE '%electrical%' OR p.d2 LIKE '%electrical%' OR p.d3 LIKE '%electrical%' OR p.d4 LIKE '%electrical%' OR p.d5 LIKE '%electrical%' OR p.d6 LIKE '%electrical%' OR p.d7 LIKE '%electrical%' OR p.d8 LIKE '%electrical%' OR p.d9 LIKE '%electrical%' ) AS tempTable0 WHERE item LIKE '%tape%' OR m0 LIKE '%tape%' OR s1 LIKE '%tape%' OR s2 LIKE '%tape%' OR s3 LIKE '%tape%' OR jointcat LIKE '%tape%' OR prodkeyword LIKE '%tape%' OR catkeyword LIKE '%tape%' OR d1 LIKE '%tape%' OR d2 LIKE '%tape%' OR d3 LIKE '%tape%' OR d4 LIKE '%tape%' OR d5 LIKE '%tape%' OR d6 LIKE '%tape%' OR d7 LIKE '%tape%' OR d8 LIKE '%tape%' OR d9 LIKE '%tape%' ORDER BY
          ((concat_ws(m0,s1,s2,s3) LIKE '%electrical%')+(concat_ws(m0,s1,s2,s3) LIKE '%tape%')) DESC
*/



          // print_r($prodquery);

          $total = $wpdb -> get_var("SELECT COUNT(1) FROM (${prodquery}) AS combined_table");
          // echo "$total";
          // $total_query = "SELECT COUNT(*) FROM wp_prod0";
          // $total = $wpdb->get_var($total_query);
          $items_per_page = 10;
          $page = isset($_GET['cpage']) ? abs((int) $_GET['cpage']) : 1;

          $offset = ($page * $items_per_page) - $items_per_page;
          $prodSearch = $wpdb->get_results($prodquery . "LIMIT ${offset}, ${items_per_page}");

          echo "<div class='ps-result-header'>";
          echo "<div class='ps-topinfo'>";
            echo "<div class='ps-search-results'>";
              echo "<p>".$total."&nbsp;".((int)$total > 1 ? 'items' : 'item' )."</p>";
            echo "</div>";
            echo "<div class='ps-pages pagination'>";
              echo paginate_links( array(
                'base' => add_query_arg('cpage','%#%'),
                'format' => '',
                'prev_text' => __('&laquo;'),
                'next_text' => __('&raquo;'),
                'total' => ceil($total/$items_per_page),
                'current' => $page,
                'mid_size' => 2,
                // 'type' => 'list'
              ));
            echo "</div>";
          echo "</div>";

          if (sizeof($prodSearch) != 0) {
            //product search is correct and exist.
            echo "<div class='search-found'>";
              echo "<p>Displaying ".((int)$total > 1 ? 'results' : 'result')." for ".stripslashes($searchValue)."&nbsp;. . .</p>";
            echo "</div>";
            echo "</div>";  // end if for ps-result-header.

            foreach ($prodSearch as $exactProd) {
              echo "<div class='search-each-container'>";
                echo "<div class='sec-thumb'>";
                  echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."&m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."' target='_blank' rel='noopener noreferrer'>";
                  $thumbCounter = 0;
                  for($x=0; $x<=9; $x++) {
                    //This will loop through all 10 image slots and see if there are any images.
                    $img = "img".$x;
                    if(($exactProd->$img) !=""){
                      echo "<img src='".$exactProd->$img."'>";
                      $thumbCounter++;
                      break;
                    }
                  }
                  if($thumbCounter == 0) {
                    //if no images are found, it will default to image placeholder.
                    echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
                  }
                  echo "</a>";
                echo "</div>";
                echo "<div class='sec-items'>";
                  echo "<div class='seci-title'>";
                    echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."&m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."&s3=".urlencode($exactProd->s3)."' target='_blank' rel='noopener noreferrer'>".$exactProd->item."</a>";

                    echo "<p>";
                      echo $exactProd->m0." > ";
                      if($exactProd->s1){
                        echo $exactProd->s1;
                        if(!empty($exactProd->s2)){
                          echo " > ";
                        }
                      }
                      if($exactProd->s2){
                        echo $exactProd->s2;
                        if(!empty($exactProd->s3)){
                          echo " > ";
                        }
                      }
                      if($exactProd->s3) {
                        echo $exactProd->s3;
                      }
                    echo "</p>";
                  echo "</div>";  // end seci-title
                  echo "<div class='seci-spec'>";
                    $m0 = addslashes($exactProd->m0);
                    $s1 = addslashes($exactProd->s1);
                    $s2 = addslashes($exactProd->s2);
                    $s3 = addslashes($exactProd->s3);

                    if ($s1 != "" and $s2 !="" and $s3 !=""){
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0' AND s1='$s1' AND s2='$s2' AND s3='$s3';");
                    }  elseif($s1 != "" and $s2 != ""){
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0' AND s1='$s1' AND s2='$s2';");
                    } elseif ($s1 != "" and $s2 == ""){
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0' AND s1='$s1';");
                    } else {
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0';");
                    }

                    // print_r($get_item_legend);

                    echo "<table class='secis-each-data-table'>";
                      for ($y=1; $y < 9; $y++) {
                        $d = "d".$y;
                        if ($exactProd->$d !="") {
                          echo "<tr class='secis-each-data'>";
                          echo "<th class='secis-legend'>".$get_item_legend[0]->$d."</th><td class='secis-data'>".$exactProd->$d."</td>";
                          echo "</tr>";
                        }
                      }
                    echo "</table>";
                    echo "<div class='secis-blur'></div>";
                  echo "</div>";  // end seci-spec;
                  echo "<div class='seci-button'>";
                    echo "<a class='btn btn-secondary' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."&m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."&s3=".urlencode($exactProd->s3)."' role='button' target='_blank' rel='noopener noreferrer'>View Details</a>";
                  echo "</div>";
                echo "</div>";  // end sec-items.
              echo "</div>";  // end search-each-container class.
            }
          } else {
            //product search is incorrect. Searching for keyword.
            echo "<div class='search-notfound'>";
              echo "<p>No match found for ".stripslashes($searchValue).".</p>";
            echo "</div>";
            echo "</div>";  // end else for ps-result-header.

          };

          echo "<div class='ps-pages pagination'>";
            echo paginate_links( array(
            'base' => add_query_arg('cpage','%#%'),
            'format' => '',
            'prev_text' => __('&laquo;'),
            'next_text' => __('&raquo;'),
            'total' => ceil($total/$items_per_page),
            'current' => $page,
            'mid_size' => 2,
            // 'type' => 'list'
            ));
            echo "</div>";

            ?>

          </div>  <!--  end search display  -->

      </div>  <!--  end product-main-page id  -->

    </main> <!--  end main tag  -->
  </div>  <!--  end id primary  -->


</div>


<?php get_footer();?>
