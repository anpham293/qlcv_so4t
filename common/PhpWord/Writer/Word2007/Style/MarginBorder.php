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

use PhpOffice\Common\XMLWriter;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Margin border style writer
 *
 * @since 0.10.0
 */
class MarginBorder extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Sizes
     *
     * @var int[]
     */
    private $sizes = array();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Colors
     *
     * @var string[]
     */
    private $colors = array();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Border styles
     *
     * @var string[]
     */
    private $styles = array();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Other attributes
     *
     * @var array
     */
    private $attributes = array();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write style.
     */
    public function write()
    {
        $xmlWriter = $this->getXmlWriter();

        $sides = array('top', 'left', 'right', 'bottom', 'insideH', 'insideV');

        foreach ($this->sizes as $i => $size) {
            if ($size !== null) {
                $color = null;
                if (isset($this->colors[$i])) {
                    $color = $this->colors[$i];
                }
                $style = isset($this->styles[$i]) ? $this->styles[$i] : 'single';
                $this->writeSide($xmlWriter, $sides[$i], $this->sizes[$i], $color, $style);
            }
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write side.
     *
     * @param \PhpOffice\Common\XMLWriter $xmlWriter
     * @param string $side
     * @param int $width
     * @param string $color
     * @param string $borderStyle
     */
    private function writeSide(XMLWriter $xmlWriter, $side, $width, $color = null, $borderStyle = 'solid')
    {
        $xmlWriter->startElement('w:' . $side);
        if (!empty($this->colors)) {
            if ($color === null && !empty($this->attributes)) {
                if (isset($this->attributes['defaultColor'])) {
                    $color = $this->attributes['defaultColor'];
                }
            }
            $xmlWriter->writeAttribute('w:val', $borderStyle);
            $xmlWriter->writeAttribute('w:sz', $width);
            $xmlWriter->writeAttributeIf($color != null, 'w:color', $color);
            if (!empty($this->attributes)) {
                if (isset($this->attributes['space'])) {
                    $xmlWriter->writeAttribute('w:space', $this->attributes['space']);
                }
            }
        } else {
            $xmlWriter->writeAttribute('w:w', $width);
            $xmlWriter->writeAttribute('w:type', 'dxa');
        }
        $xmlWriter->endElement();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set sizes.
     *
     * @param int[] $value
     */
    public function setSizes($value)
    {
        $this->sizes = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set colors.
     *
     * @param string[] $value
     */
    public function setColors($value)
    {
        $this->colors = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set border styles.
     *
     * @param string[] $value
     */
    public function setStyles($value)
    {
        $this->styles = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set attributes.
     *
     * @param array $value
     */
    public function setAttributes($value)
    {
        $this->attributes = $value;
    }
}
