<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Fabrizio Branca <fabrizio.branca@aoemedia.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */


require_once t3lib_extMgm::extPath('tstables').'model/class.tx_tstables_abstractElement.php';
require_once t3lib_extMgm::extPath('tstables').'model/class.tx_tstables_part.php';


/**
 * Model class "table"
 *
 * @author	Fabrizio Branca <fabrizio.branca@aoemedia.de>
 * @package	TYPO3
 * @subpackage	tx_tstables\model
 */
class tx_tstables_table extends tx_tstables_abstractElement {
	
	protected $restrictedClassName = 'tx_tstables_part';
	protected $tagName = 'table';
	
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tstables/model/class.tx_tstables_table.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tstables/model/class.tx_tstables_table.php']);
}

?>