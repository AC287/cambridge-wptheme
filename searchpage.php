<!--  Template Name: Search Page  -->

<?php get_header();?>
<div class="container">

  <?php
    // $searchValue = strtoupper($_REQUEST['isearch']);
    $searchValue = $_REQUEST['isearch'];
    // echo $searchValue;
    global $wp_query, $wpdb;
    //help link: https://wordpress.stackexchange.com/questions/53194/wordpress-paginate-wpdb-get-results

    $prodquery = "
      (SELECT * FROM wp_prod0 WHERE
      item LIKE '%$searchValue%'
      OR m0 LIKE '%$searchValue%'
      OR s1 LIKE '%$searchValue%'
      OR s2 LIKE '%$searchValue%'
      OR keyword  LIKE '%$searchValue%'
      OR d1 LIKE '%$searchValue%'
      OR d2 LIKE '%$searchValue%'
      OR d3 LIKE '%$searchValue%'
      OR d4 LIKE '%$searchValue%'
      OR d5 LIKE '%$searchValue%'
      OR d6 LIKE '%$searchValue%'
      OR d7 LIKE '%$searchValue%'
      OR d8 LIKE '%$searchValue%'
      OR d9 LIKE '%$searchValue%'
      )";
    $total = $wpdb -> get_var("SELECT COUNT(1) FROM (${prodquery}) AS combined_table");
    echo "$total";
    // $total_query = "SELECT COUNT(*) FROM wp_prod0";
    // $total = $wpdb->get_var($total_query);
    $items_per_page = 10;
    $page = isset($_GET['cpage']) ? abs((int) $_GET['cpage']) : 1;

    $offset = ($page * $items_per_page) - $items_per_page;
    $prodSearch = $wpdb->get_results($prodquery . "LIMIT ${offset}, ${items_per_page}");

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

    };

    echo "<div class='pagination'>";
    echo paginate_links( array(
      'base' => add_query_arg('cpage','%#%'),
      'format' => '',
      'prev_text' => __('&laquo;'),
      'next_text' => __('&raquo;'),
      'total' => ceil($total/$items_per_page),
      'current' => $page
      // 'type' => 'list'
    ));
    echo "</div>";

  ?>

</div>


<?php get_footer();?>
