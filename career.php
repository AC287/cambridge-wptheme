<!--  Template Name: Career  -->

<?php get_header(); ?>

<div class="career-banner">
  <div class="cb-img">
    <img src="<?php bloginfo('template_directory')?>/images/banners/career-banner.jpg">
  </div>
  <div class="cb-textbox">
    <div class="cb-textbox1">
      <span>WHAT DO YOU WANT TO BE WHEN YOU GROW UP?</span>
    </div>
    <div class="cb-textbox2">
      <div class="cb2-i1">
        <span>JOIN US</span>
      </div>
      <div class="cb2-i2">
        <span>OPPORTUNITY AND SUCCESS IS RIGHT AROUND THE CORNER</span>
      </div>
    </div>
  </div>
</div>

<div class="career-callout">
  <div class="container">
    <p class="career-blusm">Cambridge Resources is a fun and exciting place to work.</p>
    <p class="career-blasm">It's a place where employees, regardless of what department they are in, can be sure that they will spend their time at work</p>
    <p class="career-blusm">"Solving interesting problems and creating value in their workspaces."</p>
    <p class="career-blasm">If you are interested and qualified for any of the positions listed below, or if you think you can contribute to our company in another way, please email a cover letter and your resume to <a href="">info@cambridgeresources.com</a></p>
    <p class="career-blulg">We look forward to hearing from you.</p>
  </div>
</div>

<div class="container career-content-container">
  <div class="career-mainheader">
    <span>CURRENT CAREER OPENINGS</span>
    <div class="career-mainheader-underline"></div>
  </div>
  <div class="career-open">
    <?php
      global $wpdb;
      $career = $wpdb->get_results("SELECT * FROM wp_career WHERE active='y' ORDER BY id ASC;");
      foreach($career as $careerinner) {
        echo "<div class='career-open-container careerid".$careerinner->id."'>";
          echo "<div class='career-open-each'>";
            echo "<div class='coe-email'>";
              echo "<span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>";
              echo "<a href='mailto:info@cambridgeresources.com?subject=CAREER - ".$careerinner->position."'>E-mail Us</a>";
            echo "</div>";
            echo "<div class='coe-position'>".$careerinner->position."</div>";
            echo "<div class='coe-location'>".$careerinner->location."</div>";
            if($careerinner->summary != ''){
              echo "<div class='coe-summary'><p>".$careerinner->summary."</p></div>";
            }
            if($careerinner->tag != ''){
              echo "<div class='coe-tag'><p>".$careerinner->tag."</p></div>";
            }
            echo "<div class='coe-description'><p>".$careerinner->description."</p></div>";
            echo "<div class='coe-efxx'>";
              echo "<span>ESSENTIAL FUNCTION: </span>";
              echo "<ul>";
              for($x=0; $x<=20; $x++) {
                $ef = 'ef'.$x;
                if($careerinner->$ef !=''){
                  echo "<li>".$careerinner->$ef."</li>";
                }
              }
              echo "</ul>";
            echo "</div>";  // end coe-efxx;
            echo "<div class='coe-qxx'>";
              echo "<span>QUALIFICATIONS: </span>";
              echo "<ul>";
              for($x=0; $x<=20; $x++) {
                $q = 'q'.$x;
                if($careerinner->$q !=''){
                  echo "<li>".$careerinner->$q."</li>";
                }
              }
              echo "</ul>";
            echo "</div>";  // end coe-qxx;
          echo "</div>";  // end career-open-each;
        echo "</div>";  // end career-open-container;
        echo "<div class='career-open-expand'>";
          echo "<a id='careerid".$careerinner->id."'>Click to expand</a>";
        echo "</div>";
        echo "<hr/>";
      }
    ?>
  </div>
</div>

<div class="career-pagecallout">
  <div class="container">
    <div class="career-pagecallout-contents">
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">
            <?php the_content(); ?>
            <!-- <p>FORM HERE</p> -->
          </div><!-- .entry-content -->
        </article><!-- #post -->
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
