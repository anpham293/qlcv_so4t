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
 * @see         https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2018 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\ODText\Style;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Table style writer
 *
 * @since 0.11.0
 */
class Table extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write style.
     */
    public function write()
    {
        /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Style\Table $style Type hint */
        $style = $this->getStyle();
        if (!$style instanceof \PhpOffice\PhpWord\Style\Table) {
            return;
        }
        $xmlWriter = $this->getXmlWriter();

        $xmlWriter->startElement('style:style');
        $xmlWriter->writeAttribute('style:name', $style->getStyleName());
        $xmlWriter->writeAttribute('style:family', 'table');
        $xmlWriter->startElement('style:table-properties');
        //$xmlWriter->writeAttribute('style:width', 'table');
        $xmlWriter->writeAttribute('style:rel-width', 100);
        $xmlWriter->writeAttribute('table:align', 'center');
        $xmlWriter->endElement(); // style:table-properties
        $xmlWriter->endElement(); // style:style

        $cellWidths = $style->getColumnWidths();
        $countCellWidths = count($cellWidths);

        for ($i = 0; $i < $countCellWidths; $i++) {
            $width = $cellWidths[$i];
            $xmlWriter->startElement('style:style');
            $xmlWriter->writeAttribute('style:name', $style->getStyleName() . '.' . $i);
            $xmlWriter->writeAttribute('style:family', 'table-column');
            $xmlWriter->startElement('style:table-column-properties');
            $xmlWriter->writeAttribute('style:column-width', number_format($width * 0.0017638889, 2, '.', '') . 'cm');
            $xmlWriter->endElement(); // style:table-column-properties
            $xmlWriter->endElement(); // style:style
        }
    }
}
