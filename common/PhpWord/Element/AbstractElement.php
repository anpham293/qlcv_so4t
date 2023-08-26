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

use PhpOffice\PhpWord\Media;
use PhpOffice\PhpWord\PhpWord;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Element abstract class
 *
 * @since 0.10.0
 */
abstract class AbstractElement
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * PhpWord object
     *
     * @var \PhpOffice\PhpWord\PhpWord
     */
    protected $phpWord;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Section Id
     *
     * @var int
     */
    protected $sectionId;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Document part type: Section|Header|Footer|Footnote|Endnote
     *
     * Used by textrun and cell container to determine where the element is
     * located because it will affect the availability of other element,
     * e.g. footnote will not be available when $docPart is header or footer.
     *
     * @var string
     */
    protected $docPart = 'Section';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Document part Id
     *
     * For header and footer, this will be = ($sectionId - 1) * 3 + $index
     * because the max number of header/footer in every page is 3, i.e.
     * AUTO, FIRST, and EVEN (AUTO = ODD)
     *
     * @var int
     */
    protected $docPartId = 1;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Index of element in the elements collection (start with 1)
     *
     * @var int
     */
    protected $elementIndex = 1;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Unique Id for element
     *
     * @var string
     */
    protected $elementId;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Relation Id
     *
     * @var int
     */
    protected $relationId;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Depth of table container nested level; Primarily used for RTF writer/reader
     *
     * 0 = Not in a table; 1 = in a table; 2 = in a table inside another table, etc.
     *
     * @var int
     */
    private $nestedLevel = 0;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * A reference to the parent
     *
     * @var \PhpOffice\PhpWord\Element\AbstractElement
     */
    private $parent;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * changed element info
     *
     * @var TrackChange
     */
    private $trackChange;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Parent container type
     *
     * @var string
     */
    private $parentContainer;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Has media relation flag; true for Link, Image, and Object
     *
     * @var bool
     */
    protected $mediaRelation = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Is part of collection; true for Title, Footnote, Endnote, Chart, and Comment
     *
     * @var bool
     */
    protected $collectionRelation = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * The start position for the linked comment
     *
     * @var Comment
     */
    protected $commentRangeStart;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * The end position for the linked comment
     *
     * @var Comment
     */
    protected $commentRangeEnd;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get PhpWord
     *
     * @return \PhpOffice\PhpWord\PhpWord
     */
    public function getPhpWord()
    {
        return $this->phpWord;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set PhpWord as reference.
     *
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     */
    public function setPhpWord(PhpWord $phpWord = null)
    {
        $this->phpWord = $phpWord;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get section number
     *
     * @return int
     */
    public function getSectionId()
    {
        return $this->sectionId;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set doc part.
     *
     * @param string $docPart
     * @param int $docPartId
     */
    public function setDocPart($docPart, $docPartId = 1)
    {
        $this->docPart = $docPart;
        $this->docPartId = $docPartId;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get doc part
     *
     * @return string
     */
    public function getDocPart()
    {
        return $this->docPart;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get doc part Id
     *
     * @return int
     */
    public function getDocPartId()
    {
        return $this->docPartId;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Return media element (image, object, link) container name
     *
     * @return string section|headerx|footerx|footnote|endnote
     */
    private function getMediaPart()
    {
        $mediaPart = $this->docPart;
        if ($mediaPart == 'Header' || $mediaPart == 'Footer') {
            $mediaPart .= $this->docPartId;
        }

        return strtolower($mediaPart);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get element index
     *
     * @return int
     */
    public function getElementIndex()
    {
        return $this->elementIndex;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set element index.
     *
     * @param int $value
     */
    public function setElementIndex($value)
    {
        $this->elementIndex = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get element unique ID
     *
     * @return string
     */
    public function getElementId()
    {
        return $this->elementId;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set element unique ID from 6 first digit of md5.
     */
    public function setElementId()
    {
        $this->elementId = substr(md5(rand()), 0, 6);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get relation Id
     *
     * @return int
     */
    public function getRelationId()
    {
        return $this->relationId;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set relation Id.
     *
     * @param int $value
     */
    public function setRelationId($value)
    {
        $this->relationId = $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get nested level
     *
     * @return int
     */
    public function getNestedLevel()
    {
        return $this->nestedLevel;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get comment start
     *
     * @return Comment
     */
    public function getCommentRangeStart()
    {
        return $this->commentRangeStart;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set comment start
     *
     * @param Comment $value
     */
    public function setCommentRangeStart(Comment $value)
    {
        if ($this instanceof Comment) {
            throw new \InvalidArgumentException('Cannot set a Comment on a Comment');
        }
        $this->commentRangeStart = $value;
        $this->commentRangeStart->setStartElement($this);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get comment end
     *
     * @return Comment
     */
    public function getCommentRangeEnd()
    {
        return $this->commentRangeEnd;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set comment end
     *
     * @param Comment $value
     */
    public function setCommentRangeEnd(Comment $value)
    {
        if ($this instanceof Comment) {
            throw new \InvalidArgumentException('Cannot set a Comment on a Comment');
        }
        $this->commentRangeEnd = $value;
        $this->commentRangeEnd->setEndElement($this);
    }

    public function getParent()
    {
        return $this->parent;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set parent container
     *
     * Passed parameter should be a container, except for Table (contain Row) and Row (contain Cell)
     *
     * @param \PhpOffice\PhpWord\Element\AbstractElement $container
     */
    public function setParentContainer(self $container)
    {
        $this->parentContainer = substr(get_class($container), strrpos(get_class($container), '\\') + 1);
        $this->parent = $container;

        // Set nested level
        $this->nestedLevel = $container->getNestedLevel();
        if ($this->parentContainer == 'Cell') {
            $this->nestedLevel++;
        }

        // Set phpword
        $this->setPhpWord($container->getPhpWord());

        // Set doc part
        if (!$this instanceof Footnote) {
            $this->setDocPart($container->getDocPart(), $container->getDocPartId());
        }

        $this->setMediaRelation();
        $this->setCollectionRelation();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set relation Id for media elements (link, image, object; legacy of OOXML)
     *
     * - Image element needs to be passed to Media object
     * - Icon needs to be set for Object element
     */
    private function setMediaRelation()
    {
        if (!$this instanceof Link && !$this instanceof Image && !$this instanceof OLEObject) {
            return;
        }

        $elementName = substr(get_class($this), strrpos(get_class($this), '\\') + 1);
        if ($elementName == 'OLEObject') {
            $elementName = 'Object';
        }
        $mediaPart = $this->getMediaPart();
        $source = $this->getSource();
        $image = null;
        if ($this instanceof Image) {
            $image = $this;
        }
        $rId = Media::addElement($mediaPart, strtolower($elementName), $source, $image);
        $this->setRelationId($rId);

        if ($this instanceof OLEObject) {
            $icon = $this->getIcon();
            $rId = Media::addElement($mediaPart, 'image', $icon, new Image($icon));
            $this->setImageRelationId($rId);
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set relation Id for elements that will be registered in the Collection subnamespaces.
     */
    private function setCollectionRelation()
    {
        if ($this->collectionRelation === true && $this->phpWord instanceof PhpWord) {
            $elementName = substr(get_class($this), strrpos(get_class($this), '\\') + 1);
            $addMethod = "add{$elementName}";
            $rId = $this->phpWord->$addMethod($this);
            $this->setRelationId($rId);
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Check if element is located in Section doc part (as opposed to Header/Footer)
     *
     * @return bool
     */
    public function isInSection()
    {
        return $this->docPart == 'Section';
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set new style value
     *
     * @param mixed $styleObject Style object
     * @param mixed $styleValue Style value
     * @param bool $returnObject Always return object
     * @return mixed
     */
    protected function setNewStyle($styleObject, $styleValue = null, $returnObject = false)
    {
        if (!is_null($styleValue) && is_array($styleValue)) {
            $styleObject->setStyleByArray($styleValue);
            $style = $styleObject;
        } else {
            $style = $returnObject ? $styleObject : $styleValue;
        }

        return $style;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Sets the trackChange information
     *
     * @param TrackChange $trackChange
     */
    public function setTrackChange(TrackChange $trackChange)
    {
        $this->trackChange = $trackChange;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Gets the trackChange information
     *
     * @return TrackChange
     */
    public function getTrackChange()
    {
        return $this->trackChange;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set changed
     *
     * @param string $type INSERTED|DELETED
     * @param string $author
     * @param null|int|\DateTime $date allways in UTC
     */
    public function setChangeInfo($type, $author, $date = null)
    {
        $this->trackChange = new TrackChange($type, $author, $date);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set enum value
     *
     * @param string|null $value
     * @param string[] $enum
     * @param string|null $default
     *
     * @throws \InvalidArgumentException
     * @return string|null
     *
     * @todo Merge with the same method in AbstractStyle
     */
    protected function setEnumVal($value = null, $enum = array(), $default = null)
    {
        if ($value !== null && trim($value) != '' && !empty($enum) && !in_array($value, $enum)) {
            throw new \InvalidArgumentException("Invalid style value: {$value}");
        } elseif ($value === null || trim($value) == '') {
            $value = $default;
        }

        return $value;
    }
}
