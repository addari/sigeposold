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

    <?= javascript_include_tag("bootstrap.js") ?>
    <?= javascript_include_tag("moment.min.js") ?>
    
    <script type="text/javascript">

      var App = App || {};
      App = {
        Facturacion: {
          View: {},
          Collection: {}
        },
        Helpers: {}
      };

      $(document).ready(function(){
        //initialize components genericos
        $("a").tooltip();
      });      
    </script>
    <?= javascript_include_tag("helpers.js") ?>
    
    <!-- Styles Generales -->
    <?= stylesheet_tag('datepicker.css') ?>
    <style>
        body{
            padding: 15px;
        }
    </style>
  </head>
  <body>
    <?= $sf_content ?>
  </body>
</html>
