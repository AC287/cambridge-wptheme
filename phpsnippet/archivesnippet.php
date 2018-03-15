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
    echo "<div class='archive-year-container'>";
      echo "<div class='ayc-year custaccordion'>";
        echo "<img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'/>";
        echo "<span>&nbsp;$curYear</span>";
      echo "</div>";  // end ayc-year
      echo "<div class='archive-title custpanel'>";
        foreach($allPost as $allPost2) {
          if($allPost2['year'] == $curYear) {
            echo "<p><a href=".$allPost2['link'].">".$allPost2['title']."<br/><span class='archive-date'>".$allPost2['postdate']."</span></a></p>";
          }
        }
      echo "</div>";
    echo "</div>";
  }
?>
