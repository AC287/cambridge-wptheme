<!--  Template Name: Contact Success  -->
<?php
get_header();
?>

<div class='contact-banner'>
  <div class='cb-img'>
    <img src="<?php bloginfo('template_directory')?>/images/banners/contact-banner.jpg">
  </div>
  <div class='cb-textbox'>
    <div class='cb-textbox3'>
      <span class='cb3-i1'>DO YOU HAVE A </span>
      <span class='cb3-i2'>QUESTION OR PROJECT IN MIND? </span>
      <span class='cb3-i1'>JUST WANT TO SAY HI? </span>
      <span class='cb3-i2'>TALK TO US </span>
    </div>
  </div>
</div>

<div class="temp-notice">
  <div class="container">
    <div class="tn-img">
      <img src="<?php bloginfo('template_directory')?>/images/about/IL60139.jpg">
      <div class="tn-content">
        <div class="tn-title">
          <div>Moving in Q1 2020.</div>
          <div class="tn-titlemini">Regional HQ &amp; Distribution Center.</div>
        </div>
        <div class="tn-txt">
          <p>990 North Avenue<br/>Glendale Heights, IL 60139</p>
        </div>
      </div>
    </div>
  </div>  <!--  end container  -->
</div>

<div class='contact-form'>
  <div class='contact-container'>
    <div class='col-sm-12 contact-maintitle'>
      <span>CONTACT</span>
    </div>
    <div class='contact-success-message'>

      <?php
        //response generation function
        $response = "";
        $message_sent    = "Thanks! Your message has been sent.";
        $message_spam    = "Spam detected. Please send your inquiry to info@cambridgeresources.com";
        include 'phpsnippet/google_captcha.php';
        //user posted variables
        $name = $_POST['contact-name'];
        $email = $_POST['contact-email'];
        $message = $_POST['contact-message'];
        $company = $_POST['contact-company'];
        $phone = $_POST['contact-phone'];
        $contents = "Name: $name \nEmail: $email \nPhone: $phone \nCompany: $company \nMessage: $message";

        //php mailer variables
        $to = "info@cambridgeresources.com";
        $subject = "Cambridge web contact from $name";
        $headers = array(
          'Reply-To: '.$email
        );

        /*
        **  REQUIRED TO INSTALL WP_MAIL_SMTP PLUGINS FROM wpforms company.
        */

        $headers = implode("\r\n", $headers);

        if($message !='' && $responseData->success){
          $sent = wp_mail($to,$subject,strip_tags($contents),$headers);
          echo $local;
          echo "<h3>$message_sent</h3>";
          echo "<p>We will respond to you within one to two business days.</p>";
          // unset($name, $email, $message, $company, $phone, $contents);
        } else {
          echo "<h3>$message_spam</h3>";
        }

      ?>

    </div>
    <div class='contact-phaddress'>
      <div class='contact-phaddress-ph'>
        <span>P.718.927.0009</span><span>P.877.922.2538</span><span>F.718.445.4403</span>
      </div>
      <div class='contact-phaddress-address'>
        <p><strong>Corporate HQ:</strong> 100 Matawan Rd. Ste 300, Matawan, NJ 07747</p>
        <p><strong>Regional HQ:</strong> 600 N. Kilbourn Chicago, IL 60624</p>
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
        $salesmanager = $wpdb->get_results("SELECT * FROM wp_camsalesmanager ORDER BY sort ASC;");
        foreach ($salesmanager as $salesmanager1){
          echo "<div class='contact-salesmanager-each'>";
            echo "<div class='contact-salesmanager-img'>";
              echo "<a href='mailto:".$salesmanager1->email."'><img class='contact-state-".$salesmanager1->si."' src='".$salesmanager1->img."'></a>";
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
