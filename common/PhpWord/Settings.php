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

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * PHPWord settings class
 *
 * @since 0.8.0
 */
class Settings
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Zip libraries
     *
     * @const string
     */
    const ZIPARCHIVE = 'ZipArchive';
    const PCLZIP = 'PclZip';
    const OLD_LIB = 'PhpOffice\\PhpWord\\Shared\\ZipArchive'; // @deprecated 0.11

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * PDF rendering libraries
     *
     * @const string
     */
    const PDF_RENDERER_DOMPDF = 'DomPDF';
    const PDF_RENDERER_TCPDF = 'TCPDF';
    const PDF_RENDERER_MPDF = 'MPDF';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Measurement units multiplication factor
     *
     * Applied to:
     * - Section: margins, header/footer height, gutter, column spacing
     * - Tab: position
     * - Indentation: left, right, firstLine, hanging
     * - Spacing: before, after
     *
     * @const string
     */
    const UNIT_TWIP = 'twip'; // = 1/20 point
    const UNIT_CM = 'cm';
    const UNIT_MM = 'mm';
    const UNIT_INCH = 'inch';
    const UNIT_POINT = 'point'; // = 1/72 inch
    const UNIT_PICA = 'pica'; // = 1/6 inch = 12 points

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Default font settings
     *
     * OOXML defined font size values in halfpoints, i.e. twice of what PhpWord
     * use, and the conversion will be conducted during XML writing.
     */
    const DEFAULT_FONT_NAME = 'Arial';
    const DEFAULT_FONT_SIZE = 10;
    const DEFAULT_FONT_COLOR = '000000';
    const DEFAULT_FONT_CONTENT_TYPE = 'default'; // default|eastAsia|cs

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Compatibility option for XMLWriter
     *
     * @var bool
     */
    private static $xmlWriterCompatibility = true;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Name of the class used for Zip file management
     *
     * @var string
     */
    private static $zipClass = self::ZIPARCHIVE;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Name of the external Library used for rendering PDF files
     *
     * @var string
     */
    private static $pdfRendererName = null;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Directory Path to the external Library used for rendering PDF files
     *
     * @var string
     */
    private static $pdfRendererPath = null;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Measurement unit
     *
     * @var int|float
     */
    private static $measurementUnit = self::UNIT_TWIP;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Default font name
     *
     * @var string
     */
    private static $defaultFontName = self::DEFAULT_FONT_NAME;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Default font size
     * @var int
     */
    private static $defaultFontSize = self::DEFAULT_FONT_SIZE;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * The user defined temporary directory.
     *
     * @var string
     */
    private static $tempDir = '';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Enables built-in output escaping mechanism.
     * Default value is `false` for backward compatibility with versions below 0.13.0.
     *
     * @var bool
     */
    private static $outputEscapingEnabled = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Return the compatibility option used by the XMLWriter
     *
     * @return bool Compatibility
     */
    public static function hasCompatibility()
    {
        return self::$xmlWriterCompatibility;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set the compatibility option used by the XMLWriter
     *
     * This sets the setIndent and setIndentString for better compatibility
     *
     * @param bool $compatibility
     * @return bool
     */
    public static function setCompatibility($compatibility)
    {
        $compatibility = (bool) $compatibility;
        self::$xmlWriterCompatibility = $compatibility;

        return true;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get zip handler class
     *
     * @return string
     */
    public static function getZipClass()
    {
        return self::$zipClass;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set zip handler class
     *
     * @param  string $zipClass
     * @return bool
     */
    public static function setZipClass($zipClass)
    {
        if (in_array($zipClass, array(self::PCLZIP, self::ZIPARCHIVE, self::OLD_LIB))) {
            self::$zipClass = $zipClass;

            return true;
        }

        return false;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set details of the external library for rendering PDF files
     *
     * @param string $libraryName
     * @param string $libraryBaseDir
     * @return bool Success or failure
     */
    public static function setPdfRenderer($libraryName, $libraryBaseDir)
    {
        if (!self::setPdfRendererName($libraryName)) {
            return false;
        }

        return self::setPdfRendererPath($libraryBaseDir);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Return the PDF Rendering Library.
     *
     * @return string
     */
    public static function getPdfRendererName()
    {
        return self::$pdfRendererName;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Identify the external library to use for rendering PDF files
     *
     * @param string $libraryName
     * @return bool
     */
    public static function setPdfRendererName($libraryName)
    {
        $pdfRenderers = array(self::PDF_RENDERER_DOMPDF, self::PDF_RENDERER_TCPDF, self::PDF_RENDERER_MPDF);
        if (!in_array($libraryName, $pdfRenderers)) {
            return false;
        }
        self::$pdfRendererName = $libraryName;

        return true;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Return the directory path to the PDF Rendering Library.
     *
     * @return string
     */
    public static function getPdfRendererPath()
    {
        return self::$pdfRendererPath;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Location of external library to use for rendering PDF files
     *
     * @param string $libraryBaseDir Directory path to the library's base folder
     * @return bool Success or failure
     */
    public static function setPdfRendererPath($libraryBaseDir)
    {
        if (false === file_exists($libraryBaseDir) || false === is_readable($libraryBaseDir)) {
            return false;
        }
        self::$pdfRendererPath = $libraryBaseDir;

        return true;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get measurement unit
     *
     * @return string
     */
    public static function getMeasurementUnit()
    {
        return self::$measurementUnit;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set measurement unit
     *
     * @param string $value
     * @return bool
     */
    public static function setMeasurementUnit($value)
    {
        $units = array(self::UNIT_TWIP, self::UNIT_CM, self::UNIT_MM, self::UNIT_INCH,
            self::UNIT_POINT, self::UNIT_PICA, );
        if (!in_array($value, $units)) {
            return false;
        }
        self::$measurementUnit = $value;

        return true;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Sets the user defined path to temporary directory.
     *
     * @since 0.12.0
     *
     * @param string $tempDir The user defined path to temporary directory
     */
    public static function setTempDir($tempDir)
    {
        self::$tempDir = $tempDir;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Returns path to temporary directory.
     *
     * @since 0.12.0
     *
     * @return string
     */
    public static function getTempDir()
    {
        if (!empty(self::$tempDir)) {
            $tempDir = self::$tempDir;
        } else {
            $tempDir = sys_get_temp_dir();
        }

        return $tempDir;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @since 0.13.0
     *
     * @return bool
     */
    public static function isOutputEscapingEnabled()
    {
        return self::$outputEscapingEnabled;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @since 0.13.0
     *
     * @param bool $outputEscapingEnabled
     */
    public static function setOutputEscapingEnabled($outputEscapingEnabled)
    {
        self::$outputEscapingEnabled = $outputEscapingEnabled;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get default font name
     *
     * @return string
     */
    public static function getDefaultFontName()
    {
        return self::$defaultFontName;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set default font name
     *
     * @param string $value
     * @return bool
     */
    public static function setDefaultFontName($value)
    {
        if (is_string($value) && trim($value) !== '') {
            self::$defaultFontName = $value;

            return true;
        }

        return false;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get default font size
     *
     * @return int
     */
    public static function getDefaultFontSize()
    {
        return self::$defaultFontSize;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set default font size
     *
     * @param int $value
     * @return bool
     */
    public static function setDefaultFontSize($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            self::$defaultFontSize = $value;

            return true;
        }

        return false;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Load setting from phpword.yml or phpword.yml.dist
     *
     * @param string $filename
     * @return array
     */
    public static function loadConfig($filename = null)
    {
        // Get config file
        $configFile = null;
        $configPath = __DIR__ . '/../../';
        if ($filename !== null) {
            $files = array($filename);
        } else {
            $files = array("{$configPath}phpword.ini", "{$configPath}phpword.ini.dist");
        }
        foreach ($files as $file) {
            if (file_exists($file)) {
                $configFile = realpath($file);
                break;
            }
        }

        // Parse config file
        $config = array();
        if ($configFile !== null) {
            $config = @parse_ini_file($configFile);
            if ($config === false) {
                return $config;
            }
        }

        // Set config value
        foreach ($config as $key => $value) {
            $method = "set{$key}";
            if (method_exists(__CLASS__, $method)) {
                self::$method($value);
            }
        }

        return $config;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Return the compatibility option used by the XMLWriter
     *
     * @deprecated 0.10.0
     *
     * @codeCoverageIgnore
     */
    public static function getCompatibility()
    {
        return self::hasCompatibility();
    }
}
