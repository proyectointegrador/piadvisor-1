<?php
/**
 * Universidad Model
 *
 * @property Disponibilidad $Disponibilidad
 * @property Demanda $Demanda
 * @property User $User
 * @property Pais $Pais
 * @property Carrera $Carrera
 * @property Requisito $Requisito
 */
class Universidad extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Universidad';

	var $displayField = 'name';


	//Validaciones de datos

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
	    	'rule' => 'notEmpty',
	        'message' => 'El website de la universidad es obligatorio.',
	        'allowEmpty' => false
	    ),
	    'idioma' => array(
	    	'rule' => 'notEmpty',
	        'message' => 'El idioma de la universidad es obligatorio.',
	        'allowEmpty' => false
	    ),

	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
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
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
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
