<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de carreras
 * 				
 */
 
class Carrera extends AppModel {

/**
 * Despliega los campos
 *
 * @var string
 */
	var $name = 'Carrera';
	var $displayField = 'name';

/**
 * Validaciones de datos
 *
 */

	var $validate = array(
	    'name' => array(
		'rule' => 'isUnique',
		'message' => 'El nombre(siglas) de la carrera debe ser único.',
		'allowEmpty' => false
	    ),
	    'name2' => array(
		'rule' => 'alphaNumeric',
		'message' => 'El nombre de la carrera es obligatorio.',
		'allowEmpty' => false
	    )
	);


/**
 * Asociaciones hasMany
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
