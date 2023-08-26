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

namespace PhpOffice\PhpWord\Writer\RTF\Style;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Border style writer
 *
 * @since 0.12.0
 */
class Border extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Sizes
     *
     * @var array
     */
    private $sizes = array();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Colors
     *
     * @var array
     */
    private $colors = array();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write style
     *
     * @return string
     */
    public function write()
    {
        $content = '';

        $sides = array('top', 'left', 'right', 'bottom');
        $sizeCount = count($this->sizes);

        // Page border measure
        // 8 = from text, infront off; 32 = from edge, infront on; 40 = from edge, infront off
        $content .= '\pgbrdropt32';

        for ($i = 0; $i < $sizeCount; $i++) {
            if ($this->sizes[$i] !== null) {
                $color = null;
                if (isset($this->colors[$i])) {
                    $color = $this->colors[$i];
                }
                $content .= $this->writeSide($sides[$i], $this->sizes[$i], $color);
            }
        }

        return $content;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write side
     *
     * @param string $side
     * @param int $width
     * @param string $color
     * @return string
     */
    private function writeSide($side, $width, $color = '')
    {
        /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Writer\RTF $rtfWriter */
        $rtfWriter = $this->getParentWriter();
        $colorIndex = 0;
        if ($rtfWriter !== null) {
            $colorTable = $rtfWriter->getColorTable();
            $index = array_search($color, $colorTable);
            if ($index !== false && $colorIndex !== null) {
                $colorIndex = $index + 1;
            }
        }

        $content = '';

        $content .= '\pgbrdr' . substr($side, 0, 1);
        $content .= '\brdrs'; // Single-thickness border; @todo Get other type of border
        $content .= '\brdrw' . $width; // Width
        $content .= '\brdrcf' . $colorIndex; // Color
        $content .= '\brsp480'; // Space in twips between borders and the paragraph (24pt, following OOXML)
        $content .= ' ';

        return $content;
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
}
