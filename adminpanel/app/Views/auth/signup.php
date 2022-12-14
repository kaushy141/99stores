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
						maxlength="30"
						id="fname"
						name="fname"
						placeholder="Enter first name"
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
						maxlength="30"
						id="lname"
						name="lname"
						placeholder="Enter last name"
						autofocus
					  />
					</div>
				</div>
				</div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="mail" class="form-control" id="email" name="email" maxlength="50" placeholder="Enter your email" />
                </div>
				<div class="mb-3">
                  <label for="mobile" class="form-label">Mobile Number</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" placeholder="Enter your mobile number" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
					  maxlength="32"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
				
				<div class="mb-3">
                  <label class="form-label" for="password">I am </label>
                  <div class="input-group input-group-merge">
							<div class="form-check">
                            <input name="type" class="form-check-input" type="radio" checked value="2" id="user_type_donner">
                            <label class="form-check-label" for="user_type_donner"> Donner </label>                            
                          </div>
						  <div class="form-check mx-3">
							<input name="type" class="form-check-input" type="radio" value="3" id="user_type_student">
                            <label class="form-check-label" for="user_type_student"> Student </label>
                          </div>
                    
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
