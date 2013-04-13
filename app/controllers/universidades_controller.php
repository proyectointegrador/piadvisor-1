<?php
class UniversidadesController extends AppController {

	var $name = 'Universidades';

	function index() {
		$this->Universidad->recursive = 0;
		$this->set('universidades', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid universidad', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('universidad', $this->Universidad->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
 function add() {
		if (!empty($this->data)) {
			$this->Universidad->create();
			if ($this->Universidad->save($this->data)) {
				$this->Session->setFlash(__('The universidad has been saved',true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The universidad could not be saved. Please, try again.',true));
			}
		}
		$disponibilidades = $this->Universidad->Disponibilidad->find('list');
		$demandas = $this->Universidad->Demanda->find('list');
		$users = $this->Universidad->User->find('list');
		$paises = $this->Universidad->Pais->find('list');
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
		$this->set(compact('disponibilidades', 'demandas', 'users', 'paises', 'carreras', 'requisitos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid universidad', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Universidad->save($this->data)) {
				$this->Session->setFlash(__('The universidad has been saved',true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The universidad could not be saved. Please, try again.',true));
			}
		} else {
			$options = array('conditions' => array('Universidad.' . $this->Universidad->primaryKey => $id));
			$this->data = $this->Universidad->find('first', $options);
		}
		$disponibilidades = $this->Universidad->Disponibilidad->find('list');
		$demandas = $this->Universidad->Demanda->find('list');
		$users = $this->Universidad->User->find('list');
		$paises = $this->Universidad->Pais->find('list');

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
		$this->set(compact('disponibilidades', 'demandas', 'users', 'paises', 'carreras', 'requisitos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for universidad', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Universidad->delete($id)) {
			$this->Session->setFlash(__('Universidad deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Universidad was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
