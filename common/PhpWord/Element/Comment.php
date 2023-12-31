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
 * Comment element
 * @see http://datypic.com/sc/ooxml/t-w_CT_Comment.html
 */
class Comment extends TrackChange
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Initials
     *
     * @var string
     */
    private $initials;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * The Element where this comment starts
     *
     * @var AbstractElement
     */
    private $startElement;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * The Element where this comment ends
     *
     * @var AbstractElement
     */
    private $endElement;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Is part of collection
     *
     * @var bool
     */
    protected $collectionRelation = true;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create a new Comment Element
     *
     * @param string $author
     * @param null|\DateTime $date
     * @param string $initials
     */
    public function __construct($author, $date = null, $initials = null)
    {
        parent::__construct(null, $author, $date);
        $this->initials = $initials;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Initials
     *
     * @return string
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Sets the element where this comment starts
     *
     * @param \PhpOffice\PhpWord\Element\AbstractElement $value
     */
    public function setStartElement(AbstractElement $value)
    {
        $this->startElement = $value;
        if ($value->getCommentRangeStart() == null) {
            $value->setCommentRangeStart($this);
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the element where this comment starts
     *
     * @return \PhpOffice\PhpWord\Element\AbstractElement
     */
    public function getStartElement()
    {
        return $this->startElement;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Sets the element where this comment ends
     *
     * @param \PhpOffice\PhpWord\Element\AbstractElement $value
     */
    public function setEndElement(AbstractElement $value)
    {
        $this->endElement = $value;
        if ($value->getCommentRangeEnd() == null) {
            $value->setCommentRangeEnd($this);
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the element where this comment ends
     *
     * @return \PhpOffice\PhpWord\Element\AbstractElement
     */
    public function getEndElement()
    {
        return $this->endElement;
    }
}
