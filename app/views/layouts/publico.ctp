<?php
/**
 *Autores:
 *	Edgar García Camarillo
 *	Eugenio Rafael García García
 *	Luis Galeana Peralta
 * 	Luis Eduardo Torres
 *
 * Descripción: Esta es la vista base de pa aplciacion para el template de toda la aplicaicon en donde se enocntarra el hedar y footer.
 */


?>
<!DOCTYPE HTML>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta(array("name"=>"viewport",
      "content"=>"width=device-width,  initial-scale=1.0"));


    //Importaciónde Hojas de Estilo
//    echo $this->Html->css('cake.generic');
    echo $this->Html->css('piadvisor');
    echo $this->Html->css('bootstrap');
    echo $this->Html->css('elastic');
    echo $this->Html->css('publico');

    // <script src="js/bootstrap.min.js"></script>
    //echo $this->Html->script('bootstrap'); // Include jQuery library
    //Importacion de Javascripts
    echo $this->Html->script('elastic'); 

        echo $this->Html->script('jquery-1.9.1.min');

    echo $this->Html->script('bootstrap.min'); 

/*
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');*/
	?>
     



</head>
<body class"body">



     <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <?php echo $this->Html->link(__('Programas Internacionales',true), array('controller' => 'pages', 'action' => 'home', 'class'=>'brand')); ?>
        </div>
      </div>
    </div>






			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>







	<?php echo $this->element('sql_dump'); ?>


</body>
</html>
