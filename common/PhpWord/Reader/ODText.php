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

namespace PhpOffice\PhpWord\Reader;

use PhpOffice\Common\XMLReader;
use PhpOffice\PhpWord\PhpWord;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Reader for ODText
 *
 * @since 0.10.0
 */
class ODText extends AbstractReader implements ReaderInterface
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Loads PhpWord from file
     *
     * @param string $docFile
     * @return \PhpOffice\PhpWord\PhpWord
     */
    public function load($docFile)
    {
        $phpWord = new PhpWord();
        $relationships = $this->readRelationships($docFile);

        $readerParts = array(
            'content.xml' => 'Content',
            'meta.xml'    => 'Meta',
        );

        foreach ($readerParts as $xmlFile => $partName) {
            $this->readPart($phpWord, $relationships, $partName, $docFile, $xmlFile);
        }

        return $phpWord;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read document part.
     *
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     * @param array $relationships
     * @param string $partName
     * @param string $docFile
     * @param string $xmlFile
     */
    private function readPart(PhpWord $phpWord, $relationships, $partName, $docFile, $xmlFile)
    {
        $partClass = "PhpOffice\\PhpWord\\Reader\\ODText\\{$partName}";
        if (class_exists($partClass)) {
            /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Reader\ODText\AbstractPart $part Type hint */
            $part = new $partClass($docFile, $xmlFile);
            $part->setRels($relationships);
            $part->read($phpWord);
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read all relationship files
     *
     * @param string $docFile
     * @return array
     */
    private function readRelationships($docFile)
    {
        $rels = array();
        $xmlFile = 'META-INF/manifest.xml';
        $xmlReader = new XMLReader();
        $xmlReader->getDomFromZip($docFile, $xmlFile);
        $nodes = $xmlReader->getElements('manifest:file-entry');
        foreach ($nodes as $node) {
            $type = $xmlReader->getAttribute('manifest:media-type', $node);
            $target = $xmlReader->getAttribute('manifest:full-path', $node);
            $rels[] = array('type' => $type, 'target' => $target);
        }

        return $rels;
    }
}
