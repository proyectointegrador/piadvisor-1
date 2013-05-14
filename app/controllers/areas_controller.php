<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de las areas en la parte de administración.
 */

class AreasController extends AppController {
	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Areas';

	/**
	 * Despliega la lista de areas
	 *
	 * @return void
	 */
	function index() {
		$this->Area->recursive = 0;
		$areas = $this->paginate();
		
		$this->set(compact('areas'));
	}

	/**
	 * Despliega la vista de area
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Área inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('area', $this->Area->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro de area
	 * 
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {
			$this->Area->create();
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash(__('El área se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El área no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
	}

	/**
	 * Despliega la vista de editar area
	 * @param string $id
	 * @return void
	 */
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Área inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash(__('El área se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El área no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Area->read(null, $id);
		}
	}
}
