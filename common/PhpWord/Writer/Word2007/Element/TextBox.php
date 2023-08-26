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

namespace PhpOffice\PhpWord\Writer\Word2007\Element;

use PhpOffice\PhpWord\Writer\Word2007\Style\TextBox as TextBoxStyleWriter;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * TextBox element writer
 *
 * @since 0.11.0
 */
class TextBox extends Image
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write element.
     */
    public function write()
    {
        $xmlWriter = $this->getXmlWriter();
        $element = $this->getElement();
        if (!$element instanceof \PhpOffice\PhpWord\Element\TextBox) {
            return;
        }
        $style = $element->getStyle();
        $styleWriter = new TextBoxStyleWriter($xmlWriter, $style);

        if (!$this->withoutP) {
            $xmlWriter->startElement('w:p');
            $styleWriter->writeAlignment();
        }
        $this->writeCommentRangeStart();

        $xmlWriter->startElement('w:r');
        $xmlWriter->startElement('w:pict');
        $xmlWriter->startElement('v:shape');
        $xmlWriter->writeAttribute('type', '#_x0000_t0202');

        $styleWriter->write();
        $styleWriter->writeBorder();

        $xmlWriter->startElement('v:textbox');
        $styleWriter->writeInnerMargin();

        // TextBox content, serving as a container
        $xmlWriter->startElement('w:txbxContent');
        $containerWriter = new Container($xmlWriter, $element);
        $containerWriter->write();
        $xmlWriter->endElement(); // w:txbxContent

        $xmlWriter->endElement(); // v: textbox

        $xmlWriter->endElement(); // v:shape
        $xmlWriter->endElement(); // w:pict
        $xmlWriter->endElement(); // w:r

        $this->endElementP();
    }
}
