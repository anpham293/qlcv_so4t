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

namespace PhpOffice\PhpWord\Writer\HTML\Style;

use PhpOffice\PhpWord\Style\AbstractStyle as Style;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Style writer
 *
 * @since 0.10.0
 */
abstract class AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Parent writer
     *
     * @var \PhpOffice\PhpWord\Writer\AbstractWriter
     */
    private $parentWriter;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Style
     *
     * @var array|\PhpOffice\PhpWord\Style\AbstractStyle
     */
    private $style;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write style
     */
    abstract public function write();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new instance
     *
     * @param array|\PhpOffice\PhpWord\Style\AbstractStyle $style
     */
    public function __construct($style = null)
    {
        $this->style = $style;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set parent writer.
     *
     * @param \PhpOffice\PhpWord\Writer\AbstractWriter $writer
     */
    public function setParentWriter($writer)
    {
        $this->parentWriter = $writer;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get parent writer
     *
     * @return \PhpOffice\PhpWord\Writer\AbstractWriter
     */
    public function getParentWriter()
    {
        return $this->parentWriter;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get style
     *
     * @return array|\PhpOffice\PhpWord\Style\AbstractStyle $style
     */
    public function getStyle()
    {
        if (!$this->style instanceof Style && !is_array($this->style)) {
            return '';
        }

        return $this->style;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Takes array where of CSS properties / values and converts to CSS string
     *
     * @param array $css
     * @return string
     */
    protected function assembleCss($css)
    {
        $pairs = array();
        $string = '';
        foreach ($css as $key => $value) {
            if ($value != '') {
                $pairs[] = $key . ': ' . $value;
            }
        }
        if (!empty($pairs)) {
            $string = implode('; ', $pairs) . ';';
        }

        return $string;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get value if ...
     *
     * @param bool|null $condition
     * @param string $value
     * @return string
     */
    protected function getValueIf($condition, $value)
    {
        return $condition == true ? $value : '';
    }
}
