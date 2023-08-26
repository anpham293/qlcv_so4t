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

use PhpOffice\PhpWord\Exception\Exception;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Reader abstract class
 *
 * @since 0.8.0
 *
 * @codeCoverageIgnore Abstract class
 */
abstract class AbstractReader implements ReaderInterface
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read data only?
     *
     * @var bool
     */
    protected $readDataOnly = true;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * File pointer
     *
     * @var bool|resource
     */
    protected $fileHandle;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read data only?
     *
     * @return bool
     */
    public function isReadDataOnly()
    {
        // return $this->readDataOnly;
        return true;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set read data only
     *
     * @param bool $value
     * @return self
     */
    public function setReadDataOnly($value = true)
    {
        $this->readDataOnly = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Open file for reading
     *
     * @param string $filename
     *
     * @throws \PhpOffice\PhpWord\Exception\Exception
     *
     * @return resource
     */
    protected function openFile($filename)
    {
        // Check if file exists
        if (!file_exists($filename) || !is_readable($filename)) {
            throw new Exception("Could not open $filename for reading! File does not exist.");
        }

        // Open file
        $this->fileHandle = fopen($filename, 'r');
        if ($this->fileHandle === false) {
            throw new Exception("Could not open file $filename for reading.");
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Can the current ReaderInterface read the file?
     *
     * @param string $filename
     * @return bool
     */
    public function canRead($filename)
    {
        // Check if file exists
        try {
            $this->openFile($filename);
        } catch (Exception $e) {
            return false;
        }
        if (is_resource($this->fileHandle)) {
            fclose($this->fileHandle);
        }

        return true;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Read data only?
     *
     * @deprecated 0.10.0
     *
     * @codeCoverageIgnore
     */
    public function getReadDataOnly()
    {
        return $this->isReadDataOnly();
    }
}
