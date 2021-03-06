<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de las universidades en la parte de administración.
 */

class UniversidadesController extends AppController {
	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Universidades';

	/**
	 * Despliega la lista de las universidades
	 *
	 * @return void
	 */
	function index() {
		$this->Universidad->recursive = 0;
		$this->set('universidades', $this->paginate());
	}

	/**
	 * Despliega la vista de las universidad
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Universidad inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('universidad', $this->Universidad->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro de universidad
	 *
	 * @return void
	 */
 	function add() {
		if (!empty($this->data)) {
			//Checa si esta activo y valida
			$activo = $this->data['Universidad']['activo'];
			//usuario loggeado
			$this->data['Universidad']['user_id'] = $this->Auth->user('id');
			$this->Universidad->set($this->data);
			if($activo == 1){
				if($this->Universidad->validates()){
					//Validado
					//$this->Universidad->create();
					if ($this->Universidad->save($this->data, array('validate'=>false))) {
						$this->Session->setFlash(__('La universidad se ha guardado',true));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('No se pudo guardar la universidad, favor de verificar los datos.',true));
					}
				}else{
					//No paso la validación
					$this->Session->setFlash(__('No se pudo guardar la universidad, todos los datos son obligatorios cuando se marca publicar.',true));
				}
			}else{
				//Los campos no son obligatorios siempre y cuando no se guarde como activo
				if ($this->Universidad->save($this->data, array('validate'=>false))) {
					$this->Session->setFlash(__('La universidad ha sido guardada',true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar la universidad, favor de verificar los datos.',true));
				}
			}			
		}
		$disponibilidades = $this->Universidad->Disponibilidad->find('list');
		$demandas = $this->Universidad->Demanda->find('list');
		$users = $this->Universidad->User->find('list');
		$paises = $this->Universidad->Pais->find('list');
		$programas = $this->Universidad->Programa->find('list');
		$joins = array ( 
					array('table' => 'areas',
	                'alias' => 'Area',
	                'type' => 'INNER',
	                'conditions' => array(
	                    'Carrera.area_id = Area.id'
	                )
					)
					);
		$carreras = $this->Universidad->Carrera->find('list',array(
													'fields'=>array('id', 'name', 'Area.name'),
													'joins' => $joins,
													'order'=>'area_id'));
		$joins = array ( 
					array('table' => 'categorias',
	                'alias' => 'Categoria',
	                'type' => 'INNER',
	                'conditions' => array(
	                    'Requisito.categoria_id = Categoria.id'
	                )
					)
					);
		$requisitos = $this->Universidad->Requisito->find('list',array(
													'fields'=>array('id', 'clave', 'Categoria.name'),
													'joins' => $joins,
													'order'=>'categoria_id'));
		$this->set(compact('disponibilidades', 'demandas', 'users', 'paises', 'carreras', 'requisitos','programas'));
	}

	/**
	 * Despliega la vista de editar universidad
	 * 
	 * @param string $id
	 * @return void
	 */
	 function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Universidad inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//Checa si esta activo y valida
			$activo = $this->data['Universidad']['activo'];
			//usuario loggeado
			$this->data['Universidad']['user_id'] = $this->Auth->user('id');
			$this->Universidad->set($this->data);
			if($activo == 1){
				if($this->Universidad->validates()){
					//Validado
					//$this->Universidad->create();
					if ($this->Universidad->save($this->data, array('validate'=>false))) {
						$this->Session->setFlash(__('La universidad se ha guardado',true));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('No se pudo guardar la universidad, favor de verificar los datos.',true));
					}
				}else{
					//No paso la validación
					$this->Session->setFlash(__('No se pudo guardar la universidad, todos los datos son obligatorios cuando se marca publicar.',true));
				}
			}else{
				//Los campos no son obligatorios siempre y cuando no se guarde como activo
				if ($this->Universidad->save($this->data, array('validate'=>false))) {
					$this->Session->setFlash(__('La universidad ha sido guardada',true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('No se pudo guardar la universidad, favor de verificar los datos.',true));
				}
			}
		} else {
			$options = array('conditions' => array('Universidad.' . $this->Universidad->primaryKey => $id));
			$this->data = $this->Universidad->find('first', $options);
		}
		$disponibilidades = $this->Universidad->Disponibilidad->find('list');
		$demandas = $this->Universidad->Demanda->find('list');
		$users = $this->Universidad->User->find('list');
		$paises = $this->Universidad->Pais->find('list');
		$programas = $this->Universidad->Programa->find('list');

		$joins = array ( 
					array('table' => 'areas',
	                'alias' => 'Area',
	                'type' => 'INNER',
	                'conditions' => array(
	                    'Carrera.area_id = Area.id'
	                )
					)
					);
		$carreras = $this->Universidad->Carrera->find('list',array(
													'fields'=>array('id', 'name', 'Area.name'),
													'joins' => $joins,
													'order'=>'area_id'));
		$joins = array ( 
					array('table' => 'categorias',
	                'alias' => 'Categoria',
	                'type' => 'INNER',
	                'conditions' => array(
	                    'Requisito.categoria_id = Categoria.id'
	                )
					)
					);
		$requisitos = $this->Universidad->Requisito->find('list',array(
													'fields'=>array('id', 'clave', 'Categoria.name'),
													'joins' => $joins,
													'order'=>'clave'));
		$this->set(compact('disponibilidades', 'demandas', 'users', 'paises', 'carreras', 'requisitos','programas'));
	}
}
