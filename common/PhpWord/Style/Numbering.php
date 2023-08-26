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
 * Numbering style
 *
 * @see  http://www.schemacentral.com/sc/ooxml/e-w_numbering.html
 * @see  http://www.schemacentral.com/sc/ooxml/e-w_abstractNum-1.html
 * @see  http://www.schemacentral.com/sc/ooxml/e-w_num-1.html
 * @since 0.10.0
 */
class Numbering extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Numbering definition instance ID
     *
     * @var int
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_num-1.html
     */
    private $numId;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Multilevel type singleLevel|multilevel|hybridMultilevel
     *
     * @var string
     * @see  http://www.schemacentral.com/sc/ooxml/a-w_val-67.html
     */
    private $type;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Numbering levels
     *
     * @var NumberingLevel[]
     */
    private $levels = array();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Id
     *
     * @return int
     */
    public function getNumId()
    {
        return $this->numId;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Id
     *
     * @param int $value
     * @return self
     */
    public function setNumId($value)
    {
        $this->numId = $this->setIntVal($value, $this->numId);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get multilevel type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set multilevel type
     *
     * @param string $value
     * @return self
     */
    public function setType($value)
    {
        $enum = array('singleLevel', 'multilevel', 'hybridMultilevel');
        $this->type = $this->setEnumVal($value, $enum, $this->type);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get levels
     *
     * @return NumberingLevel[]
     */
    public function getLevels()
    {
        return $this->levels;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set multilevel type
     *
     * @param array $values
     * @return self
     */
    public function setLevels($values)
    {
        if (is_array($values)) {
            foreach ($values as $key => $value) {
                $numberingLevel = new NumberingLevel();
                if (is_array($value)) {
                    $numberingLevel->setStyleByArray($value);
                    $numberingLevel->setLevel($key);
                }
                $this->levels[$key] = $numberingLevel;
            }
        }

        return $this;
    }
}
