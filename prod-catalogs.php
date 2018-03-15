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
        usort($catalogs,function($a,$b){  // sort by id.
          $c =  $a->id - $b->id;
          return $c;
        });
        foreach($catalogs as $catalogeach) {
          echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
            echo "<div class='catalog-each-thumb'>";
              echo "<img src=".$catalogeach->thumb.">";
            echo "</div>";
            echo "<span>".$catalogeach->name."</span>";
          echo "</a>";
        }
      echo "</div>";  // end catalogs-all

      //HVAC only catalogs
      echo "<div class='catalog-thumbinner catalogs-hvac'>";

        usort($catalogs,function($a,$b){  // sort by hvac value
          $c =  $a->hvac - $b->hvac;
          return $c;
        });

        foreach($catalogs as $catalogeach) {
          if ($catalogeach->hvac !=''){
            echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
              echo "<div class='catalog-each-thumb'>";
                echo "<img src=".$catalogeach->thumb.">";
              echo "</div>";
              echo "<span>".$catalogeach->name."</span>";
            echo "</a>";
          }
        }
      echo "</div>";  // end catalogs-hvac

      //Plumbing only catalogs
      echo "<div class='catalog-thumbinner catalogs-plumbing'>";

        usort($catalogs,function($a,$b){  // sort by plumbing
          $c =  $a->plumbing - $b->plumbing;
          return $c;
        });

        foreach($catalogs as $catalogeach) {
          if ($catalogeach->plumbing !=''){
            echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
              echo "<div class='catalog-each-thumb'>";
                echo "<img src=".$catalogeach->thumb.">";
              echo "</div>";
              echo "<span>".$catalogeach->name."</span>";
            echo "</a>";
          }
        }
      echo "</div>";  // end catalogs-plumbing

      // Electrical only catalogs
      echo "<div class='catalog-thumbinner catalogs-electrical'>";

        usort($catalogs,function($a,$b){  // sort by electrical
          $c =  $a->electrical - $b->electrical;
          return $c;
        });

        foreach($catalogs as $catalogeach) {
          if ($catalogeach->electrical !=''){
            echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
              echo "<div class='catalog-each-thumb'>";
                echo "<img src=".$catalogeach->thumb.">";
              echo "</div>";
              echo "<span>".$catalogeach->name."</span>";
            echo "</a>";
          }
        }
      echo "</div>";  // end catalogs-electrical

      // Auto only catalog
      echo "<div class='catalog-thumbinner catalogs-auto'>";

        usort($catalogs,function($a,$b){   // Sort by auto
          $c =  $a->auto - $b->auto;
          return $c;
        });

        foreach($catalogs as $catalogeach) {
          if ($catalogeach->auto !=''){
            echo "<a href='".$catalogeach->content."' target='_blank' class='catalog-each'>";
              echo "<div class='catalog-each-thumb'>";
                echo "<img src=".$catalogeach->thumb.">";
              echo "</div>";
              echo "<span>".$catalogeach->name."</span>";
            echo "</a>";
          }
        }
      echo "</div>";  // end catalogs-auto

      // Sign hanging only catalog
      echo "<div class='catalog-thumbinner catalogs-signhanging'>";

        usort($catalogs,function($a,$b){  // sort by sign hanging
          $c =  $a->signhanging - $b->signhanging;
          return $c;
        });

        foreach($catalogs as $catalogeach) {
          if ($catalogeach->signhanging !=''){
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
