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
      <div class="top-nav">
        <div class="container">
          <table class="tn-overall-table">
            <tr>
              <td class="cambridge-white-logo">
                <a href="<?php echo home_url();?>"><img src="<?php bloginfo('template_directory')?>/images/Logo_White.png" height="50px"></a>
              </td>
              <td>
                <table class="tn-inner-table">
                  <tr>
                    <td>
                      <span class="glyphicon glyphicon-earphone ph-icon" aria-hidden="true"></span>
                      <span class="navi-ph">877.922.2538</span>
                      <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/cambridgeresources/">
                        <span class="fa fa-facebook-official"></span>
                      </a>
                      <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://twitter.com/CambridgeRes">
                        <span class="fa fa-twitter-square"></span>
                      </a>
                      <a class="s-icon" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/cambridgeresources/">
                        <span class="fa fa-linkedin-square"></span>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="navi1-btn">
                      <a class="home" href="<?php echo home_url();?>">HOME</a>
                      <a class="products" href="<?php echo home_url();?>/products/">PRODUCTS</a>
                      <a class="about" href="<?php echo home_url();?>/about/">ABOUT</a>
                      <a class="industries" href="<?php echo home_url();?>/industries/">INDUSTRIES</a>
                      <a class="team" href="<?php echo home_url();?>/team/">OUR TEAM</a>
                      <a class="brands" href="<?php echo home_url();?>/brands/">BRANDS</a>
                      <a class="contact" href="<?php echo home_url();?>/contact/">CONTACT</a>
                    </td>
                  </tr>
                </table> <!-- end tn-inner-table  -->
              </td>
            </tr>  <!--  end col-4 -->
          </table>  <!--  end table -->
        </div>
        <!-- end top-nav container -->
      </div>  <!-- end top-nav -->
      <div class="top-nav2">
        <div class="container">
          <table class="tn2-overall-table">
            <td>
              <span class="nav2">OUR BRANDS</span>
              <span class="nav2-logo">
                <a href="http://www.codaresources.com/" target="_blank" rel="noopener noreferrer">
                  <img src="<?php bloginfo('template_directory')?>/images/CODA DEV_LOGO.png" height="40px" width="50px">
                </a>
              </span>
              <span class="nav2-logo">
                <a href="" target="_blank" rel="noopener noreferrer">
                  <img src="<?php bloginfo('template_directory')?>/images/AMRAM_Logo_001.png" height="20px">
                </a>
              </span>
              <span class="nav2-logo">
                <a href="http://www.ldrind.com/" target="_blank" rel="noopener noreferrer">
                  <img src="<?php bloginfo('template_directory')?>/images/LDR_LOGO.png" height="25px">
                </a>
              </span>
              <span class="nav2-logo">
                <a href="" target="_blank" rel="noopener noreferrer">
                  <img src="<?php bloginfo('template_directory')?>/images/pipedecor_logo.png" height="12px">
                </a>
              </span>
            </td>
            <td class="nav2-search">
              <span class="glyphicon glyphicon-search nav2-search-icon"></span>
              <span class="nav2-search-txt">PRODUCT SEARCH</span>
            </td>
            <td class="nav2-search">
              <input type="text" class="form-control search-field" placeholder="KEYWORD / PHRASE / PART#"></input>
            </td>
          </table>  <!--  end tn2-overall-table  -->
        </div>  <!--  end top-nav2 container  -->
      </div> <!-- end top-nav2 -->
      <div class="container">
