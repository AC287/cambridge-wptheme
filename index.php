<?php get_header(); ?>

<!-- <p>Envelope icon: <span class="glyphicon glyphicon-envelope"></span></p> -->
<?php /*
  if (have_posts()):
  while (have_posts()) : the_post();?>

  <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
  <!-- the_permalink enable wordpress to link to that post page automatically. -->
  <?php the_content(); ?>
  <?php endwhile;

  else:
    echo '<p>No content found</p>';

  endif;
*/?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <!-- <li data-target="#myCarousel" data-slide-to="3"></li> -->
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php bloginfo('template_directory')?>/images/img1 copy.jpg">
    </div>

    <div class="item">
      <img src="<?php bloginfo('template_directory')?>/images/img2 copy.jpg">
    </div>

    <div class="item">
      <img src="<?php bloginfo('template_directory')?>/images/img3 copy.jpg">
    </div>

    <!-- <div class="item"> -->
      <!-- <img src="images/image001.jpg"> -->
    <!-- </div> -->

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--  GENERAL-CATEGORY -->
<div class="general-category">
  <div class="container">
    <div class="row">
      <div class="col-xs-3">
        <div class="hvac gc-block">
          <div class="hvac gc-desc-img">
            <img src="<?php bloginfo('template_directory')?>/images/hvac02.png"></img>
            <p class="hvac-desc">Cambridge is one of the leading manufacturers of premium HVAC products in the United States. Manufacturing HVAC products for more than 15 years for over 150 HVAC industry distributors, we are the number one manufacturer of duct straps and duct support webbing.</p>
            <span class="gc-block-title"><br/>HVAC</span>
          </div>
          <!-- <a href=""><i>CATALOG DOWNLOAD</i></a> -->
        </div>
      </div>
      <div class="col-xs-3">
        <div class="plumbing gc-block">
          <div class="plumbing gc-desc-img">
            <img src="<?php bloginfo('template_directory')?>/images/plumbing02.png"></img>
            <p class="plumbing-desc">Cambridge offers a full line of hose clamps, gas connectors, and pipe hanging products specially designed for the plumbing industry.Check out our sister company, LDR Global Industries LLC. carries a comprehensive list of quality plumbing products including.</p>
            <span class="gc-block-title"><br/>PLUMBING</span>
          </div>
          <!-- <a href=""><i>CATALOG DOWNLOAD</i></a> -->
        </div>
      </div>
      <div class="col-xs-3">
        <div class="electrical gc-block">
          <div class="electrical gc-desc-img">
            <img src="<?php bloginfo('template_directory')?>/images/electrical02.png"></img>
            <p class="electrical-desc">Cambridge proudly offers a full array of electrical products. Electrical contractors have trusted Cambridge brand terminals, headstrong cable ties and other products for many years.Hundreds of SKUs are available at over 10,000 electrical supply distributors and retail locations across the U.S.</p>
            <span class="gc-block-title"><br/>ELECTRICAL</span>
          </div>
          <!-- <a href=""><i>CATALOG DOWNLOAD</i></a> -->
        </div>
      </div>
      <div class="col-xs-3">
        <div class="automotive gc-block">
          <div class="automotive gc-desc-img">
            <img src="<?php bloginfo('template_directory')?>/images/automotive02.png"></img>
            <p class="automotive-desc">Cambridge Resources proudly offers hose clamps, terminals, switches  and many other products specially designed for use by the automotive industry. You can find these products in over 10,000 automotive wholesale and retail locations across the United States.</p>
            <span class="gc-block-title"><br/>AUTOMOTIVE</span>
          </div>
          <!-- <a href=""><i>CATALOG DOWNLOAD</i></a> -->
        </div>
      </div>
    </div> <!-- end first row -->
  </div> <!-- end container -->
</div> <!-- end general-category row-->
<!--  MID-MENU  -->
<div class="mid-menu">
  <div class="container">
    <span id="mid-menu-menu">
      <a href="">NEW PRODUCTS</a>
      <span class="mm-divider">|</span>
      <a href="">UPCOMING TRADESHOWS</a>
      <span class="mm-divider">|</span>
      <a href="">NEWS</a>
    </span>
  </div> <!-- end container -->
</div> <!-- end mid-menu -->
<!--  MID-CATEGORY  -->
<div id="mid-category">
  <div class="container">
    <div class="row">
      <div class="col-xs-4">
        <img src="<?php bloginfo('template_directory')?>/images/distribution02.png"></img>
        <div class="mc-header" >DISTRIBUTION</div>
        <div class="mc-border">INDUSTRY DISTRIBUTORS <br/>CARRY CAMBRIDGE</div>
        <div class="mc-txt">
          <p>Cambridge manufactures products and sells to a variety of industry wholesalers, jobbers, and importers. Cambridge has a dedicated team of sales professionals who are extremely knowledgable in the inventory they carry, and their respective industries.</p>
        </div>
      </div>
      <div class="col-xs-4">
        <img src="<?php bloginfo('template_directory')?>/images/retail02.png"></img>
        <div class="mc-header" >RETAIL</div>
        <div class="mc-border">INTERNATIONAL RETAILERS <br/>SELL CAMBRIDGE</div>
        <div class="mc-txt">
          <p>Retail consumers are drawn to our state-of-the-art branding, and find the entire shopping experience fast and easy since the pertinent product information is easily accessible. With over 1,000 SKUs in over 15,000 retail locations across the USA and Canada, keep your eyes peeled as Cambridge continues to pop up in many new locations.</p>
        </div>
      </div>
      <div class="col-xs-4">
        <img src="<?php bloginfo('template_directory')?>/images/oem02.png"></img>
        <div class="mc-header" >O.E.M.</div>
        <div class="mc-border">ORIGINAL EQUIPMENT <br/>MANUFACTURER</div>
        <div class="mc-txt">
          <p>Cambridge supplies its premium industrial products to many OEMs across a variety of industries. OEMs use Cambridge products in their manufacturing process because they know that they can trust it to be high quality and long lasting.</p>
        </div>
      </div>
    </div>
  </div>
</div> <!-- end mid-category -->

<?php get_footer(); ?>
