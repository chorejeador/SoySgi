<html>

<head>
  <link rel="stylesheet" href="<?php echo base_url('css/general.css'); ?>">
</head>

</html>
<main class="default-transition" style="margin-left:40px !important">
  <div class="container-fluid library-app">
    <div class="row">
      <div class="col-12">
        <div class="mb-3">
          <h1 class="display-4 separator">
            <i class="iconsminds-monitor-analytics"></i>
            <?php echo $datos[0]["Descripcion"]; ?>
          </h1>
          <div class="text-zero top-right-button-container mb-4">
            <a href="javascript:history.back()" class="btn btn-primary btn-lg top-right-button mr-1">
              <i class="simple-icon-arrow-left"></i> REGRESAR
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row card" style="flex-direction:row!important">
      <div class="col-lg-6 listDocumentos pt-5">
        <table class="table">
          <thead class="thead-light">
            <tr style="height:70px;">
              <th scope="col"></th>
              <th scope="col">Documento</th>
              <th scope="col">Fecha</th>
              <th scope="col">Opción</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($archivos as $key):
              $icon = 'default.png';
              $tipo = strtolower($key["Tipo"]);
              switch ($tipo) {
                case 'pdf':
                  $icon = 'pdf.png';
                  break;
                case 'xls':
                case 'xlsx':
                  $icon = 'excel.png';
                  break;
                case 'doc':
                case 'docx':
                  $icon = 'doc.png';
                  break;
                case 'jpg':
                case 'jpeg':
                case 'png':
                  $icon = 'image.png';
                  break;
              }
            ?>
              <tr style="border-bottom: 1px solid #dcd9d9;">
                <td><img style="height:35px;" src="<?php echo base_url(); ?>assets/img/documentos/<?php echo $icon; ?>"></td>
                <td><?php echo $key["Descripcion"]; ?></td>
                <td><?php echo $key["FechaCrea"]; ?></td>
                <td>
                  <a href="<?php echo base_url('index.php/downloadFile/') . $key["IdDocumento"] . '/gestion'; ?>"
                    target="_blank" class="btn btn-outline-theme-3 icon-button text-black">
                    <i class="simple-icon-arrow-down-circle"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="col-lg-6 col-sm-12 text-center pt-5">
        <div class="card-body mapa-container-style">
          <h1 class="lead mb-3" style="font-size: 24px;font-weight: bold;"><i class="iconsminds-map-marker-2 text-danger"></i> Estás aquí</h1>

          <?php

          $idUrl = $this->uri->segment(2);


          if (!empty($datos[0]["Imagen"])) {
            $imgFinal = $datos[0]["Imagen"];
          } elseif (file_exists(FCPATH . "assets/img/mapa/Mapa-" . $idUrl . ".png")) {
            $imgFinal = "Mapa-" . $idUrl . ".png";
          } else {

            $imgFinal = "Mapa-1.png";
          }
          ?>

          <img id="mapaUbicacion"
            src="<?php echo base_url(); ?>assets/img/mapa/<?php echo $imgFinal; ?>?v=<?php echo time(); ?>"
            style="width: 100%; max-width: 550px; height: auto; border-radius: 5px;"
            alt="Mapa de Ubicación">


        </div>
      </div>

    </div>
  </div>
</main>