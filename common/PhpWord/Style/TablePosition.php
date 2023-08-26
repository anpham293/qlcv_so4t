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

namespace PhpOffice\PhpWord\Style;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * TablePosition style
 *
 * @see http://www.datypic.com/sc/ooxml/e-w_tblpPr-1.html
 */
class TablePosition extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Vertical anchor constants
     *
     * @const string
     * @see http://www.datypic.com/sc/ooxml/t-w_ST_VAnchor.html
     */
    const VANCHOR_TEXT = 'text'; // Relative to vertical text extents
    const VANCHOR_MARGIN = 'margin'; // Relative to margin
    const VANCHOR_PAGE = 'page'; // Relative to page

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Horizontal anchor constants
     *
     * @const string
     * @see http://www.datypic.com/sc/ooxml/t-w_ST_HAnchor.html
     */
    const HANCHOR_TEXT = 'text'; // Relative to text extents
    const HANCHOR_MARGIN = 'margin'; // Relative to margin
    const HANCHOR_PAGE = 'page'; // Relative to page

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Horizontal alignment constants
     *
     * @const string
     * @see http://www.datypic.com/sc/ooxml/t-w_ST_XAlign.html
     */
    const XALIGN_LEFT = 'left'; // Left aligned horizontally
    const XALIGN_CENTER = 'center'; // Centered horizontally
    const XALIGN_RIGHT = 'right'; // Right aligned horizontally
    const XALIGN_INSIDE = 'inside'; // Inside
    const XALIGN_OUTSIDE = 'outside'; // Outside

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Vertical alignment constants
     *
     * @const string
     * @see http://www.datypic.com/sc/ooxml/t-w_ST_YAlign.html
     */
    const YALIGN_INLINE = 'inline'; // In line with text
    const YALIGN_TOP = 'top'; // Top
    const YALIGN_CENTER = 'center'; // Centered vertically
    const YALIGN_BOTTOM = 'bottom'; // Bottom
    const YALIGN_INSIDE = 'inside'; // Inside Anchor Extents
    const YALIGN_OUTSIDE = 'outside'; // Centered vertically

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Distance from left of table to text
     *
     * @var int
     */
    private $leftFromText;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Distance from right of table to text
     *
     * @var int
     */
    private $rightFromText;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Distance from top of table to text
     *
     * @var int
     */
    private $topFromText;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Distance from bottom of table to text
     *
     * @var int
     */
    private $bottomFromText;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Table vertical anchor
     *
     * @var string
     * @see http://www.datypic.com/sc/ooxml/t-w_ST_VAnchor.html
     */
    private $vertAnchor;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Table horizontal anchor
     *
     * @var string
     * @see http://www.datypic.com/sc/ooxml/t-w_ST_HAnchor.html
     */
    private $horzAnchor;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Relative horizontal alignment from anchor
     *
     * @var string
     * @see http://www.datypic.com/sc/ooxml/t-w_ST_XAlign.html
     */
    private $tblpXSpec;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Absolute horizontal distance from anchor
     *
     * @var int
     */
    private $tblpX;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Relative vertical alignment from anchor
     *
     * @var string
     * @see http://www.datypic.com/sc/ooxml/t-w_ST_YAlign.html
     */
    private $tblpYSpec;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Absolute vertical distance from anchor
     *
     * @var int
     */
    private $tblpY;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create a new instance
     *
     * @param array $style
     */
    public function __construct($style = array())
    {
        $this->setStyleByArray($style);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get distance from left of table to text
     *
     * @return int
     */
    public function getLeftFromText()
    {
        return $this->leftFromText;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set distance from left of table to text
     *
     * @param int $value
     * @return self
     */
    public function setLeftFromText($value = null)
    {
        $this->leftFromText = $this->setNumericVal($value, $this->leftFromText);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get distance from right of table to text
     *
     * @return int
     */
    public function getRightFromText()
    {
        return $this->rightFromText;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set distance from right of table to text
     *
     * @param int $value
     * @return self
     */
    public function setRightFromText($value = null)
    {
        $this->rightFromText = $this->setNumericVal($value, $this->rightFromText);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get distance from top of table to text
     *
     * @return int
     */
    public function getTopFromText()
    {
        return $this->topFromText;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set distance from top of table to text
     *
     * @param int $value
     * @return self
     */
    public function setTopFromText($value = null)
    {
        $this->topFromText = $this->setNumericVal($value, $this->topFromText);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get distance from bottom of table to text
     *
     * @return int
     */
    public function getBottomFromText()
    {
        return $this->bottomFromText;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set distance from bottom of table to text
     *
     * @param int $value
     * @return self
     */
    public function setBottomFromText($value = null)
    {
        $this->bottomFromText = $this->setNumericVal($value, $this->bottomFromText);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get table vertical anchor
     *
     * @return string
     */
    public function getVertAnchor()
    {
        return $this->vertAnchor;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set table vertical anchor
     *
     * @param string $value
     * @return self
     */
    public function setVertAnchor($value = null)
    {
        $enum = array(
          self::VANCHOR_TEXT,
          self::VANCHOR_MARGIN,
          self::VANCHOR_PAGE,
        );
        $this->vertAnchor = $this->setEnumVal($value, $enum, $this->vertAnchor);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get table horizontal anchor
     *
     * @return string
     */
    public function getHorzAnchor()
    {
        return $this->horzAnchor;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set table horizontal anchor
     *
     * @param string $value
     * @return self
     */
    public function setHorzAnchor($value = null)
    {
        $enum = array(
          self::HANCHOR_TEXT,
          self::HANCHOR_MARGIN,
          self::HANCHOR_PAGE,
        );
        $this->horzAnchor = $this->setEnumVal($value, $enum, $this->horzAnchor);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get relative horizontal alignment from anchor
     *
     * @return string
     */
    public function getTblpXSpec()
    {
        return $this->tblpXSpec;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set relative horizontal alignment from anchor
     *
     * @param string $value
     * @return self
     */
    public function setTblpXSpec($value = null)
    {
        $enum = array(
            self::XALIGN_LEFT,
            self::XALIGN_CENTER,
            self::XALIGN_RIGHT,
            self::XALIGN_INSIDE,
            self::XALIGN_OUTSIDE,
        );
        $this->tblpXSpec = $this->setEnumVal($value, $enum, $this->tblpXSpec);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get absolute horizontal distance from anchor
     *
     * @return int
     */
    public function getTblpX()
    {
        return $this->tblpX;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set absolute horizontal distance from anchor
     *
     * @param int $value
     * @return self
     */
    public function setTblpX($value = null)
    {
        $this->tblpX = $this->setNumericVal($value, $this->tblpX);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get relative vertical alignment from anchor
     *
     * @return string
     */
    public function getTblpYSpec()
    {
        return $this->tblpYSpec;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set relative vertical alignment from anchor
     *
     * @param string $value
     * @return self
     */
    public function setTblpYSpec($value = null)
    {
        $enum = array(
            self::YALIGN_INLINE,
            self::YALIGN_TOP,
            self::YALIGN_CENTER,
            self::YALIGN_BOTTOM,
            self::YALIGN_INSIDE,
            self::YALIGN_OUTSIDE,
        );
        $this->tblpYSpec = $this->setEnumVal($value, $enum, $this->tblpYSpec);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get absolute vertical distance from anchor
     *
     * @return int
     */
    public function getTblpY()
    {
        return $this->tblpY;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set absolute vertical distance from anchor
     *
     * @param int $value
     * @return self
     */
    public function setTblpY($value = null)
    {
        $this->tblpY = $this->setNumericVal($value, $this->tblpY);

        return $this;
    }
}
