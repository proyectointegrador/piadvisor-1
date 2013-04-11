<?php
/**
 * Area Model
 *
 * @property Carrera $Carrera
 */
class Area extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Area';
	var $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Carrera' => array(
			'className' => 'Carrera',
			'foreignKey' => 'area_id',
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
