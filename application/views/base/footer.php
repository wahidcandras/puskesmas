 <div class="slim-footer">
      <div class="container">
        <p>Copyright 2018 &copy; All Rights Reserved. Slim Dashboard Template</p>
        <p>Designed by: <a href="">ThemePixels</a></p>
      </div><!-- container -->
    </div><!-- slim-footer -->

    <script src="<?= base_url().'assets/'?>lib/jquery/js/jquery.js"></script>
    <script src="<?= base_url().'assets/'?>lib/popper.js/js/popper.js"></script>
    <script src="<?= base_url().'assets/'?>lib/bootstrap/js/bootstrap.js"></script>
    <script src="<?= base_url().'assets/'?>lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="<?= base_url().'assets/'?>lib/d3/js/d3.js"></script>
    <script src="<?= base_url().'assets/'?>lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="<?= base_url().'assets/'?>lib/Flot/js/jquery.flot.js"></script>
    <script src="<?= base_url().'assets/'?>lib/Flot/js/jquery.flot.resize.js"></script>
    <script src="<?= base_url().'assets/'?>lib/peity/js/jquery.peity.js"></script>

    <script src="<?= base_url().'assets/'?>js/slim.js"></script>
    <script src="<?= base_url().'assets/'?>js/ResizeSensor.js"></script>
    

        <?php if (isset($js)) {
        	$this->load->view('js/' . $js);
        } ?>

        <?php if (isset($script)) {
        	$this->load->view('script/' . $script);
        } ?>


  </body>
</html>
