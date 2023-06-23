<div class="container auth-container">
    <div class="col-md-4">
        <h5 class="text-center my-4">CAR <span class="text-warning">WASH</span></h5>
        <div class="card">
            <div class="card-header text-center">
                <h5>Admin Authentication</h5>
            </div>
            <div class="card-body">
                <form class="row g-4" id="validateAdminSignin" method="post" action="<?= base_url('AdminControl/validateAdminSignin') ?>">
                    <div class="col-md-12">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>