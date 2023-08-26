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

namespace PhpOffice\PhpWord\Writer\HTML\Part;

use PhpOffice\PhpWord\Writer\HTML\Element\Container;
use PhpOffice\PhpWord\Writer\HTML\Element\TextRun as TextRunWriter;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * RTF body part writer
 *
 * @since 0.11.0
 */
class Body extends AbstractPart
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write part
     *
     * @return string
     */
    public function write()
    {
        $phpWord = $this->getParentWriter()->getPhpWord();

        $content = '';

        $content .= '<body>' . PHP_EOL;
        $sections = $phpWord->getSections();
        foreach ($sections as $section) {
            $writer = new Container($this->getParentWriter(), $section);
            $content .= $writer->write();
        }

        $content .= $this->writeNotes();
        $content .= '</body>' . PHP_EOL;

        return $content;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write footnote/endnote contents as textruns
     *
     * @return string
     */
    private function writeNotes()
    {
        /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Writer\HTML $parentWriter Type hint */
        $parentWriter = $this->getParentWriter();
        $phpWord = $parentWriter->getPhpWord();
        $notes = $parentWriter->getNotes();

        $content = '';

        if (!empty($notes)) {
            $content .= '<hr />' . PHP_EOL;
            foreach ($notes as $noteId => $noteMark) {
                list($noteType, $noteTypeId) = explode('-', $noteMark);
                $method = 'get' . ($noteType == 'endnote' ? 'Endnotes' : 'Footnotes');
                $collection = $phpWord->$method()->getItems();

                if (isset($collection[$noteTypeId])) {
                    $element = $collection[$noteTypeId];
                    $noteAnchor = "<a name=\"note-{$noteId}\" />";
                    $noteAnchor .= "<a href=\"#{$noteMark}\" class=\"NoteRef\"><sup>{$noteId}</sup></a>";

                    $writer = new TextRunWriter($this->getParentWriter(), $element);
                    $writer->setOpeningText($noteAnchor);
                    $content .= $writer->write();
                }
            }
        }

        return $content;
    }
}
