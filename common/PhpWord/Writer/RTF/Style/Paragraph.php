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

namespace PhpOffice\PhpWord\Writer\RTF\Style;

use PhpOffice\PhpWord\SimpleType\Jc;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * RTF paragraph style writer
 *
 * @since 0.11.0
 */
class Paragraph extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Depth of table container nested level; Primarily used for RTF writer/reader
     *
     * 0 = Not in a table; 1 = in a table; 2 = in a table inside another table, etc.
     *
     * @var int
     */
    private $nestedLevel = 0;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write style
     *
     * @return string
     */
    public function write()
    {
        $style = $this->getStyle();
        if (!$style instanceof \PhpOffice\PhpWord\Style\Paragraph) {
            return '';
        }

        $alignments = array(
            Jc::START  => '\ql',
            Jc::END    => '\qr',
            Jc::CENTER => '\qc',
            Jc::BOTH   => '\qj',
        );

        $spaceAfter = $style->getSpaceAfter();
        $spaceBefore = $style->getSpaceBefore();

        $content = '';
        if ($this->nestedLevel == 0) {
            $content .= '\pard\nowidctlpar ';
        }
        if (isset($alignments[$style->getAlignment()])) {
            $content .= $alignments[$style->getAlignment()];
        }
        $content .= $this->writeIndentation($style->getIndentation());
        $content .= $this->getValueIf($spaceBefore !== null, '\sb' . $spaceBefore);
        $content .= $this->getValueIf($spaceAfter !== null, '\sa' . $spaceAfter);

        $styles = $style->getStyleValues();
        $content .= $this->writeTabs($styles['tabs']);

        return $content;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Writes an \PhpOffice\PhpWord\Style\Indentation
     *
     * @param null|\PhpOffice\PhpWord\Style\Indentation $indent
     * @return string
     */
    private function writeIndentation($indent = null)
    {
        if (isset($indent) && $indent instanceof \PhpOffice\PhpWord\Style\Indentation) {
            $writer = new Indentation($indent);

            return $writer->write();
        }

        return '';
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Writes tabs
     *
     * @param \PhpOffice\PhpWord\Style\Tab[] $tabs
     * @return string
     */
    private function writeTabs($tabs = null)
    {
        $content = '';
        if (!empty($tabs)) {
            foreach ($tabs as $tab) {
                $styleWriter = new Tab($tab);
                $content .= $styleWriter->write();
            }
        }

        return $content;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set nested level.
     *
     * @param int $value
     */
    public function setNestedLevel($value)
    {
        $this->nestedLevel = $value;
    }
}
