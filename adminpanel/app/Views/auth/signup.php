 <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <?= img(array("src"=>"public/img/logo.png", "height"=>60))?>
                  </span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Register to <?=APP_NAME?> 🚀</h4>
              <p class="mb-4">Make your app management easy and fun!</p>
			  <?php echo form_open('/auth/signupcheck');?>
			  <div class="row">
                <div class="col-6">
					<div class="mb-3">
					  <label for="fname" class="form-label">First name</label>
					  <input
						type="text"
						class="form-control"
						id="fname"
						name="fname"
						placeholder="Enter your first name"
						autofocus
					  />
					</div>
				</div>
				<div class="col-6">
					<div class="mb-3">
					  <label for="lname" class="form-label">Last name</label>
					  <input
						type="text"
						class="form-control"
						id="lname"
						name="lname"
						placeholder="Enter your last name"
						autofocus
					  />
					</div>
				</div>
				</div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="mail" class="form-control" id="email" name="email" placeholder="Enter your email" />
                </div>
				<div class="mb-3">
                  <label for="mobile" class="form-label">Mobile Number</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="<?=base_url()?>/auth/privacy-policy">privacy policy & terms</a>
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="<?=base_url()?>/auth/signin">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
