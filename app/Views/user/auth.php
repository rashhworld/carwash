<div class="container auth-container">
    <div class="col-md-4">
        <h5 class="text-center my-4">CAR <span class="text-warning">WASH</span></h5>
        <div class="card">
            <div class="card-header text-center">
                <h5>User Authentication</h5>
            </div>
            <div class="card-body">
                <form class="row g-4" id="validateUserSignin" method="post" action="<?= base_url('UserControl/validateUserSignin') ?>" autocomplete="off">
                    <div class="col-md-12">
                        <label for="email_id" class="form-label">Enter your Email ID</label>
                        <input type="email" name="email_id" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Enter your Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </div>

                    <p class="mt-3"><em>New Member? <a href="javascript:void(0)" id="showSignup">Signup Now</a></em></p>
                </form>
                <form class="row g-4 d-none" id="validateUserSignup" method="post" action="<?= base_url('UserControl/validateUserSignup') ?>" autocomplete="off">
                    <div class="col-md-12">
                        <label for="email_id" class="form-label">Enter your Email ID</label>
                        <input type="email" name="email_id" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="phone_number" class="form-label">Enter your Phone No</label>
                        <input type="tel" name="phone_number" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Enter your Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </div>

                    <p class="mt-3"><em>Registered Member? <a href="javascript:void(0)" id="showSignin">Signin Now</a></em></p>
                </form>
            </div>
        </div>
    </div>
</div>