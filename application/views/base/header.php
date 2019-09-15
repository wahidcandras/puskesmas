<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="Dinas Kesehatan Kab. Semarang">
    <meta name="twitter:creator" content="Dinas Kesehatan Kab. Semarang">
    <meta name="twitter:card" content="Dinas Kesehatan Kab. Semarang">
    <meta name="twitter:title" content="Dinas Kesehatan Kab. Semarang">
    <meta name="twitter:description" content="Dinas Kesehatan Kab. Semarang">
    <meta name="twitter:image" content="http://themepixels.me/slim/img/slim-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/slim">
    <meta property="og:title" content="Dinas Kesehatan Kab. Semarang">
    <meta property="og:description" content="Dinas Kesehatan Kab. Semarang">

    <meta property="og:image" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Dinas Kesehatan Kab. Semarang">
    <meta name="author" content="Dinas Kesehatan Kab. Semarang">

    <title><?= $this->config->item('site_title')?></title>

    <!-- vendor css -->
    <link href="<?= base_url().'assets/'?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url().'assets/'?>lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?= base_url().'assets/'?>lib/rickshaw/css/rickshaw.min.css" rel="stylesheet">

        <?php if (isset($css)) {
            $this->load->view('css/' . $css);
        } ?>

    <!-- Slim CSS -->
    <link rel="stylesheet" href="<?= base_url().'assets/'?>css/slim.css">
    <style type="text/css">
      .slim-logo > a {
        font-size: 16px;
      }
      .slim-logo > a > span {
        font-size: 30px;
      }
    </style>

  </head>
  <body>