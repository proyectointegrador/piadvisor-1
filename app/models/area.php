<?php
/**
 *Autores:
 *  Edgar Garc�a Camarillo
 *  Eugenio Rafael Garc�a Garc�a
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripci�n: C�digo del modelo de areas
 * 				
 */
 
class Area extends AppModel {

/**
 * Despliega los campos
 *
 * @var string
 */
	var $name = 'Area';
	var $displayField = 'name';

/**
 * Validaciones de datos
 *
 */
	var $validate = array(
	    'name' => array(
		'rule' => 'alphaNumeric',
		'message' => 'El nombre del area es obligatorio.',
		'allowEmpty' => false
	    )
	);

/**
 * Asociaciones hasMany
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
