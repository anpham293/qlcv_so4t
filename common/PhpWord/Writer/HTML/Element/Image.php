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

namespace PhpOffice\PhpWord\Writer\HTML\Element;

use PhpOffice\PhpWord\Element\Image as ImageElement;
use PhpOffice\PhpWord\Writer\HTML\Style\Image as ImageStyleWriter;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Image element HTML writer
 *
 * @since 0.10.0
 */
class Image extends Text
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write image
     *
     * @return string
     */
    public function write()
    {
        if (!$this->element instanceof ImageElement) {
            return '';
        }
        $content = '';
        $imageData = $this->element->getImageStringData(true);
        if ($imageData !== null) {
            $styleWriter = new ImageStyleWriter($this->element->getStyle());
            $style = $styleWriter->write();
            $imageData = 'data:' . $this->element->getImageType() . ';base64,' . $imageData;

            $content .= $this->writeOpening();
            $content .= "<img border=\"0\" style=\"{$style}\" src=\"{$imageData}\"/>";
            $content .= $this->writeClosing();
        }

        return $content;
    }
}
