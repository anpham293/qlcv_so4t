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

use PhpOffice\PhpWord\Writer\WriterInterface;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * TCPDF writer
 *
 * @deprecated 0.13.0 Use `DomPDF` or `MPDF` instead.
 *
 * @see  http://www.tcpdf.org/
 * @since 0.11.0
 */
class TCPDF extends AbstractRenderer implements WriterInterface
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Name of renderer include file
     *
     * @var string
     */
    protected $includeFile = 'tcpdf.php';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Save PhpWord to file.
     *
     * @param string $filename Name of the file to save as
     */
    public function save($filename = null)
    {
        $fileHandle = parent::prepareForSave($filename);

        //  PDF settings
        $paperSize = 'A4';
        $orientation = 'P';

        // Create PDF
        $pdf = new \TCPDF($orientation, 'pt', $paperSize);
        $pdf->setFontSubsetting(false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->SetFont($this->getFont());
        $pdf->writeHTML($this->getContent());

        // Write document properties
        $phpWord = $this->getPhpWord();
        $docProps = $phpWord->getDocInfo();
        $pdf->SetTitle($docProps->getTitle());
        $pdf->SetAuthor($docProps->getCreator());
        $pdf->SetSubject($docProps->getSubject());
        $pdf->SetKeywords($docProps->getKeywords());
        $pdf->SetCreator($docProps->getCreator());

        //  Write to file
        fwrite($fileHandle, $pdf->Output($filename, 'S'));

        parent::restoreStateAfterSave($fileHandle);
    }
}
