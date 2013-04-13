<?php
/**
 * Carrera Model
 *
 * @property Area $Area
 */
class Carrera extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Carrera';
	var $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
