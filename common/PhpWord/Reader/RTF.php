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

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Reader\RTF\Document;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * RTF Reader class
 *
 * @since 0.11.0
 */
class RTF extends AbstractReader implements ReaderInterface
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Loads PhpWord from file
     *
     * @param string $docFile
     *
     * @throws \Exception
     *
     * @return \PhpOffice\PhpWord\PhpWord
     */
    public function load($docFile)
    {
        $phpWord = new PhpWord();

        if ($this->canRead($docFile)) {
            $doc = new Document();
            $doc->rtf = file_get_contents($docFile);
            $doc->read($phpWord);
        } else {
            throw new \Exception("Cannot read {$docFile}.");
        }

        return $phpWord;
    }
}
