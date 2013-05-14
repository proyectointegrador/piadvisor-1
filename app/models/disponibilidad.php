<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de disponibilidades
 * 				
 */
 
class Disponibilidad extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name='Disponibilidad';
	var $displayField = 'name';

	//Validaciones de datos

	var $validate = array(
	    'name' => array(
	    	'rule' => 'alphaNumeric',
	        'message' => 'El nombre de la disponibilidad es obligatorio y debe ser alfanúmerico.',
	        'allowEmpty' => false
	    ),
	    'descripcion' => array(
	    	'rule' => 'notEmpty',
	        'message' => 'La descripción de la disponibilidad es obligatorio.',
	        'allowEmpty' => false
	    )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Universidad' => array(
			'className' => 'Universidad',
			'foreignKey' => 'disponibilidad_id',
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
