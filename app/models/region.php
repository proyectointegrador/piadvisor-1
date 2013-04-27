<?php
class Region extends AppModel {
	var $name = 'Region';
	var $displayField = 'name';

	//Validaciones de datos

	var $validate = array(
	    'name' => array(
	    	'rule' => 'alphaNumeric',
	        'message' => 'El nombre de la región es obligatorio y debe ser alfanúmerico.',
	        'allowEmpty' => false
	    )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Pais' => array(
			'className' => 'Pais',
			'foreignKey' => 'region_id',
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

}
