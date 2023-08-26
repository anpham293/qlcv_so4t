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

namespace PhpOffice\PhpWord\Writer\Word2007\Element;

use PhpOffice\Common\Text as CommonText;
use PhpOffice\Common\XMLWriter;
use PhpOffice\PhpWord\Element\AbstractElement as Element;
use PhpOffice\PhpWord\Settings;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Abstract element writer
 *
 * @since 0.11.0
 */
abstract class AbstractElement
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * XML writer
     *
     * @var \PhpOffice\Common\XMLWriter
     */
    private $xmlWriter;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Element
     *
     * @var \PhpOffice\PhpWord\Element\AbstractElement
     */
    private $element;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Without paragraph
     *
     * @var bool
     */
    protected $withoutP = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write element
     */
    abstract public function write();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new instance
     *
     * @param \PhpOffice\Common\XMLWriter $xmlWriter
     * @param \PhpOffice\PhpWord\Element\AbstractElement $element
     * @param bool $withoutP
     */
    public function __construct(XMLWriter $xmlWriter, Element $element, $withoutP = false)
    {
        $this->xmlWriter = $xmlWriter;
        $this->element = $element;
        $this->withoutP = $withoutP;
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
     * Get element
     *
     * @return \PhpOffice\PhpWord\Element\AbstractElement
     */
    protected function getElement()
    {
        return $this->element;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Start w:p DOM element.
     *
     * @uses \PhpOffice\PhpWord\Writer\Word2007\Element\PageBreak::write()
     */
    protected function startElementP()
    {
        if (!$this->withoutP) {
            $this->xmlWriter->startElement('w:p');
            // Paragraph style
            if (method_exists($this->element, 'getParagraphStyle')) {
                $this->writeParagraphStyle();
            }
        }
        $this->writeCommentRangeStart();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * End w:p DOM element.
     */
    protected function endElementP()
    {
        $this->writeCommentRangeEnd();
        if (!$this->withoutP) {
            $this->xmlWriter->endElement(); // w:p
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Writes the w:commentRangeStart DOM element
     */
    protected function writeCommentRangeStart()
    {
        if ($this->element->getCommentRangeStart() != null) {
            $comment = $this->element->getCommentRangeStart();
            //only set the ID if it is not yet set, otherwise it will overwrite it
            if ($comment->getElementId() == null) {
                $comment->setElementId();
            }

            $this->xmlWriter->writeElementBlock('w:commentRangeStart', array('w:id' => $comment->getElementId()));
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Writes the w:commentRangeEnd DOM element
     */
    protected function writeCommentRangeEnd()
    {
        if ($this->element->getCommentRangeEnd() != null) {
            $comment = $this->element->getCommentRangeEnd();
            //only set the ID if it is not yet set, otherwise it will overwrite it, this should normally not happen
            if ($comment->getElementId() == null) {
                $comment->setElementId(); // @codeCoverageIgnore
            } // @codeCoverageIgnore

            $this->xmlWriter->writeElementBlock('w:commentRangeEnd', array('w:id' => $comment->getElementId()));
            $this->xmlWriter->startElement('w:r');
            $this->xmlWriter->writeElementBlock('w:commentReference', array('w:id' => $comment->getElementId()));
            $this->xmlWriter->endElement();
        } elseif ($this->element->getCommentRangeStart() != null && $this->element->getCommentRangeStart()->getEndElement() == null) {
            $comment = $this->element->getCommentRangeStart();
            //only set the ID if it is not yet set, otherwise it will overwrite it, this should normally not happen
            if ($comment->getElementId() == null) {
                $comment->setElementId(); // @codeCoverageIgnore
            } // @codeCoverageIgnore

            $this->xmlWriter->writeElementBlock('w:commentRangeEnd', array('w:id' => $comment->getElementId()));
            $this->xmlWriter->startElement('w:r');
            $this->xmlWriter->writeElementBlock('w:commentReference', array('w:id' => $comment->getElementId()));
            $this->xmlWriter->endElement();
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write ending.
     */
    protected function writeParagraphStyle()
    {
        $this->writeTextStyle('Paragraph');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write ending.
     */
    protected function writeFontStyle()
    {
        $this->writeTextStyle('Font');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write text style.
     *
     * @param string $styleType Font|Paragraph
     */
    private function writeTextStyle($styleType)
    {
        $method = "get{$styleType}Style";
        $class = "PhpOffice\\PhpWord\\Writer\\Word2007\\Style\\{$styleType}";
        $styleObject = $this->element->$method();

        /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Writer\Word2007\Style\AbstractStyle $styleWriter Type Hint */
        $styleWriter = new $class($this->xmlWriter, $styleObject);
        if (method_exists($styleWriter, 'setIsInline')) {
            $styleWriter->setIsInline(true);
        }

        $styleWriter->write();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Convert text to valid format
     *
     * @param string $text
     * @return string
     */
    protected function getText($text)
    {
        return CommonText::controlCharacterPHP2OOXML($text);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write an XML text, this will call text() or writeRaw() depending on the value of Settings::isOutputEscapingEnabled()
     *
     * @param string $content The text string to write
     * @return bool Returns true on success or false on failure
     */
    protected function writeText($content)
    {
        if (Settings::isOutputEscapingEnabled()) {
            return $this->getXmlWriter()->text($content);
        }

        return $this->getXmlWriter()->writeRaw($content);
    }
}
