<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de país
 * 				
 */
 
class Pais extends AppModel {

/**
 * Despliega los campos
 *
 * @var string
 */
 
	var $name = 'Pais';
	var $displayField = 'name';

/**
 * Validaciones de datos
 *
 */
	var $validate = array(
	    'name' => array(
		'rule' => 'alphaNumeric',
		'message' => 'El nombre del país es obligatorio y debe ser alfanúmerico.',
		'allowEmpty' => false
	    )
	);

/**
 * Asociaciones pertenece a
 *
 * @var array
 */
 
	var $belongsTo = array(
		'Region' => array(
		'className' => 'Region',
		'foreignKey' => 'region_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		)
	);

/**
 * Asociaciones hasMany
 *
 * @var arreglo
 */
 
	var $hasMany = array(
		'Universidad' => array(
		'className' => 'Universidad',
		'foreignKey' => 'pais_id',
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
