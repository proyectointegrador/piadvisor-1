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
  	echo $this->Html->css('cake.generic');
    echo $this->Html->css('piadvisor');
	  echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('elastic');

    // <script src="js/bootstrap.min.js"></script>
    //echo $this->Html->script('bootstrap'); // Include jQuery library
    //Importacion de Javascripts
    echo $this->Html->script('bootstrap.min'); 
    echo $this->Html->script('elastic'); 
    echo $this->Html->script('jquery-1.9.1.min');

    echo $scripts_for_layout;
/*
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');*/
	?>
      <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #FFFFFF;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
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
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>



</head>
<body>



     <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--a class="brand" href="/pages/home">Intercambio Internacional</a-->

          <?php
            echo $this->Html->link('PIAdvisor Administration', '/universidades', array('class' => 'brand'));
          ?>
          <div class="pull-right">
            <?php
            if ($this->Session->read('Auth.User')) {
                echo '<span class="label label-success">';
                echo $this->Session->read('Auth.User.username');
                echo '</span>';
              ?>

    	           <?php 
                 echo "<button class=\"btn btn-mini btn-danger\" type=\"button\" onClick=\"location.href='".$_SERVER['SERVER_NAME']."index.php/users/logout'\">";
                 //echo $this->Html->link(__('Logout',true), array('controller' => 'users', 'action' => 'logout')); 
                 echo 'Cerrar sesión';
                 echo '</button>';
                 ?>
            <?php 
            } 
            ?>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>






			<?php echo $this->Session->flash();
			echo $this->Session->flash('auth');  ?>


      <?php echo $content_for_layout; ?>






	<?php echo $this->element('sql_dump'); ?>


   <script src="http://code.jquery.com/jquery.js"></script>
<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-collapse.js"></script>
<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-popover.js"></script>





</body>
</html>
