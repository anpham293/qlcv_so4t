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

use PhpOffice\PhpWord\SimpleType\TblWidth;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Table cell style
 */
class Cell extends Border
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Vertical alignment constants
     *
     * @const string
     */
    const VALIGN_TOP = 'top';
    const VALIGN_CENTER = 'center';
    const VALIGN_BOTTOM = 'bottom';
    const VALIGN_BOTH = 'both';

    //Text direction constants
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Left to Right, Top to Bottom
     */
    const TEXT_DIR_LRTB = 'lrTb';
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Top to Bottom, Right to Left
     */
    const TEXT_DIR_TBRL = 'tbRl';
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Bottom to Top, Left to Right
     */
    const TEXT_DIR_BTLR = 'btLr';
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Left to Right, Top to Bottom Rotated
     */
    const TEXT_DIR_LRTBV = 'lrTbV';
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Top to Bottom, Right to Left Rotated
     */
    const TEXT_DIR_TBRLV = 'tbRlV';
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Top to Bottom, Left to Right Rotated
     */
    const TEXT_DIR_TBLRV = 'tbLrV';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Vertical merge (rowspan) constants
     *
     * @const string
     */
    const VMERGE_RESTART = 'restart';
    const VMERGE_CONTINUE = 'continue';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Default border color
     *
     * @const string
     */
    const DEFAULT_BORDER_COLOR = '000000';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Vertical align (top, center, both, bottom)
     *
     * @var string
     */
    private $vAlign;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Text Direction
     *
     * @var string
     */
    private $textDirection;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * colspan
     *
     * @var int
     */
    private $gridSpan;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * rowspan (restart, continue)
     *
     * - restart: Start/restart merged region
     * - continue: Continue merged region
     *
     * @var string
     */
    private $vMerge;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Shading
     *
     * @var \PhpOffice\PhpWord\Style\Shading
     */
    private $shading;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Width
     *
     * @var int
     */
    private $width;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Width unit
     *
     * @var string
     */
    private $unit = TblWidth::TWIP;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get vertical align.
     *
     * @return string
     */
    public function getVAlign()
    {
        return $this->vAlign;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set vertical align
     *
     * @param string $value
     * @return self
     */
    public function setVAlign($value = null)
    {
        $enum = array(self::VALIGN_TOP, self::VALIGN_CENTER, self::VALIGN_BOTTOM, self::VALIGN_BOTH);
        $this->vAlign = $this->setEnumVal($value, $enum, $this->vAlign);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get text direction.
     *
     * @return string
     */
    public function getTextDirection()
    {
        return $this->textDirection;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set text direction
     *
     * @param string $value
     * @return self
     */
    public function setTextDirection($value = null)
    {
        $enum = array(self::TEXT_DIR_BTLR, self::TEXT_DIR_TBRL);
        $this->textDirection = $this->setEnumVal($value, $enum, $this->textDirection);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get background
     *
     * @return string
     */
    public function getBgColor()
    {
        if ($this->shading !== null) {
            return $this->shading->getFill();
        }

        return null;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set background
     *
     * @param string $value
     * @return self
     */
    public function setBgColor($value = null)
    {
        return $this->setShading(array('fill' => $value));
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get grid span (colspan).
     *
     * @return int
     */
    public function getGridSpan()
    {
        return $this->gridSpan;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set grid span (colspan)
     *
     * @param int $value
     * @return self
     */
    public function setGridSpan($value = null)
    {
        $this->gridSpan = $this->setIntVal($value, $this->gridSpan);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get vertical merge (rowspan).
     *
     * @return string
     */
    public function getVMerge()
    {
        return $this->vMerge;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set vertical merge (rowspan)
     *
     * @param string $value
     * @return self
     */
    public function setVMerge($value = null)
    {
        $enum = array(self::VMERGE_RESTART, self::VMERGE_CONTINUE);
        $this->vMerge = $this->setEnumVal($value, $enum, $this->vMerge);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get shading
     *
     * @return \PhpOffice\PhpWord\Style\Shading
     */
    public function getShading()
    {
        return $this->shading;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set shading
     *
     * @param mixed $value
     * @return self
     */
    public function setShading($value = null)
    {
        $this->setObjectVal($value, 'Shading', $this->shading);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get cell width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set cell width
     *
     * @param int $value
     * @return self
     */
    public function setWidth($value)
    {
        $this->setIntVal($value);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get width unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set width unit
     *
     * @param string $value
     */
    public function setUnit($value)
    {
        $this->unit = $this->setEnumVal($value, array(TblWidth::AUTO, TblWidth::PERCENT, TblWidth::TWIP), TblWidth::TWIP);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get default border color
     *
     * @deprecated 0.10.0
     *
     * @codeCoverageIgnore
     */
    public function getDefaultBorderColor()
    {
        return self::DEFAULT_BORDER_COLOR;
    }
}
