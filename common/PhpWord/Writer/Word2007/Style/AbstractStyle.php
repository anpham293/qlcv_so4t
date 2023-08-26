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

namespace PhpOffice\PhpWord\Writer\Word2007\Style;

use PhpOffice\Common\XMLWriter;
use PhpOffice\PhpWord\Settings;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Style writer
 *
 * @since 0.10.0
 */
abstract class AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * XML writer
     *
     * @var \PhpOffice\Common\XMLWriter
     */
    private $xmlWriter;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Style; set protected for a while
     *
     * @var string|\PhpOffice\PhpWord\Style\AbstractStyle
     */
    protected $style;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write style
     */
    abstract public function write();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new instance.
     *
     * @param \PhpOffice\Common\XMLWriter $xmlWriter
     * @param string|\PhpOffice\PhpWord\Style\AbstractStyle $style
     */
    public function __construct(XMLWriter $xmlWriter, $style = null)
    {
        $this->xmlWriter = $xmlWriter;
        $this->style = $style;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get XML Writer
     *
     * @return \PhpOffice\Common\XMLWriter
     */
    protected function getXmlWriter()
    {
        return $this->xmlWriter;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Style
     *
     * @return string|\PhpOffice\PhpWord\Style\AbstractStyle
     */
    protected function getStyle()
    {
        return $this->style;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Convert twip value
     *
     * @param int|float $value
     * @param int $default (int|float)
     * @return int|float
     */
    protected function convertTwip($value, $default = 0)
    {
        $factors = array(
            Settings::UNIT_CM    => 567,
            Settings::UNIT_MM    => 56.7,
            Settings::UNIT_INCH  => 1440,
            Settings::UNIT_POINT => 20,
            Settings::UNIT_PICA  => 240,
        );
        $unit = Settings::getMeasurementUnit();
        $factor = 1;
        if (in_array($unit, $factors) && $value != $default) {
            $factor = $factors[$unit];
        }

        return $value * $factor;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write child style.
     *
     * @param \PhpOffice\Common\XMLWriter $xmlWriter
     * @param string $name
     * @param mixed $value
     */
    protected function writeChildStyle(XMLWriter $xmlWriter, $name, $value)
    {
        if ($value !== null) {
            $class = 'PhpOffice\\PhpWord\\Writer\\Word2007\\Style\\' . $name;

            /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Writer\Word2007\Style\AbstractStyle $writer */
            $writer = new $class($xmlWriter, $value);
            $writer->write();
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Assemble style array into style string
     *
     * @param array $styles
     * @return string
     */
    protected function assembleStyle($styles = array())
    {
        $style = '';
        foreach ($styles as $key => $value) {
            if (!is_null($value) && $value != '') {
                $style .= "{$key}:{$value}; ";
            }
        }

        return trim($style);
    }
}
