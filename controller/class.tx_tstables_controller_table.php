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



require_once t3lib_extMgm::extPath('pt_tools').'res/staticlib/class.tx_pttools_assert.php';
require_once t3lib_extMgm::extPath('pt_tools').'res/abstract/class.tx_pttools_iSettableByArray.php';

require_once t3lib_extMgm::extPath('tstables').'model/class.tx_tstables_table.php';

require_once t3lib_extMgm::extPath('pt_mvc').'classes/class.tx_ptmvc_controllerFrontend.php';


/**
 * Controller class for "Latest changes"
 *
 * @author	Fabrizio Branca <fabrizio.branca@aoemedia.de>
 * @package	TYPO3
 * @subpackage	tx_tstables\controller
 */
class tx_tstables_controller_table extends tx_ptmvc_controllerFrontend {
			
	/**
	 * Action default
	 *
	 * @param void
	 * @return string HTML output
	 * @author Fabrizio Branca <fabrizio.branca@aoemedia.de>
	 * @since 2009-11-27
	 */
	public function defaultAction() {
		
		tx_pttools_assert::isNotEmptyArray($this->conf['tableConfig.'], array('message' => 'No table configuration found'));
		
		$table = new tx_tstables_table();
		$table->setPropertiesFromArray($this->conf['tableConfig.']);
		
		return $table->render();
	}
		
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tstables/controller/class.tx_tstables_controller_table.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tstables/controller/class.tx_tstables_controller_table.php']);
}

?>