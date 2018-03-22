  <footer class="site-footer">
    <div class="container">
      <div class="footer1">
        <div class="footer1-inner-left">
          <a href="<?php echo home_url();?>" class="footer1-maintxt">Home</a>
        </div>
        <div class="footer1-inner-left">
          <a href="<?php echo home_url();?>/products/" class="footer1-maintxt">Products</a>
          <ul class="footer1-subtxt">
            <li><a href="<?php echo home_url();?>/products/">Product Page</a></li>
            <!-- <li><a href="">Featured Product</a></li> -->
            <li><a href="<?php echo home_url();?>/products/catalogs/">Catalogs</a></li>
            <!-- <li><a href="">Quality</a></li> -->
            <!-- <li><a href="">Warranty</a></li> -->
          </ul>
        </div>
        <div class="footer1-inner-left">
          <a href="<?php echo home_url();?>/about/" class="footer1-maintxt">About</a>
          <ul class="footer1-subtxt">
            <li><a href="<?php echo home_url();?>/about/">Who We Are</a></li>
            <li><a href="<?php echo home_url();?>/team/">Our Team</a></li>
            <!-- <li><a href="">Retailers Who Carry Us</a></li> -->
            <li><a href="<?php echo home_url();?>/career/">Careers</a></li>
            <li><a href="<?php echo home_url();?>/tradeshows/">News</a></li>
          </ul>
        </div>
        <div class="footer1-inner-left">
          <a href="<?php echo home_url();?>/brands/" class="footer1-maintxt">Brands</a>
        </div>
        <div class="footer1-inner-left">
          <a href="<?php echo home_url();?>/contact/" class="footer1-maintxt">Contact Us</a>
          <!-- <ul class="footer1-subtxt"> -->
            <!-- <li><a href="<?php echo home_url();?>/contact/">Customer Service</a></li> -->
            <!-- <li><a href="<?php echo home_url();?>/contact/">Sales</a></li> -->
            <!-- <li><a href="<?php echo home_url();?>/contact/">Technical Support</a></li> -->
            <!-- <li><a href="<?php echo home_url();?>/contact/">Map</a></li> -->
          <!-- </ul> -->
        </div>
        <div class="footer1-inner-right">
          <div class="certifications-txt">CERTIFICATIONS</div>
          <img src="<?php bloginfo('template_directory')?>/images/certifications3.png"></img>
        </div>
      </div>
    </div>
    <div class="container footer2">
      <div class="copyright">
        <p>&copy <?php echo date('Y')?> Cambridge Resources. All rights reserved.</p>
      </div>
      <div class="footer-socialmedia">
        <a class="navi-margin s-icon" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/cambridgeresources/">
          <i class="fa fa-facebook-official"></i>
        </a>
        <a class="navi-margin s-icon" target="_blank" rel="noopener noreferrer" href="https://twitter.com/CambridgeRes">
          <span class="fa fa-twitter-square"></span>
        </a>
        <a class="navi-margin s-icon" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/cambridgeresources/">
          <span class="fa fa-linkedin-square"></span>
        </a>
      </div>  <!--end footer-socialmedia-->
    </div>  <!--  end container -->
  </footer>
<?php wp_footer(); ?>
</body>
</html>
