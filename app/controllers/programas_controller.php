<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de las programas en la parte de administración.
 */

class ProgramasController extends AppController {
	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Programas';

	/**
	 * Despliega la lista de programas
	 *
	 * @return void
	 */
	function index() {
		$this->Programa->recursive = 0;
		$this->set('programas', $this->paginate());
	}

	/**
	 * Despliega la vista de programas
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Programa inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('programa', $this->Programa->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro de programa
	 * 
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {
			$this->Programa->create();
			if ($this->Programa->save($this->data)) {
				$this->Session->setFlash(__('El programa se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El programa no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
	}

	/**
	 * Despliega la vista de editar programa
	 * @param string $id
	 * @return void
	 */
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Programa inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Programa->save($this->data)) {
				$this->Session->setFlash(__('El programa se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El programa no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Programa->read(null, $id);
		}
	}

}
