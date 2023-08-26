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

use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\SimpleType\NumberFormat;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Numbering level definition
 *
 * @see  http://www.schemacentral.com/sc/ooxml/e-w_lvl-1.html
 * @since 0.10.0
 */
class NumberingLevel extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Level number, 0 to 8 (total 9 levels)
     *
     * @var int
     */
    private $level = 0;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Starting value w:start
     *
     * @var int
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_start-1.html
     */
    private $start = 1;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Numbering format w:numFmt, one of PhpOffice\PhpWord\SimpleType\NumberFormat
     *
     * @var string
     * @see  http://www.schemacentral.com/sc/ooxml/t-w_ST_NumberFormat.html
     */
    private $format;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Restart numbering level symbol w:lvlRestart
     *
     * @var int
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_lvlRestart-1.html
     */
    private $restart;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Related paragraph style
     *
     * @var string
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_pStyle-2.html
     */
    private $pStyle;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Content between numbering symbol and paragraph text w:suff
     *
     * @var string tab|space|nothing
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_suff-1.html
     */
    private $suffix = 'tab';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Numbering level text e.g. %1 for nonbullet or bullet character
     *
     * @var string
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_lvlText-1.html
     */
    private $text;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Justification, w:lvlJc
     *
     * @var string, one of PhpOffice\PhpWord\SimpleType\Jc
     */
    private $alignment = '';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Left
     *
     * @var int
     */
    private $left;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Hanging
     *
     * @var int
     */
    private $hanging;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Tab position
     *
     * @var int
     */
    private $tabPos;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Font family
     *
     * @var string
     */
    private $font;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Hint default|eastAsia|cs
     *
     * @var string
     * @see  http://www.schemacentral.com/sc/ooxml/a-w_hint-1.html
     */
    private $hint;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get level
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set level
     *
     * @param int $value
     * @return self
     */
    public function setLevel($value)
    {
        $this->level = $this->setIntVal($value, $this->level);

        return $this;
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
    public function setStart($value)
    {
        $this->start = $this->setIntVal($value, $this->start);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set format
     *
     * @param string $value
     * @return self
     */
    public function setFormat($value)
    {
        $this->format = $this->setEnumVal($value, NumberFormat::values(), $this->format);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get restart
     *
     * @return int
     */
    public function getRestart()
    {
        return $this->restart;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set restart
     *
     * @param int $value
     * @return self
     */
    public function setRestart($value)
    {
        $this->restart = $this->setIntVal($value, $this->restart);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get related paragraph style
     *
     * @return string
     */
    public function getPStyle()
    {
        return $this->pStyle;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set  related paragraph style
     *
     * @param string $value
     * @return self
     */
    public function setPStyle($value)
    {
        $this->pStyle = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get suffix
     *
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set suffix
     *
     * @param string $value
     * @return self
     */
    public function setSuffix($value)
    {
        $enum = array('tab', 'space', 'nothing');
        $this->suffix = $this->setEnumVal($value, $enum, $this->suffix);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set text
     *
     * @param string $value
     * @return self
     */
    public function setText($value)
    {
        $this->text = $value;

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
        if (Jc::isValid($value)) {
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
    public function setAlign($value)
    {
        return $this->setAlignment($value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get left
     *
     * @return int
     */
    public function getLeft()
    {
        return $this->left;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set left
     *
     * @param int $value
     * @return self
     */
    public function setLeft($value)
    {
        $this->left = $this->setIntVal($value, $this->left);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get hanging
     *
     * @return int
     */
    public function getHanging()
    {
        return $this->hanging;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set hanging
     *
     * @param int $value
     * @return self
     */
    public function setHanging($value)
    {
        $this->hanging = $this->setIntVal($value, $this->hanging);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get tab
     *
     * @return int
     */
    public function getTabPos()
    {
        return $this->tabPos;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set tab
     *
     * @param int $value
     * @return self
     */
    public function setTabPos($value)
    {
        $this->tabPos = $this->setIntVal($value, $this->tabPos);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get font
     *
     * @return string
     */
    public function getFont()
    {
        return $this->font;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set font
     *
     * @param string $value
     * @return self
     */
    public function setFont($value)
    {
        $this->font = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get hint
     *
     * @return string
     */
    public function getHint()
    {
        return $this->hint;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set hint
     *
     * @param string $value
     * @return self
     */
    public function setHint($value = null)
    {
        $enum = array('default', 'eastAsia', 'cs');
        $this->hint = $this->setEnumVal($value, $enum, $this->hint);

        return $this;
    }
}
