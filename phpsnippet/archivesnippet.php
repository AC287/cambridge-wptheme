<?php
  $args = array (
    'post_type' => 'post',
  );
  $the_query = new WP_Query ($args);
  $allYear = array();
  $allPost = array();
  if($the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
      array_push($allYear, get_the_date('Y'));
      // print_r(get_the_category(slug));
      $tempAllPosts = array(
        'year' => get_the_date('Y'),
        'title' => get_the_title(),
        'link' => get_post_permalink(),
        'postdate'=>get_the_date('F d, Y'),
      );
      array_push($allPost,$tempAllPosts);
    endwhile;
  endif;
  $allPost = (object)$allPost;
  $minYear = min($allYear);
  for( $curYear = date('Y'); $curYear >= $minYear; $curYear--) {
    // echo $curYear;
    echo "<div class='archive-year-container'>";
      echo "<div class='ayc-year'>";
        echo "<span class='archive-chev-container'>";
          echo "<span class='chev-right'>";
            echo "<img src='".get_bloginfo('template_directory')."/phpsnippet/chev-icon/chev_right.png'/>";
          echo "</span>";
        // echo "<span class='chev-down'>";
        //   include('chev-icon/chev_down.svg');
        // echo "</span>";
        echo "</span>";
        echo "<span>&nbsp;$curYear</span>";
      echo "</div>";
      echo "<div class='archive-title'>";
        foreach($allPost as $allPost2) {
          // echo "for each triggered.";
          // print_r ($allPost2['title']);
          if($allPost2['year'] == $curYear) {
            // echo "if triggered.";
            echo "<p><a href=".$allPost2['link'].">".$allPost2['title']."<br/><span class='archive-date'>".$allPost2['postdate']."</span></a></p>";
          }
        }
      echo "</div>";
    echo "</div>";
  }
?>
