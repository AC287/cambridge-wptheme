<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title><?php bloginfo('name');?></title> -->
    <?php wp_head(); ?>
    <?php
      $curLocation = $_SERVER['REQUEST_URI'];
      $curLocationArr = array_values(array_filter(explode('/',$curLocation)));
      //Split string at "/" and make the string into array. array_filter remove empty array element. array_values restructure array.
      // print_r($_SERVER);
      if($_SERVER["REMOTE_ADDR"]=="127.0.0.1"){   //Set whether this is dev or live.
        $local=True;
        // array_splice($curLocationArr, 0, 1); // This removes local 1st folder path.
        unset($curLocationArr[0]);
        $curLocationArr = array_values($curLocationArr);

      } else {
        $local=False;

      }

      for($x=0; $x < count($curLocationArr); $x++){
        if((int)$curLocationArr[$x]!=0) {
          $curLocationArr[$x] = (int)$curLocationArr[$x];
        }
      }


    ?>

    <?php include 'phpsnippet/titletag.php';?>
  </head>

  <body>

    <div id="all-container">
      <div class="top-nav">
        <div class="container">
          <div class="row">
            <div class="col-sm-3 cambridge-white-logo">
              <a href="<?php echo home_url();?>"><img src="<?php bloginfo('template_directory')?>/images/Logo_White.png" height="40px"></a>
            </div>  <!-- end cambridge-logo-white -->
            <div class="col-sm-9">
              <div class="tn-inner-table">
                <div class="row">
                  <div class="col-sm-12">
                    <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/cambridgeresources/">
                      <span class="fa fa-facebook-official"></span>
                    </a>
                    <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://twitter.com/CambridgeRes">
                      <span class="fa fa-twitter-square"></span>
                    </a>
                    <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/cambridgeresources/">
                      <span class="fa fa-linkedin-square"></span>
                    </a>
                  </div>
                </div>
                <div class="row navi1-btn">
                  <div class="col-sm-12 header-nav-container">
                    <div id="header-rnav" class="header-mnav">
                      <a class="header-navicon">&#9776;</a>
                      <a class="home" href="<?php echo home_url();?>">
                        <div class="header-navi-title">HOME</div>
                        <?php
                          // if($local && count($curLocationArr) == 1) {
                          //   // This is local dev.
                          //   $display = "block";
                          // } else {
                          //   // This is live.
                          // }
                          if(empty($curLocationArr)){
                            // echo"THIS IS TRUE";
                            $display = "block";
                          } else {
                            // echo"FALSE";
                            $display = "none";
                          }
                          echo "<div class='header-navi-selector' style='display:".$display."'></div>";
                        ?>
                      </a>
                      <a class="products" href="<?php echo home_url();?>/products/">
                        <div class="header-navi-title">PRODUCTS</div>
                        <?php
                          if(in_array('products',$curLocationArr) || in_array('search',$curLocationArr)){
                            $display = "block";
                          } else {
                            $display = "none";
                          }
                          echo "<div class='header-navi-selector' style='display:".$display."'></div>";
                        ?>
                      </a>
                      <a class="about" href="<?php echo home_url();?>/about/">
                        <div class="header-navi-title">ABOUT</div>
                        <?php
                          if(in_array('about',$curLocationArr)){
                            $display = "block";
                          } else {
                            $display = "none";
                          }
                          echo "<div class='header-navi-selector' style='display:".$display."'></div>";
                        ?>
                      </a>
                      <a class="team" href="<?php echo home_url();?>/team/">
                        <div class="header-navi-title">OUR TEAM</div>
                        <?php
                          if(in_array('team',$curLocationArr)){
                            $display = "block";
                          } else {
                            $display = "none";
                          }
                          echo "<div class='header-navi-selector' style='display:".$display."'></div>";
                        ?>
                      </a>
                      <a class="brands" href="<?php echo home_url();?>/brands/">
                        <div class="header-navi-title">BRANDS</div>
                        <?php
                          if(in_array('brands',$curLocationArr)){
                            $display = "block";
                          } else {
                            $display = "none";
                          }
                          echo "<div class='header-navi-selector' style='display:".$display."'></div>";
                        ?>
                      </a>
                      <a class="career" href="<?php echo home_url();?>/career/">
                        <div class="header-navi-title">CAREER</div>
                        <?php
                          if(in_array('career',$curLocationArr)){
                            $display = "block";
                          } else {
                            $display = "none";
                          }
                          echo "<div class='header-navi-selector' style='display:".$display."'></div>";
                        ?>
                      </a>
                      <a class="contact" href="<?php echo home_url();?>/contact/">
                        <div class="header-navi-title">CONTACT</div>
                        <?php
                          if(in_array('contact',$curLocationArr)){
                            $display = "block";
                          } else {
                            $display = "none";
                          }
                          echo "<div class='header-navi-selector' style='display:".$display."'></div>";
                        ?>
                      </a>
                    </div>
                  </div>  <!-- end col-sm-12  -->
                </div>
              </div>
            </div>  <!--  end col-sm-9  -->
          </div> <!--  end row  -->
        </div>
        <!-- end top-nav container -->
      </div>  <!-- end top-nav -->
      <div class="top-nav2">
        <div class="container">
          <div class="tn2-overall-table" href="<?php echo home_url();?>/brands/">
            <a href="<?php echo home_url();?>/brands/">
              <div class="nav2">
                <span>OUR BRANDS</span>
              </div>
              <div class="nav2-logo nav2-coda">
                <a href="http://www.codaresources.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php bloginfo('template_directory')?>/images/brands/codadev_logo.png" height="25px">
                </a>
              </div>
              <div class="nav2-logo nav2-amram">
                <a href="" target="_blank" rel="noopener noreferrer">
                <img src="<?php bloginfo('template_directory')?>/images/brands/amram_logo.png" height="15px">
                </a>
              </div>
              <div class="nav2-logo nav2-ldr">
                <a href="http://www.ldrind.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php bloginfo('template_directory')?>/images/brands/ldr_logo.png" height="20px">
                </a>
              </div>
              <div class="nav2-logo nav2-pipedecor">
                <a href="http://pipe-decor.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php bloginfo('template_directory')?>/images/brands/pipedecor_logo.png" height="9px">
                </a>
              </div>
            </a>
            <div class="nav2-search">
              <form action='<?php echo home_url();?>/search' method='get' autocomplete="off">
                <span class="glyphicon glyphicon-search nav2-search-icon"></span>
                <span class="nav2-search-txt">PRODUCT SEARCH</span>
                <input name="isearch" type="text" class="search-field" placeholder="KEYWORD / PHRASE / PART#" required></input>
                <input type="submit" style="display:none"/>
              </form>
            </div>
          </div>  <!-- end tn2-overall-table class  -->
        </div>  <!--  end top-nav2 container  -->
      </div> <!-- end top-nav2 -->
    </div> <!-- end all-container -->
