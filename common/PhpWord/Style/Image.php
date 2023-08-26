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
 * Image and memory image style
 */
class Image extends Frame
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Backward compatibility constants
     *
     * @const string
     */
    const WRAPPING_STYLE_INLINE = self::WRAP_INLINE;
    const WRAPPING_STYLE_SQUARE = self::WRAP_SQUARE;
    const WRAPPING_STYLE_TIGHT = self::WRAP_TIGHT;
    const WRAPPING_STYLE_BEHIND = self::WRAP_BEHIND;
    const WRAPPING_STYLE_INFRONT = self::WRAP_INFRONT;
    const POSITION_HORIZONTAL_LEFT = self::POS_LEFT;
    const POSITION_HORIZONTAL_CENTER = self::POS_CENTER;
    const POSITION_HORIZONTAL_RIGHT = self::POS_RIGHT;
    const POSITION_VERTICAL_TOP = self::POS_TOP;
    const POSITION_VERTICAL_CENTER = self::POS_CENTER;
    const POSITION_VERTICAL_BOTTOM = self::POS_BOTTOM;
    const POSITION_VERTICAL_INSIDE = self::POS_INSIDE;
    const POSITION_VERTICAL_OUTSIDE = self::POS_OUTSIDE;
    const POSITION_RELATIVE_TO_MARGIN = self::POS_RELTO_MARGIN;
    const POSITION_RELATIVE_TO_PAGE = self::POS_RELTO_PAGE;
    const POSITION_RELATIVE_TO_COLUMN = self::POS_RELTO_COLUMN;
    const POSITION_RELATIVE_TO_CHAR = self::POS_RELTO_CHAR;
    const POSITION_RELATIVE_TO_TEXT = self::POS_RELTO_TEXT;
    const POSITION_RELATIVE_TO_LINE = self::POS_RELTO_LINE;
    const POSITION_RELATIVE_TO_LMARGIN = self::POS_RELTO_LMARGIN;
    const POSITION_RELATIVE_TO_RMARGIN = self::POS_RELTO_RMARGIN;
    const POSITION_RELATIVE_TO_TMARGIN = self::POS_RELTO_TMARGIN;
    const POSITION_RELATIVE_TO_BMARGIN = self::POS_RELTO_BMARGIN;
    const POSITION_RELATIVE_TO_IMARGIN = self::POS_RELTO_IMARGIN;
    const POSITION_RELATIVE_TO_OMARGIN = self::POS_RELTO_OMARGIN;
    const POSITION_ABSOLUTE = self::POS_ABSOLUTE;
    const POSITION_RELATIVE = self::POS_RELATIVE;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new instance
     */
    public function __construct()
    {
        parent::__construct();
        $this->setUnit(self::UNIT_PT);

        // Backward compatibility setting
        // @todo Remove on 1.0.0
        $this->setWrap(self::WRAPPING_STYLE_INLINE);
        $this->setHPos(self::POSITION_HORIZONTAL_LEFT);
        $this->setHPosRelTo(self::POSITION_RELATIVE_TO_CHAR);
        $this->setVPos(self::POSITION_VERTICAL_TOP);
        $this->setVPosRelTo(self::POSITION_RELATIVE_TO_LINE);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get margin top
     *
     * @return int|float
     */
    public function getMarginTop()
    {
        return $this->getTop();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set margin top
     *
     * @ignoreScrutinizerPatch
     * @param int|float $value
     * @return self
     */
    public function setMarginTop($value = 0)
    {
        $this->setTop($value);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get margin left
     *
     * @return int|float
     */
    public function getMarginLeft()
    {
        return $this->getLeft();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set margin left
     *
     * @ignoreScrutinizerPatch
     * @param int|float $value
     * @return self
     */
    public function setMarginLeft($value = 0)
    {
        $this->setLeft($value);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get wrapping style
     *
     * @return string
     */
    public function getWrappingStyle()
    {
        return $this->getWrap();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set wrapping style
     *
     * @param string $wrappingStyle
     *
     * @throws \InvalidArgumentException
     *
     * @return self
     */
    public function setWrappingStyle($wrappingStyle)
    {
        $this->setWrap($wrappingStyle);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get positioning type
     *
     * @return string
     */
    public function getPositioning()
    {
        return $this->getPos();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set positioning type
     *
     * @param string $positioning
     *
     * @throws \InvalidArgumentException
     *
     * @return self
     */
    public function setPositioning($positioning)
    {
        $this->setPos($positioning);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get horizontal alignment
     *
     * @return string
     */
    public function getPosHorizontal()
    {
        return $this->getHPos();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set horizontal alignment
     *
     * @param string $alignment
     *
     * @throws \InvalidArgumentException
     *
     * @return self
     */
    public function setPosHorizontal($alignment)
    {
        $this->setHPos($alignment);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get vertical alignment
     *
     * @return string
     */
    public function getPosVertical()
    {
        return $this->getVPos();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set vertical alignment
     *
     * @param string $alignment
     *
     * @throws \InvalidArgumentException
     *
     * @return self
     */
    public function setPosVertical($alignment)
    {
        $this->setVPos($alignment);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get horizontal relation
     *
     * @return string
     */
    public function getPosHorizontalRel()
    {
        return $this->getHPosRelTo();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set horizontal relation
     *
     * @param string $relto
     *
     * @throws \InvalidArgumentException
     *
     * @return self
     */
    public function setPosHorizontalRel($relto)
    {
        $this->setHPosRelTo($relto);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get vertical relation
     *
     * @return string
     */
    public function getPosVerticalRel()
    {
        return $this->getVPosRelTo();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set vertical relation
     *
     * @param string $relto
     *
     * @throws \InvalidArgumentException
     *
     * @return self
     */
    public function setPosVerticalRel($relto)
    {
        $this->setVPosRelTo($relto);

        return $this;
    }
}
