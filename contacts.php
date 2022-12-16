<?php include("inc/head.php");?>
<?php include("inc/header.php");?>
      <section class="section-lg bg-secondary">
        <div class="container wide">
          <div class="text-center">
            <h1>Contacts</h1>
            <div class="subtitle-2">Lorem ipsum dolor sit amet, consectetur</div>
          </div>
        </div>
      </section>
      <!--Mailform-->
      <section class="section section-xl">
        <div class="container wide">
          <div class="row row-50">
            <div class="col-lg-4">
              <div class="contacts-wrap">
                <p>Phone Number</p>
                <div class="phone-link-second"><a href="tel:#">1 000-234-78-90</a></div>
                <div class="phone-link-second"><a href="tel:#">1 000-234-78-90</a></div>
                <p>Location</p><span>3674 Harrison Street, San Francisco, 94143,CA, USA.</span>
              </div>
            </div>
            <div class="col-lg-8">
              <h3>Make an Appointment</h3>
              <form class="rd-form rd-form-2 rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                <div class="row row-40 row-md-60">
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                      <label class="form-label" for="contact-name">Enter your name:</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@Numeric">
                      <label class="form-label" for="contact-phone">Enter your phone:</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap form-wrap-select">
                      <select class="form-input select" name="find-job-location" data-minimum-results-for-search="Infinity">
                        <option value="1">Select a service</option>
                        <option value="2">Swedish Relaxation</option>
                        <option value="3">Remedial Deep Tissue</option>
                        <option value="4">Group Bookings</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap form-wrap-select">
                      <select class="form-input select" name="find-job-location" data-minimum-results-for-search="Infinity">
                        <option value="1">Select a Date</option>
                        <option value="2">May 15, 2020</option>
                        <option value="3">June 05, 2020</option>
                        <option value="4">August 21, 2020</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <button class="button button-secondary button-md" type="submit">Leave a Request</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <?php include("inc/footer.php");?>