<?php

/**
 * Called by the ModelConnector Designer to create a list of controls appropriate for the given database field type.
 * The control will  be available in the list of controls that appear in ModelConnector desginer dialog
 * in the ControlClass entry.
 */

$controls[QDatabaseFieldType::VarChar][] = 'QCubed\Plugin\QSignaturePad';
$controls[QDatabaseFieldType::Blob][] = 'QCubed\Plugin\QSignaturePad';
//$controls[QDatabaseFieldType::Char][] = '';
//$controls[QDatabaseFieldType::Integer][] = '';
//$controls[QDatabaseFieldType::Float][] = '';
//$controls[QDatabaseFieldType::Bit][] = '';
//$controls[QDatabaseFieldType::DateTime][] = '';
//$controls[QDatabaseFieldType::Date][] = '';
//$controls[QDatabaseFieldType::Time][] = '';
//$controls[QType::ArrayType][] = ''; // Many-to-one. Includes forward and unique reverse references.
//$controls[QType::Association][] = ''; // Many-to-many.

?>