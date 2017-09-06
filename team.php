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
      foreach($team as $teaminner) {
        echo "<div class='team-individualimg'>";
          echo "<div class='team-crop' id='".strtolower($teaminner->first).strtolower($teaminner->last)."'>";
          echo "<img src='".$teaminner->img."'>";
          echo "</div>";
          echo "<hr class='team-breakline'/>";
          echo "<div class='team-individualname'>".$teaminner->first." ".$teaminner->last."</div>";
          echo "<div class='team-individualtitle'>".$teaminner->title."</div>";
        echo "</div>";
      }
      echo "<div class='team-modal'>";
        echo "<div class='team-modal-container'>";
          echo "<span class='team-close glyphicon glyphicon-remove'></span>";
          foreach($team as $teammodal) {
            echo "<div class='row team-modal-content team-".strtolower($teammodal->first).strtolower($teammodal->last)."'>";
              echo "<div class='col-sm-5 team-modal-iimage'>";
                echo "<img src='".$teammodal->img."'>";
              echo "</div>";
              echo "<div class='col-sm-7'>";
                echo "<div class='team-modal-iname'><span>".$teammodal->first." ".$teammodal->last."</span><div class='team-modal-iname-underline'></div></div>";
              echo "</div>";  // end col-6
            echo "</div>";  //end team-modal-content with individual person name;
          }
        echo "</div>";  // end team-modal-container;
      echo "</div>";  // end team-modal;
      // unset($team);
      // print_r($team);
      ?>
    </div> <!-- END TEAM WRAPPER -->
  </div>

</div>  <!--  end container -->

<?php get_footer(); ?>
