<?php


class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';
	var $uses = array('CakeSession', 'Model/Datasource');

//	var $belongsTo = array('Group');
	var $actsAs = array('Acl' => array('requester'));


	//Validaciones de datos

	var $validate = array(
	    'username' => array(
	    	'rule' => 'notEmpty',
	        'message' => 'El nombre del usuario es obligatorio.',
	        'allowEmpty' => false
	    ),
	    'username' => array(
	    	'rule' => 'isUnique',
	        'message' => 'El nombre del usuario debe de ser único.',
	    ),
	    'username' => array(
	    	'rule' => array('email',true),
	        'message' => 'El usuario debe de ser una cuenta de correo',
	    )
	    ,

	    'passwd' => array(
	      'min' => array(
	        'rule' => array('minLength', 6),
	        'message' => 'La contraseña debe ser al menos de 6 caracteres.'
	      ),
	      'required' => array(
	        'rule' => 'notEmpty',
	        'message'=>'Porfavor ingrese una contraseña.'
	      ),
	    ),
	    'passwd_confirm' => array(
	      'required'=>'notEmpty',
	      'match'=>array(
	        'rule' => 'validatePasswdConfirm',
	        'message' => 'Las contraseñas no coinciden.'
	      )
	    ),
	    'current_password' => array(
        'rule' => 'checkCurrentPassword',
        'message' => 'La contraseña es incorrecta.'
    	)
	);
	    

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	
	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	

	var $hasMany = array(
			'Universidad' => array(
			'className' => 'Universidad',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	


function parentNode() {
    if (!$this->id && empty($this->data)) {
        return null;
    }
    $data = $this->data;
    if (empty($this->data)) {
        $data = $this->read();
    }
    if (!$data['User']['group_id']) {
        return null;
    } else {
        return array('Group' => array('id' => $data['User']['group_id']));
    }
}

function bindNode($user) {
    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
}

function validatePasswdConfirm($data)
  {
    if ($this->data['User']['passwd'] !== $data['passwd_confirm'])
    {
      return false;
    }
    return true;
  }

function checkCurrentPassword($data) {
	
	$this->id = CakeSession::read('Auth.User.id');
    //$this->id = AuthComponent::user('id');
    $password = $this->field('password');
    return(AuthComponent::password($data['current_password']) == $password);
}

function beforeSave()
  {
    if (isset($this->data['User']['passwd']))
    {
      $this->data['User']['password'] = Security::hash($this->data['User']['passwd'], null, true);
      unset($this->data['User']['passwd']);
    }

    if (isset($this->data['User']['passwd_confirm']))
    {
      unset($this->data['User']['passwd_confirm']);
    }

    return true;
}

}
