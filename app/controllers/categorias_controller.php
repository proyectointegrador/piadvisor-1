<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de las categorias en la parte de administración.
 */

class CategoriasController extends AppController {

	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Categorias';

	/**
	 * Despliega la lista de categorias
	 * 
	 * @return void
	 */
	function index() {
		$this->Categoria->recursive = 0;
		$this->set('categorias', $this->paginate());
	}

	/**
	 * Despliega la vista de categoria
	 *
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Categoria inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categoria', $this->Categoria->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro de categorias
	 *
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->data)) {
				$this->Session->setFlash(__('La categoria se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La categoria no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
	}

	/**
	 * Despliega la vista de editar categoria
	 *
	 * @param string $id
	 * @return void
	 */
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Categoria inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Categoria->save($this->data)) {
				$this->Session->setFlash(__('La categoria se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La categoria no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Categoria->read(null, $id);
		}
	}
}
