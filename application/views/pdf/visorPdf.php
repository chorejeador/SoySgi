<?php
$first = $documentos[0];
$fileUrl = base_url('index.php/obtenerPdf/'.$first['Url'].$first['Tipo']);
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
