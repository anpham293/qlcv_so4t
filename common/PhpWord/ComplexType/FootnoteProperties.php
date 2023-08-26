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

namespace PhpOffice\PhpWord\ComplexType;

use PhpOffice\PhpWord\SimpleType\NumberFormat;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Footnote properties
 *
 * @see http://www.datypic.com/sc/ooxml/e-w_footnotePr-1.html
 */
final class FootnoteProperties
{
    const RESTART_NUMBER_CONTINUOUS = 'continuous';
    const RESTART_NUMBER_EACH_SECTION = 'eachSect';
    const RESTART_NUMBER_EACH_PAGE = 'eachPage';

    const POSITION_PAGE_BOTTOM = 'pageBottom';
    const POSITION_BENEATH_TEXT = 'beneathText';
    const POSITION_SECTION_END = 'sectEnd';
    const POSITION_DOC_END = 'docEnd';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Footnote Positioning Location
     *
     * @var string
     */
    private $pos;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Footnote Numbering Format w:numFmt, one of PhpOffice\PhpWord\SimpleType\NumberFormat
     *
     * @var string
     */
    private $numFmt;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Footnote and Endnote Numbering Starting Value
     *
     * @var float
     */
    private $numStart;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Footnote and Endnote Numbering Restart Location
     *
     * @var string
     */
    private $numRestart;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the Footnote Positioning Location
     *
     * @return string
     */
    public function getPos()
    {
        return $this->pos;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set the Footnote Positioning Location (pageBottom, beneathText, sectEnd, docEnd)
     *
     * @param string $pos
     * @throws \InvalidArgumentException
     * @return self
     */
    public function setPos($pos)
    {
        $position = array(
            self::POSITION_PAGE_BOTTOM,
            self::POSITION_BENEATH_TEXT,
            self::POSITION_SECTION_END,
            self::POSITION_DOC_END,
        );

        if (in_array($pos, $position)) {
            $this->pos = $pos;
        } else {
            throw new \InvalidArgumentException('Invalid value, on of ' . implode(', ', $position) . ' possible');
        }

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the Footnote Numbering Format
     *
     * @return string
     */
    public function getNumFmt()
    {
        return $this->numFmt;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set the Footnote Numbering Format
     *
     * @param string $numFmt One of NumberFormat
     * @return self
     */
    public function setNumFmt($numFmt)
    {
        NumberFormat::validate($numFmt);
        $this->numFmt = $numFmt;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the Footnote Numbering Format
     *
     * @return float
     */
    public function getNumStart()
    {
        return $this->numStart;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set the Footnote Numbering Format
     *
     * @param float $numStart
     * @return self
     */
    public function setNumStart($numStart)
    {
        $this->numStart = $numStart;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the Footnote and Endnote Numbering Starting Value
     *
     * @return string
     */
    public function getNumRestart()
    {
        return $this->numRestart;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set the Footnote and Endnote Numbering Starting Value (continuous, eachSect, eachPage)
     *
     * @param  string $numRestart
     * @throws \InvalidArgumentException
     * @return self
     */
    public function setNumRestart($numRestart)
    {
        $restartNumbers = array(
            self::RESTART_NUMBER_CONTINUOUS,
            self::RESTART_NUMBER_EACH_SECTION,
            self::RESTART_NUMBER_EACH_PAGE,
        );

        if (in_array($numRestart, $restartNumbers)) {
            $this->numRestart = $numRestart;
        } else {
            throw new \InvalidArgumentException('Invalid value, on of ' . implode(', ', $restartNumbers) . ' possible');
        }

        return $this;
    }
}
