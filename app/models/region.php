<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de regiones
 * 				
 */
 
class Region extends AppModel {

/**
 * Despliega los campos
 *
 * @var string
 */
 
	var $name = 'Region';
	var $displayField = 'name';

/**
 * Validaciones de datos
 *
 */
	var $validate = array(
	    'name' => array(
		'rule' => 'alphaNumeric',
		'message' => 'El nombre de la región es obligatorio y debe ser alfanúmerico.',
		'allowEmpty' => false
	    )
	);

/**
 * Asociaciones hasMany
 *
 * @var arreglo
 */
	
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
