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

use PhpOffice\Common\XMLWriter;
use PhpOffice\PhpWord\Element\Image as ImageElement;
use PhpOffice\PhpWord\Style\Font as FontStyle;
use PhpOffice\PhpWord\Style\Frame as FrameStyle;
use PhpOffice\PhpWord\Writer\Word2007\Style\Font as FontStyleWriter;
use PhpOffice\PhpWord\Writer\Word2007\Style\Image as ImageStyleWriter;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Image element writer
 *
 * @since 0.10.0
 */
class Image extends AbstractElement
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write element.
     */
    public function write()
    {
        $xmlWriter = $this->getXmlWriter();
        $element = $this->getElement();
        if (!$element instanceof ImageElement) {
            return;
        }

        if ($element->isWatermark()) {
            $this->writeWatermark($xmlWriter, $element);
        } else {
            $this->writeImage($xmlWriter, $element);
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write image element.
     */
    private function writeImage(XMLWriter $xmlWriter, ImageElement $element)
    {
        $rId = $element->getRelationId() + ($element->isInSection() ? 6 : 0);
        $style = $element->getStyle();
        $styleWriter = new ImageStyleWriter($xmlWriter, $style);

        if (!$this->withoutP) {
            $xmlWriter->startElement('w:p');
            $styleWriter->writeAlignment();
        }
        $this->writeCommentRangeStart();

        $xmlWriter->startElement('w:r');

        // Write position
        $position = $style->getPosition();
        if ($position && $style->getWrap() == FrameStyle::WRAP_INLINE) {
            $fontStyle = new FontStyle('text');
            $fontStyle->setPosition($position);
            $fontStyleWriter = new FontStyleWriter($xmlWriter, $fontStyle);
            $fontStyleWriter->write();
        }

        $xmlWriter->startElement('w:pict');
        $xmlWriter->startElement('v:shape');
        $xmlWriter->writeAttribute('type', '#_x0000_t75');

        $styleWriter->write();

        $xmlWriter->startElement('v:imagedata');
        $xmlWriter->writeAttribute('r:id', 'rId' . $rId);
        $xmlWriter->writeAttribute('o:title', '');
        $xmlWriter->endElement(); // v:imagedata

        $xmlWriter->endElement(); // v:shape
        $xmlWriter->endElement(); // w:pict
        $xmlWriter->endElement(); // w:r

        $this->endElementP();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write watermark element.
     */
    private function writeWatermark(XMLWriter $xmlWriter, ImageElement $element)
    {
        $rId = $element->getRelationId();
        $style = $element->getStyle();
        $style->setPositioning('absolute');
        $styleWriter = new ImageStyleWriter($xmlWriter, $style);

        $xmlWriter->startElement('w:p');
        $xmlWriter->startElement('w:r');
        $xmlWriter->startElement('w:pict');
        $xmlWriter->startElement('v:shape');
        $xmlWriter->writeAttribute('type', '#_x0000_t75');

        $styleWriter->write();

        $xmlWriter->startElement('v:imagedata');
        $xmlWriter->writeAttribute('r:id', 'rId' . $rId);
        $xmlWriter->writeAttribute('o:title', '');
        $xmlWriter->endElement(); // v:imagedata
        $xmlWriter->endElement(); // v:shape
        $xmlWriter->endElement(); // w:pict
        $xmlWriter->endElement(); // w:r
        $xmlWriter->endElement(); // w:p
    }
}
