<footer class="page-footer">
	<div class="footer-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-6">
					<p class="mb-0 text-muted">DELMOR S.A <?php echo date('Y') ?></p>
				</div>
				<div class="col-sm-6 d-none d-sm-block">
					<ul class="breadcrumb pt-0 pr-0 float-right">
						<li class="breadcrumb-item mb-0"><a href="#" class="btn-link">Derechos Reservados</a></li>
						<li class="breadcrumb-item mb-0"><a href="#" class="btn-link">Copyright ©</a></li>

					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>

<script> const BASE_URL = "<?php echo base_url(); ?>";</script>
<script src="<?php echo base_url() ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/vendor/mousetrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/dore.script.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap-treeview.min.js.css"></script>
<script src="<?php echo base_url() ?>assets/js/vendor/venoBox/venobox.min.js"></script>
<script src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js.css"></script>
<script src="<?php echo base_url() ?>assets/js/datatables.js"></script>
<script src="<?php echo base_url() ?>assets/js/dataTables.fixedColumns.js"></script>
<script src="<?php echo base_url() ?>assets/js/choices.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/select2/select2.min.js"></script>
<script src="<?php echo base_url() ?>assets/datatables/js/dataTables.rowGroup.min.js.css"></script>

<?php if (isset($scripts) && is_array($scripts)): ?>
	<?php foreach ($scripts as $script): ?>
		<?= $script . "\n"; ?>
	<?php endforeach; ?>
<?php endif; ?>

</body>
</html>
