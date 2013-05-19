<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de universidades
 * 				
 */
 
class Universidad extends AppModel {

/**
 * Despliega los campos
 *
 * @var string
 */
	var $name = 'Universidad';

	var $displayField = 'name';

/**
 * Validaciones de datos
 *
 */

	var $validate = array(
	    'codigo' => array(
		'rule' => 'isUnique',
		'message' => 'El código de la universidad debe ser único.'
	    ),
	    'codigo' => array(
		'rule' => 'notEmpty',
		'message' => 'El código de la universidad es obligatorio.',
		'allowEmpty' => false
	    ),
	    'name' => array(
		'rule' => 'notEmpty',
		'message' => 'El nombre de la universidad es obligatorio.',
		'allowEmpty' => false
	    ),
	    'ciudad' => array(
		'rule' => 'notEmpty',
		'message' => 'La ciudad de la universidad es obligatorio.',
		'allowEmpty' => false
	    ),
	    'calendario' => array(
		'rule' => 'notEmpty',
		'message' => 'El calendario de la universidad es obligatorio.',
		'allowEmpty' => false
	    ),
	    'website' => array(
		'rule' => '/^((?!http).)/',
		'message' => 'El website de la universidad debe de no contener http.',
		'allowEmpty' => false
	    ),
	    'idioma' => array(
		'rule' => 'notEmpty',
		'message' => 'El idioma de la universidad es obligatorio.',
		'allowEmpty' => false
	    ),

	);


/**
 * Asociaciones pertenece a
 *
 * @var arreglo
 */
	public $belongsTo = array(
		'Disponibilidad' => array(
		'className' => 'Disponibilidad',
		'foreignKey' => 'disponibilidad_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		),
		'Demanda' => array(
		'className' => 'Demanda',
		'foreignKey' => 'demanda_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		),
		'User' => array(
		'className' => 'User',
		'foreignKey' => 'user_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		),
		'Pais' => array(
		'className' => 'Pais',
		'foreignKey' => 'pais_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		),
		'Programa' => array(
		'className' => 'Programa',
		'foreignKey' => 'programa_id',
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
	public $hasAndBelongsToMany = array(
		'Carrera' => array(
		'className' => 'Carrera',
		'joinTable' => 'universidades_carreras',
		'foreignKey' => 'universidad_id',
		'associationForeignKey' => 'carrera_id',
		'unique' => true,
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'finderQuery' => '',
		'deleteQuery' => '',
		'insertQuery' => ''
		),
		'Requisito' => array(
		'className' => 'Requisito',
		'joinTable' => 'universidades_requisitos',
		'foreignKey' => 'universidad_id',
		'associationForeignKey' => 'requisito_id',
		'unique' => 'keepExisting',
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'finderQuery' => '',
		'deleteQuery' => '',
		'insertQuery' => ''
		)
	);

}
