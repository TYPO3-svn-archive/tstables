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


/**
 * Model class "cell"
 *
 * @author	Fabrizio Branca <fabrizio.branca@aoemedia.de>
 * @package	TYPO3
 * @subpackage	tx_tstables\model
 */
class tx_tstables_cell extends tx_tstables_abstractElement {
	
	protected $content;
	protected $tagName = 'td';

	/**
	 * Overriding method for indiviual behavour
	 * 
	 * @param array $dataArray
	 */
	public function setPropertiesFromArray(array $dataArray) {
		$this->setConfiguration($dataArray);
		
		if (!empty($dataArray['contentUid']) || !empty($dataArray['contentUid.'])) {
			$contentUid = $GLOBALS['TSFE']->cObj->stdWrap($dataArray['contentUid'], $dataArray['contentUid.']);
			$lConf = array(
				'tables' => 'tt_content', 
				'source' => $contentUid
			);
			$this->content = $GLOBALS['TSFE']->cObj->RECORDS($lConf);
		} else {
			$this->content = $GLOBALS['TSFE']->cObj->stdWrap($dataArray['content'], $dataArray['content.']);
		}
	}
	
	/**
	 * Render row content
	 * 
	 * @return string HTML output
	 */
	public function render() {
		$output = '';
		
		$output .= $this->content;
		
		$output = $GLOBALS['TSFE']->cObj->wrap($output, $this->renderWrap());
		
		return $output;
	}
			
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tstables/model/class.tx_tstables_cell.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tstables/model/class.tx_tstables_cell.php']);
}

?>