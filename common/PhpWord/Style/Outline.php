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
 * Outline defines the line/border of the object
 *
 * @see  http://www.schemacentral.com/sc/ooxml/t-v_CT_Stroke.html
 * @see  http://www.w3.org/TR/1998/NOTE-VML-19980513#_Toc416858395
 * @since 0.12.0
 */
class Outline extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Line style constants
     *
     * @see  http://www.schemacentral.com/sc/ooxml/t-v_ST_StrokeLineStyle.html
     * @const string
     */
    const LINE_SINGLE = 'single';
    const LINE_THIN_THIN = 'thinThin';
    const LINE_THIN_THICK = 'thinThick';
    const LINE_THICK_THIN = 'thickThin';
    const LINE_THICK_BETWEEN_THIN = 'thickBetweenThin';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Line style constants
     *
     * @see  http://www.schemacentral.com/sc/ooxml/t-v_ST_StrokeEndCap.html
     * @const string
     */
    const ENDCAP_FLAT = 'flat';
    const ENDCAP_SQUARE = 'square';
    const ENDCAP_ROUND = 'round';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Arrowhead type constants
     *
     * @see  http://www.schemacentral.com/sc/ooxml/t-v_ST_StrokeArrowType.html
     * @const string
     */
    const ARROW_NONE = 'none';
    const ARROW_BLOCK = 'block';
    const ARROW_CLASSIC = 'classic';
    const ARROW_OVAL = 'oval';
    const ARROW_DIAMOND = 'diamond';
    const ARROW_OPEN = 'open';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Unit; No set method for now
     *
     * @var string
     */
    private $unit = 'pt';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Outline weight
     *
     * @var int|float
     */
    private $weight;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Outline color
     *
     * @var string
     */
    private $color;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Dash type
     *
     * @var string
     */
    private $dash;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Line style
     *
     * @var string
     */
    private $line;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * End cap
     *
     * @var string
     * @see  http://www.schemacentral.com/sc/ooxml/t-v_ST_StrokeEndCap.html
     */
    private $endCap;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Start arrow type
     *
     * @var string
     */
    private $startArrow;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * End arrow type
     *
     * @var string
     */
    private $endArrow;

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
     * Get unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get weight
     *
     * @return int|float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set weight
     *
     * @param int|float $value
     * @return self
     */
    public function setWeight($value = null)
    {
        $this->weight = $this->setNumericVal($value, null);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set color
     *
     * @param string $value
     * @return self
     */
    public function setColor($value = null)
    {
        $this->color = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get dash type
     *
     * @return string
     */
    public function getDash()
    {
        return $this->dash;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set dash type
     *
     * @param string $value
     * @return self
     */
    public function setDash($value = null)
    {
        $this->dash = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get line style
     *
     * @return string
     */
    public function getLine()
    {
        return $this->line;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set line style
     *
     * @param string $value
     * @return self
     */
    public function setLine($value = null)
    {
        $enum = array(self::LINE_SINGLE, self::LINE_THIN_THIN, self::LINE_THIN_THICK,
            self::LINE_THICK_THIN, self::LINE_THICK_BETWEEN_THIN, );
        $this->line = $this->setEnumVal($value, $enum, null);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get endCap style
     *
     * @return string
     */
    public function getEndCap()
    {
        return $this->endCap;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set endCap style
     *
     * @param string $value
     * @return self
     */
    public function setEndCap($value = null)
    {
        $enum = array(self::ENDCAP_FLAT, self::ENDCAP_SQUARE, self::ENDCAP_ROUND);
        $this->endCap = $this->setEnumVal($value, $enum, null);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get startArrow
     *
     * @return string
     */
    public function getStartArrow()
    {
        return $this->startArrow;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set pattern
     *
     * @param string $value
     * @return self
     */
    public function setStartArrow($value = null)
    {
        $enum = array(self::ARROW_NONE, self::ARROW_BLOCK, self::ARROW_CLASSIC,
            self::ARROW_OVAL, self::ARROW_DIAMOND, self::ARROW_OPEN, );
        $this->startArrow = $this->setEnumVal($value, $enum, null);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get endArrow
     *
     * @return string
     */
    public function getEndArrow()
    {
        return $this->endArrow;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set pattern
     *
     * @param string $value
     * @return self
     */
    public function setEndArrow($value = null)
    {
        $enum = array(self::ARROW_NONE, self::ARROW_BLOCK, self::ARROW_CLASSIC,
            self::ARROW_OVAL, self::ARROW_DIAMOND, self::ARROW_OPEN, );
        $this->endArrow = $this->setEnumVal($value, $enum, null);

        return $this;
    }
}
