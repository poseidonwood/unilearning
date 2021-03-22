            			<footer class="footer">
            				© 2021 - <?php echo date('Y'); ?> SKMI GROUP <span class="d-none d-sm-inline-block"> - Created by <a target="_BLANK" href="https://www.skmi.web.id">www.skmi.web.id</a></span>
            			</footer>

            			</div>
            			<!-- ============================================================== -->
            			<!-- End Right content here -->
            			<!-- ============================================================== -->

            			</div>
            			<!-- END wrapper -->

            			<!-- jQuery  -->
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/js/jquery.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/js/bootstrap.bundle.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/js/metismenu.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/js/jquery.slimscroll.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/js/waves.min.js"); ?>"></script>
            			<!-- Select2 -->

            			<script src="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>


            			<!--Morris Chart-->
            			<script src="<?php echo base_url("assets/Admin/plugins/morris/morris.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/raphael/raphael.min.js"); ?>"></script>

            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/pages/dashboard.init.js"); ?>"></script>

            			<script src="<?php echo base_url("assets/Admin/plugins/tinymce/tinymce.min.js"); ?>"></script>
            			<script>
            				$(document).ready(function() {
            					if ($("#elm1").length > 0) {
            						tinymce.init({
            							selector: "textarea#elm1",
            							theme: "modern",
            							height: 300,
            							plugins: [
            								"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            								"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            								"save table contextmenu directionality emoticons template paste textcolor"
            							],
            							toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            							style_formats: [{
            									title: 'Bold text',
            									inline: 'b'
            								},
            								{
            									title: 'Red text',
            									inline: 'span',
            									styles: {
            										color: '#ff0000'
            									}
            								},
            								{
            									title: 'Red header',
            									block: 'h1',
            									styles: {
            										color: '#ff0000'
            									}
            								},
            								{
            									title: 'Example 1',
            									inline: 'span',
            									classes: 'example1'
            								},
            								{
            									title: 'Example 2',
            									inline: 'span',
            									classes: 'example2'
            								},
            								{
            									title: 'Table styles'
            								},
            								{
            									title: 'Table row 1',
            									selector: 'tr',
            									classes: 'tablerow1'
            								}
            							]
            						});
            					}
            				});
            			</script>

            			<!-- Required datatable js -->
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/dataTables.bootstrap4.min.js"); ?>"></script>

            			<script>
            				$('#popoverData').popover();
            				$('#popoverOption').popover({
            					trigger: "hover",
            					html: true,
            					title: "",
            					content: "<h5 class='card-title'><?php echo "GENERAL-ALL"; ?></h5><p>Berisi materi materi pelatihan yang mencakup pengetahuan umum yang harus dijaga</p>"
            				});
            			</script>

            			<!-- Buttons examples -->
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/dataTables.buttons.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/buttons.bootstrap4.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/jszip.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/pdfmake.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/vfs_fonts.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/buttons.html5.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/buttons.print.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/buttons.colVis.min.js"); ?>"></script>

            			<!-- Responsive examples -->
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/dataTables.responsive.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/datatables/responsive.bootstrap4.min.js"); ?>"></script>

            			<!-- Dropzone js -->
            			<script src="<?php echo base_url("assets/Admin/plugins/dropzone/dist/dropzone.js"); ?>"></script>

            			<!-- Datatable init js -->
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/pages/datatables.init.js"); ?>"></script>

            			<!--C3 Chart -->
            			<script src="<?php echo base_url("assets/Admin/plugins/d3/d3.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/plugins/c3/c3.min.js"); ?>"></script>
            			<!-- <script src="assets/Admin/horizontal/assets/pages/c3-chart-init.js"></script>   -->
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/pages/c3-barchart.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/pages/c3-piechart.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/pages/c3-stackedchart.js"); ?>"></script>

            			<!-- chartjs js -->
            			<script src="<?php echo base_url("assets/Admin/plugins/chartjs/chart.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/pages/chartjs.init.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/pages/chartjsku.js"); ?>"></script>

            			<!-- Jquery-Ui -->
            			<script src="<?php echo base_url("assets/Admin/plugins/jquery-ui/jquery-ui.min.js"); ?>"></script>
            			<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script> -->
            			<script src="<?php echo base_url("assets/Admin/plugins/moment/moment.js"); ?>"></script>
            			<script src='<?php echo base_url("assets/Admin/plugins/fullcalendar/js/fullcalendar.min.js"); ?>'></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/pages/calendar-init.js"); ?>"></script>
            			<!-- Sweet-Alert  -->
            			<!-- <script src="<?php echo base_url("assets/Admin/plugins/sweet-alert2/sweetalert2.min.js"); ?>"></script>
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/pages/mysweet-alert.js"); ?>"></script> -->
            			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            			<script src="<?php echo base_url("assets/Admin/timeline.css"); ?>"></script>
            			<!-- App js -->
            			<script src="<?php echo base_url("assets/Admin/horizontal/assets/js/app.js"); ?>"></script>
            			<!-- Custom JS -->
            			<script src="<?php echo base_url("assets/js/custom.js"); ?>"></script>

            			<!-- File Pond Upload -->
            			<!-- include FilePond library -->
            			<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

            			<!-- include FilePond plugins -->
            			<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

            			<!-- include FilePond jQuery adapter -->
            			<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

            			<script>
            				$(function() {

            					// First register any plugins
            					$.fn.filepond.registerPlugin(FilePondPluginImagePreview);

            					// Turn input element into a pond
            					$('.my-pond').filepond();

            					// Set allowMultiple property to true
            					$('.my-pond').filepond('allowMultiple', false);

            					// Listen for addfile event
            					$('.my-pond').on('FilePond:addfile', function(e) {
            						console.log('file added event', e);
            					});

            					// Manually add a file using the addfile method
            					// $('.my-pond').first().filepond('addFile', 'index.html').then(function(file) {
            					// 	console.log('file added', file);
            					// });

            				});
            			</script>
            			<!-- end File pon Upload -->
            			<!-- Notif Alert -->
            			<?php
									if (isset($notif)) {
										echo $notif;
									}
									if ($this->session->flashdata('notif') !== null) {
										echo $this->session->flashdata('notif');
									}
									date_default_timezone_set('Asia/Jakarta');
									$logger = array(
										'id' => null,
										'level'	=> 'INFO',
										'logger' => date('Y-m-d H:i:s') . " [" . $this->session->userdata('nama') . "] INFO " . $this->input->ip_address() . " - Akses URL : " . current_url() . "",
										'ip' => $this->input->ip_address(),
										'created_at' => date('Y-m-d H:i:s')
									);
									$this->db->insert('logger', $logger);

									?>
            			<!-- matrix skill -->
            			<script src="<?php echo base_url("assets/js/matrix_skill.js"); ?>"></script>

            			<!-- Modal Setting -->
            			</body>

            			</html>