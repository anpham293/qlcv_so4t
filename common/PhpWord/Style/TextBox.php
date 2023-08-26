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
 * TextBox style
 *
 * @since 0.11.0
 */
class TextBox extends Image
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * margin top
     *
     * @var int
     */
    private $innerMarginTop = null;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * margin left
     *
     * @var int
     */
    private $innerMarginLeft = null;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * margin right
     *
     * @var int
     */
    private $innerMarginRight = null;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Cell margin bottom
     *
     * @var int
     */
    private $innerMarginBottom = null;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * border size
     *
     * @var int
     */
    private $borderSize = null;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * border color
     *
     * @var string
     */
    private $borderColor;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set margin top.
     *
     * @param int $value
     */
    public function setInnerMarginTop($value = null)
    {
        $this->innerMarginTop = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get margin top
     *
     * @return int
     */
    public function getInnerMarginTop()
    {
        return $this->innerMarginTop;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set margin left.
     *
     * @param int $value
     */
    public function setInnerMarginLeft($value = null)
    {
        $this->innerMarginLeft = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get margin left
     *
     * @return int
     */
    public function getInnerMarginLeft()
    {
        return $this->innerMarginLeft;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set margin right.
     *
     * @param int $value
     */
    public function setInnerMarginRight($value = null)
    {
        $this->innerMarginRight = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get margin right
     *
     * @return int
     */
    public function getInnerMarginRight()
    {
        return $this->innerMarginRight;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set margin bottom.
     *
     * @param int $value
     */
    public function setInnerMarginBottom($value = null)
    {
        $this->innerMarginBottom = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get margin bottom
     *
     * @return int
     */
    public function getInnerMarginBottom()
    {
        return $this->innerMarginBottom;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set TLRB cell margin.
     *
     * @param int $value Margin in twips
     */
    public function setInnerMargin($value = null)
    {
        $this->setInnerMarginTop($value);
        $this->setInnerMarginLeft($value);
        $this->setInnerMarginRight($value);
        $this->setInnerMarginBottom($value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get cell margin
     *
     * @return int[]
     */
    public function getInnerMargin()
    {
        return array($this->innerMarginLeft, $this->innerMarginTop, $this->innerMarginRight, $this->innerMarginBottom);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Has inner margin?
     *
     * @return bool
     */
    public function hasInnerMargins()
    {
        $hasInnerMargins = false;
        $margins = $this->getInnerMargin();
        $numMargins = count($margins);
        for ($i = 0; $i < $numMargins; $i++) {
            if ($margins[$i] !== null) {
                $hasInnerMargins = true;
            }
        }

        return $hasInnerMargins;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set border size.
     *
     * @param int $value Size in points
     */
    public function setBorderSize($value = null)
    {
        $this->borderSize = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get border size
     *
     * @return int
     */
    public function getBorderSize()
    {
        return $this->borderSize;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set border color.
     *
     * @param string $value
     */
    public function setBorderColor($value = null)
    {
        $this->borderColor = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get border color
     *
     * @return string
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }
}
