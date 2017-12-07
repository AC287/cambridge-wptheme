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
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <!-- <li data-target="#myCarousel" data-slide-to="3"></li> -->
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php bloginfo('template_directory')?>/images/banners/index-img1.jpg">
      <div class="index-banner-textbox ibt-img1">
        <div class="ibt-text">
          <span>#1 DISTRIBUTOR OF DUCT STRAPS IN THE U.S.</span>
        </div>
        <div class="ibt-underline">
        </div>
      </div>
    </div>

    <div class="item">
      <img src="<?php bloginfo('template_directory')?>/images/banners/index-img2.jpg">
      <div class="index-banner-textbox ibt-img2">
        <div class="ibt-text">
          <span>FOUND IN RETAIL LOCATIONS GLOBALLY</span>
        </div>
        <div class="ibt-underline">
        </div>
      </div>
    </div>

    <div class="item">
      <img src="<?php bloginfo('template_directory')?>/images/banners/index-img3.jpg">
    </div>

    <div class="item">
      <img src="<?php bloginfo('template_directory')?>/images/banners/index-img4.jpg">
      <div class="index-banner-textbox ibt-img4">
        <div class="ibt-text">
          <span>SUPPLYING OEM'S ACROSS A VARIETY OF INDUSTRIES</span>
        </div>
        <div class="ibt-underline">
        </div>
      </div>
    </div>

    <div class="item">
      <img src="<?php bloginfo('template_directory')?>/images/banners/index-img5.jpg">
      <div class="index-banner-textbox ibt-img5">
        <div class="ibt-text">
          <span>QUALITY PRODUCTS PROFESSIONALS RELY ON</span>
        </div>
        <div class="ibt-underline">
        </div>
      </div>
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
      <div class="col-sm-3">
        <div class="hvac gc-block">
          <div class="hvac gc-desc-img">
            <img src="<?php bloginfo('template_directory')?>/images/hvac02.png"></img>
            <p class="hvac-desc">Cambridge is one of the leading manufacturers of premium HVAC products in the United States. Cambridge has been manufacturing HVAC products for more than 15 years for over 250 HVAC industry distributors. </p>
            <span class="gc-block-title"><br/>HVAC</span>
          </div>
          <!-- <a href=""><i>CATALOG DOWNLOAD</i></a> -->
        </div>
      </div>
      <div class="col-sm-3">
        <div class="plumbing gc-block">
          <div class="plumbing gc-desc-img">
            <img src="<?php bloginfo('template_directory')?>/images/plumbing02.png"></img>
            <p class="plumbing-desc">Cambridge offers a full line of fittings, nipples, pipe, hose clamps, gas connectors, and pipe hanging products specially designed for the plumbing industry.</p>
            <span class="gc-block-title"><br/>PLUMBING</span>
          </div>
          <!-- <a href=""><i>CATALOG DOWNLOAD</i></a> -->
        </div>
      </div>
      <div class="col-sm-3">
        <div class="electrical gc-block">
          <div class="electrical gc-desc-img">
            <img src="<?php bloginfo('template_directory')?>/images/electrical02.png"></img>
            <p class="electrical-desc">Electrical contractors have trusted Cambridge branded cable ties, wire connectors, terminals, and other electrical products for many years. Cambridge has hundreds of SKUs available at over 10,000 electrical supply distributors and retail locations across the U.S.</p>
            <span class="gc-block-title"><br/>ELECTRICAL</span>
          </div>
          <!-- <a href=""><i>CATALOG DOWNLOAD</i></a> -->
        </div>
      </div>
      <div class="col-sm-3">
        <div class="automotive gc-block">
          <div class="automotive gc-desc-img">
            <img src="<?php bloginfo('template_directory')?>/images/automotive02.png"></img>
            <p class="automotive-desc">Cambridge is a trusted brand in the retail automotive market, supplying hose clamps, fuel injectors, wire connectors, terminals, switches and more.  </p>
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
      <!-- <a href="">NEW PRODUCTS</a>
      <span class="mm-divider">|</span> -->
      <a href="">TRADESHOWS</a>
      <span class="mm-divider">|</span>
      <a href="<?php echo home_url();?>/news/">NEWS</a>
    </span>
  </div> <!-- end container -->
</div> <!-- end mid-menu -->
<!--  MID-CATEGORY  -->
<div id="mid-category">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="index-midcategory" data-toggle="collapse" data-target="#imc-distribution">
          <!-- <img src="<?php bloginfo('template_directory')?>/images/distribution01.png"></img> -->
          <div class="index-midcategory-imgholder index-distribution"></div>
          <div class="mc-header" >DISTRIBUTION</div>
        </div>
        <div class="collapse index-midcategory-contents" id="imc-distribution">
          <div class="mc-border">INDUSTRY DISTRIBUTORS <br/>CARRY CAMBRIDGE</div>
          <div class="mc-txt">
            <p>Cambridge manufactures products and sells to a variety of industry wholesalers, distributors, and importers. Cambridge has a dedicated team of sales professionals who are extremely knowledgable in their respective industries.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="index-midcategory" data-toggle="collapse" data-target="#imc-retail">
          <!-- <img src="<?php bloginfo('template_directory')?>/images/retail01.png"></img> -->
          <div class="index-midcategory-imgholder index-retail"></div>
          <div class="mc-header" >RETAIL</div>
        </div>
        <div class="collapse index-midcategory-contents" id="imc-retail">
          <div class="mc-border">INTERNATIONAL RETAILERS <br/>SELL CAMBRIDGE</div>
          <div class="mc-txt">
            <p>Retail consumers are drawn to our state-of-the-art branding, and find the entire shopping experience fast and easy since the pertinent product information is readily accessible. With over 1,000 SKUs in over 15,000 retail locations across the USA and Canada, Cambridge continues to pop up in many new locations.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="index-midcategory" data-toggle="collapse" data-target="#imc-oem">
          <!-- <img src="<?php bloginfo('template_directory')?>/images/oem01.png"></img> -->
          <div class="index-midcategory-imgholder index-oem"></div>
          <div class="mc-header" >O.E.M.</div>
        </div>
        <div class="collapse index-midcategory-contents" id="imc-oem">
          <div class="mc-border">ORIGINAL EQUIPMENT <br/>MANUFACTURER</div>
          <div class="mc-txt">
            <p>Cambridge supplies its premium industrial products to many OEMs across a variety of industries. OEMs use Cambridge products in their manufacturing process because they can trust its quality.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- end mid-category -->

<?php get_footer(); ?>
