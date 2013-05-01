<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Acl');

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	
	function login() {
		if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash('Has iniciado sesión!');
			$this->redirect(array ('controller' => 'universidades', 'action' => 'index'), null, false);
		}
	}

	function logout() {
		$this->Session->setFlash('Has cerrado sesión');
		$this->redirect($this->Auth->logout());
	}
	
	function beforeFilter() {
    parent::beforeFilter();
    //$this->Auth->allowedActions = array('*');
    //Se debe de comentar la linea de abajo cuando se use le linea de arriba
    $this->Auth->allowedActions = array('login', 'logout');

	}
	
	//hace falta denegar el acceso a initDB para admin y user, solo disponible para superadmin
	function initDB() {
		$group =& $this->User->Group;
		//Allow admins to everything
		$group->id = 1;
		$this->Acl->allow($group, 'controllers');

		//allow managers to posts and widgets
		$group->id = 2;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->deny($group, 'controllers/Groups/build_acl');
		$this->Acl->deny($group, 'controllers/Users/initDB');
		$this->Acl->allow($group, 'controllers/Areas');
		$this->Acl->allow($group, 'controllers/Carreras');
		$this->Acl->allow($group, 'controllers/Categorias');
		$this->Acl->allow($group, 'controllers/Demandas');
		$this->Acl->allow($group, 'controllers/Disponibilidades');
		$this->Acl->allow($group, 'controllers/Paises');
		$this->Acl->allow($group, 'controllers/Regiones');
	    $this->Acl->allow($group, 'controllers/Programas');
		$this->Acl->allow($group, 'controllers/Paramaetros');
		$this->Acl->allow($group, 'controllers/Requisitos');
		$this->Acl->allow($group, 'controllers/Universidades');
		$this->Acl->allow($group, 'controllers/Groups');
		$this->Acl->allow($group, 'controllers/Users');
	

		//allow users to only add and edit on posts and widgets
		$group->id = 3;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->deny($group, 'controllers/Groups/build_acl');
		$this->Acl->deny($group, 'controllers/Users/initDB');
		$this->Acl->allow($group, 'controllers/Areas');
		$this->Acl->allow($group, 'controllers/Carreras');
		$this->Acl->allow($group, 'controllers/Categorias');
		$this->Acl->allow($group, 'controllers/Demandas');
		$this->Acl->allow($group, 'controllers/Disponibilidades');
		$this->Acl->allow($group, 'controllers/Paises');
		$this->Acl->allow($group, 'controllers/Regiones');
	    $this->Acl->allow($group, 'controllers/Programas');
		$this->Acl->allow($group, 'controllers/Paramaetros');
		$this->Acl->allow($group, 'controllers/Requisitos');
		$this->Acl->allow($group, 'controllers/Universidades');

		$this->Acl->deny($group, 'controllers/Areas/add');
		$this->Acl->deny($group, 'controllers/Carreras/add');
		$this->Acl->deny($group, 'controllers/Categorias/add');
		$this->Acl->deny($group, 'controllers/Demandas/add');
		$this->Acl->deny($group, 'controllers/Disponibilidades/add');
		$this->Acl->deny($group, 'controllers/Paises/add');
		$this->Acl->deny($group, 'controllers/Regiones/add');
		$this->Acl->allow($group, 'controllers/Paramaetros/add');
		$this->Acl->allow($group, 'controllers/Requisitos/add');
		$this->Acl->deny($group, 'controllers/Requisitos/add');
		
		$this->Acl->deny($group, 'controllers/Areas/edit');
		$this->Acl->deny($group, 'controllers/Carreras/edit');
		$this->Acl->deny($group, 'controllers/Categorias/edit');
		$this->Acl->deny($group, 'controllers/Demandas/edit');
		$this->Acl->deny($group, 'controllers/Disponibilidades/edit');
		$this->Acl->deny($group, 'controllers/Paises/edit');
		$this->Acl->deny($group, 'controllers/Regiones/edit');
		$this->Acl->allow($group, 'controllers/Paramaetros/edit');
		$this->Acl->allow($group, 'controllers/Requisitos/edit');
		$this->Acl->deny($group, 'controllers/Requisitos/edit');

		//we add an exit to avoid an ugly "missing views" error message
		echo "all done";
		exit;
		}
	
}
