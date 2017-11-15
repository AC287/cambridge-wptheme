<!--  Template Name: News  -->

<?php get_header(); ?>

<div class="container news-content-container">
  <div class="news-mainheader">
    <span>NEWS</span>
    <div class="news-mainheader-underline"></div>
  </div>
</div>
<div class="container">
  <?php
    $args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => 1,
    'year'  => the_date('Y'),
    );
    //This will display post from current year only.
    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
        echo "<div class='allpost-link-container'>";
        if(has_post_thumbnail()){
          echo "<div class='allpost-thumbnailimg'>";
          the_post_thumbnail('thumbnail');
          echo "</div>";
        }
          echo "<div class='allpost-contents'>";
            echo "<p class='allpost-date'>".get_the_date('F d, Y')."</p>";
            the_title();
            the_excerpt();
            echo "<a href=".get_post_permalink().">Click for detail</a>";
          echo "</div>";
        echo "</div>";
        echo "<hr/>";
    endwhile;
    endif;

    wp_reset_postdata();
  ?>
</div>
<?php get_footer(); ?>
