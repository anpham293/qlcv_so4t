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

namespace PhpOffice\PhpWord;

use PhpOffice\PhpWord\Style\AbstractStyle;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Style\Numbering;
use PhpOffice\PhpWord\Style\Paragraph;
use PhpOffice\PhpWord\Style\Table;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Style collection
 */
class Style
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Style register
     *
     * @var array
     */
    private static $styles = array();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Add paragraph style
     *
     * @param string $styleName
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $styles
     * @return \PhpOffice\PhpWord\Style\Paragraph
     */
    public static function addParagraphStyle($styleName, $styles)
    {
        return self::setStyleValues($styleName, new Paragraph(), $styles);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Add font style
     *
     * @param string $styleName
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $fontStyle
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $paragraphStyle
     * @return \PhpOffice\PhpWord\Style\Font
     */
    public static function addFontStyle($styleName, $fontStyle, $paragraphStyle = null)
    {
        return self::setStyleValues($styleName, new Font('text', $paragraphStyle), $fontStyle);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Add link style
     *
     * @param string $styleName
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $styles
     * @return \PhpOffice\PhpWord\Style\Font
     */
    public static function addLinkStyle($styleName, $styles)
    {
        return self::setStyleValues($styleName, new Font('link'), $styles);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Add numbering style
     *
     * @param string $styleName
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $styleValues
     * @return \PhpOffice\PhpWord\Style\Numbering
     * @since 0.10.0
     */
    public static function addNumberingStyle($styleName, $styleValues)
    {
        return self::setStyleValues($styleName, new Numbering(), $styleValues);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Add title style
     *
     * @param int|null $depth Provide null to set title font
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $fontStyle
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $paragraphStyle
     * @return \PhpOffice\PhpWord\Style\Font
     */
    public static function addTitleStyle($depth, $fontStyle, $paragraphStyle = null)
    {
        if (empty($depth)) {
            $styleName = 'Title';
        } else {
            $styleName = "Heading_{$depth}";
        }

        return self::setStyleValues($styleName, new Font('title', $paragraphStyle), $fontStyle);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Add table style
     *
     * @param string $styleName
     * @param array $styleTable
     * @param array|null $styleFirstRow
     * @return \PhpOffice\PhpWord\Style\Table
     */
    public static function addTableStyle($styleName, $styleTable, $styleFirstRow = null)
    {
        return self::setStyleValues($styleName, new Table($styleTable, $styleFirstRow), null);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Count styles
     *
     * @return int
     * @since 0.10.0
     */
    public static function countStyles()
    {
        return count(self::$styles);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Reset styles.
     *
     * @since 0.10.0
     */
    public static function resetStyles()
    {
        self::$styles = array();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set default paragraph style
     *
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $styles Paragraph style definition
     * @return \PhpOffice\PhpWord\Style\Paragraph
     */
    public static function setDefaultParagraphStyle($styles)
    {
        return self::addParagraphStyle('Normal', $styles);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get all styles
     *
     * @return \PhpOffice\PhpWord\Style\AbstractStyle[]
     */
    public static function getStyles()
    {
        return self::$styles;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get style by name
     *
     * @param string $styleName
     * @return \PhpOffice\PhpWord\Style\AbstractStyle Paragraph|Font|Table|Numbering
     */
    public static function getStyle($styleName)
    {
        if (isset(self::$styles[$styleName])) {
            return self::$styles[$styleName];
        }

        return null;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set style values and put it to static style collection
     *
     * The $styleValues could be an array or object
     *
     * @param string $name
     * @param \PhpOffice\PhpWord\Style\AbstractStyle $style
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $value
     * @return \PhpOffice\PhpWord\Style\AbstractStyle
     */
    private static function setStyleValues($name, $style, $value = null)
    {
        if (!isset(self::$styles[$name])) {
            if ($value !== null) {
                if (is_array($value)) {
                    $style->setStyleByArray($value);
                } elseif ($value instanceof AbstractStyle) {
                    if (get_class($style) == get_class($value)) {
                        $style = $value;
                    }
                }
            }
            $style->setStyleName($name);
            $style->setIndex(self::countStyles() + 1); // One based index
            self::$styles[$name] = $style;
        }

        return self::getStyle($name);
    }
}
