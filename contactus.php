<!--  Template Name: Contact Us  -->

<?php get_header();?>

<div class='contact-banner'>
  <img src="<?php bloginfo('template_directory')?>/images/contact-banner.jpg">
</div>

<div class='contact-form'>
  <div class='contact-container'>
    <div class='col-sm-12 contact-maintitle'>
      <span>CONTACT</span>
    </div>
    <div class='.contact-form-input'>
      <form class='row'>
        <div class='form-group contact-sm-input col-sm-6'>
          <input type='text' name='contact-name' placeholder='Name'>
        </div>
        <div class='form-group contact-sm-input col-sm-6'>
          <input type='text' name='contact-company' placeholder='Company'>
        </div>
        <div class='form-group contact-sm-input col-sm-6'>
          <input type='text' name='contact-email' placeholder='E-mail Address'>
        </div>
        <div class='form-group contact-sm-input col-sm-6'>
          <input type='text' name='contact-phone' placeholder='Phone Number'>
        </div>
        <div class='form-group contact-message col-sm-12'>
          <textarea type='text' name='contact-message' placeholder='Type your message here'></textarea>
        </div>
        <div class='form-group contact-submit'>
          <button>SEND</button>
        </div>
      </form>
    </div>
    <div class='contact-phaddress'>
      <div class='contact-phaddress-ph'>
        <span>P.718.927.0009</span><span>P.877.922.2538</span><span>F.718.445.4403</span>
      </div>
      <div class='contact-phaddress-address'>
        <p><strong>New York Office:</strong> 960 Alabama Avenue Brooklyn, NY 11207</p>
        <p><strong>Chicago Office:</strong> 600 N. Kilbourn Chicago, IL 60624</p>
      </div>
    </div>

  </div>
</div>
<div class='contact-salesmanager'>
  <div class='container'>
    <div class="contact-salesmanager-section">
      <span>CONTACT SALES DIRECT</span>
      <div class="contact-salesmanager-section-underline">
      </div>
    </div>
    <div class='contact-salesmanager-container'>
      <?php
        global $wpdb;
        $salesmanager = $wpdb->get_results("SELECT * FROM wp_salesmanager ORDER BY sort ASC;");
        foreach ($salesmanager as $salesmanager1){
          echo "<div class='contact-salesmanager-each'>";
            echo "<div class='contact-salesmanager-img'>";
              echo "<img class='contact-state-".$salesmanager1->si."' src='".$salesmanager1->img."'>";
            echo "</div>";
            echo "<div class='contact-salesmanager-name'><span>".ucfirst($salesmanager1->first)." ".ucfirst($salesmanager1->last)."</span></div>";
            echo "<div class='contact-salesmanager-title'><span>".ucfirst($salesmanager1->title)."</span></div>";
            echo "<div class='contact-salesmanager-email'><a href='mailto:".$salesmanager1->email."'>".$salesmanager1->email."</a></div>";
            echo "<div class='contact-salesmanager-phone'><span>".$salesmanager1->phone."</span></div>";
            echo "<div class='contact-salesmanager-text'><span>".strtoupper($salesmanager1->text)."</span></div>";
          echo "</div>";
        }
      ?>
    </div>
  </div>  <!--  end container  -->
</div>  <!--  end contact-salesmanager class -->

<?php get_footer();?>
