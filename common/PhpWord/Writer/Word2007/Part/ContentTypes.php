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

use PhpOffice\Common\XMLWriter;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Word2007 contenttypes part writer: [Content_Types].xml
 */
class ContentTypes extends AbstractPart
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write part
     *
     * @return string
     */
    public function write()
    {
        /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Writer\Word2007 $parentWriter Type hint */
        $parentWriter = $this->getParentWriter();
        $contentTypes = $parentWriter->getContentTypes();

        $openXMLPrefix = 'application/vnd.openxmlformats-';
        $wordMLPrefix = $openXMLPrefix . 'officedocument.wordprocessingml.';
        $drawingMLPrefix = $openXMLPrefix . 'officedocument.drawingml.';
        $overrides = array(
            '/docProps/core.xml'     => $openXMLPrefix . 'package.core-properties+xml',
            '/docProps/app.xml'      => $openXMLPrefix . 'officedocument.extended-properties+xml',
            '/docProps/custom.xml'   => $openXMLPrefix . 'officedocument.custom-properties+xml',
            '/word/document.xml'     => $wordMLPrefix . 'document.main+xml',
            '/word/styles.xml'       => $wordMLPrefix . 'styles+xml',
            '/word/numbering.xml'    => $wordMLPrefix . 'numbering+xml',
            '/word/settings.xml'     => $wordMLPrefix . 'settings+xml',
            '/word/theme/theme1.xml' => $openXMLPrefix . 'officedocument.theme+xml',
            '/word/webSettings.xml'  => $wordMLPrefix . 'webSettings+xml',
            '/word/fontTable.xml'    => $wordMLPrefix . 'fontTable+xml',
            '/word/comments.xml'     => $wordMLPrefix . 'comments+xml',
        );

        $defaults = $contentTypes['default'];
        if (!empty($contentTypes['override'])) {
            foreach ($contentTypes['override'] as $key => $val) {
                if ($val == 'chart') {
                    $overrides[$key] = $drawingMLPrefix . $val . '+xml';
                } else {
                    $overrides[$key] = $wordMLPrefix . $val . '+xml';
                }
            }
        }

        $xmlWriter = $this->getXmlWriter();

        $xmlWriter->startDocument('1.0', 'UTF-8', 'yes');
        $xmlWriter->startElement('Types');
        $xmlWriter->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/package/2006/content-types');

        $this->writeContentType($xmlWriter, $defaults, true);
        $this->writeContentType($xmlWriter, $overrides, false);

        $xmlWriter->endElement(); // Types

        return $xmlWriter->getData();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write content types element
     *
     * @param \PhpOffice\Common\XMLWriter $xmlWriter XML Writer
     * @param array $parts
     * @param bool $isDefault
     */
    private function writeContentType(XMLWriter $xmlWriter, $parts, $isDefault)
    {
        foreach ($parts as $partName => $contentType) {
            $partType = $isDefault ? 'Default' : 'Override';
            $partAttribute = $isDefault ? 'Extension' : 'PartName';
            $xmlWriter->startElement($partType);
            $xmlWriter->writeAttribute($partAttribute, $partName);
            $xmlWriter->writeAttribute('ContentType', $contentType);
            $xmlWriter->endElement();
        }
    }
}
