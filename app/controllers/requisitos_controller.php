<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de los requisitos en la parte de administración.
 */

class RequisitosController extends AppController {
	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Requisitos';

	/**
	 * Despliega la lista de requisito
	 *
	 * @return void
	 */
	function index() {
		$this->Requisito->recursive = 0;
		$this->set('requisitos', $this->paginate());
	}

	/**
	 * Despliega la vista de requisto
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Requisito inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('requisito', $this->Requisito->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro de requisito
	 * 
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {
			$this->Requisito->create();
			if ($this->Requisito->save($this->data)) {
				$this->Session->setFlash(__('El requisito se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El requisito no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		$categorias = $this->Requisito->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	/**
	 * Despliega la vista de editar requisito
	 * @param string $id
	 * @return void
	 */
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Requisito inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Requisito->save($this->data)) {
				$this->Session->setFlash(__('El requisito se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El requisito no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Requisito->read(null, $id);
		}
		$categorias = $this->Requisito->Categoria->find('list');
		$this->set(compact('categorias'));
	}
}
