<main class="main">
  <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
      <div class="container">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= BURL ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Update</li>
          </ol>
      </div><!-- End .container -->
  </nav><!-- End .breadcrumb-nav -->

  <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('<?= BURL ?>assets/images/backgrounds/login-bg.jpg')">
    <div class="container">
      <div class="form-box">
        <div class="form-tab">
          <ul class="nav nav-pills nav-fill" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Update Password</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
          <form method="post" action="<?=BURL?>forget/reset">
            <div class="form-group">
              <label for="reset-password-1">New Password *</label>
              <input type="password" class="form-control" id="reset-password-1" name="password" required>
            </div><!-- End .form-group -->

            <div class="form-group">
              <label for="reset-password-2">Confirm Password *</label>
              <input type="password" class="form-control" id="reset-password-3" name="cpassword" required>
            </div><!-- End .form-group -->

            <input type="hidden" name="reset" value="<?= $reset ?>">

            <div class="form-footer">
              <button type="submit" class="btn btn-outline-primary-2" name="<?= $token ?>">
                <span>UPDATE</span>
              <i class="icon-long-arrow-right"></i>
              </button>

            <a href="<?= BURL ?>/login" class="forgot-link">Login</a>
            </div><!-- End .form-footer -->
          </form>
        </div><!-- .End .tab-pane -->
    </div>

  </div><!-- End .form-tab -->
      </div><!-- End .form-box -->
    </div><!-- End .container -->
  </div><!-- End .login-page section-bg -->
  <div class="text-center my-5">
      <a href="#" class="btn btn-sm btn-minwidth-lg btn-outline-primary-2">
          <span>Contact Us</span>
          <i class="icon-long-arrow-right"></i>
      </a>
  </div><!-- End .text-center -->
</main><!-- End .main -->