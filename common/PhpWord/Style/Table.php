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

use PhpOffice\PhpWord\ComplexType\TblWidth as TblWidthComplexType;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpWord\SimpleType\TblWidth;

class Table extends Border
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @deprecated Use \PhpOffice\PhpWord\SimpleType\TblWidth::AUTO instead
     */
    const WIDTH_AUTO = 'auto'; // Automatically determined width
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @deprecated Use \PhpOffice\PhpWord\SimpleType\TblWidth::PERCENT instead
     */
    const WIDTH_PERCENT = 'pct'; // Width in fiftieths (1/50) of a percent (1% = 50 unit)
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @deprecated Use \PhpOffice\PhpWord\SimpleType\TblWidth::TWIP instead
     */
    const WIDTH_TWIP = 'dxa'; // Width in twentieths (1/20) of a point (twip)

    //values for http://www.datypic.com/sc/ooxml/t-w_ST_TblLayoutType.html
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * AutoFit Table Layout
     *
     * @var string
     */
    const LAYOUT_AUTO = 'autofit';
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Fixed Width Table Layout
     *
     * @var string
     */
    const LAYOUT_FIXED = 'fixed';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Is this a first row style?
     *
     * @var bool
     */
    private $isFirstRow = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Style for first row
     *
     * @var \PhpOffice\PhpWord\Style\Table
     */
    private $firstRowStyle;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Cell margin top
     *
     * @var int
     */
    private $cellMarginTop;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Cell margin left
     *
     * @var int
     */
    private $cellMarginLeft;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Cell margin right
     *
     * @var int
     */
    private $cellMarginRight;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Cell margin bottom
     *
     * @var int
     */
    private $cellMarginBottom;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Border size inside horizontal
     *
     * @var int
     */
    private $borderInsideHSize;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Border color inside horizontal
     *
     * @var string
     */
    private $borderInsideHColor;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Border size inside vertical
     *
     * @var int
     */
    private $borderInsideVSize;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Border color inside vertical
     *
     * @var string
     */
    private $borderInsideVColor;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Shading
     *
     * @var \PhpOffice\PhpWord\Style\Shading
     */
    private $shading;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @var string
     */
    private $alignment = '';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @var int|float Width value
     */
    private $width = 0;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @var string Width unit
     */
    private $unit = TblWidth::AUTO;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @var int|float cell spacing value
     */
    protected $cellSpacing = null;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @var string Table Layout
     */
    private $layout = self::LAYOUT_AUTO;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Position
     *
     * @var \PhpOffice\PhpWord\Style\TablePosition
     */
    private $position;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var TblWidthComplexType|null */
    private $indent;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * The width of each column, computed based on the max cell width of each column
     *
     * @var int[]
     */
    private $columnWidths;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new table style
     *
     * @param mixed $tableStyle
     * @param mixed $firstRowStyle
     */
    public function __construct($tableStyle = null, $firstRowStyle = null)
    {
        // Clone first row from table style, but with certain properties disabled
        if ($firstRowStyle !== null && is_array($firstRowStyle)) {
            $this->firstRowStyle = clone $this;
            $this->firstRowStyle->isFirstRow = true;
            unset($this->firstRowStyle->firstRowStyle, $this->firstRowStyle->borderInsideHSize, $this->firstRowStyle->borderInsideHColor, $this->firstRowStyle->borderInsideVSize, $this->firstRowStyle->borderInsideVColor, $this->firstRowStyle->cellMarginTop, $this->firstRowStyle->cellMarginLeft, $this->firstRowStyle->cellMarginRight, $this->firstRowStyle->cellMarginBottom, $this->firstRowStyle->cellSpacing);
            $this->firstRowStyle->setStyleByArray($firstRowStyle);
        }

        if ($tableStyle !== null && is_array($tableStyle)) {
            $this->setStyleByArray($tableStyle);
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param float|int $cellSpacing
     */
    public function setCellSpacing($cellSpacing = null)
    {
        $this->cellSpacing = $cellSpacing;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return float|int
     */
    public function getCellSpacing()
    {
        return $this->cellSpacing;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set first row
     *
     * @return \PhpOffice\PhpWord\Style\Table
     */
    public function getFirstRow()
    {
        return $this->firstRowStyle;
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
        $this->setShading(array('fill' => $value));

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get TLRBHV Border Size
     *
     * @return int[]
     */
    public function getBorderSize()
    {
        return array(
            $this->getBorderTopSize(),
            $this->getBorderLeftSize(),
            $this->getBorderRightSize(),
            $this->getBorderBottomSize(),
            $this->getBorderInsideHSize(),
            $this->getBorderInsideVSize(),
        );
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set TLRBHV Border Size
     *
     * @param int $value Border size in eighths of a point (1/8 point)
     * @return self
     */
    public function setBorderSize($value = null)
    {
        $this->setBorderTopSize($value);
        $this->setBorderLeftSize($value);
        $this->setBorderRightSize($value);
        $this->setBorderBottomSize($value);
        $this->setBorderInsideHSize($value);
        $this->setBorderInsideVSize($value);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get TLRBHV Border Color
     *
     * @return string[]
     */
    public function getBorderColor()
    {
        return array(
            $this->getBorderTopColor(),
            $this->getBorderLeftColor(),
            $this->getBorderRightColor(),
            $this->getBorderBottomColor(),
            $this->getBorderInsideHColor(),
            $this->getBorderInsideVColor(),
        );
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set TLRBHV Border Color
     *
     * @param string $value
     * @return self
     */
    public function setBorderColor($value = null)
    {
        $this->setBorderTopColor($value);
        $this->setBorderLeftColor($value);
        $this->setBorderRightColor($value);
        $this->setBorderBottomColor($value);
        $this->setBorderInsideHColor($value);
        $this->setBorderInsideVColor($value);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get border size inside horizontal
     *
     * @return int
     */
    public function getBorderInsideHSize()
    {
        return $this->getTableOnlyProperty('borderInsideHSize');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set border size inside horizontal
     *
     * @param int $value
     * @return self
     */
    public function setBorderInsideHSize($value = null)
    {
        return $this->setTableOnlyProperty('borderInsideHSize', $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get border color inside horizontal
     *
     * @return string
     */
    public function getBorderInsideHColor()
    {
        return $this->getTableOnlyProperty('borderInsideHColor');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set border color inside horizontal
     *
     * @param string $value
     * @return self
     */
    public function setBorderInsideHColor($value = null)
    {
        return $this->setTableOnlyProperty('borderInsideHColor', $value, false);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get border size inside vertical
     *
     * @return int
     */
    public function getBorderInsideVSize()
    {
        return $this->getTableOnlyProperty('borderInsideVSize');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set border size inside vertical
     *
     * @param int $value
     * @return self
     */
    public function setBorderInsideVSize($value = null)
    {
        return $this->setTableOnlyProperty('borderInsideVSize', $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get border color inside vertical
     *
     * @return string
     */
    public function getBorderInsideVColor()
    {
        return $this->getTableOnlyProperty('borderInsideVColor');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set border color inside vertical
     *
     * @param string $value
     * @return self
     */
    public function setBorderInsideVColor($value = null)
    {
        return $this->setTableOnlyProperty('borderInsideVColor', $value, false);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get cell margin top
     *
     * @return int
     */
    public function getCellMarginTop()
    {
        return $this->getTableOnlyProperty('cellMarginTop');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set cell margin top
     *
     * @param int $value
     * @return self
     */
    public function setCellMarginTop($value = null)
    {
        return $this->setTableOnlyProperty('cellMarginTop', $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get cell margin left
     *
     * @return int
     */
    public function getCellMarginLeft()
    {
        return $this->getTableOnlyProperty('cellMarginLeft');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set cell margin left
     *
     * @param int $value
     * @return self
     */
    public function setCellMarginLeft($value = null)
    {
        return $this->setTableOnlyProperty('cellMarginLeft', $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get cell margin right
     *
     * @return int
     */
    public function getCellMarginRight()
    {
        return $this->getTableOnlyProperty('cellMarginRight');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set cell margin right
     *
     * @param int $value
     * @return self
     */
    public function setCellMarginRight($value = null)
    {
        return $this->setTableOnlyProperty('cellMarginRight', $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get cell margin bottom
     *
     * @return int
     */
    public function getCellMarginBottom()
    {
        return $this->getTableOnlyProperty('cellMarginBottom');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set cell margin bottom
     *
     * @param int $value
     * @return self
     */
    public function setCellMarginBottom($value = null)
    {
        return $this->setTableOnlyProperty('cellMarginBottom', $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get cell margin
     *
     * @return int[]
     */
    public function getCellMargin()
    {
        return array(
            $this->cellMarginTop,
            $this->cellMarginLeft,
            $this->cellMarginRight,
            $this->cellMarginBottom,
        );
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set TLRB cell margin
     *
     * @param int $value Margin in twips
     * @return self
     */
    public function setCellMargin($value = null)
    {
        $this->setCellMarginTop($value);
        $this->setCellMarginLeft($value);
        $this->setCellMarginRight($value);
        $this->setCellMarginBottom($value);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Check if any of the margin is not null
     *
     * @return bool
     */
    public function hasMargin()
    {
        $margins = $this->getCellMargin();

        return $margins !== array_filter($margins, 'is_null');
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
     * @since 0.13.0
     *
     * @return string
     */
    public function getAlignment()
    {
        return $this->alignment;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @since 0.13.0
     *
     * @param string $value
     *
     * @return self
     */
    public function setAlignment($value)
    {
        if (JcTable::isValid($value) || Jc::isValid($value)) {
            $this->alignment = $value;
        }

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @deprecated 0.13.0 Use the `getAlignment` method instead.
     *
     * @return string
     *
     * @codeCoverageIgnore
     */
    public function getAlign()
    {
        return $this->getAlignment();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @deprecated 0.13.0 Use the `setAlignment` method instead.
     *
     * @param string $value
     *
     * @return self
     *
     * @codeCoverageIgnore
     */
    public function setAlign($value = null)
    {
        return $this->setAlignment($value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get width
     *
     * @return int|float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set width
     *
     * @param int|float $value
     * @return self
     */
    public function setWidth($value = null)
    {
        $this->width = $this->setNumericVal($value, $this->width);

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
     * @return self
     */
    public function setUnit($value = null)
    {
        TblWidth::validate($value);
        $this->unit = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get layout
     *
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set layout
     *
     * @param string $value
     * @return self
     */
    public function setLayout($value = null)
    {
        $enum = array(self::LAYOUT_AUTO, self::LAYOUT_FIXED);
        $this->layout = $this->setEnumVal($value, $enum, $this->layout);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get table style only property by checking if it's a firstRow
     *
     * This is necessary since firstRow style is cloned from table style but
     * without certain properties activated, e.g. margins
     *
     * @param string $property
     * @return int|string|null
     */
    private function getTableOnlyProperty($property)
    {
        if (false === $this->isFirstRow) {
            return $this->$property;
        }

        return null;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set table style only property by checking if it's a firstRow
     *
     * This is necessary since firstRow style is cloned from table style but
     * without certain properties activated, e.g. margins
     *
     * @param string $property
     * @param int|string $value
     * @param bool $isNumeric
     * @return self
     */
    private function setTableOnlyProperty($property, $value, $isNumeric = true)
    {
        if (false === $this->isFirstRow) {
            if (true === $isNumeric) {
                $this->$property = $this->setNumericVal($value, $this->$property);
            } else {
                $this->$property = $value;
            }
        }

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get position
     *
     * @return \PhpOffice\PhpWord\Style\TablePosition
     */
    public function getPosition()
    {
        return $this->position;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set position
     *
     * @param mixed $value
     * @return self
     */
    public function setPosition($value = null)
    {
        $this->setObjectVal($value, 'TablePosition', $this->position);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return TblWidthComplexType
     */
    public function getIndent()
    {
        return $this->indent;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param TblWidthComplexType $indent
     * @return self
     * @see http://www.datypic.com/sc/ooxml/e-w_tblInd-1.html
     */
    public function setIndent(TblWidthComplexType $indent)
    {
        $this->indent = $indent;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the columnWidths
     *
     * @return number[]
     */
    public function getColumnWidths()
    {
        return $this->columnWidths;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * The column widths
     *
     * @param int[] $value
     */
    public function setColumnWidths(array $value = null)
    {
        $this->columnWidths = $value;
    }
}
