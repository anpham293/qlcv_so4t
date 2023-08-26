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

namespace PhpOffice\PhpWord\Writer\Word2007\Style;

use PhpOffice\PhpWord\Style\TextBox as TextBoxStyle;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * TextBox style writer
 *
 * @since 0.11.0
 */
class TextBox extends Frame
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Writer inner margin.
     */
    public function writeInnerMargin()
    {
        $style = $this->getStyle();
        if (!$style instanceof TextBoxStyle || !$style->hasInnerMargins()) {
            return;
        }

        $xmlWriter = $this->getXmlWriter();
        $margins = implode(', ', $style->getInnerMargin());

        $xmlWriter->writeAttribute('inset', $margins);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Writer border.
     */
    public function writeBorder()
    {
        $style = $this->getStyle();
        if (!$style instanceof TextBoxStyle) {
            return;
        }
        $xmlWriter = $this->getXmlWriter();

        $xmlWriter->startElement('v:stroke');
        $xmlWriter->writeAttributeIf($style->getBorderSize() !== null, 'weight', $style->getBorderSize() . 'pt');
        $xmlWriter->writeAttributeIf($style->getBorderColor() !== null, 'color', $style->getBorderColor());
        $xmlWriter->endElement(); // v:stroke
    }
}
