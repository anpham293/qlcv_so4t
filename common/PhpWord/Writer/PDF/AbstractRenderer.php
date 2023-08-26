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
 * @see         https://github.com/PHPOffice/PhpWord
 * @copyright   2010-2018 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\PDF;

use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Writer\HTML;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Abstract PDF renderer
 *
 * @since 0.10.0
 */
abstract class AbstractRenderer extends HTML
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Name of renderer include file
     *
     * @var string
     */
    protected $includeFile;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Temporary storage directory
     *
     * @var string
     */
    protected $tempDir = '';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Font
     *
     * @var string
     */
    protected $font;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Paper size
     *
     * @var int
     */
    protected $paperSize;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Orientation
     *
     * @var string
     */
    protected $orientation;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Paper Sizes xRef List
     *
     * @var array
     */
    protected static $paperSizes = array(
        9 => 'A4', // (210 mm by 297 mm)
    );

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new instance
     *
     * @param PhpWord $phpWord PhpWord object
     *
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function __construct(PhpWord $phpWord)
    {
        parent::__construct($phpWord);
        if ($this->includeFile != null) {
            $includeFile = Settings::getPdfRendererPath() . '/' . $this->includeFile;
            if (file_exists($includeFile)) {
                /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@noinspection PhpIncludeInspection Dynamic includes */
                require_once $includeFile;
            } else {
                // @codeCoverageIgnoreStart
                // Can't find any test case. Uncomment when found.
                throw new Exception('Unable to load PDF Rendering library');
                // @codeCoverageIgnoreEnd
            }
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Font
     *
     * @return string
     */
    public function getFont()
    {
        return $this->font;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set font. Examples:
     *      'arialunicid0-chinese-simplified'
     *      'arialunicid0-chinese-traditional'
     *      'arialunicid0-korean'
     *      'arialunicid0-japanese'
     *
     * @param string $fontName
     * @return self
     */
    public function setFont($fontName)
    {
        $this->font = $fontName;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Paper Size
     *
     * @return int
     */
    public function getPaperSize()
    {
        return $this->paperSize;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Paper Size
     *
     * @param int $value Paper size = PAPERSIZE_A4
     * @return self
     */
    public function setPaperSize($value = 9)
    {
        $this->paperSize = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Orientation
     *
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Orientation
     *
     * @param string $value Page orientation ORIENTATION_DEFAULT
     * @return self
     */
    public function setOrientation($value = 'default')
    {
        $this->orientation = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Save PhpWord to PDF file, pre-save
     *
     * @param string $filename Name of the file to save as
     *
     * @throws \PhpOffice\PhpWord\Exception\Exception
     * @return resource
     */
    protected function prepareForSave($filename = null)
    {
        $fileHandle = fopen($filename, 'w');
        // @codeCoverageIgnoreStart
        // Can't find any test case. Uncomment when found.
        if ($fileHandle === false) {
            throw new Exception("Could not open file $filename for writing.");
        }
        // @codeCoverageIgnoreEnd
        $this->isPdf = true;

        return $fileHandle;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Save PhpWord to PDF file, post-save
     *
     * @param resource $fileHandle
     *
     * @throws Exception
     */
    protected function restoreStateAfterSave($fileHandle)
    {
        fclose($fileHandle);
    }
}
