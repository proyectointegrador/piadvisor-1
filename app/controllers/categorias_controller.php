<?php

/**
 *Autores:
 *  Edgar Garc�a Camarillo
 *  Eugenio Rafael Garc�a Garc�a
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripci�n: Controlador de las carreras en la parte de administraci�n.
 */
 
class CategoriasController extends AppController {

	var $name = 'Categorias';

	function index() {
		$this->Categoria->recursive = 0;
		$this->set('categorias', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Categoria inv�lida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categoria', $this->Categoria->read(null, $id));
	}

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

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Categoria inv�lida', true));
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
/*
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for categoria', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Categoria->delete($id)) {
			$this->Session->setFlash(__('Categoria deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Categoria was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
