<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	body {
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		background: linear-gradient(135deg, #0f172a, #1e293b, #334155);
		overflow-x: hidden;
	}

	.default-transition {
		animation: fadeInPage 1s ease;
	}

	@keyframes fadeInPage {
		from {
			opacity: 0;
			transform: translateY(20px);
		}

		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.contenedor {
		position: relative;
		width: 100%;
		min-height: 100vh;
		overflow: hidden;
		background: linear-gradient(135deg, rgba(85, 157, 216, 0.95), rgba(162, 166, 172, 0.92));
	}

	.img-back {
		position: absolute;
		inset: 0;
		width: 100%;
		height: 100%;
		object-fit: cover;
		opacity: 0.12;
		filter: blur(2px) scale(1.05);
		z-index: 1;
	}

	.contenedor::before {
		content: "";
		position: absolute;
		inset: 0;
		background: radial-gradient(circle at top left, rgba(202, 176, 176, 0.86), transparent 35%),
			radial-gradient(circle at bottom right, rgba(143, 144, 160, 0.98), transparent 35%);
		z-index: 2;
		pointer-events: none;
	}

	.markmap {
		position: relative;
		z-index: 3;
		padding: 20px;
	}

	svg.markmap {
		position: relative !important;
		top: 0 !important;
		width: 100% !important;
		height: calc(100vh - 110px) !important;
		background: rgba(255, 255, 255, 0.04);
		backdrop-filter: blur(8px);
		border: 1px solid rgba(255, 255, 255, 0.12);
		border-radius: 22px;
		box-shadow: 0 10px 40px rgba(0, 0, 0, 0.35);
		padding: 10px;
	}

	.btn {
		border-radius: 16px !important;
		font-weight: 600;
		letter-spacing: 0.3px;
		padding: 14px 24px !important;
		transition: all 0.35s ease !important;
		box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
		border: none !important;
		text-decoration: none !important;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		text-align: center;
		white-space: normal;
	}

	.btn h4,
	.btn h5 {
		margin: 0;
		font-weight: 700;
	}

	.btn-primary {
		background: linear-gradient(135deg, #C11A1D, #e53935) !important;
		color: #fff !important;
		min-width: 340px !important;
		max-width: 100%;
		font-size: 16px;
		text-transform: uppercase;
		box-shadow: 0 10px 30px rgba(193, 26, 29, 0.35);
	}

	.btn-primary:hover {
		transform: translateY(-4px) scale(1.02);
		box-shadow: 0 14px 35px rgba(193, 26, 29, 0.45);
		background: linear-gradient(135deg, #d92023, #ff5252) !important;
	}

	.btn-secondary {
		background: linear-gradient(135deg, #373A70, #4f46e5) !important;
		color: #fff !important;
		min-width: 460px !important;
		max-width: 100%;
		font-size: 15px;
		box-shadow: 0 10px 25px rgba(55, 58, 112, 0.35);
	}

	.btn-secondary:hover {
		transform: translateY(-4px) scale(1.02);
		box-shadow: 0 14px 35px rgba(79, 70, 229, 0.40);
		background: linear-gradient(135deg, #4347a0, #6366f1) !important;
		color: #fff !important;
	}

	a.btn-secondary.text-white:hover {
		color: #fff !important;
		text-decoration: none !important;
	}


	foreignObject div {
		animation: aparecerNodo 0.6s ease;
	}

	@keyframes aparecerNodo {
		from {
			opacity: 0;
			transform: scale(0.95);
		}

		to {
			opacity: 1;
			transform: scale(1);
		}
	}


	@media (max-width: 992px) {
		.btn-primary {
			min-width: 260px !important;
			font-size: 14px;
		}

		.btn-secondary {
			min-width: 320px !important;
			font-size: 14px;
		}

		svg.markmap {
			height: calc(100vh - 95px) !important;
		}
	}

	@media (max-width: 576px) {
		.markmap {
			padding: 10px;
		}

		.btn-primary,
		.btn-secondary {
			min-width: 220px !important;
			width: auto !important;
			padding: 12px 16px !important;
			border-radius: 12px !important;
		}

		.btn h4 {
			font-size: 14px;
		}

		.btn h5 {
			font-size: 13px;
		}

		svg.markmap {
			height: calc(95vh - 70px) !important;
			border-radius: 11px;
		}

	}
</style>

<script src="https://cdn.jsdelivr.net/npm/markmap-autoloader@0.16"></script>

<main class="default-transition" style="margin: 75px 1px 0 1px;">
	<div class="contenedor">
		<img class="img-fluid img-back" src="<?= base_url('assets/img/banner1.jpg') ?>" />

		<div class="markmap">
			<script type="text/template">
				<?php
				$data = trim('# <button class="btn btn-primary"><h4>SISTEMA DE GESTIÓN INTEGRAL</h4></button>') . "\n";

				foreach ($procesos as $proceso) {
					$siglaProceso = !empty($proceso["Sigla"]) ? $proceso["Sigla"] . ' - ' : '';

					$data .= trim('## <button class="btn btn-primary"><h5>'
						. $siglaProceso . $proceso["Descripcion"] .
						'</h5></button>') . "\n";

					foreach ($proceso["gestiones"] as $gestion) {
						$siglaGestion = !empty($gestion["Sigla"]) ? $gestion["Sigla"] . ' - ' : '';
						$url = base_url('index.php/documentosView') . '/' . $gestion["IdGestion"];

						$data .= trim('### <a href="' . $url . '" class="btn btn-secondary text-white">'
							. $siglaGestion . $gestion["Descripcion"] .
							'</a>') . "\n";

						foreach ($gestion["subgestiones"] as $subgestion) {
							$siglaSubgestion = !empty($subgestion["Sigla"]) ? $subgestion["Sigla"] . ' - ' : '';
							$url2 = base_url('index.php/documentosViewSubgestion') . '/' . $subgestion["IdSubGestion"];

							$data .= trim('#### <a href="' . $url2 . '" class="btn btn-secondary text-white">'
								. $siglaSubgestion . $subgestion["Descripcion"] .
								'</a>') . "\n";
						}
					}
				}

				echo $data;
				?>
			</script>
		</div>
	</div>
</main>