<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de la parte pública de la aplicación.
 */



/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	var $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Universidad','Carrera', 'Pais');

	

	var $helpers = array('Js', 'Html');
	var $components = array('RequestHandler');



/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	/*public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}*/

	/**
 * home method
 *
 * @return void
 */
	function home() {
		
		$this->Carrera->recursive = 0;
		/*$carreras = $this->Universidad->find('all',array(
													'fields'=>array('Carrera.id','Carrera.name'),
													'conditions' => array('Universidad.activo'=>true),
													'order'=>array('Carrera.name ASC'),
													'group'=>array('Carrera.id'),
													'contain'=> array('Carrera')
													));*/
		$this->Universidad->unbindModel(array('belongsTo'=> array('Disponibilidad','Demanda','User','Pais'),
										'hasAndBelongsToMany' => array('Requisito')));
		$carreras = $this->Universidad->find('list',array(
												'fields'=>array('Carrera.id','Carrera.name'),
												'conditions' => array('Universidad.activo'=>true,'Carrera.activo'=>true),
												'joins' => array(
														array(
												            'table' => 'universidades_carreras',
												            'alias' => 'universidadcarrera',
												            'type' => 'INNER',
												            'conditions' => array(
												                'universidadcarrera.universidad_id = Universidad.id',
												                'Universidad.activo'=>true
												            )
														),
														array(
												            'table' => 'carreras',
												            'alias' => 'Carrera',
												            'type' => 'INNER',
												            'conditions' => array(
												                'Carrera.id = universidadcarrera.carrera_id'
												            )
														)

													),
												'group'=>array('Carrera.id'),
												'order'=>array('Carrera.name')
												));
		

		$paises = $this->Pais->Universidad->find('list',array(
														'fields' => array('Pais.id', 'Pais.name'),
														'conditions'=>array('Universidad.activo'=>true),
														'order'=>array('Pais.name ASC'),
														'group'=>array('Universidad.pais_id'),
														'recursive' => 0
														));
		$regiones = $this->Pais->Region->find('list', array(
											'order'=>array('name ASC')
											));


		
		$this->set(compact('carreras','paises','regiones'));
		$this->set('title_for_layout', 'PIAdvisor');
	}

		/**
 * listado method
 *
 * @return void
 */
	function listado_universidades() {

		$this->Session->write('estado',array(
						'filtro'=>array(
							'pais_id'=>'',
							'region_id'=>'',
							'carrera_id'=>'',
							'name'=>''),
						'orden'=>'Universidad.codigo ASC'));



		if (!empty($this->data)) {
			$datos = $this->data;
			
			$name = '';
			if(array_key_exists('name',$datos['Page'])){
				$name = $datos['Page']['name'];
			}

			$estado = $this->Session->read('estado');

			$estado['filtro'] = array(
						'pais_id'=>$datos['Page']['pais_id'],
						'region_id'=>$datos['Page']['region_id'],
						'carrera_id'=>$datos['Page']['carrera_id'],
						'name'=>$name);
			
			//Actualiza sesion con el estado
			$this->Session->write('estado',$estado);

			$estado = $this->Session->read('estado');
			debug($estado);
			
			$regiones = $this->Pais->Region->find('list', array(
											'order'=>array('name ASC')
											));

			/** Generacion de query de filtrado */
			$pais = $estado['filtro']['pais_id'];
			$region = $estado['filtro']['region_id'];
			$carrera =  $estado['filtro']['carrera_id'];

			//variable de orden para query
			$order = $estado['orden'];

			$joins = array();
			$condiciones = array(
				'Universidad.activo'=>true);
			//Condiciones para el query
			if($pais != ''){
				$condiciones['pais_id']=$pais;
			}
			if($region != ''){
				$condiciones['Pais.region_id']=$region;
			}
			if($carrera != ''){
				$joins = array ( 
					array('table' => 'universidades_carreras',
	                'alias' => 'universidadcarrera',
	                'type' => 'INNER',
	                'conditions' => array(
	                    'universidadcarrera.carrera_id' => $carrera,
	                    'universidadcarrera.universidad_id = Universidad.id'
	                )
					)
					);
			}
		
			$this->Universidad->recursive = 0;
			$universidades = $this->Universidad->find('all',array
				('conditions'=>$condiciones,
				'fields'=>array('Universidad.codigo','Universidad.name','Universidad.idioma','Universidad.ciudad','Universidad.id'),
				'joins' => $joins,
				'group' => 'Universidad.id',
				'order'=>$order
					));
			$this->set(compact('universidades'));

			
		}
			
		//Query de paises y carreras
		$this->Carrera->recursive = 0;
		$this->Universidad->unbindModel(array('belongsTo'=> array('Disponibilidad','Demanda','User','Pais'),
										'hasAndBelongsToMany' => array('Requisito')));
		$carreras = $this->Universidad->find('list',array(
												'fields'=>array('Carrera.id','Carrera.name'),
												'conditions' => array('Universidad.activo'=>true,'Carrera.activo'=>true),
												'joins' => array(
														array(
												            'table' => 'universidades_carreras',
												            'alias' => 'universidadcarrera',
												            'type' => 'INNER',
												            'conditions' => array(
												                'universidadcarrera.universidad_id = Universidad.id'
												            )
														),
														array(
												            'table' => 'carreras',
												            'alias' => 'Carrera',
												            'type' => 'INNER',
												            'conditions' => array(
												                'Carrera.id = universidadcarrera.carrera_id'
												            )
														)

													),
												'group'=>array('Carrera.id'),
												'order'=>array('Carrera.name')
												));
		

		$paises = $this->Pais->Universidad->find('list',array(
														'fields' => array('Pais.id', 'Pais.name'),
														'conditions'=>array('Universidad.activo'=>true),
														'order'=>array('Pais.name ASC'),
														'group'=>array('Universidad.pais_id'),
														'recursive' => 0
														));
		$this->set(compact('carreras','paises','regiones'));
		$this->set('title_for_layout', 'PIAdvisor');

				
	}

	/**
	 * ver_universidad method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	function ver_universidad($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid universidad'));
		}
		$this->Universidad->recursive = 2;
		$options = array('conditions' => 
							array('Universidad.' . $this->Universidad->primaryKey => $id));
		$universidad = $this->Universidad->find('first', $options);
		//debug($universidad['Carrera']);

		//Query de area
		$joins = array ( 
					array('table' => 'universidades_carreras',
	                'alias' => 'universidadcarrera',
	                'type' => 'INNER',
	                'conditions' => array(
	                    'universidadcarrera.carrera_id = Carrera.id',
	                    'universidadcarrera.universidad_id' => $id
	                )
					)
					);
		$areas = $this->Universidad->Carrera->find('all',array
				('fields'=>array('DISTINCT Area.id','Area.name'),
				'joins' => $joins,
				'group' => 'Area.id'
					));

		for ($i=0; $i < count($areas); $i++) {
			$areas[$i]['Carrera'] = array();
		}
		$num_areas = count($areas);
		$acomodado = false;
		foreach ($universidad['Carrera'] as $carrera) {
			for ($i=0; $i < $num_areas and !$acomodado; $i++) {	
				if($carrera['area_id']== $areas[$i]['Area']['id']){
					array_push($areas[$i]['Carrera'],$carrera);
					$acomodado= true;
				}
			}
			$acomodado = false;
		}
		
		$this->set(compact('universidad','areas'));
		
	}
	/*
	AJAX
	*/
	/* Funcion que maneja la peticion ajax de os paise segun la region
	 * Seleccionado.
	 *
	 * @return void
	 */
	function paisajax(){
		if ($this->RequestHandler->isPost() || $this->RequestHandler->isPut()) {
			
			if($this->RequestHandler->isAjax()){

				$region_id = $this->data['Page']['region_id'];
				$this->Pais->recursive= -1;
				if($region_id != ''){
					$paises = $this->Pais->find('list',array(
					'conditions'=>array('region_id'=>$region_id)));	
				}else{
					$paises = $this->Pais->find('list');
				}
				
				
				$this->set(compact('paises'));
				$this->render('paisajax', 'ajax');
			}
		}
		
	}
	/* Funcion que maneja la peticion ajax de busqueda redifinida.
	 *
	 * @return void
	 */
	function listadoajax(){
		if ($this->RequestHandler->isPost() || $this->RequestHandler->isPut()) {
			
			if($this->RequestHandler->isAjax()){
				$datos = $this->data;
				
				$estado = $this->Session->read('estado');

				$estado['filtro'] = array(
							'pais_id'=>$datos['Page']['pais_id'],
							'region_id'=>$datos['Page']['region_id'],
							'carrera_id'=>$datos['Page']['carrera_id'],
							'name'=>$datos['Page']['name']);
				
				//Actualiza sesion con el estado
				$this->Session->write('estado',$estado);

				
				debug($estado);

				$regiones = $this->Pais->Region->find('list', array(
											'order'=>array('name ASC')
											));

			
				/** Generacion de query de filtrado */
				$pais = $estado['filtro']['pais_id'];
				$region= $estado['filtro']['region_id'];
				$carrera =  $estado['filtro']['carrera_id'];
				$name = $estado['filtro']['name'];

				//variable de orden para query
				$order = $estado['orden'];

				$joins = array();
				$condiciones = array(
				'Universidad.activo'=>true);
				//Condiciones para el query
				if($pais != ''){
					$condiciones['pais_id']=$pais;
				}
				if($region != ''){
					$condiciones['Pais.region_id']=$region;
				}
				if($name != ''){
					$condiciones['Universidad.name LIKE']="%$name%";
				}
				if($carrera != ''){
					$joins = array ( 
						array('table' => 'universidades_carreras',
		                'alias' => 'universidadcarrera',
		                'type' => 'INNER',
		                'conditions' => array(
		                    'universidadcarrera.carrera_id' => $carrera,
		                    'universidadcarrera.universidad_id = Universidad.id'
		                )
						)
						);
				}

				
				
				


				$this->Universidad->recursive = 0;
				$universidades = $this->Universidad->find('all',array
				('conditions'=>$condiciones,
				'fields'=>array('Universidad.codigo','Universidad.name','Universidad.idioma','Universidad.ciudad','Universidad.id'),
				'joins' => $joins,
				'group' => 'Universidad.id',
				'order'=>$order
					));
				
				$this->set(compact('universidades'));

				
			
				$this->render('listadoajax', 'ajax');
			}
		}
		
	}

	/* Funcion que maneja la peticion ajax de busqueda redifinida.
	 *
	 * @return void
	 */
	function listadoajaxordena($ordena){
		if ($this->RequestHandler->isPost() || $this->RequestHandler->isPut()) {
			
			if($this->RequestHandler->isAjax()){
				
				$estado = $this->Session->read('estado');


				switch($ordena){
					case 'codigo':

						if($estado['orden'] == 'Universidad.codigo ASC'){
							$estado['orden'] = 'Universidad.codigo DESC';
						}else{
							$estado['orden'] = 'Universidad.codigo ASC';
						}
					break;
					case 'name':
						if($estado['orden'] == 'Universidad.name ASC'){
							$estado['orden'] = 'Universidad.name DESC';
						}else{
							$estado['orden'] = 'Universidad.name ASC';
						}
					break;
					case 'idioma':
						if($estado['orden'] == 'Universidad.idioma ASC'){
							$estado['orden'] = 'Universidad.idioma DESC';
						}else{
							$estado['orden'] = 'Universidad.idioma ASC';
						}
					break;
					case 'ciudad':
						if($estado['orden'] == 'Universidad.ciudad ASC'){
							$estado['orden'] = 'Universidad.ciudad DESC';
						}else{
							$estado['orden'] = 'Universidad.ciudad ASC';
						}
					break;
				}
				
				//actualiza el estado en sesion
				$this->Session->write('estado',$estado);

				debug($estado);

				$regiones = $this->Pais->Region->find('list', array(
											'order'=>array('name ASC')
											));

			
				/** Generacion de query de filtrado */
				$pais = $estado['filtro']['pais_id'];
				$region = $estado['filtro']['region_id'];
				$carrera =  $estado['filtro']['carrera_id'];
				$name = $estado['filtro']['name'];

				//variable de orden para query
				$order = $estado['orden'];

				$joins = array();
				$condiciones = array(
				'Universidad.activo'=>true);
				//Condiciones para el query
				if($pais != ''){
					$condiciones['pais_id']=$pais;
				}
				if($region!= ''){
					$condiciones['Pais.region_id']=$region;
				}
				if($name != ''){
					$condiciones['Universidad.name LIKE']="%$name%";
				}
				if($carrera != ''){
					$joins = array ( 
						array('table' => 'universidades_carreras',
		                'alias' => 'universidadcarrera',
		                'type' => 'INNER',
		                'conditions' => array(
		                    'universidadcarrera.carrera_id' => $carrera,
		                    'universidadcarrera.universidad_id = Universidad.id'
		                )
						)
						);
				}
				$this->Universidad->recursive = 0;
				$universidades = $this->Universidad->find('all',array
				('conditions'=>$condiciones,
				'fields'=>array('Universidad.codigo','Universidad.name','Universidad.idioma','Universidad.ciudad','Universidad.id'),
				'joins' => $joins,
				'group' => 'Universidad.id',
				'order'=>$order
					));
				
				$this->set(compact('universidades'));
			
				$this->render('listadoajax', 'ajax');
			}
		}
		
	}

	function enviarcorreo(){

		$this->Universidad->recursive = 0;
		$universidad = $this->Universidad->read(null, $this->data['Universidad']['id']);

		// Varios destinatarios
		$para = $this->data['Page']['correo'];

		// subject
		$titulo = 'Intercambio Internacional';

		// message
		$mensaje = '
		<html>
		<head>
		  <title>Intercambio Internacional</title>
		</head>
		<body>
		  <p>Nombre: '.$universidad['Universidad']['name'].'</p>

		  <p>Codigo: '.$universidad['Universidad']['codigo'].'</p>
		  <p>Ciudad: '.$universidad['Universidad']['ciudad'].'</p>
		  <p>Idioma: '.$universidad['Universidad']['idioma'].'</p>
		  <p>Calendario: '.$universidad['Universidad']['calendario'].'</p>
		  <p>Disponibilidad: '.$universidad['Disponibilidad']['name'].'</p>
		  <p>Demanda: '.$universidad['Demanda']['name'].'</p>
		  <p>Website: '.$universidad['Universidad']['website'].'</p>';
		  




		$mensaje =$mensaje +'</body>
		</html>
		';

		// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Mail it
		mail($para, $titulo, $mensaje, $cabeceras);


		$this->render('enviarcorreoajax', 'ajax');
	}
	
	function beforeFilter() {
		parent::beforeFilter();
    	$this->Auth->allowedActions = array('*');
	}
	
}
