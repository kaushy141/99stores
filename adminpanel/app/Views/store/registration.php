<?php //print_r($data);
?>
<div class="card mb-4">
  <h5 class="card-header">Store Registration with details</h5>
  <?php echo form_open_multipart('/store/save/' . intval($data['id']), ['class' => 'card-body']); ?>
  <h6>1). Account Details</h6>
  <div class="row g-3">
    <div class="col-md-4">
      <label class="form-label" for="mname">Name</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Store name" value="<?= $data['name'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="mname">Dealer name</label>
      <input type="text" name="dealer" id="dealer" class="form-control" placeholder="dealer name" value="<?= $data['dealer'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="mobile">Mobile</label>
      <div class="input-group input-group-merge">
        <input type="text" name="mobile" id="mobile" class="form-control" maxlength="10" placeholder="9898989898" value="<?= $data['mobile'] ?>">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-password-toggle">
        <label class="form-label" for="password">About</label>
        <div class="input-group input-group-merge">
          <textarea name="about" id="about" class="form-control" placeholder="About store" aria-describedby="multicol-password2" value=""><?= $data['about'] ?></textarea>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-4 mx-n4">
  <h6>2). Address Info</h6>
  <div class="row g-3">
    <div class="col-md-4">
      <label class="form-label" for="line1">Address line 1 (Shop name)</label>
      <input name="line1" type="text" name="email" id="line1" class="form-control" placeholder="Ex. Village name" value="<?= $data['line1'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="line2">Address line 2 (Area)</label>
      <input name="line2" type="text" id="line2" class="form-control" placeholder="Ex. Post Office or Local Area" value="<?= $data['line2'] ?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="district">District</label>
      <input name="district" type="text" id="district" class="form-control" placeholder="District name" value="<?= $data['district'] ?>">
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
      <label class="form-label" for="position">Position</label>
      <div class="input-group">
        <span class="input-group-text">View</span>
        <input type="number" name="position" id="position" class="form-control" placeholder="00" aria-label="0" value="<?= intval($data['position']) ?>">
        <span class="input-group-text">Rank</span>
      </div>
    </div>

    <div class="col-md-4">
      <label class="form-label" for="position">Account Status</label>
      <div class="input-group">
        <div class="form-check form-switch my-2">
          <label class="form-check-label" for="status">Is this account active?</label>
          <input class="form-check-input pull-right" name="status" value="1" type="checkbox" id="status" <?= $data['status'] ? "checked" : "" ?> />
        </div>
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

  </div>
  <div class="pt-4">
    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
    <button type="reset" class="btn btn-label-secondary">Cancel</button>
  </div>
  </form>
</div>
<script>
  $(document).ready(function(){
  })
</script>