<?php

/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de las carreras en la parte de administración.
 */

class CarrerasController extends AppController {

	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Carreras';

	/**
	 * Despliega la lista de carreras
	 * 
	 * @return void
	 */
	function index() {
		$this->Carrera->recursive = 0;
		$this->set('carreras', $this->paginate());
	}

	/**
	 * Despliega la vista de carrera
	 *
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Carrera inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('carrera', $this->Carrera->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro de carrera
	 *
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {
			$this->Carrera->create();
			if ($this->Carrera->save($this->data)) {
				$this->Session->setFlash(__('La carrera se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La carrera no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		$areas = $this->Carrera->Area->find('list');
		$this->set(compact('areas'));
	}

	/**
	 * Despliega la vista de editar carrera
	 *
	 * @param string $id
	 * @return void
	 */
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Carrera inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Carrera->save($this->data)) {
				$this->Session->setFlash(__('La carrera se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La carrera no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Carrera->read(null, $id);
		}
		$areas = $this->Carrera->Area->find('list');
		$this->set(compact('areas'));
	}

}
