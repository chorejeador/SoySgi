<?php
if (isset($documentos[0]) && is_array($documentos[0]) && count($documentos[0]) > 0) {
	$first = $documentos[0];
	$fileUrl = base_url('index.php/obtenerPdf/' . $first['Url'] . $first['Tipo']);
	$viewerUrl = base_url('assets/pdfjs/web/viewer.html') . '?file=' . urlencode($fileUrl) . '#disableDownload=true';
	$backUrl = base_url('index.php/docGeneral');
	?>
	<div class="container-fluid mt-5 pt-2">
		<div class="row">

			<div class="col-md-3 sidebar bg-light">
				<div class="header">
					<button id="backButton"
							class="btn btn-secondary btn-sm mb-3 w-100"
							style=""
							data-back-url="<?= $backUrl ?>">
						<i class="fas fa-arrow-left"></i> Retroceder
					</button>
					<h6 class="nombre-carpeta mt-3 mb-4 text-center font-weight-bold shadow-sm rounded p-3  text-white folder-title">
						<i class="fas fa-folder-open mr-2"></i>
						<?= htmlspecialchars($first['NombreCarpeta']) ?>
					</h6>

				</div>

				<h5 class="mt-3">Menú de Documentos</h5>
				<div class="list-group" id="documentMenu">
					<?php foreach ($documentos as $index => $doc): ?>
						<a href="#"
						   class="list-group-item list-group-item-action<?= $index === 0 ? ' active' : '' ?>"
						   data-file="<?= $doc['Url'] . $doc['Tipo'] ?>">
							<?= $doc['NombreDocumento'] ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="col-md-9 p-0 iframe-container">
				<iframe
					id="pdfIframe"
					class="w-100 h-100 border-0"
					src="<?= $viewerUrl ?>"
					allowfullscreen>
				</iframe>
			</div>

		</div>
	</div>
	<?php
} else {

	$backUrl = base_url('index.php/docGeneral');
	?>
	<div class="container-fluid mt-4 pt-4">
		<div class="row">
			<div class="col-md-3 sidebar bg-light">
				<div class="header">
					<button id="backButton"
							class="btn btn-secondary btn-sm mb-3 w-100"
							data-back-url="<?= $backUrl ?>">
						<i class="fas fa-arrow-left"></i> Retroceder
					</button>
				</div>
			</div>
			<div class="col-md-9 d-flex justify-content-center align-items-center" style="min-height: 300px;">
				<div class="alert alert-info shadow-lg p-4 rounded text-center w-100" style="max-width: 500px;">
					<i class="fas fa-folder-open fa-3x mb-3 text-primary"></i>
					<h4 class="mb-2">¡No hay documentos asociados!</h4>
					<p class="mb-0">Actualmente no existen documentos disponibles para mostrar en esta carpeta.</p>
				</div>
			</div>
		</div>
	</div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const backButton = document.getElementById('backButton');
			if (backButton) {
				backButton.addEventListener('click', function() {
					const url = backButton.getAttribute('data-back-url');
					if (url) {
						window.location.href = url;
					}
				});
			}
		});
	</script>
	<?php
}
?>
