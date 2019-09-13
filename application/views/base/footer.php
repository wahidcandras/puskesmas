
        <!-- Javascripts -->
        <script src="<?php echo base_url().'/'?>assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="<?php echo base_url().'/'?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url().'/'?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url().'/'?>assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="<?php echo base_url().'/'?>assets/plugins/switchery/switchery.min.js"></script>




        <?php if (isset($js)) {
        	$this->load->view('js/' . $js);
        } ?>

        <?php if (isset($script)) {
        	$this->load->view('script/' . $script);
        } ?>


    </body>
</html>
