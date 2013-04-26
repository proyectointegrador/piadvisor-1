<?php
/**
 *Autores:
 *	Edgar García Camarillo
 *	Eugenio Rafael García García
 *	Luis Galeana Peralta
 * 	Luis Eduardo Torres
 *
 * Descripción: Esta es la vista base de pa aplciacion para el template de toda la aplicaicon en donde se enocntarra el hedar y footer para la verison movil.
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

//		echo $this->Html->css('cake.generic');
	    echo $this->Html->css('bootstrap.min');
      echo $this->Html->css('bootstrap-responsive.min');



   // <script src="js/bootstrap.min.js"></script>
//echo $this->Html->script('bootstrap'); // Include jQuery library

    echo $this->Html->script('elastic'); 

        echo $this->Html->script('jquery-1.9.1.min');

    echo $this->Html->script('bootstrap.min'); 


/*
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');*/
	?>
      <style type="text/css">
      body {

        //background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
padding-top:25px;

padding-right:10px;
padding-left:0px;
        background-color: #fff;
        //border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;


      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
  width: 100%;
  min-height: 28px;   




      }


      // Block level inputs
.input-block-level {
  display: block;
  width: 100%;
  min-height: 28px;        // Make inputs at least the height of their button counterpart
  .box-sizing(border-box); // Makes inputs behave like true block-level elements
}

    </style>



</head>
<body>










			<?php echo $this->Session->flash(); ?>

		   <?php echo $content_for_layout; ?>







	<?php echo $this->element('sql_dump'); ?>



<script>


            $(function () {

                $('#tooltip1').tooltip();
            });


</script>


</body>
</html>
