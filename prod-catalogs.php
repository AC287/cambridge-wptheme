<!-- Template Name: Catalogs -->

<?php get_header(); ?>

<div class="container">
  <div class="catalog-mainheader">
    <span>CATALOGS</span>
    <div class="catalog-mainheader-underline"></div>
  </div>  <!--  end catalog-title  -->

  <div class="catalog-buttons btn-group" data-toggle="buttons">
    <!-- <button type="button" class="catalog-all btn-lg catalog-custbtn" data-toggle="button" aria-pressed="true" autocomplete="off" disabled >All Catalogs</button>
    <button type="button" class="catalog-hvac btn-lg catalog-custbtn" data-toggle="button" aria-pressed="false" autocomplete="off" >HVAC</button>
    <button type="button" class="catalog-plumbing btn-lg catalog-custbtn" data-toggle="button" aria-pressed="false" autocomplete="off" >Plumbing</button>
    <button type="button" class="catalog-electrical btn-lg catalog-custbtn" data-toggle="button" aria-pressed="false" autocomplete="off" >Electrical</button>
    <button type="button" class="catalog-auto btn-lg catalog-custbtn" data-toggle="button" aria-pressed="false" autocomplete="off" >Auto</button>
    <button type="button" class="catalog-signhanging btn-lg catalog-custbtn" data-toggle="button" aria-pressed="false" autocomplete="off" >Sign Hanging</button> -->
    <label class="btn btn-lg catalog-custbtn active">
      <input type="radio" name="catalogs" id="catalogs-all" autocomplete="off" checked> All Catalogs
    </label>
    <label class="btn btn-lg catalog-custbtn">
      <input type="radio" name="catalogs" id="catalogs-hvac" autocomplete="off"> HVAC
    </label>
    <label class="btn btn-lg catalog-custbtn">
      <input type="radio" name="catalogs" id="catalogs-plumbing" autocomplete="off"> Plumbing
    </label>
    <label class="btn btn-lg catalog-custbtn">
      <input type="radio" name="catalogs" id="catalogs-electrical" autocomplete="off"> Electrical
    </label>
    <label class="btn btn-lg catalog-custbtn">
      <input type="radio" name="catalogs" id="catalogs-auto" autocomplete="off"> Auto
    </label>
    <label class="btn btn-lg catalog-custbtn">
      <input type="radio" name="catalogs" id="catalogs-signhanging" autocomplete="off"> Sign Hanging
    </label>
  </div>

  <div class="catalog-thumbnails">

    <?php
      global $wpdb;
      $catalogs = $wpdb->get_results("SELECT * FROM wp_catalog ORDER BY id ASC;");
      echo "<div class='catalog-thumbinner catalogs-all'>";
        foreach($catalogs as $catalogeach) {
          echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
            echo "<div class='catalog-each-thumb'>";
              echo "<img src=".$catalogeach->thumb.">";
            echo "</div>";
            echo "<span>".$catalogeach->name."</span>";
          echo "</a>";
        }
      echo "</div>";  // end catalogs-all

      echo "<div class='catalog-thumbinner catalogs-hvac'>";
      // print_r(gettype($catalogs));
        foreach($catalogs as $catalogeach) {
          if ($catalogeach->hvac !=''){
            // for($x=count())
            echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
              echo "<div class='catalog-each-thumb'>";
                echo "<img src=".$catalogeach->thumb.">";
              echo "</div>";
              echo "<span>".$catalogeach->name."</span>";
            echo "</a>";
          }
        }
      echo "</div>";  // end catalogs-hvac

      echo "<div class='catalog-thumbinner catalogs-plumbing'>";
      // print_r(gettype($catalogs));
        foreach($catalogs as $catalogeach) {
          if ($catalogeach->plumbing !=''){
            // for($x=count())
            echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
              echo "<div class='catalog-each-thumb'>";
                echo "<img src=".$catalogeach->thumb.">";
              echo "</div>";
              echo "<span>".$catalogeach->name."</span>";
            echo "</a>";
          }
        }
      echo "</div>";  // end catalogs-plumbing

      echo "<div class='catalog-thumbinner catalogs-electrical'>";
      // print_r(gettype($catalogs));
        foreach($catalogs as $catalogeach) {
          if ($catalogeach->electrical !=''){
            // for($x=count())
            echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
              echo "<div class='catalog-each-thumb'>";
                echo "<img src=".$catalogeach->thumb.">";
              echo "</div>";
              echo "<span>".$catalogeach->name."</span>";
            echo "</a>";
          }
        }
      echo "</div>";  // end catalogs-electrical

      echo "<div class='catalog-thumbinner catalogs-auto'>";
      // print_r(gettype($catalogs));
        foreach($catalogs as $catalogeach) {
          if ($catalogeach->auto !=''){
            // for($x=count())
            echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
              echo "<div class='catalog-each-thumb'>";
                echo "<img src=".$catalogeach->thumb.">";
              echo "</div>";
              echo "<span>".$catalogeach->name."</span>";
            echo "</a>";
          }
        }
      echo "</div>";  // end catalogs-auto

      echo "<div class='catalog-thumbinner catalogs-signhanging'>";
      // print_r(gettype($catalogs));
        foreach($catalogs as $catalogeach) {
          if ($catalogeach->signhanging !=''){
            // for($x=count())
            echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
              echo "<div class='catalog-each-thumb'>";
                echo "<img src=".$catalogeach->thumb.">";
              echo "</div>";
              echo "<span>".$catalogeach->name."</span>";
            echo "</a>";
          }
        }
      echo "</div>";  // end catalogs-signhanging

    ?>

  </div>

</div>  <!--  end container  -->

<?php get_footer(); ?>
