<?php //print_r($data);
?>
<div class="card mb-4">
  <h5 class="card-header">Vendor Registration with details</h5>
  <?php echo form_open_multipart('/user/save/' . intval($data['id']), ['class' => 'card-body']); ?>
  <h6>1). Account Details</h6>
  <div class="row g-3">
    <div class="col-md-4">
      <label class="form-label" for="mname">First name</label>
      <input type="text" name="fname" id="fname" class="form-control" placeholder="first name" value="<?= $data['fname'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="mname">Middle name</label>
      <input type="text" name="mname" id="mname" class="form-control" placeholder="middle name (Optional)" value="<?= $data['mname'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="lname">Last name</label>
      <input type="text" name="lname" id="lname" class="form-control" placeholder="last name" value="<?= $data['lname'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="email">Email</label>
      <div class="input-group input-group-merge">
        <input type="email" name="email" id="email" class="form-control" placeholder="Ex.user@gmail.com" value="<?= $data['email'] ?>">
      </div>
    </div>
    <div class="col-md-4">
      <label class="form-label" for="mobile">Mobile</label>
      <div class="input-group input-group-merge">
        <input type="text" name="mobile" id="mobile" class="form-control" maxlength="10" placeholder="9898989898" value="<?= $data['mobile'] ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
          <input type="password" name="password" id="password" class="form-control" placeholder="············" aria-describedby="multicol-password2" value="">
          <span class="input-group-text cursor-pointer" id="password"><i class="bx bx-hide"></i></span>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-4 mx-n4">
  <h6>2). Address Info</h6>
  <div class="row g-3">
    <div class="col-md-4">
      <label class="form-label" for="multicol-first-name">Address line 1 (Village)</label>
      <input name="line1" type="text" name="email" id="multicol-first-name" class="form-control" placeholder="Ex. Village name" value="<?= $data['line1'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="multicol-last-name">Address line 2 (Area)</label>
      <input name="line2" type="text" id="multicol-last-name" class="form-control" placeholder="Ex. Post Office or Local Area" value="<?= $data['line2'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="multicol-last-name">District</label>
      <input name="district" type="text" id="multicol-last-name" class="form-control" placeholder="District name" value="<?= $data['district'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="state">State</label>
      <select name="state" id="state" class="select2 form-select">
        <?php
        if (!empty($states))
          foreach ($states as $_state) {
        ?>
          <option value="<?php echo $_state['name']; ?>" <?php echo $data['state'] == $_state['name'] ? "selected" : "" ?>><?php echo  ucwords(strtolower($_state['name'])); ?></option>
        <?php
          }
        ?>
      </select>
    </div>
    <div class="col-md-4">
      <label class="form-label" for="multicol-last-name">Country</label>
      <input name="country" type="text" id="multicol-last-name" class="form-control" value="India">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="multicol-last-name">Pincode</label>
      <input name="pincode" type="text" id="multicol-last-name" class="form-control" maxlength="6" placeholder="Ex. 209206" value="<?= $data['pincode'] ?>">
    </div>
  </div>

  <hr class="my-4 mx-n4">
  <h6>3). Detail Documentation</h6>
  <div class="row g-3">
    <div class="col-md-4">
      <label class="form-label" for="state">Identity Type</label>
      <select name="identity_id" id="identity_id" class="select2 form-select">
        <?php
        if (!empty($identities))
          foreach ($identities as $_identity) {
        ?>
          <option value="<?php echo $_identity['id']; ?>" <?php echo $data['identity_id'] == $_identity['id'] ? "selected" : "" ?>><?php echo $_identity['name']; ?></option>
        <?php
          }
        ?>
        <option value="0"> --Not Available--</option>
      </select>
    </div>
    <div class="col-md-4">
      <label class="form-label" for="identity_value">Identity Number</label>
      <input type="text" name="identity_value" id="identity_value" class="form-control" placeholder="Ex. Adhar card / Pan card" aria-label="000000000000" value="<?= $data['identity_value'] ?>">
    </div>

    <div class="col-md-4">
      <label class="form-label" for="charges">Charge</label>
      <div class="input-group">
        <span class="input-group-text">Rs.</span>
        <input type="number" name="charges" id="charges" class="form-control" placeholder="00" aria-label="000000000000" value="<?= intval($data['charges']) ?>">
        <span class="input-group-text">Perday</span>
      </div>
    </div>
    <div class="col-sm-12">
      <label class="form-label" for="state">Skils</label>
      <div class="row">
        <?php
        if (!empty($skills))
          foreach ($skills as $_skil) {
        ?>
          <div class="col-sm-6 col-md-3 col-lg-2">
            <div class="form-check">
              <input type="checkbox" name="skills[]" class="form-check-input" value="<?php echo $_skil['id'] ?>" <?php echo $data['skills'] && in_array($_skil['id'], $data['skills']) ? "checked" : "" ?> />
              <label class="form-check-label" for="basic-default-checkbox"><?php echo $_skil['name'] ?></label>
            </div>
          </div>
        <?php
          }
        ?>
      </div>
    </div>
    <div class="col-md-4">
    <label class="form-label" for="image">Image</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bx bx-camera"></i></span>
        <input type="file" name="image" id="image" class="form-control" placeholder="Store image" >
      </div>
      </div>
  </div>
  <div class="pt-4">
    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
    <button type="reset" class="btn btn-label-secondary">Cancel</button>
  </div>
  </form>
</div>