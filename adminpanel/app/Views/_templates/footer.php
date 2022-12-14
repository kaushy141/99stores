<!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
	<?php echo script_tag('public/vendor/libs/jquery/jquery.js'); ?>
	
	<?php echo script_tag('public/vendor/libs/popper/popper.js'); ?>
	
	<?php echo script_tag('public/vendor/js/bootstrap.js'); ?>
	
	<?php echo script_tag('public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>
	
	<?php echo script_tag('public/vendor/js/menu.js'); ?>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <?php echo script_tag('public/vendor/libs/apex-charts/apexcharts.js'); ?>
    <!-- Main JS -->
	<?php echo script_tag('public/js/main.js'); ?>

    <!-- Page JS -->
	<?php echo script_tag('public/js/dashboards-analytics.js'); ?>
	<?php echo script_tag('public/js/jquery-confirm.min.js'); ?>
    <!-- Place this tag in your head or just before your close body tag. -->
	<?php echo script_tag('https://buttons.github.io/buttons.js'); ?>
	<?php echo script_tag('public/js/custom.js'); ?>
	<script>
	$(document).ready(function(e){
		<?php if(session()->getFlashdata('message')): ?>
		    $.alert({
				title: '<font class="text-<?php echo session()->getFlashdata('variant'); ?>"><?php echo session()->getFlashdata('icon'); ?> <?php echo ucwords(session()->getFlashdata('variant')); ?> !</font>',
				content: `<?php echo session()->getFlashdata('message'); ?>`,
			});
	   <?php endif; ?>
	});
	</script>
  </body>
</html>
