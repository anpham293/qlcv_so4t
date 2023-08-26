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

namespace PhpOffice\PhpWord\Writer\HTML\Element;

use PhpOffice\PhpWord\Settings;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * TextRun element HTML writer
 *
 * @since 0.10.0
 */
class Title extends AbstractElement
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Write heading
     *
     * @return string
     */
    public function write()
    {
        if (!$this->element instanceof \PhpOffice\PhpWord\Element\Title) {
            return '';
        }

        $tag = 'h' . $this->element->getDepth();

        $text = $this->element->getText();
        if (is_string($text)) {
            if (Settings::isOutputEscapingEnabled()) {
                $text = $this->escaper->escapeHtml($text);
            }
        } elseif ($text instanceof \PhpOffice\PhpWord\Element\AbstractContainer) {
            $writer = new Container($this->parentWriter, $text);
            $text = $writer->write();
        }

        $content = "<{$tag}>{$text}</{$tag}>" . PHP_EOL;

        return $content;
    }
}
