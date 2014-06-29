<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'CodingMs.' . $_EXTKEY,
	'Themeinspector',
	array(
		'ThemeInspector' => 'inspect',
	),
	// non-cacheable actions
	array(
		'ThemeInspector' => 'inspect',
	)
);

?>