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
 * Shape style
 *
 * @since 0.12.0
 * @todo Skew http://www.schemacentral.com/sc/ooxml/t-o_CT_Skew.html
 */
class Shape extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Points
     *
     * - Arc: startAngle endAngle; 0 = top center, moving clockwise
     * - Curve: from-x1,from-y1 to-x2,to-y2 control1-x,control1-y control2-x,control2-y
     * - Line: from-x1,from-y1 to-x2,to-y2
     * - Polyline: x1,y1 x2,y2 ...
     * - Rect and oval: Not applicable
     *
     * @var string
     */
    private $points;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Roundness measure of corners; 0 = straightest (rectangular); 1 = roundest (circle/oval)
     *
     * Only for rect
     *
     * @var int|float
     */
    private $roundness;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Frame
     *
     * @var \PhpOffice\PhpWord\Style\Frame
     */
    private $frame;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Fill
     *
     * @var \PhpOffice\PhpWord\Style\Fill
     */
    private $fill;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Outline
     *
     * @var \PhpOffice\PhpWord\Style\Outline
     */
    private $outline;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Shadow
     *
     * @var \PhpOffice\PhpWord\Style\Shadow
     */
    private $shadow;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * 3D extrusion
     *
     * @var \PhpOffice\PhpWord\Style\Extrusion
     */
    private $extrusion;

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
     * Get points
     *
     * @return string
     */
    public function getPoints()
    {
        return $this->points;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set points
     *
     * @param string $value
     * @return self
     */
    public function setPoints($value = null)
    {
        $this->points = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get roundness
     *
     * @return int|float
     */
    public function getRoundness()
    {
        return $this->roundness;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set roundness
     *
     * @param int|float $value
     * @return self
     */
    public function setRoundness($value = null)
    {
        $this->roundness = $this->setNumericVal($value, null);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get frame
     *
     * @return \PhpOffice\PhpWord\Style\Frame
     */
    public function getFrame()
    {
        return $this->frame;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set frame
     *
     * @param mixed $value
     * @return self
     */
    public function setFrame($value = null)
    {
        $this->setObjectVal($value, 'Frame', $this->frame);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get fill
     *
     * @return \PhpOffice\PhpWord\Style\Fill
     */
    public function getFill()
    {
        return $this->fill;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set fill
     *
     * @param mixed $value
     * @return self
     */
    public function setFill($value = null)
    {
        $this->setObjectVal($value, 'Fill', $this->fill);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get outline
     *
     * @return \PhpOffice\PhpWord\Style\Outline
     */
    public function getOutline()
    {
        return $this->outline;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set outline
     *
     * @param mixed $value
     * @return self
     */
    public function setOutline($value = null)
    {
        $this->setObjectVal($value, 'Outline', $this->outline);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get shadow
     *
     * @return \PhpOffice\PhpWord\Style\Shadow
     */
    public function getShadow()
    {
        return $this->shadow;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set shadow
     *
     * @param mixed $value
     * @return self
     */
    public function setShadow($value = null)
    {
        $this->setObjectVal($value, 'Shadow', $this->shadow);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get 3D extrusion
     *
     * @return \PhpOffice\PhpWord\Style\Extrusion
     */
    public function getExtrusion()
    {
        return $this->extrusion;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set 3D extrusion
     *
     * @param mixed $value
     * @return self
     */
    public function setExtrusion($value = null)
    {
        $this->setObjectVal($value, 'Extrusion', $this->extrusion);

        return $this;
    }
}
