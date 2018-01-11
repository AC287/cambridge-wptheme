<!--  Template Name: Search Page  -->

<?php get_header();?>
<div class="container">

  <?php
    // $searchValue = $_REQUEST['header-search'];
    // $searchSubFront = substr($searchValue, 0, 4);
    // preg_match_all('!\d+!', $searchValue, $tempNum);
    // // echo sizeof($tempNum[0]);
    // $searchNum = $tempNum[0]; // This is the array of number.
    // // $searchNum = implode($searchNum);
    // // print_r(implode('',$searchNum));
    // // echo implode($searchNum);
    // // echo $searchValue;
    // echo sizeof($searchNum);
    // global $wpdb;
    //
    // // $searchResult = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE MATCH (`m0`, `s1`, `s2`, `item`, `d0`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `cert0`, `cert1`, `cert2`, `cert3`, `cert4`, `cert5`, `cert6`, `cert7`, `cert8`, `cert9`) AGAINST ($searchValue IN NATURAL LANGUAGE MODE);");
    // // $sql = $wpdb -> prepare('SELECT * FROM wp_prod0 WHERE MATCH (m0, s1, s2, item, d0, d1, d2, d3, d4, d5, d6, d7, d8, d9, cert0, cert1, cert2, cert3, cert4, cert5, cert6, cert7, cert8, cert9) AGAINST (%s IN NATURAL LANGUAGE MODE);', $searchValue);
    // // $searchResult = $wpdb -> get_results($sql);
    // // $searchResult = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE MATCH (m0, s1, s2, item, d0, d1, d2, d3, d4, d5, d6, d7, d8, d9, cert0, cert1, cert2, cert3, cert4, cert5, cert6, cert7, cert8, cert9) AGAINST ('$searchValue' IN BOOLEAN MODE);");
    // // $searchResult = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE MATCH ( m0, s1, s2 ) AGAINST ( '$searchValue' IN NATURAL LANGUAGE MODE);");
    // // $searchResult = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE MATCH (item) AGAINST ('$searchValue' IN NATURAL LANGUAGE MODE);");
    // // $searchResult = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE item LIKE '%$searchValue%'");
    //
    // $searchm0 = $wpdb -> get_results("SELECT DISTINCT m0 FROM wp_prodlegend WHERE m0 REGEXP '$searchValue*';");
    // $searchs1 = $wpdb -> get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE s1 REGEXP '$searchValue*';");
    // $searchs2 = $wpdb -> get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE s2 REGEXP '$searchValue*';");
    // $searchitem = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE item REGEXP '$searchValue*';");
    // $searchdesc = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE d0 REGEXP '$searchValue*';");
    //
    // echo "<h3>You are searching for $searchValue</h3>";
    //
    // if (sizeof($searchm0)==0 and sizeof($searchs1)==0 and sizeof($searchs2)==0 and sizeof($searchitem)==0 and sizeof($searchdesc)==0){
    //
    //   echo "<p>We are unable to find your request. However, here are some results that match with your query.</p>";
    //
    //   if(sizeof($searchNum)>0){
    //     $searchNumSize = sizeof($searchNum);
    //     $innerNum1 = $searchNum[0][0];
    //     $innerNum2 = $searchNum[0][1];
    //     $innerNum3 = $searchNum[0][2];
    //     $innerNum4 = $searchNum[0][3];
    //     $innerNum5 = $searchNum[0][4];
    //     switch($searchNumSize) {
    //       case 1:
    //         // $innerNum1 = $searchNum[0][0];
    //         // $searchItemNum = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE item REGEXP '$innerNum1*';");
    //         echo "case 1 triggered.";
    //         $searchItemNum = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE item LIKE '%$innerNum1%';");
    //         break;
    //       case 2:
    //         // $innerNum1 = $searchNum[0][1];
    //         echo "case 2 triggered.";
    //         $searchItemNum = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE (item REGEXP '$innerNum1*' OR item REGEXP '$innerNum2*');");
    //         break;
    //       case 3:
    //         echo "case 3 triggered.";
    //         $searchItemNum = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE (item REGEXP '$innerNum1*' OR item REGEXP '$innerNum2*' OR item REGEXP '$innerNum3*');");
    //         break;
    //       case 4:
    //         echo "case 4 triggered.";
    //         $searchItemNum = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE (item REGEXP '$innerNum1*' OR item REGEXP '$innerNum2*' OR item REGEXP '$innerNum3*' OR item REGEXP '$innerNum4*');");
    //         break;
    //       case 5:
    //         echo "case 5 triggered.";
    //         $searchItemNum = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE (item REGEXP '$innerNum1*' OR item REGEXP '$innerNum2*' OR item REGEXP '$innerNum3*' OR item REGEXP '$innerNum4*' OR item REGEXP '$innerNum5*');");
    //         break;
    //     }
    //
    //     echo "<p>ITEM CATEGORY TOTAL RESULTS: ".sizeof($searchItemNum)."</p>";
    //
    //
    //   } else {
    //     //This will trigger if search value doesn't include number.
    //     $searchsubfm0 = $wpdb -> get_results("SELECT DISTINCT m0 FROM wp_prodlegend WHERE m0 REGEXP '$searchSubFront*';");
    //     $searchsubfs1 = $wpdb -> get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE s1 REGEXP '$searchSubFront*';");
    //     $searchsubfs2 = $wpdb -> get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE s2 REGEXP '$searchSubFront*';");
    //     $searchsubfitem = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE item REGEXP '$searchSubFront*';");
    //     $searchsubfdesc = $wpdb -> get_results("SELECT * FROM wp_prod0 WHERE d0 REGEXP '$searchSubFront*';");
    //
    //     echo "<p>MAIN CATEGORY TOTAL RESULTS: ".sizeof($searchsubfm0)."</p>";
    //     echo "<p>SUB 1 CATEGORY TOTAL RESULTS: ".sizeof($searchsubfs1)."</p>";
    //     echo "<p>SUB 2 CATEGORY TOTAL RESULTS: ".sizeof($searchsubfs2)."</p>";
    //     echo "<p>ITEM CATEGORY TOTAL RESULTS: ".sizeof($searchsubfitem)."</p>";
    //     echo "<p>DESCRIPTION CATEGORY TOTAL RESULTS: ".sizeof($searchsubfdesc)."</p>";
    //   }
    //
    // } else {  //This will triggered if search result match
    //   echo "<p>MAIN CATEGORY TOTAL RESULTS: ".sizeof($searchm0)."</p>";
    //   echo "<p>SUB 1 CATEGORY TOTAL RESULTS: ".sizeof($searchs1)."</p>";
    //   echo "<p>SUB 2 CATEGORY TOTAL RESULTS: ".sizeof($searchs2)."</p>";
    //   echo "<p>ITEM CATEGORY TOTAL RESULTS: ".sizeof($searchitem)."</p>";
    //   echo "<p>DESCRIPTION CATEGORY TOTAL RESULTS: ".sizeof($searchdesc)."</p>";
    // }

    // $searchValue = strtoupper($_REQUEST['isearch']);
    $searchValue = $_REQUEST['isearch'];
    // echo $searchValue;
    // global $wp_query, $wpdb;
    $prodSearch = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE item LIKE '%$searchValue%';");
    // echo sizeof($prodSearch);
    if (sizeof($prodSearch) != 0) {
      //product search is correct and exist.
      echo "<p>Displaying products for ".$searchValue."...</p>";
      echo "<p>Total results found: ".sizeof($prodSearch)."</p>";
      foreach ($prodSearch as $exactProd) {
        echo "<div class='search-each-container'>";
          echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."'>".$exactProd->item."</a>";
        echo "</div>";  // end search-each-container class.
      }
    } else {
      //product search is incorrect. Searching for keyword.
      echo "<p>Displaying products by keyword: ".$searchValue."...</p>";

    }

  ?>

</div>


<?php get_footer();?>
