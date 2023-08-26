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

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Style\TOC as TOCStyle;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Table of contents
 */
class TOC extends AbstractElement
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * TOC style
     *
     * @var \PhpOffice\PhpWord\Style\TOC
     */
    private $TOCStyle;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Font style
     *
     * @var \PhpOffice\PhpWord\Style\Font|string
     */
    private $fontStyle;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Min title depth to show
     *
     * @var int
     */
    private $minDepth = 1;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Max title depth to show
     *
     * @var int
     */
    private $maxDepth = 9;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create a new Table-of-Contents Element
     *
     * @param mixed $fontStyle
     * @param array $tocStyle
     * @param int $minDepth
     * @param int $maxDepth
     */
    public function __construct($fontStyle = null, $tocStyle = null, $minDepth = 1, $maxDepth = 9)
    {
        $this->TOCStyle = new TOCStyle();

        if (!is_null($tocStyle) && is_array($tocStyle)) {
            $this->TOCStyle->setStyleByArray($tocStyle);
        }

        if (!is_null($fontStyle) && is_array($fontStyle)) {
            $this->fontStyle = new Font();
            $this->fontStyle->setStyleByArray($fontStyle);
        } else {
            $this->fontStyle = $fontStyle;
        }

        $this->minDepth = $minDepth;
        $this->maxDepth = $maxDepth;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get all titles
     *
     * @return array
     */
    public function getTitles()
    {
        if (!$this->phpWord instanceof PhpWord) {
            return array();
        }

        $titles = $this->phpWord->getTitles()->getItems();
        foreach ($titles as $i => $title) {
            /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Element\Title $title Type hint */
            $depth = $title->getDepth();
            if ($this->minDepth > $depth) {
                unset($titles[$i]);
            }
            if (($this->maxDepth != 0) && ($this->maxDepth < $depth)) {
                unset($titles[$i]);
            }
        }

        return $titles;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get TOC Style
     *
     * @return \PhpOffice\PhpWord\Style\TOC
     */
    public function getStyleTOC()
    {
        return $this->TOCStyle;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Font Style
     *
     * @return \PhpOffice\PhpWord\Style\Font|string
     */
    public function getStyleFont()
    {
        return $this->fontStyle;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set max depth.
     *
     * @param int $value
     */
    public function setMaxDepth($value)
    {
        $this->maxDepth = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Max Depth
     *
     * @return int Max depth of titles
     */
    public function getMaxDepth()
    {
        return $this->maxDepth;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set min depth.
     *
     * @param int $value
     */
    public function setMinDepth($value)
    {
        $this->minDepth = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Min Depth
     *
     * @return int Min depth of titles
     */
    public function getMinDepth()
    {
        return $this->minDepth;
    }
}
