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
 * TrackChange element
 * @see http://datypic.com/sc/ooxml/t-w_CT_TrackChange.html
 * @see http://datypic.com/sc/ooxml/t-w_CT_RunTrackChange.html
 */
class TrackChange extends AbstractContainer
{
    const INSERTED = 'INSERTED';
    const DELETED = 'DELETED';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @var string Container type
     */
    protected $container = 'TrackChange';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * The type of change, (insert or delete), not applicable for PhpOffice\PhpWord\Element\Comment
     *
     * @var string
     */
    private $changeType;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Author
     *
     * @var string
     */
    private $author;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Date
     *
     * @var \DateTime
     */
    private $date;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create a new TrackChange Element
     *
     * @param string $changeType
     * @param string $author
     * @param null|int|\DateTime $date
     */
    public function __construct($changeType = null, $author = null, $date = null)
    {
        $this->changeType = $changeType;
        $this->author = $author;
        if ($date !== null) {
            $this->date = ($date instanceof \DateTime) ? $date : new \DateTime('@' . $date);
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get TrackChange Author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get TrackChange Date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the Change type
     *
     * @return string
     */
    public function getChangeType()
    {
        return $this->changeType;
    }
}
