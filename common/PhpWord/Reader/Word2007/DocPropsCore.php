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
use PhpOffice\PhpWord\PhpWord;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Core properties reader
 *
 * @since 0.10.0
 */
class DocPropsCore extends AbstractPart
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Property mapping
     *
     * @var array
     */
    protected $mapping = array(
        'dc:creator'        => 'setCreator',
        'dc:title'          => 'setTitle',
        'dc:description'    => 'setDescription',
        'dc:subject'        => 'setSubject',
        'cp:keywords'       => 'setKeywords',
        'cp:category'       => 'setCategory',
        'cp:lastModifiedBy' => 'setLastModifiedBy',
        'dcterms:created'   => 'setCreated',
        'dcterms:modified'  => 'setModified',
    );

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Callback functions
     *
     * @var array
     */
    protected $callbacks = array('dcterms:created' => 'strtotime', 'dcterms:modified' => 'strtotime');

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read core/extended document properties.
     *
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     */
    public function read(PhpWord $phpWord)
    {
        $xmlReader = new XMLReader();
        $xmlReader->getDomFromZip($this->docFile, $this->xmlFile);

        $docProps = $phpWord->getDocInfo();

        $nodes = $xmlReader->getElements('*');
        if ($nodes->length > 0) {
            foreach ($nodes as $node) {
                if (!isset($this->mapping[$node->nodeName])) {
                    continue;
                }
                $method = $this->mapping[$node->nodeName];
                $value = $node->nodeValue == '' ? null : $node->nodeValue;
                if (isset($this->callbacks[$node->nodeName])) {
                    $value = $this->callbacks[$node->nodeName]($value);
                }
                if (method_exists($docProps, $method)) {
                    $docProps->$method($value);
                }
            }
        }
    }
}
