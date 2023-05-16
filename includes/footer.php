<?php
require_once '../core/conn.php';
$footer = $web['footer'];
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="/static/dashboard/assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="/static/dashboard/assets/js/core/popper.min.js"></script>
  <script src="/static/dashboard/assets/js/core/bootstrap.min.js"></script>
  <!-- jQuery UI -->
  <script src="/static/dashboard/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="/static/dashboard/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
  <!-- jQuery Scrollbar -->
  <script src="/static/dashboard/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <!-- Moment JS -->
  <script src="/static/dashboard/assets/js/plugin/moment/moment.min.js"></script>
  <!-- Chart JS -->
  <script src="/static/dashboard/assets/js/plugin/chart.js/chart.min.js"></script>
  <!-- jQuery Sparkline -->
  <script src="/static/dashboard/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
  <!-- Chart Circle -->
  <script src="/static/dashboard/assets/js/plugin/chart-circle/circles.min.js"></script>
  <!-- Datatables -->
  <script src="/static/dashboard/assets/js/plugin/datatables/datatables.min.js"></script>
  <!-- Bootstrap Notify -->
  <script src="/static/dashboard/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
  <!-- Bootstrap Toggle -->
  <script src="/static/dashboard/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
  <!-- jQuery Vector Maps -->
  <script src="/static/dashboard/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
  <script src="/static/dashboard/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
  <!-- Google Maps Plugin -->
  <script src="/static/dashboard/assets/js/plugin/gmaps/gmaps.js"></script>
  <!-- Dropzone -->
  <script src="/static/dashboard/assets/js/plugin/dropzone/dropzone.min.js"></script>
  <!-- Fullcalendar -->
  <script src="/static/dashboard/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>
  <!-- DateTimePicker -->
  <script src="/static/dashboard/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
  <!-- Bootstrap Tagsinput -->
  <script src="/static/dashboard/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
  <!-- Bootstrap Wizard -->
  <script src="/static/dashboard/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>
  <!-- jQuery Validation -->
  <script src="/static/dashboard/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>
  <!-- Summernote -->
  <script src="/static/dashboard/assets/js/plugin/summernote/summernote-bs4.min.js"></script>
  <!-- Select2 -->
  <script src="/static/dashboard/assets/js/plugin/select2/select2.full.min.js"></script>
  <!-- Sweet Alert -->
  <script src="/static/dashboard/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
  <!-- Owl Carousel -->
  <script src="/static/dashboard/assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>
  <!-- Magnific Popup -->
  <script src="/static/dashboard/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Atlantis JS -->
  <script src="/static/dashboard/assets/js/atlantis.min.js"></script>
  <!-- jquery validator -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
  <script type="text/javascript">
	(function() {
		var options = {
			whatsapp: "<?php echo $footer; ?>", // WhatsApp number
			call_to_action: "Hi", // Call to action
			position: "left", // Position may be 'right' or 'left'
		};
		var proto = document.location.protocol,
			host = "getbutton.io",
			url = proto + "//static." + host;
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.async = true;
		s.src = url + '/widget-send-button/js/init.js';
		s.onload = function() {
			WhWidgetSendButton.init(host, proto, options);
		};
		var x = document.getElementsByTagName('script')[0];
		x.parentNode.insertBefore(s, x);
	})();
</script>
<script>
  window.addEventListener("offline", function(){
    Swal.fire("Network Disconnected!");
  })
  window.addEventListener("online", function(){
    Swal.fire("Network Back  Online!");
  })
</script>