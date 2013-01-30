<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

    <!-- Bootstrap -->
    <?= stylesheet_tag('bootstrap.css') ?>

    <!-- Styles Less Generales -->
    <?= stylesheet_tag('main.less',array('rel' => 'stylesheet/less')) ?>
    <?= stylesheet_tag('facturacion.less',array('rel' => 'stylesheet/less')) ?>
    <?= stylesheet_tag('items.less',array('rel' => 'stylesheet/less')) ?>

    <!-- Js Generales -->
    <?= javascript_include_tag("jquery-1.9.0.js") ?>
    <?= javascript_include_tag("accounting.min.js") ?>
    <?= javascript_include_tag("less-1.3.3.min.js") ?>

    <?= javascript_include_tag("bootstrap-datepicker.js") ?>

    <?= javascript_include_tag("underscore-min.js") ?>
    <?= javascript_include_tag("underscore.string.min.js") ?>
    <?= javascript_include_tag("backbone-min.js") ?>
    <?= javascript_include_tag("backbone-validation-min") ?>

    <?= javascript_include_tag("bootstrap.js") ?>
    <?= javascript_include_tag("moment.min.js") ?>

    <script type="text/javascript">

      var App = App || {};
      App = {
        Facturacion: {
          View: {},
          Model: {},
          Collection: {}
        },
        Helpers: {},
        Param:{
          FormatoFecha:'DD/MM/YYYY'
        }
      };

      $(document).ready(function(){
        //initialize components genericos
        $("*").tooltip();
      });      
    </script>
    <?= javascript_include_tag("helpers.js") ?>

    <!-- Styles Generales -->
    <?= stylesheet_tag('datepicker.css') ?>
    <style type="text/css">body { padding-top: 60px;padding-bottom: 40px;}</style>    
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <?php if ( !$sf_user->isAuthenticated() ): ?>
        <div class="btn-group pull-right">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user"></i> <?= $sf_user->getAttribute("usuario","admin") ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-user"></i> Perfil de usuario</a></li>
            <li class="divider"></li>
            <li><a href="<?= url_for("acceso/logout") ?>"><i class="icon-off"></i> Cerrar Sesión</a></li>
          </ul> 
        </div>
        <?php endif; ?>
        <a class="brand" href="#">S.I.G.E</a>
        <div class="nav-collapse collapse">
          <?php if ( !$sf_user->isAuthenticated() ): ?>
            <ul class="nav">
              <li class="active"><?= link_to("<span class='icon-wrench'></span> Facturación","facturacion/index") ?></li>
            </ul>
          <?php else: ?>
            <form action="<?= url_for("acceso/checkAcceso") ?>" method="post" class="navbar-form pull-right" >
              <input class="span2" type="text" name="usuario" placeholder="Usuario">
              <input class="span2" type="password" name="clave" placeholder="Contraseña">
              <button type="submit" class="btn">Ingresar</button>
            </form>
          <?php endif; ?>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>
    <div class="container">
      <div class="contenedor">
        <?= $sf_content ?>
      </div>
    </div>
  </body>
</html>
