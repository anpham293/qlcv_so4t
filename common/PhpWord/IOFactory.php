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

namespace PhpOffice\PhpWord;

use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\Reader\ReaderInterface;
use PhpOffice\PhpWord\Writer\WriterInterface;

abstract class IOFactory
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new writer
     *
     * @param PhpWord $phpWord
     * @param string $name
     *
     * @throws \PhpOffice\PhpWord\Exception\Exception
     *
     * @return WriterInterface
     */
    public static function createWriter(PhpWord $phpWord, $name = 'Word2007')
    {
        if ($name !== 'WriterInterface' && !in_array($name, array('ODText', 'RTF', 'Word2007', 'HTML', 'PDF'), true)) {
            throw new Exception("\"{$name}\" is not a valid writer.");
        }

        $fqName = "PhpOffice\\PhpWord\\Writer\\{$name}";

        return new $fqName($phpWord);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new reader
     *
     * @param string $name
     *
     * @throws Exception
     *
     * @return ReaderInterface
     */
    public static function createReader($name = 'Word2007')
    {
        return self::createObject('Reader', $name);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new object
     *
     * @param string $type
     * @param string $name
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     *
     * @throws \PhpOffice\PhpWord\Exception\Exception
     *
     * @return \PhpOffice\PhpWord\Writer\WriterInterface|\PhpOffice\PhpWord\Reader\ReaderInterface
     */
    private static function createObject($type, $name, $phpWord = null)
    {
        $class = "PhpOffice\\PhpWord\\{$type}\\{$name}";
        if (class_exists($class) && self::isConcreteClass($class)) {
            return new $class($phpWord);
        }
        throw new Exception("\"{$name}\" is not a valid {$type}.");
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Loads PhpWord from file
     *
     * @param string $filename The name of the file
     * @param string $readerName
     * @return \PhpOffice\PhpWord\PhpWord $phpWord
     */
    public static function load($filename, $readerName = 'Word2007')
    {
        /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \PhpOffice\PhpWord\Reader\ReaderInterface $reader */
        $reader = self::createReader($readerName);

        return $reader->load($filename);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Check if it's a concrete class (not abstract nor interface)
     *
     * @param string $class
     * @return bool
     */
    private static function isConcreteClass($class)
    {
        $reflection = new \ReflectionClass($class);

        return !$reflection->isAbstract() && !$reflection->isInterface();
    }
}
