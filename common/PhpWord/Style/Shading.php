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
 * Shading style
 *
 * @see  http://www.schemacentral.com/sc/ooxml/t-w_CT_Shd.html
 * @since 0.10.0
 */
class Shading extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Pattern constants (partly)
     *
     * @const string
     * @see  http://www.schemacentral.com/sc/ooxml/t-w_ST_Shd.html
     */
    const PATTERN_CLEAR = 'clear'; // No pattern
    const PATTERN_SOLID = 'solid'; // 100% fill pattern
    const PATTERN_HSTRIPE = 'horzStripe'; // Horizontal stripe pattern
    const PATTERN_VSTRIPE = 'vertStripe'; // Vertical stripe pattern
    const PATTERN_DSTRIPE = 'diagStripe'; // Diagonal stripe pattern
    const PATTERN_HCROSS = 'horzCross'; // Horizontal cross pattern
    const PATTERN_DCROSS = 'diagCross'; // Diagonal cross pattern

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Shading pattern
     *
     * @var string
     * @see  http://www.schemacentral.com/sc/ooxml/t-w_ST_Shd.html
     */
    private $pattern = self::PATTERN_CLEAR;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Shading pattern color
     *
     * @var string
     */
    private $color;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Shading background color
     *
     * @var string
     */
    private $fill;

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
     * Get pattern
     *
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set pattern
     *
     * @param string $value
     * @return self
     */
    public function setPattern($value = null)
    {
        $enum = array(
            self::PATTERN_CLEAR, self::PATTERN_SOLID, self::PATTERN_HSTRIPE,
            self::PATTERN_VSTRIPE, self::PATTERN_DSTRIPE, self::PATTERN_HCROSS, self::PATTERN_DCROSS,
        );
        $this->pattern = $this->setEnumVal($value, $enum, $this->pattern);

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
     * Set pattern
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
     * Get fill
     *
     * @return string
     */
    public function getFill()
    {
        return $this->fill;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set fill
     *
     * @param string $value
     * @return self
     */
    public function setFill($value = null)
    {
        $this->fill = $value;

        return $this;
    }
}
