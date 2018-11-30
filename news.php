<!--  Template Name: tradeshows  -->

<?php get_header(); ?>

<div class="container tradeshows-content-container">
  <div class="tradeshows-mainheader">
    <span>TRADESHOWS</span>
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
    $paged = (get_query_var('paged')) ? get_query_var('paged'):'1';
    // $page = isset($_GET['cpage']) ? abs((int) $_GET['cpage']) : 1;

    $args = array(
      'nopaging'=>false,
      'paged'=>$paged,
      'posts_per_page' =>5,
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


      // previous_posts_link('<< Newer Entries');
      // next_posts_link('Older Entries>>', $the_query->max_num_pages);

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
      echo "<span class='tradeshows-post-title'>";
      the_title();
      echo "</span>";
      the_excerpt();  //this will only show excerpt of the tradeshows.
      echo "<a href=".get_post_permalink().">Click for detail</a>";
      echo "</div>";
      echo "</div>";
      echo "<hr/>";
    endwhile;
    // next_posts_link('Older Entries >>', $the_query->max_num_pages);

    // echo "<div class='ps-pages pagination'>";
    //   echo paginate_links( array(
    //     'base' => add_query_arg('cpage','%#%'),
    //     // 'format' => '',
    //     'prev_text' => __('&laquo;'),
    //     'next_text' => __('&raquo;'),
    //     // 'total' => ceil($total/$items_per_page),
    //     'current' => $page,
    //     'mid_size' => 2,
    //     // 'type' => 'list'
    //   ));
    // echo "</div>";
    echo "<div class='tradeshows-old-new'>";
      echo "<div class='ton-new'>";
        previous_posts_link('<span class="glyphicon glyphicon-chevron-left"></span> Newer Entries');
      echo "</div>";
      echo "<div class='ton-old'>";
          next_posts_link('Older Entries <span class="glyphicon glyphicon-chevron-right"></span>', $the_query->max_num_pages);
      echo "</div>";
    echo "</div>";
    endif;

    wp_reset_postdata();
    wp_reset_query();
    ?>
  </div>
  <div class="tradeshows-archive-col">
    <div class="tradeshows-archive">
      <!-- <span>ARCHIVE</span> -->
      <?php include 'phpsnippet/archivesnippet.php';?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
