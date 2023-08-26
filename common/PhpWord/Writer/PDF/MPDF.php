<?php
/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @see         https://github.com/PHPOffice/PhpWord
 * @copyright   2010-2018 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\PDF;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Writer\WriterInterface;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * MPDF writer
 *
 * @see  http://www.mpdf1.com/
 * @since 0.11.0
 */
class MPDF extends AbstractRenderer implements WriterInterface
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Overridden to set the correct includefile, only needed for MPDF 5
     *
     * @codeCoverageIgnore
     * @param PhpWord $phpWord
     */
    public function __construct(PhpWord $phpWord)
    {
        if (file_exists(Settings::getPdfRendererPath() . '/mpdf.php')) {
            // MPDF version 5.* needs this file to be included, later versions not
            $this->includeFile = 'mpdf.php';
        }
        parent::__construct($phpWord);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Save PhpWord to file.
     *
     * @param string $filename Name of the file to save as
     */
    public function save($filename = null)
    {
        $fileHandle = parent::prepareForSave($filename);

        //  PDF settings
        $paperSize = strtoupper('A4');
        $orientation = strtoupper('portrait');

        //  Create PDF
        $mPdfClass = $this->getMPdfClassName();
        $pdf = new $mPdfClass();
        $pdf->_setPageSize($paperSize, $orientation);
        $pdf->addPage($orientation);

        // Write document properties
        $phpWord = $this->getPhpWord();
        $docProps = $phpWord->getDocInfo();
        $pdf->setTitle($docProps->getTitle());
        $pdf->setAuthor($docProps->getCreator());
        $pdf->setSubject($docProps->getSubject());
        $pdf->setKeywords($docProps->getKeywords());
        $pdf->setCreator($docProps->getCreator());

        $pdf->writeHTML($this->getContent());

        //  Write to file
        fwrite($fileHandle, $pdf->output($filename, 'S'));

        parent::restoreStateAfterSave($fileHandle);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Return classname of MPDF to instantiate
     *
     * @codeCoverageIgnore
     * @return string
     */
    private function getMPdfClassName()
    {
        if ($this->includeFile != null) {
            // MPDF version 5.*
            return '\mpdf';
        }

        // MPDF version > 6.*
        return '\Mpdf\Mpdf';
    }
}
