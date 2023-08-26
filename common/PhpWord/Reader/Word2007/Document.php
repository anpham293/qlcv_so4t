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

namespace PhpOffice\PhpWord\Reader\Word2007;

use PhpOffice\Common\XMLReader;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\PhpWord;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Document reader
 *
 * @since 0.10.0
 * @SuppressWarnings(PHPMD.UnusedPrivateMethod) For readWPNode
 */
class Document extends AbstractPart
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * PhpWord object
     *
     * @var \PhpOffice\PhpWord\PhpWord
     */
    private $phpWord;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read document.xml.
     *
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     */
    public function read(PhpWord $phpWord)
    {
        $this->phpWord = $phpWord;
        $xmlReader = new XMLReader();
        $xmlReader->getDomFromZip($this->docFile, $this->xmlFile);
        $readMethods = array('w:p' => 'readWPNode', 'w:tbl' => 'readTable', 'w:sectPr' => 'readWSectPrNode');

        $nodes = $xmlReader->getElements('w:body/*');
        if ($nodes->length > 0) {
            $section = $this->phpWord->addSection();
            foreach ($nodes as $node) {
                if (isset($readMethods[$node->nodeName])) {
                    $readMethod = $readMethods[$node->nodeName];
                    $this->$readMethod($xmlReader, $node, $section);
                }
            }
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read header footer.
     *
     * @param array $settings
     * @param \PhpOffice\PhpWord\Element\Section &$section
     */
    private function readHeaderFooter($settings, Section &$section)
    {
        $readMethods = array('w:p' => 'readParagraph', 'w:tbl' => 'readTable');

        if (is_array($settings) && isset($settings['hf'])) {
            foreach ($settings['hf'] as $rId => $hfSetting) {
                if (isset($this->rels['document'][$rId])) {
                    list($hfType, $xmlFile, $docPart) = array_values($this->rels['document'][$rId]);
                    $addMethod = "add{$hfType}";
                    $hfObject = $section->$addMethod($hfSetting['type']);

                    // Read header/footer content
                    $xmlReader = new XMLReader();
                    $xmlReader->getDomFromZip($this->docFile, $xmlFile);
                    $nodes = $xmlReader->getElements('*');
                    if ($nodes->length > 0) {
                        foreach ($nodes as $node) {
                            if (isset($readMethods[$node->nodeName])) {
                                $readMethod = $readMethods[$node->nodeName];
                                $this->$readMethod($xmlReader, $node, $hfObject, $docPart);
                            }
                        }
                    }
                }
            }
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read w:sectPr
     *
     * @param \PhpOffice\Common\XMLReader $xmlReader
     * @param \DOMElement $domNode
     * @ignoreScrutinizerPatch
     * @return array
     */
    private function readSectionStyle(XMLReader $xmlReader, \DOMElement $domNode)
    {
        $styleDefs = array(
            'breakType'     => array(self::READ_VALUE, 'w:type'),
            'pageSizeW'     => array(self::READ_VALUE, 'w:pgSz', 'w:w'),
            'pageSizeH'     => array(self::READ_VALUE, 'w:pgSz', 'w:h'),
            'orientation'   => array(self::READ_VALUE, 'w:pgSz', 'w:orient'),
            'colsNum'       => array(self::READ_VALUE, 'w:cols', 'w:num'),
            'colsSpace'     => array(self::READ_VALUE, 'w:cols', 'w:space'),
            'marginTop'     => array(self::READ_VALUE, 'w:pgMar', 'w:top'),
            'marginLeft'    => array(self::READ_VALUE, 'w:pgMar', 'w:left'),
            'marginBottom'  => array(self::READ_VALUE, 'w:pgMar', 'w:bottom'),
            'marginRight'   => array(self::READ_VALUE, 'w:pgMar', 'w:right'),
            'headerHeight'  => array(self::READ_VALUE, 'w:pgMar', 'w:header'),
            'footerHeight'  => array(self::READ_VALUE, 'w:pgMar', 'w:footer'),
            'gutter'        => array(self::READ_VALUE, 'w:pgMar', 'w:gutter'),
        );
        $styles = $this->readStyleDefs($xmlReader, $domNode, $styleDefs);

        // Header and footer
        // @todo Cleanup this part
        $nodes = $xmlReader->getElements('*', $domNode);
        foreach ($nodes as $node) {
            if ($node->nodeName == 'w:headerReference' || $node->nodeName == 'w:footerReference') {
                $id = $xmlReader->getAttribute('r:id', $node);
                $styles['hf'][$id] = array(
                    'method' => str_replace('w:', '', str_replace('Reference', '', $node->nodeName)),
                    'type'   => $xmlReader->getAttribute('w:type', $node),
                );
            }
        }

        return $styles;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read w:p node.
     *
     * @param \PhpOffice\Common\XMLReader $xmlReader
     * @param \DOMElement $node
     * @param \PhpOffice\PhpWord\Element\Section &$section
     *
     * @todo <w:lastRenderedPageBreak>
     */
    private function readWPNode(XMLReader $xmlReader, \DOMElement $node, Section &$section)
    {
        // Page break
        if ($xmlReader->getAttribute('w:type', $node, 'w:r/w:br') == 'page') {
            $section->addPageBreak(); // PageBreak
        }

        // Paragraph
        $this->readParagraph($xmlReader, $node, $section);

        // Section properties
        if ($xmlReader->elementExists('w:pPr/w:sectPr', $node)) {
            $sectPrNode = $xmlReader->getElement('w:pPr/w:sectPr', $node);
            if ($sectPrNode !== null) {
                $this->readWSectPrNode($xmlReader, $sectPrNode, $section);
            }
            $section = $this->phpWord->addSection();
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read w:sectPr node.
     *
     * @param \PhpOffice\Common\XMLReader $xmlReader
     * @param \DOMElement $node
     * @param \PhpOffice\PhpWord\Element\Section &$section
     */
    private function readWSectPrNode(XMLReader $xmlReader, \DOMElement $node, Section &$section)
    {
        $style = $this->readSectionStyle($xmlReader, $node);
        $section->setStyle($style);
        $this->readHeaderFooter($style, $section);
    }
}
