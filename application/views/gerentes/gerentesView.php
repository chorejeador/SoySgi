<style>

	* {
		margin: 0;
		padding: 0;
	}

	.btn-primary {
		background-color: #C11A1D !important;
		border: #C11A1D;
		min-width: 400px !important;
	}

	.contenedor {
		position: relative;
		width: 100%;
	}

	.img-back {
		width: 100%;
		height: auto;
		opacity: 0.3;
	}

	.btn-secondary {
		background-color: #373A70 !important;
		border: #373A70;
		min-width: 620px !important;
	}

	svg.markmap {
		position: absolute;
		top: 5px;
		width: 100%;
		height: 90vh;
	}

</style>
<script src="https://cdn.jsdelivr.net/npm/markmap-autoloader@0.16"></script>
<main class="default-transition" style="margin: 75px 1px 0 1px; opacity: 5;">
	<div class="contenedor">
		<img class="img-fluid img-back" src="<?= base_url('assets/img/banner1.jpg') ?>"/>
		<div class="markmap">
			<script type="text/template">
				<?php
				$data = trim('# <button class="btn btn-primary"><h4>SISTEMA DE GESTIÓN INTEGRAL</h4></button>') . "\n";
				foreach ($procesos as $proceso) {
					$data .= trim('## ' . '<button class="btn btn-primary"><h5>' . $proceso["Descripcion"] . '</h5></button>') . "\n";
					foreach ($proceso["gestiones"] as $gestion) {
						$url = base_url('index.php/documentosView') . '/' . $gestion["IdGestion"];
						$data .= trim('### ' . '<a href="' . $url . '" class="btn btn-secondary text-white">' . $gestion["Descripcion"] . '</a>') . "\n";
						foreach ($gestion["subgestiones"] as $subgestion) {
							$url2 = base_url('index.php/documentosViewSubgestion') . '/' . $subgestion["IdSubGestion"];
							$data .= trim('#### ' . '<a href="' . $url2 . '" class="btn btn-secondary text-white">' . $subgestion["Descripcion"] . '</a>') . "\n";
						}
					}
				}
				echo $data;
				?>
			</script>
		</div>
	</div>

</main>
