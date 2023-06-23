<div class="d-flex justify-content-between align-items-center bg-dark p-3 position-sticky top-0 z-1">
  <h4></h4>
  <h4 class="text-white text-uppercase">User Dashboard</h4>
  <h4><a href="<?= base_url('UserControl/logout') ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></h4>
</div>

<div class="container-fluid my-4">
  <?php if (count($centerData) > 0) { ?>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php foreach ($centerData as $ctr) { ?>
        <div class="col centerData">
          <div class="card border-primary" role="button" onclick="fetchCenterDetails('#centerDetails', <?= $ctr['cid'] ?>)">
            <h5 class="py-5 text-center text-uppercase"><?= $ctr['center_name'] ?></h5>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php } else {
    echo "No washing center found.";
  } ?>

  <!-- show center details-->
  <div class="modal fade" id="centerDetails" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-l modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Service Booking</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card border-primary">
            <div class="card-header border-primary">
              <h5 class="text-center text-uppercase" id="center_name"></h5>
            </div>
            <div class="card-body">
              <form class="row g-3" method="post" action="<?= base_url('UserControl/bookWashing') ?>">
                <div class="col-md-12 d-none">
                  <input type="text" class="form-control" id="cid" name="cid">
                </div>
                <div class="col-md-12">
                  <b><i class="fa-solid fa-map-location-dot"></i> Address : </b><span id="center_address"></span>
                </div>
                <div class="col-md-12">
                  <b><i class="fa-solid fa-phone"></i> Phone No : </b><span id="phone_no"></span>
                </div>
                <div class="col-md-12">
                  <b><i class="fa-solid fa-wallet"></i> Washing Price : </b>Rs. <span id="washing_price"></span>
                </div>
                <div class="col-md-12">
                  <b><i class="fa-solid fa-user-group"></i> Workers : </b>
                  <select class="form-select" id="workers_name" name="workers_name" placeholder="Workers Dropdown"></select>
                </div>
                <div class="col-md-12 mt-5">
                  <button class="btn btn-primary w-100" type="submit">Book Washing</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>