<!--  Template Name: Team. -->

<?php get_header(); ?>

<div class="container">

  <div class="team-personnels">
    <div class="team-personnels-maintitle">
      <span>MEET THE TEAM</span>
      <div class="team-personnels-maintitle-underline">
      </div>
    </div>

    <div class="team-wrapper">
    <?php
      global $wpdb;

      $team = $wpdb->get_results("SELECT * FROM wp_personnel ORDER BY sort ASC;");
      // print_r(sizeof($team));
      foreach($team as $team) {
        echo "<div class='team-individualimg'>";
          echo "<div class='team-crop'>";
            echo "<img src='".$team->img."'>";
          echo "</div>";
          echo "<hr class='team-breakline'/>";
          echo "<div class='team-individualname'>".$team->first." ".$team->last."</div>";
          echo "<div class='team-individualtitle'>".$team->title."</div>";
        echo "</div>";
      }

      ?>
    </div> <!-- END TEAM WRAPPER -->
  </div>

</div>  <!--  end container -->

<?php get_footer(); ?>
