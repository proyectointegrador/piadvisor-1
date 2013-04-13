<?php
/**
 * Demanda Model
 *
 * @property Universidad $Universidad
 */
class Demanda extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Demanda';
	var $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Universidad' => array(
			'className' => 'Universidad',
			'foreignKey' => 'demanda_id',
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
