<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

/*
// setting up tcaobjects autoloader
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tcaobjects']['autoloader'][$_EXTKEY] = array(
	'partsMatchDirectories' => true,
	// 'classMap' => array(
	//		'<classname>' => '<path relative to the extension directory>',
	// ),
	'classPaths' => array(
		// ordered by where the most classes are to be autoloaded
		'model',
		// 'misc',
		// 'controller', // this is not needed, as controller classes are loaded by TYPO3 directly
		// 'view' // this is not needed, as view classes are loaded by the controller
	)
);
*/

$GLOBALS[$_EXTKEY.'_controllerArray'] = array(
	'_controller_table' => array(
		'includeFlexform' => false,
		'cached' => true
	),
);

			
		
$cN = t3lib_extMgm::getCN($_EXTKEY);
foreach ($GLOBALS[$_EXTKEY.'_controllerArray'] as $prefix => $configuration) {
	
	$path = t3lib_div::trimExplode('_', $prefix, 1);
	$path = implode('/', array_slice($path, 0, -1)); // remove class name from the end
	
	// Add PlugIn to Static Template #43
	t3lib_extMgm::addPItoST43($_EXTKEY, $path.'/class.'.$cN.$prefix.'.php', $prefix, 'list_type', $configuration['cached']);
}
?>