<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de los parametros en la parte de administración.
 */

class ParametrosController extends AppController {
	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Parametros';

	/**
	 * Despliega la lista de parametros
	 *
	 * @return void
	 */
	function index() {
		$this->Parametro->recursive = 0;
		$this->set('parametros', $this->paginate());
	}

	/**
	 * Despliega la vista de parametros
	 *
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Configuración inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('parametro', $this->Parametro->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro de parametros
	 * 
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {
			$this->Parametro->create();
			if ($this->Parametro->save($this->data)) {
				$this->Session->setFlash(__('La configuración se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La configuración no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
	}

	/**
	 * Despliega la vista de editar parametros
	 *
	 * @param string $id
	 * @return void
	 */
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Configuración inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Parametro->save($this->data)) {
				$this->Session->setFlash(__('La configuración se ha guardado', true));
				$this->redirect(array('controller' => 'universidades', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('La configuración no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Parametro->read(null, $id);
		}
	}
}
