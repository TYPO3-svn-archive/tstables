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


/**
 * Model class "table"
 *
 * @author	Fabrizio Branca <fabrizio.branca@aoemedia.de>
 * @package	TYPO3
 * @subpackage	tx_tstables\model
 */
abstract class tx_tstables_abstractElement extends tx_pttools_objectCollection implements tx_pttools_iSettableByArray {
	
	/**
	 * @var string
	 */
	protected $tagParams;
	
	/**
	 * @var string
	 */
	protected $tagName;
	
	/**
	 * @var string
	 */
	protected $nextLevelTagName;
	
	/**
	 * Set properties from array (typoscript)
	 * 
	 * @param array $dataArray
	 * @return void
	 */
	public function setPropertiesFromArray(array $dataArray) {
		$this->setConfiguration($dataArray);
		$className = $this->restrictedClassName;
		$sortedKeys = t3lib_TStemplate::sortedKeyList($dataArray, true);
		foreach ($sortedKeys as $key) {
			if ($key) {
				$childConfiguration = $dataArray[$key.'.'];
				tx_pttools_assert::isNotEmptyArray($childConfiguration, array('message' => 'No child configuration found in class '. get_class($this)));
				
				// set next level tag name if not set
				if (!empty($this->nextLevelTagName) && empty($childConfiguration['tagName']) && empty($childConfiguration['tagName.'])) {
					$childConfiguration['tagName'] = $this->nextLevelTagName; 
				}
				$child = new $className;
				$child->setPropertiesFromArray($childConfiguration);
				$this->addItem($child);
			}
		}
	}
	
	/**
	 * Set the configuration
	 * 
	 * @param array $dataArray
	 * @return void
	 */
	public function setConfiguration(array $dataArray) {
		$this->tagParams = $GLOBALS['TSFE']->cObj->stdWrap($dataArray['tagParams'], $dataArray['tagParams.']);
		$tagName = $GLOBALS['TSFE']->cObj->stdWrap($dataArray['tagName'], $dataArray['tagName.']);
		if (!empty($tagName)) {
			$this->tagName = $tagName;
		}
		$this->nextLevelTagName = $GLOBALS['TSFE']->cObj->stdWrap($dataArray['nextLevelTagName'], $dataArray['nextLevelTagName.']);
	}
	
	/**
	 * Render content
	 * 
	 * @return string HTML output
	 */
	public function render() {
		$output = '';
		
		foreach ($this as $child) {
			$output .= $child->render();
		}
		
		$output = $GLOBALS['TSFE']->cObj->wrap($output, $this->renderWrap());
		
		return $output;
	}
	
	/**
	 * Renders the wrap
	 * 
	 * @return string
	 */
	protected function renderWrap() {
		$wrap = '<'.$this->tagName;
		if (!empty($this->tagParams)) {
			$wrap .= ' '.$this->tagParams;
		}
		$wrap .= '>|</'.$this->tagName.'>';
		
		return $wrap;
	}
		
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tstables/model/class.tx_tstables_row.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tstables/model/class.tx_tstables_row.php']);
}

?>