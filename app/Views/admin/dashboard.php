<div class="d-flex justify-content-between align-items-center bg-dark p-3 position-sticky top-0 z-1">
  <h4></h4>
  <h4 class="text-white text-uppercase">Admin Dashboard</h4>
  <h4><a href="<?= base_url('AdminControl/logout') ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></h4>
</div>

<div class="container-fluid my-3">
  <button class="btn btn-primary mb-3" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addWashingCenter">Add Washing Center</button>

  <?php if (count($centerData) > 0) { ?>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php foreach ($centerData as $ctr) { ?>
        <div class="col">
          <div class="card border-primary">
            <div class="card-header border-primary">
              <h5 class="text-center text-uppercase"><?= $ctr['center_name'] ?></h5>
            </div>
            <div class="card-body">
              <p><b><i class="fa-solid fa-map-location-dot"></i> Address</b> : <?= $ctr['center_address'] ?></p>
              <p><b><i class="fa-solid fa-phone"></i> Phone</b> : <?= $ctr['phone_no'] ?></p>
              <p><b><i class="fa-solid fa-wallet"></i> Washing Price</b> : Rs. <?= $ctr['washing_price'] ?></p>
              <p><b><i class="fa-solid fa-user-group"></i> Workers</b> : <?= $ctr['workers_name'] ?></p>
            </div>
            <div class="card-footer border-primary">
              <small class="text-muted">
                <a class="text-primary" href="javascript:void(0)" onclick="viewUpdateWashingCenter('#updateWashingCenter', <?= $ctr['cid'] ?>)"><i class="fa-regular fa-pen-to-square text-primary"></i> Update center</a>&emsp;&emsp;
                <a class="text-danger" href="javascript:void(0)" onclick="deleteWashingCenter(<?= $ctr['cid'] ?>)"><i class="fa-regular fa-trash-can text-danger"></i> Delete center</a>
              </small>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php } else {
    echo "No washing center found.";
  } ?>
</div>

<!-- Add center -->
<div class="modal fade" id="addWashingCenter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-l modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Add Center Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" method="post" action="<?= base_url('AdminControl/addWashingCenter') ?>" autocomplete="off">
          <div class="col-md-12">
            <label for="center_name">Enter Center Name</label>
            <input type="text" class="form-control" id="center_name" name="center_name">
          </div>
          <div class="col-md-12">
            <label for="center_address">Enter Center Address</label>
            <input type="text" class="form-control" id="center_address" name="center_address">
          </div>
          <div class="col-md-12">
            <label for="phone_no">Enter Center Phone No</label>
            <input type="tel" class="form-control" id="phone_no" name="phone_no">
          </div>
          <div class="col-md-12">
            <label for="washing_price">Enter Center Washing Price</label>
            <input type="number" step="any" class="form-control" id="washing_price" name="washing_price">
          </div>
          <div class="col-md-12">
            <label for="workers_name">Select Center Workers</label>
            <select class="form-select" id="workers_name" name="workers_name[]" placeholder="Choose Here..." multiple>
              <option value="Aarav">Aarav</option>
              <option value="Arjun">Arjun</option>
              <option value="Ryan">Ryan</option>
              <option value="Aadvik">Aadvik</option>
              <option value="Atharv">Atharv</option>
              <option value="Reyansh">Reyansh</option>
              <option value="Ayaan">Ayaan</option>
              <option value="Vihaan">Vihaan</option>
              <option value="Shaurya">Shaurya</option>
              <option value="Ishaan">Ishaan</option>
              <option value="Parth">Parth</option>
              <option value="Daniel">Daniel</option>
              <option value="Kiaan">Kiaan</option>
              <option value="Muhammad">Muhammad</option>
            </select>
          </div>
          <div class="col-md-12 mt-5">
            <button class="btn btn-outline-primary w-100" type="submit">Add Center</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- update center -->
<div class="modal fade" id="updateWashingCenter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-l modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Update Center Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" method="post" action="<?= base_url('AdminControl/updateWashingCenter') ?>" autocomplete="off">
          <div class="col-md-12 d-none">
            <input type="text" class="form-control" id="cid" name="cid">
          </div>
          <div class="col-md-12">
            <label for="center_name">Update Center Name</label>
            <input type="text" class="form-control" id="center_name" name="center_name">
          </div>
          <div class="col-md-12">
            <label for="center_address">Update Center Address</label>
            <input type="text" class="form-control" id="center_address" name="center_address">
          </div>
          <div class="col-md-12">
            <label for="phone_no">Update Center Phone No</label>
            <input type="tel" class="form-control" id="phone_no" name="phone_no">
          </div>
          <div class="col-md-12">
            <label for="washing_price">Update Center Washing Price</label>
            <input type="number" step="any" class="form-control" id="washing_price" name="washing_price">
          </div>
          <div class="col-md-12">
            <label for="workers_name">Update Center Workers</label>
            <select class="form-select" id="workers_name" name="workers_name[]" placeholder="Choose Here..." multiple>
              <option value="Aarav">Aarav</option>
              <option value="Arjun">Arjun</option>
              <option value="Ryan">Ryan</option>
              <option value="Aadvik">Aadvik</option>
              <option value="Atharv">Atharv</option>
              <option value="Reyansh">Reyansh</option>
              <option value="Ayaan">Ayaan</option>
              <option value="Vihaan">Vihaan</option>
              <option value="Shaurya">Shaurya</option>
              <option value="Ishaan">Ishaan</option>
              <option value="Parth">Parth</option>
              <option value="Daniel">Daniel</option>
              <option value="Kiaan">Kiaan</option>
              <option value="Muhammad">Muhammad</option>
            </select>
          </div>
          <div class="col-md-12 mt-5">
            <button class="btn btn-outline-primary w-100" type="submit">Update Center</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>