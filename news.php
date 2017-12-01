<!--  Template Name: News  -->

<?php get_header(); ?>

<div class="container news-content-container">
  <div class="news-mainheader">
    <span>NEWS</span>
    <div class="news-mainheader-underline"></div>
  </div>
</div>
<div class="container newspage">
  <div class="row">
    <div class="col-md-2 news-upcomingtradeshows-container">
      <div class="news-uts-title">
        <span>UPCOMING TRADESHOWS</span>
      </div>
      <div class="news-uts-contents">
        <?php include 'phpsnippet/upcomingtradeshows.php';?>
      </div>
    </div>
    <div class="col-md-8 news-allsection">
      <?php
      $args = array(
        'post_type' => 'post',
        // 'ignore_sticky_posts' => 1,
        // 'year'  => date('Y'),
        // 'date_query' => array(
        //   'year' => date('Y'),
        // ),
      );
      //This will display post from current year only.
      $the_query = new WP_Query( $args );

      if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
        echo "<div class='allpost-link-container'>";
        if(has_post_thumbnail()){
          echo "<div class='allpost-thumbnailimg'>";
          // the_post_thumbnail(array(250,300));
            echo "<a href=".get_post_permalink().">";
              the_post_thumbnail('medium');
            echo "</a>";
          echo "</div>";
        }
        echo "<div class='allpost-contents'>";
          echo "<p class='allpost-date'><a href=".get_post_permalink().">".get_the_date('F d, Y')."</a></p>";
          echo "<span class='news-post-title'>";
            the_title();
          echo "</span>";
          the_excerpt();  //this will only show excerpt of the news.
          echo "<a href=".get_post_permalink().">Click for detail</a>";
        echo "</div>";
        echo "</div>";
        echo "<hr/>";
      endwhile;
    endif;

    wp_reset_postdata();
    wp_reset_query();
    ?>
    </div>
    <div class="col-md-2 news-archive-col">
      <div class="news-archive">
        <!-- <span>ARCHIVE</span> -->
        <?php include 'phpsnippet/archivesnippet.php';?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
