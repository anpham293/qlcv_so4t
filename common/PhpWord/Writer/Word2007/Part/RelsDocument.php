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

namespace PhpOffice\PhpWord\Writer\Word2007\Part;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Word2007 document relationship writer: word/_rels/document.xml.rels
 *
 * @since 0.11.0
 */
class RelsDocument extends Rels
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write part
     *
     * @return string
     */
    public function write()
    {
        $xmlRels = array(
            'styles.xml'       => 'officeDocument/2006/relationships/styles',
            'numbering.xml'    => 'officeDocument/2006/relationships/numbering',
            'settings.xml'     => 'officeDocument/2006/relationships/settings',
            'theme/theme1.xml' => 'officeDocument/2006/relationships/theme',
            'webSettings.xml'  => 'officeDocument/2006/relationships/webSettings',
            'fontTable.xml'    => 'officeDocument/2006/relationships/fontTable',
        );
        $xmlWriter = $this->getXmlWriter();

        /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Writer\Word2007 $parentWriter Type hint */
        $parentWriter = $this->getParentWriter();
        $this->writeRels($xmlWriter, $xmlRels, $parentWriter->getRelationships());

        return $xmlWriter->getData();
    }
}
