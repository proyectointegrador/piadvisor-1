<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';
//	var $belongsTo = array('Group');
	var $actsAs = array('Acl' => array('requester'));


	//Validaciones de datos

	var $validate = array(
	    'username' => array(
	    	'rule' => 'notEmpty',
	        'message' => 'El nombre del usuario es obligatorio.',
	        'allowEmpty' => false
	    ),
	    'password' => array(
            'rule' => array('minLength', '6'),
            'message' => 'El password tiene que ser de 6 caracteres minimo'
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

}
