<style>

	* {
		margin: 0;
		padding: 0;
	}

	.btn-primary {
		background-color: #C11A1D !important;
		border: #C11A1D;
		min-width: 300px !important;
	}

	.btn-secondary {
		background-color: #373A70 !important;
		border: #373A70;
		min-width: 620px !important;
	}

	svg.markmap {
		width: 100%;
		height: 70vh;
	}
</style>
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/markmap-toolbar@0.17.0/dist/style.css">-->
<script src="https://cdn.jsdelivr.net/npm/markmap-autoloader@0.16"></script>
<main class="default-transition" style="margin-left:40px; opacity: 5;">

	<!--<svg id="mindmap"></svg>-->

	<div class="markmap">
		<script type="text/template">
			<?php
			$data = trim('# <button class="btn btn-primary">SISTEMA DE GESTIÓN INTEGRAL</button>') . "\n";
			foreach ($procesos as $proceso) {
				$data .= trim('## ' . '<button class="btn btn-primary">' . $proceso["Descripcion"] . '</button>') . "\n";
				foreach ($proceso["gestiones"] as $gestion) {
					$url = base_url('index.php/documentosView').'/'.$gestion["IdGestion"];
					$data .= trim('### ' . '<a href="'.$url.'" class="btn btn-secondary text-white">' . $gestion["Descripcion"] . '</a>') . "\n";
					foreach ($gestion["subgestiones"] as $subgestion) {
						$url2 = base_url('index.php/documentosViewSubgestion').'/'.$subgestion["IdSubGestion"];
						$data .= trim('#### ' . '<a href="'.$url2.'" class="btn btn-secondary text-white">' . $subgestion["Descripcion"] . '</a>') . "\n";
					}
				}
			}
			echo $data;
			?>
		</script>
	</div>


	<!--	<script src="https://cdn.jsdelivr.net/npm/d3@7.8.5/dist/d3.min.js"></script>-->
	<!--	<script src="https://cdn.jsdelivr.net/npm/markmap-view@0.17.0/dist/browser/index.js"></script>-->
	<!--	<script src="https://cdn.jsdelivr.net/npm/markmap-toolbar@0.17.0/dist/index.js"></script>-->
	<!--	<script>-->
	<!--		(() => {-->
	<!--			setTimeout(() => {-->
	<!--				const {markmap: q, mm: v} = window, j = new q.Toolbar;-->
	<!--				j.attach(v);-->
	<!--				const we = j.render();-->
	<!--				we.setAttribute("style", "position:absolute;bottom:20px;right:20px"), document.body.append(we)-->
	<!--			})-->
	<!--		})()</script>-->

	<!--	<script>-->
	<!--		((f, d, h, u) => {-->
	<!--			const g = f();-->
	<!--			window.mm = g.Markmap.create("svg#mindmap", (d || g.deriveOptions)(u), {-->
	<!--				...h,-->
	<!--				zoom: false,-->
	<!--				pan: false // Disable zoom and pan-->
	<!--			})-->
	<!--		})(() => window.markmap, null, {-->
	<!--			"content": "<a href='#' class='btn btn-sm btn-primary text-white'>Sistema de gestión integral</a>",-->
	<!--			"children": [{-->
	<!--				"content": "<a href='#' class='btn btn-sm btn-primary text-white' >PROCESOS ESTRATÉGICOS</a>",-->
	<!--				"children": [{-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>PLANIFICACIÓN Y GESTIÓN INTEGRAL</a>",-->
	<!--					"children": [{-->
	<!--						"content": "<a href='#' class='btn btn-sm btn-info text-white'>GESTIÓN DE LABORATORIO</a>",-->
	<!--						"children": [],-->
	<!--						"payload": {"lines": "2,3"}-->
	<!--					}],-->
	<!--					"payload": {"lines": "1,2"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>GESTIÓN ESTRATÉGICA CORPORATIVA</a>",-->
	<!--					"children": [{-->
	<!--						"content": "<a href='#' class='btn btn-sm btn-info text-white'>CONTROL INTERNO</a>",-->
	<!--						"children": [],-->
	<!--						"payload": {"lines": "4,5"}-->
	<!--					}],-->
	<!--					"payload": {"lines": "3,4"}-->
	<!--				}],-->
	<!--				"payload": {"lines": "0,1"}-->
	<!--			}, {-->
	<!--				"content": "<a href='#' class='btn btn-sm btn-primary text-white' >PROCESOS OPERACIONALES</a>",-->
	<!--				"children": [{-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>GESTIÓN DE MERCADEO Y VENTAS",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "6,7"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>INVESTIGACIÓN Y DESARROLLO DE NUEVOS PRODUCTOS</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "7,8"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>LOGÍSTICA DE ABASTECIMIENTO</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "8,9"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>PLANEACIÓN Y DESARROLLO DE LA PRODUCCIÓN</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "9,10"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>LOGÍSTICA DE DISTRIBUCIÓN</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "10,11"}-->
	<!--				}],-->
	<!--				"payload": {"lines": "5,6"}-->
	<!--			}, {-->
	<!--				"content": "<a href='#' class='btn btn-sm btn-primary text-white' >PROCESOS DE APOYO</a>",-->
	<!--				"children": [{-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>GESTIÓN DEL TALENTO HUMANO</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "12,13"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>GESTIÓN FINANCIERA</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "13,14"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>SEGURIDAD FÍSICA, BIO Y DEFENSA ALIMENTARIA</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "14,15"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>MANTENIMIENTO INDUSTRIAL DE PLANTA Y METROLOGÍA</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "15,16"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>MANTENIMIENTO DE LA FLOTA VEHÍCULAR</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "16,17"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>GESTIÓN DE INFRAESTRUCTURA E INSTALACIONES</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "17,18"}-->
	<!--				}, {-->
	<!--					"content": "<a href='#' class='btn btn-sm btn-secondary text-white'>GESTIÓN DE LA TECNOLOGÍA DE LA INFORMACIÓN Y LAS COMUNICACIONES</a>",-->
	<!--					"children": [],-->
	<!--					"payload": {"lines": "18,19"}-->
	<!--				}],-->
	<!--				"payload": {"lines": "11,12"}-->
	<!--			}]-->
	<!--		}, null)-->
	<!--	</script>-->
</main>
