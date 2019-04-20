<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = array(
	'PARAMETERS' => array(
		'DEFAULT_SORT' => array(
			'PARENT' => 'DATA_SOURCE',
			'NAME' => GetMessage('DEFAULT_SORT'),
			'TYPE' => 'STRING',
			'DEFAULT' => 'RAND',
		),
		'SORT_FIELDS_NAME' => array(
			'PARENT' => 'DATA_SOURCE',
			'NAME' => GetMessage('SORT_NAME'),
			'TYPE' => 'STRING',
			'MULTIPLE' => 'Y',
			'ADDITIONAL_VALUES' => 'Y',
			'VALUES' => array(),
		),
		'SORT_FIELDS_VALUE' => array(
			'PARENT' => 'DATA_SOURCE',
			'NAME' => GetMessage('SORT_FIELD'),
			'TYPE' => 'STRING',
			'MULTIPLE' => 'Y',
			'ADDITIONAL_VALUES' => 'Y',
			'VALUES' => array(),
		),
		'VAR_COOKIE_NAME' => array(
			'PARENT' => 'DATA_SOURCE',
			'NAME' => GetMessage('VAR_COOKIE_NAME'),
			'TYPE' => 'STRING',
			'DEFAULT' => 'BITRIX_CATALOG_SORT',
		),
		'CACHE_TIME' => array('DEFAULT' => 36000000)
	),
);
