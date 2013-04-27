<?php
class Group extends AppModel {


	var $name = 'Group';
	var $displayField = 'name';


	//Validaciones de datos

	var $validate = array(
	    'name' => array(
	    	'rule' => 'alphaNumeric',
	        'message' => 'El nombre del grupo es obligatorio y debe ser alfanúmerico.',
	        'allowEmpty' => false
	    )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
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

	var $actsAs = array('Acl' => array('type' => 'requester'));

	function parentNode() {
    return null;
	}

}
