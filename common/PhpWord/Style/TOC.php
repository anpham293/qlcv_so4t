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
 * TOC style
 */
class TOC extends Tab
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Tab leader types for backward compatibility
     *
     * @deprecated 0.11.0
     *
     * @const string
     */
    const TABLEADER_DOT = self::TAB_LEADER_DOT;
    const TABLEADER_UNDERSCORE = self::TAB_LEADER_UNDERSCORE;
    const TABLEADER_LINE = self::TAB_LEADER_HYPHEN;
    const TABLEADER_NONE = self::TAB_LEADER_NONE;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Indent
     *
     * @var int|float (twip)
     */
    private $indent = 200;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create a new TOC Style
     */
    public function __construct()
    {
        parent::__construct(self::TAB_STOP_RIGHT, 9062, self::TAB_LEADER_DOT);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Tab Position
     *
     * @return int|float
     */
    public function getTabPos()
    {
        return $this->getPosition();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Tab Position
     *
     * @param int|float $value
     * @return self
     */
    public function setTabPos($value)
    {
        return $this->setPosition($value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Tab Leader
     *
     * @return string
     */
    public function getTabLeader()
    {
        return $this->getLeader();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Tab Leader
     *
     * @param string $value
     * @return self
     */
    public function setTabLeader($value = self::TAB_LEADER_DOT)
    {
        return $this->setLeader($value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Indent
     *
     * @return int|float
     */
    public function getIndent()
    {
        return $this->indent;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Indent
     *
     * @param int|float $value
     * @return self
     */
    public function setIndent($value)
    {
        $this->indent = $this->setNumericVal($value, $this->indent);

        return $this;
    }
}
