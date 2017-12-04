<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title><?php bloginfo('name');?></title> -->
    <?php wp_head(); ?>
    <title>Cambridge Resources</title>
  </head>

  <body>
    <!-- <div id="css-test">
      <span>HELLO</span>
    </div> -->
    <div id="all-container">
      <div class="top-nav0">
        <div class="container">
          <a href="<?php echo home_url();?>/brands/">
            <span>OUR BRANDS</span>
            <span><img src="<?php bloginfo('template_directory')?>/images/CODA DEV_LOGO.png" height="40px" width="50px"></span>
            <span><img src="<?php bloginfo('template_directory')?>/images/AMRAM_Logo_001.png" height="20px"></span>
            <span><img src="<?php bloginfo('template_directory')?>/images/LDR_LOGO.png" height="25px"></span>
            <span><img src="<?php bloginfo('template_directory')?>/images/pipedecor_logo.png" height="12px"></span>
          </a>
        </div>
      </div>  <!--  end top-nav0 container  -->
      <div class="top-nav1">
        <div class="container">
          <div class="tn1-container">
            <div class="cambridge-white-logo">
              <a href="<?php echo home_url();?>"><img src="<?php bloginfo('template_directory')?>/images/Logo_White.png" height="50px"></a>
            </div>  <!--  end cambridge-white-logo  -->
            <div class="navi1-btn">
              <div class="header-nav-container">
                <div id="header-rnav" class="header-mnav">
                  <a class="header-navicon">&#9776;</a>
                  <a class="home navi1-inner" href="<?php echo home_url();?>">
                    <div class="header-navi-title">HOME</div>
                    <div class="header-navi-selector"></div>
                  </a>
                  <a class="products navi1-inner" href="<?php echo home_url();?>/products/">
                    <div class="header-navi-title">PRODUCTS</div>
                    <div class="header-navi-selector"></div>
                  </a>
                  <a class="about navi1-inner" href="<?php echo home_url();?>/about/">
                    <div class="header-navi-title">ABOUT</div>
                    <div class="header-navi-selector"></div>
                  </a>
                  <a class="team navi1-inner" href="<?php echo home_url();?>/team/">
                    <div class="header-navi-title">OUR TEAM</div>
                    <div class="header-navi-selector"></div>
                  </a>
                  <a class="brands navi1-inner" href="<?php echo home_url();?>/brands/">
                    <div class="header-navi-title">BRANDS</div>
                    <div class="header-navi-selector"></div>
                  </a>
                  <a class="career navi1-inner" href="<?php echo home_url();?>/career/">
                    <div class="header-navi-title">CAREER</div>
                    <div class="header-navi-selector"></div>
                  </a>
                  <a class="contact navi1-inner" href="<?php echo home_url();?>/contact/">
                    <div class="header-navi-title">CONTACT</div>
                    <div class="header-navi-selector"></div>
                  </a>
                  <a class="s-icon navi-fb" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/cambridgeresources/">
                    <span class="fa fa-facebook-official"></span>
                  </a>
                  <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://twitter.com/CambridgeRes">
                    <span class="fa fa-twitter-square"></span>
                  </a>
                  <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/cambridgeresources/">
                    <span class="fa fa-linkedin-square"></span>
                  </a>
                </div>
                <!-- <span class="navi-sm">
                  <a class="s-icon navi-fb" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/cambridgeresources/">
                    <span class="fa fa-facebook-official"></span>
                  </a>
                  <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://twitter.com/CambridgeRes">
                    <span class="fa fa-twitter-square"></span>
                  </a>
                  <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/cambridgeresources/">
                    <span class="fa fa-linkedin-square"></span>
                  </a>
                </span> -->
              </div>  <!-- end header-nav-container -->
            </div>  <!--  end navi1-btn  -->
          </div>  <!--  end tn1-container  -->
        </div>
        <!-- end top-nav container -->
      </div>  <!-- end top-nav -->
      <div class="top-nav2">
        <div class="container">
          <div class="nav2-search">
            <span class="glyphicon glyphicon-search nav2-search-icon"></span>
            <span class="nav2-search-txt">PRODUCT SEARCH</span>
            <input type="text" class="search-field" placeholder="KEYWORD / PHRASE / PART#"></input>
          </div>
        </div>  <!--  end top-nav2 container  -->
      </div> <!-- end top-nav2 -->
    </div> <!-- end all-container -->
