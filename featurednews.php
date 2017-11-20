<?php
/*
* Template Name: Featured News
* Template Post Type: post, news
*/
get_header(); ?>

<div class="container news-content-container">
  <div class="news-mainheader">
    <span class="featurednews-newslink"><a href="<?php echo home_url();?>/news/">NEWS</a></span>
    <div class="news-mainheader-underline"></div>
  </div>
</div>
<div class="container featurednewspage">
  <div class="row">
    <div class="col-md-3">
      <div class="news-upcomingtradeshows-container">
        <div class="news-uts-title">
          <span>UPCOMING TRADESHOWS</span>
        </div>
        <div class="news-uts-contents">
          <?php include 'phpsnippet/upcomingtradeshows.php';?>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <?php
      // Start the loop.
      echo "<div class='featurednews-content'>";
      while ( have_posts() ) : the_post();
      echo "<div class='fnc-title'>";
      the_title();
      echo "</div>";
      echo get_the_date('F d, Y');
      the_content();
      echo "<div class='return-to-news'>";
        $homeURL = home_url();
        echo "<a href='$homeURL/news/'>Return to news page.</a>";
      echo "</div>";  // end return-to-news
      echo "</div>";
      /*
      * Include the post format-specific template for the content. If you want to
      * use this in a child theme, then include a file called called content-___.php
      * (where ___ is the post format) and that will be used instead.
      */
      get_template_part( 'content', get_post_format() );

      // If comments are open or we have at least one comment, load up the comment template.
      // if ( comments_open() || get_comments_number() ) :
      //     comments_template();
      // endif;

      // Previous/next post navigation.
      // the_post_navigation( array(
      //   'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'cambridgetheme' ) . '</span> ' .
      //   '<span class="screen-reader-text">' . __( 'post:', 'cambridgetheme' ) . '</span> ' .
      //   '<span class="post-title">%title</span>',
      //   'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'cambridgetheme' ) . '</span> ' .
      //   '<span class="screen-reader-text">' . __( 'post:', 'cambridgetheme' ) . '</span> ' .
      //   '<span class="post-title">%title</span>',
      // ) );

      // End the loop.
      endwhile;
      ?>
      <!-- <?php //printf(wp_get_archives()) ?> -->
    </div>
    <div class="col-md-2 news-archive-col">
      <div class="news-archive">
        <span>Archive</span>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
