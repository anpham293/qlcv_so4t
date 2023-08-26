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

namespace PhpOffice\PhpWord\Element;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Footer element
 */
class Footer extends AbstractContainer
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Header/footer types constants
     *
     * @var string
     * @see  http://www.datypic.com/sc/ooxml/t-w_ST_HdrFtr.html Header or Footer Type
     */
    const AUTO = 'default';  // default and odd pages
    const FIRST = 'first';
    const EVEN = 'even';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @var string Container type
     */
    protected $container = 'Footer';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Header type
     *
     * @var string
     */
    protected $type = self::AUTO;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new instance
     *
     * @param int $sectionId
     * @param int $containerId
     * @param string $type
     */
    public function __construct($sectionId, $containerId = 1, $type = self::AUTO)
    {
        $this->sectionId = $sectionId;
        $this->setType($type);
        $this->setDocPart($this->container, ($sectionId - 1) * 3 + $containerId);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set type.
     *
     * @since 0.10.0
     *
     * @param string $value
     */
    public function setType($value = self::AUTO)
    {
        if (!in_array($value, array(self::AUTO, self::FIRST, self::EVEN))) {
            $value = self::AUTO;
        }
        $this->type = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get type
     *
     * @return string
     * @since 0.10.0
     */
    public function getType()
    {
        return $this->type;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Reset type to default
     *
     * @return string
     */
    public function resetType()
    {
        return $this->type = self::AUTO;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * First page only header
     *
     * @return string
     */
    public function firstPage()
    {
        return $this->type = self::FIRST;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Even numbered pages only
     *
     * @return string
     */
    public function evenPage()
    {
        return $this->type = self::EVEN;
    }
}
