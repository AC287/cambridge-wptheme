<?php
/*
* Template Name: Featured tradeshows
* Template Post Type: post, tradeshows
*/
get_header(); ?>

<div class="container tradeshows-content-container">
  <div class="tradeshows-mainheader">
    <span class="featuredtradeshows-tradeshowslink"><a href="<?php echo home_url();?>/tradeshows/">tradeshows</a></span>
    <div class="tradeshows-mainheader-underline"></div>
  </div>
</div>
<div class="container tradeshowspage">
  <div class="tradeshows-upcomingtradeshows-container">
    <div class="tradeshows-uts-title">
      <span>UPCOMING TRADESHOWS</span>
    </div>
    <div class="tradeshows-uts-contents">
      <?php include 'phpsnippet/upcomingtradeshows.php';?>
    </div>
  </div>
  <div class="tradeshows-allsection">
    <?php
    // Start the loop.
    echo "<div class='featuredtradeshows-content'>";
    while ( have_posts() ) : the_post();
    echo "<div class='fnc-title'>";
    the_title();
    echo "</div>";
    echo get_the_date('F d, Y');
    the_content();
    echo "<div class='return-to-tradeshows'>";
    $homeURL = home_url();
    echo "<a href='$homeURL/tradeshows/'>Return to tradeshows page.</a>";
    echo "</div>";  // end return-to-tradeshows
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
  <div class="tradeshows-archive-col">
    <div class="tradeshows-archive">
      <!-- <span>Archive</span> -->
      <?php include 'phpsnippet/archivesnippet.php';?>
    </div>
  </div>
  </div>
<?php get_footer(); ?>
