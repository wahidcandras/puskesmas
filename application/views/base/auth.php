
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Slim">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/slim/img/slim-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/slim">
    <meta property="og:title" content="Slim">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title><?= $this->config->item('site_title')?></title>

    <!-- Vendor css -->
    <link href="<?= base_url().'assets/'?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url().'assets/'?>lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="<?= base_url().'assets/'?>css/slim.css">

  </head>
  <body>

    <div class="d-md-flex flex-row-reverse">
      <div class="signin-right">

        <div class="signin-box">
          <h2 class="signin-title-primary">Welcome back!</h2>
          <h3 class="signin-title-secondary">Sign in to continue.</h3>
          <?php echo $this->session->flashdata('message');?>
          <form action="<?= site_url('Auth/login')?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="username">
          </div><!-- form-group -->
          <div class="form-group mg-b-50">
            <input type="password" class="form-control" placeholder="Password" name="password">
          </div><!-- form-group -->
          <button class="btn btn-primary btn-block btn-signin" type="submit">Login</button>
          <p class="mg-b-0">Don't have an account? <a href="page-signup2.html">Sign Up</a></p>
          </form>
        </div>

      </div><!-- signin-right -->
      <div class="signin-left">
        <div class="signin-box">
          <h2 class="slim-logo"><a href="index.html">slim<span>.</span></a></h2>

          <p>We are excited to launch our new company and product Slim. After being featured in too many magazines to mention and having created an online stir, we know that ThemePixels is going to be big. We also hope to win Startup Fictional Business of the Year this year.</p>

          <p>Browse our site and see for yourself why you need Slim.</p>

          <p><a href="" class="btn btn-outline-secondary pd-x-25">Learn More</a></p>

          <p class="tx-12">&copy; Copyright 2018. All Rights Reserved.</p>
        </div>
      </div><!-- signin-left -->
    </div><!-- d-flex -->

    <script src="<?= base_url().'assets/'?>lib/jquery/js/jquery.js"></script>
    <script src="<?= base_url().'assets/'?>lib/popper.js/js/popper.js"></script>
    <script src="<?= base_url().'assets/'?>lib/bootstrap/js/bootstrap.js"></script>

    <script src="<?= base_url().'assets/'?>js/slim.js"></script>

  </body>
</html>
