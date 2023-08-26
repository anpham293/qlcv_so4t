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

namespace PhpOffice\PhpWord\Writer;

use PhpOffice\PhpWord\PhpWord;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * RTF writer
 *
 * @since 0.7.0
 */
class RTF extends AbstractWriter implements WriterInterface
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Last paragraph style
     *
     * @var mixed
     */
    private $lastParagraphStyle;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new instance
     *
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     */
    public function __construct(PhpWord $phpWord = null)
    {
        $this->setPhpWord($phpWord);

        $this->parts = array('Header', 'Document');
        foreach ($this->parts as $partName) {
            $partClass = get_class($this) . '\\Part\\' . $partName;
            if (class_exists($partClass)) {
                /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Writer\RTF\Part\AbstractPart $part Type hint */
                $part = new $partClass();
                $part->setParentWriter($this);
                $this->writerParts[strtolower($partName)] = $part;
            }
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Save content to file.
     *
     * @param string $filename
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function save($filename = null)
    {
        $this->writeFile($this->openFile($filename), $this->getContent());
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get content
     *
     * @return string
     * @since 0.11.0
     */
    private function getContent()
    {
        $content = '';

        $content .= '{';
        $content .= '\rtf1' . PHP_EOL;
        $content .= $this->getWriterPart('Header')->write();
        $content .= $this->getWriterPart('Document')->write();
        $content .= '}';

        return $content;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get font table.
     *
     * @return array
     */
    public function getFontTable()
    {
        return $this->getWriterPart('Header')->getFontTable();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get color table.
     *
     * @return array
     */
    public function getColorTable()
    {
        return $this->getWriterPart('Header')->getColorTable();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get last paragraph style.
     *
     * @return mixed
     */
    public function getLastParagraphStyle()
    {
        return $this->lastParagraphStyle;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set last paragraph style.
     *
     * @param mixed $value
     */
    public function setLastParagraphStyle($value = '')
    {
        $this->lastParagraphStyle = $value;
    }
}
