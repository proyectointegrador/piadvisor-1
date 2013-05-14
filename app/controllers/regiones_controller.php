<?php
/**
 *Autores:
 *  Edgar Garc�a Camarillo
 *  Eugenio Rafael Garc�a Garc�a
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripci�n: Controlador de las regiones en la parte de administraci�n.
 */

class RegionesController extends AppController {
	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Regiones';

	/**
	 * Despliega la lista de regiones
	 *
	 * @return void
	 */
	function index() {
		$this->Region->recursive = 0;
		$this->set('regiones', $this->paginate());
	}

	/**
	 * Despliega la vista de region
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Regi�n inv�lida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('region', $this->Region->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro de region
	 * 
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {
			$this->Region->create();
			if ($this->Region->save($this->data)) {
				$this->Session->setFlash(__('La regi�n se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La regi�n no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
	}

	/**
	 * Despliega la vista de editar region
	 * @param string $id
	 * @return void
	 */
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Regi�n inv�lida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Region->save($this->data)) {
				$this->Session->setFlash(__('La regi�n se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La regi�n no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Region->read(null, $id);
		}
	}

}
