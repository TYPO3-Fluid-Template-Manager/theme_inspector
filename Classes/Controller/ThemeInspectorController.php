<?php
namespace CodingMs\ThemeInspector\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Thomas Deuling <typo3@coding.ms>, coding.ms
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

use \TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 *
 *
 * @package ftm_server
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ThemeInspectorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {


    /**
     * action list
     *
     * @return void
     */
    public function inspectAction() {

        $themeBase = 'theme_bootstrap';
        $themeSlate = 'theme_bootstrap_slate';

        $columns = array();

        $tempFile = array();
        $tempFile['header'] = 'Configuration/TypoScript/constants.txt';
        $tempFile['source'] = $this->getFileContent('EXT:themes/Configuration/TypoScript/constants.txt');
        $columns['themes']['constants'][0] = $tempFile;

        $filesOfDirectory = GeneralUtility::getFilesInDir('EXT:themes/Configuration/TypoScript/Library', 'constantsts', TRUE, 1);
        foreach ($filesOfDirectory as $file) {
            $tempFile = array();
            $tempFile['header'] = 'Configuration/TypoScript/constants.txt';
            $tempFile['source'] = $this->getFileContent('EXT:themes/Configuration/TypoScript/constants.txt');
            $columns['themes']['constants'][0] = $tempFile;
        }



        $this->view->assign("themes_constants_txt", $this->getFileContent('EXT:themes/Configuration/TypoScript/constants.txt'));
        $this->view->assign("themes_setup_txt",     $this->getFileContent('EXT:themes/Configuration/TypoScript/setup.txt'));


        $this->view->assign("themes_gridelements_constants_txt", $this->getFileContent('EXT:themes_gridelements/Configuration/TypoScript/constants.txt'));
        $this->view->assign("themes_gridelements_setup_txt",     $this->getFileContent('EXT:themes_gridelements/Configuration/TypoScript/setup.txt'));



        $this->view->assign("theme_bootstrap_constants_txt", $this->getFileContent('EXT:'.$themeBase.'/Configuration/TypoScript/constants.txt'));
        $this->view->assign("theme_bootstrap_setup_txt",     $this->getFileContent('EXT:'.$themeBase.'/Configuration/TypoScript/setup.txt'));

        $this->view->assign("theme_bootstrap_slate_constants_txt", $this->getFileContent('EXT:'.$themeSlate.'/Configuration/TypoScript/constants.txt'));
        $this->view->assign("theme_bootstrap_slate_setup_txt",     $this->getFileContent('EXT:'.$themeSlate.'/Configuration/TypoScript/setup.txt'));


        $this->view->assign("themeBase", $themeBase);
        $this->view->assign("themeSlate", $themeSlate);

//        $this->view->assign("files", $files);
//        $this->view->assign("filterActiveKey", $filterActiveKey);
//        $this->view->assign("filterActive", $filterActive);
//        $this->view->assign("filterSelect", $filterSelect);
//        $this->view->assign("objectTypes", $objectTypes);
//        $this->view->assign("flashMessages", $flashMessages);
//        $this->view->assign("deleteConfirmText", $deleteConfirmText);

    }


    protected function getFileContent($file='') {
        $fileAbs = GeneralUtility::getFileAbsFileName($file);
        if(file_exists($fileAbs)) {
            return file_get_contents($fileAbs);
        }
        else {
            return 'file not found: '.$file.'/'.$fileAbs;
        }
    }

}
?>