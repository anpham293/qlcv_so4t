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
 * Line numbering style
 *
 * @see  http://www.schemacentral.com/sc/ooxml/t-w_CT_LineNumber.html
 * @since 0.10.0
 */
class LineNumbering extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@const string Line numbering restart setting http://www.schemacentral.com/sc/ooxml/a-w_restart-1.html */
    const LINE_NUMBERING_CONTINUOUS = 'continuous';
    const LINE_NUMBERING_NEW_PAGE = 'newPage';
    const LINE_NUMBERING_NEW_SECTION = 'newSection';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Line numbering starting value
     *
     * @var int
     */
    private $start = 1;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Line number increments
     *
     * @var int
     */
    private $increment = 1;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Distance between text and line numbering in twip
     *
     * @var int|float
     */
    private $distance;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Line numbering restart setting continuous|newPage|newSection
     *
     * @var string
     * @see  http://www.schemacentral.com/sc/ooxml/a-w_restart-1.html
     */
    private $restart;

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
     * Get start
     *
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set start
     *
     * @param int $value
     * @return self
     */
    public function setStart($value = null)
    {
        $this->start = $this->setIntVal($value, $this->start);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get increment
     *
     * @return int
     */
    public function getIncrement()
    {
        return $this->increment;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set increment
     *
     * @param int $value
     * @return self
     */
    public function setIncrement($value = null)
    {
        $this->increment = $this->setIntVal($value, $this->increment);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get distance
     *
     * @return int|float
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set distance
     *
     * @param int|float $value
     * @return self
     */
    public function setDistance($value = null)
    {
        $this->distance = $this->setNumericVal($value, $this->distance);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get restart
     *
     * @return string
     */
    public function getRestart()
    {
        return $this->restart;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set distance
     *
     * @param string $value
     * @return self
     */
    public function setRestart($value = null)
    {
        $enum = array(self::LINE_NUMBERING_CONTINUOUS, self::LINE_NUMBERING_NEW_PAGE, self::LINE_NUMBERING_NEW_SECTION);
        $this->restart = $this->setEnumVal($value, $enum, $this->restart);

        return $this;
    }
}
