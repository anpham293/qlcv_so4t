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

namespace PhpOffice\PhpWord\Style;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Font style
 */
class Font extends AbstractStyle
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Underline types
     *
     * @const string
     */
    const UNDERLINE_NONE = 'none';
    const UNDERLINE_DASH = 'dash';
    const UNDERLINE_DASHHEAVY = 'dashHeavy';
    const UNDERLINE_DASHLONG = 'dashLong';
    const UNDERLINE_DASHLONGHEAVY = 'dashLongHeavy';
    const UNDERLINE_DOUBLE = 'dbl';
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @deprecated use UNDERLINE_DOTHASH instead, TODO remove in version 1.0
     */
    const UNDERLINE_DOTHASH = 'dotDash';  // Incorrect spelling, for backwards compatibility
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @deprecated use UNDERLINE_DOTDASHHEAVY instead, TODO remove in version 1.0
     */
    const UNDERLINE_DOTHASHHEAVY = 'dotDashHeavy';  // Incorrect spelling, for backwards compatibility
    const UNDERLINE_DOTDASH = 'dotDash';
    const UNDERLINE_DOTDASHHEAVY = 'dotDashHeavy';
    const UNDERLINE_DOTDOTDASH = 'dotDotDash';
    const UNDERLINE_DOTDOTDASHHEAVY = 'dotDotDashHeavy';
    const UNDERLINE_DOTTED = 'dotted';
    const UNDERLINE_DOTTEDHEAVY = 'dottedHeavy';
    const UNDERLINE_HEAVY = 'heavy';
    const UNDERLINE_SINGLE = 'single';
    const UNDERLINE_WAVY = 'wavy';
    const UNDERLINE_WAVYDOUBLE = 'wavyDbl';
    const UNDERLINE_WAVYHEAVY = 'wavyHeavy';
    const UNDERLINE_WORDS = 'words';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Foreground colors
     *
     * @const string
     */
    const FGCOLOR_YELLOW = 'yellow';
    const FGCOLOR_LIGHTGREEN = 'green';
    const FGCOLOR_CYAN = 'cyan';
    const FGCOLOR_MAGENTA = 'magenta';
    const FGCOLOR_BLUE = 'blue';
    const FGCOLOR_RED = 'red';
    const FGCOLOR_DARKBLUE = 'darkBlue';
    const FGCOLOR_DARKCYAN = 'darkCyan';
    const FGCOLOR_DARKGREEN = 'darkGreen';
    const FGCOLOR_DARKMAGENTA = 'darkMagenta';
    const FGCOLOR_DARKRED = 'darkRed';
    const FGCOLOR_DARKYELLOW = 'darkYellow';
    const FGCOLOR_DARKGRAY = 'darkGray';
    const FGCOLOR_LIGHTGRAY = 'lightGray';
    const FGCOLOR_BLACK = 'black';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Aliases
     *
     * @var array
     */
    protected $aliases = array('line-height' => 'lineHeight');

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Font style type
     *
     * @var string
     */
    private $type;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Font name
     *
     * @var string
     */
    private $name;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Font Content Type
     *
     * @var string
     */
    private $hint;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Font size
     *
     * @var int|float
     */
    private $size;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Font color
     *
     * @var string
     */
    private $color;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Bold
     *
     * @var bool
     */
    private $bold = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Italic
     *
     * @var bool
     */
    private $italic = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Undeline
     *
     * @var string
     */
    private $underline = self::UNDERLINE_NONE;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Superscript
     *
     * @var bool
     */
    private $superScript = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Subscript
     *
     * @var bool
     */
    private $subScript = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Strikethrough
     *
     * @var bool
     */
    private $strikethrough = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Double strikethrough
     *
     * @var bool
     */
    private $doubleStrikethrough = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Small caps
     *
     * @var bool
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_smallCaps-1.html
     */
    private $smallCaps = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * All caps
     *
     * @var bool
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_caps-1.html
     */
    private $allCaps = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Foreground/highlight
     *
     * @var string
     */
    private $fgColor;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Expanded/compressed text: 0-600 (percent)
     *
     * @var int
     * @since 0.12.0
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_w-1.html
     */
    private $scale;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Character spacing adjustment: twip
     *
     * @var int|float
     * @since 0.12.0
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_spacing-2.html
     */
    private $spacing;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Font kerning: halfpoint
     *
     * @var int|float
     * @since 0.12.0
     * @see  http://www.schemacentral.com/sc/ooxml/e-w_kern-1.html
     */
    private $kerning;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Paragraph style
     *
     * @var \PhpOffice\PhpWord\Style\Paragraph
     */
    private $paragraph;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Shading
     *
     * @var \PhpOffice\PhpWord\Style\Shading
     */
    private $shading;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Right to left languages
     *
     * @var bool
     */
    private $rtl = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * noProof (disables AutoCorrect)
     *
     * @var bool
     * http://www.datypic.com/sc/ooxml/e-w_noProof-1.html
     */
    private $noProof = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Languages
     *
     * @var \PhpOffice\PhpWord\Style\Language
     */
    private $lang;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Vertically Raised or Lowered Text
     *
     * @var int Signed Half-Point Measurement
     * @see http://www.datypic.com/sc/ooxml/e-w_position-1.html
     */
    private $position;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new font style
     *
     * @param string $type Type of font
     * @param array|string|\PhpOffice\PhpWord\Style\AbstractStyle $paragraph Paragraph styles definition
     */
    public function __construct($type = 'text', $paragraph = null)
    {
        $this->type = $type;
        $this->setParagraph($paragraph);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get style values
     *
     * @return array
     * @since 0.12.0
     */
    public function getStyleValues()
    {
        $styles = array(
            'name'          => $this->getStyleName(),
            'basic'         => array(
                'name'      => $this->getName(),
                'size'      => $this->getSize(),
                'color'     => $this->getColor(),
                'hint'      => $this->getHint(),
            ),
            'style'         => array(
                'bold'      => $this->isBold(),
                'italic'    => $this->isItalic(),
                'underline' => $this->getUnderline(),
                'strike'    => $this->isStrikethrough(),
                'dStrike'   => $this->isDoubleStrikethrough(),
                'super'     => $this->isSuperScript(),
                'sub'       => $this->isSubScript(),
                'smallCaps' => $this->isSmallCaps(),
                'allCaps'   => $this->isAllCaps(),
                'fgColor'   => $this->getFgColor(),
            ),
            'spacing'       => array(
                'scale'     => $this->getScale(),
                'spacing'   => $this->getSpacing(),
                'kerning'   => $this->getKerning(),
                'position'  => $this->getPosition(),
            ),
            'paragraph'     => $this->getParagraph(),
            'rtl'           => $this->isRTL(),
            'shading'       => $this->getShading(),
            'lang'          => $this->getLang(),
        );

        return $styles;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get style type
     *
     * @return string
     */
    public function getStyleType()
    {
        return $this->type;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get font name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set font name
     *
     * @param string $value
     * @return self
     */
    public function setName($value = null)
    {
        $this->name = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Font Content Type
     *
     * @return string
     */
    public function getHint()
    {
        return $this->hint;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Font Content Type
     *
     * @param string $value
     * @return self
     */
    public function setHint($value = null)
    {
        $this->hint = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get font size
     *
     * @return int|float
     */
    public function getSize()
    {
        return $this->size;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set font size
     *
     * @param int|float $value
     * @return self
     */
    public function setSize($value = null)
    {
        $this->size = $this->setNumericVal($value, $this->size);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get font color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set font color
     *
     * @param string $value
     * @return self
     */
    public function setColor($value = null)
    {
        $this->color = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get bold
     *
     * @return bool
     */
    public function isBold()
    {
        return $this->bold;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set bold
     *
     * @param bool $value
     * @return self
     */
    public function setBold($value = true)
    {
        $this->bold = $this->setBoolVal($value, $this->bold);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get italic
     *
     * @return bool
     */
    public function isItalic()
    {
        return $this->italic;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set italic
     *
     * @param bool $value
     * @return self
     */
    public function setItalic($value = true)
    {
        $this->italic = $this->setBoolVal($value, $this->italic);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get underline
     *
     * @return string
     */
    public function getUnderline()
    {
        return $this->underline;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set underline
     *
     * @param string $value
     * @return self
     */
    public function setUnderline($value = self::UNDERLINE_NONE)
    {
        $this->underline = $this->setNonEmptyVal($value, self::UNDERLINE_NONE);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get superscript
     *
     * @return bool
     */
    public function isSuperScript()
    {
        return $this->superScript;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set superscript
     *
     * @param bool $value
     * @return self
     */
    public function setSuperScript($value = true)
    {
        return $this->setPairedVal($this->superScript, $this->subScript, $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get subscript
     *
     * @return bool
     */
    public function isSubScript()
    {
        return $this->subScript;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set subscript
     *
     * @param bool $value
     * @return self
     */
    public function setSubScript($value = true)
    {
        return $this->setPairedVal($this->subScript, $this->superScript, $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get strikethrough
     *
     * @return bool
     */
    public function isStrikethrough()
    {
        return $this->strikethrough;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set strikethrough
     *
     * @param bool $value
     * @return self
     */
    public function setStrikethrough($value = true)
    {
        return $this->setPairedVal($this->strikethrough, $this->doubleStrikethrough, $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get double strikethrough
     *
     * @return bool
     */
    public function isDoubleStrikethrough()
    {
        return $this->doubleStrikethrough;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set double strikethrough
     *
     * @param bool $value
     * @return self
     */
    public function setDoubleStrikethrough($value = true)
    {
        return $this->setPairedVal($this->doubleStrikethrough, $this->strikethrough, $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get small caps
     *
     * @return bool
     */
    public function isSmallCaps()
    {
        return $this->smallCaps;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set small caps
     *
     * @param bool $value
     * @return self
     */
    public function setSmallCaps($value = true)
    {
        return $this->setPairedVal($this->smallCaps, $this->allCaps, $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get all caps
     *
     * @return bool
     */
    public function isAllCaps()
    {
        return $this->allCaps;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set all caps
     *
     * @param bool $value
     * @return self
     */
    public function setAllCaps($value = true)
    {
        return $this->setPairedVal($this->allCaps, $this->smallCaps, $value);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get foreground/highlight color
     *
     * @return string
     */
    public function getFgColor()
    {
        return $this->fgColor;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set foreground/highlight color
     *
     * @param string $value
     * @return self
     */
    public function setFgColor($value = null)
    {
        $this->fgColor = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get background
     *
     * @return string
     */
    public function getBgColor()
    {
        return $this->getChildStyleValue($this->shading, 'fill');
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set background
     *
     * @param string $value
     * @return \PhpOffice\PhpWord\Style\Table
     */
    public function setBgColor($value = null)
    {
        $this->setShading(array('fill' => $value));
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get scale
     *
     * @return int
     */
    public function getScale()
    {
        return $this->scale;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set scale
     *
     * @param int $value
     * @return self
     */
    public function setScale($value = null)
    {
        $this->scale = $this->setIntVal($value, null);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get font spacing
     *
     * @return int|float
     */
    public function getSpacing()
    {
        return $this->spacing;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set font spacing
     *
     * @param int|float $value
     * @return self
     */
    public function setSpacing($value = null)
    {
        $this->spacing = $this->setNumericVal($value, null);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get font kerning
     *
     * @return int|float
     */
    public function getKerning()
    {
        return $this->kerning;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set font kerning
     *
     * @param int|float $value
     * @return self
     */
    public function setKerning($value = null)
    {
        $this->kerning = $this->setNumericVal($value, null);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get noProof (disables autocorrect)
     *
     * @return bool
     */
    public function isNoProof()
    {
        return $this->noProof;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set noProof (disables autocorrect)
     *
     * @param bool $value
     * @return $this
     */
    public function setNoProof($value = false)
    {
        $this->noProof = $value;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get line height
     *
     * @return int|float
     */
    public function getLineHeight()
    {
        return $this->getParagraph()->getLineHeight();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set lineheight
     *
     * @param int|float|string $value
     * @return self
     */
    public function setLineHeight($value)
    {
        $this->setParagraph(array('lineHeight' => $value));

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get paragraph style
     *
     * @return \PhpOffice\PhpWord\Style\Paragraph
     */
    public function getParagraph()
    {
        return $this->paragraph;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Paragraph
     *
     * @param mixed $value
     * @return self
     */
    public function setParagraph($value = null)
    {
        $this->setObjectVal($value, 'Paragraph', $this->paragraph);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get rtl
     *
     * @return bool
     */
    public function isRTL()
    {
        return $this->rtl;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set rtl
     *
     * @param bool $value
     * @return self
     */
    public function setRTL($value = true)
    {
        $this->rtl = $this->setBoolVal($value, $this->rtl);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get shading
     *
     * @return \PhpOffice\PhpWord\Style\Shading
     */
    public function getShading()
    {
        return $this->shading;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set shading
     *
     * @param mixed $value
     * @return self
     */
    public function setShading($value = null)
    {
        $this->setObjectVal($value, 'Shading', $this->shading);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get language
     *
     * @return \PhpOffice\PhpWord\Style\Language
     */
    public function getLang()
    {
        return $this->lang;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set language
     *
     * @param mixed $value
     * @return self
     */
    public function setLang($value = null)
    {
        if (is_string($value) && $value != '') {
            $value = new Language($value);
        }
        $this->setObjectVal($value, 'Language', $this->lang);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get bold
     *
     * @deprecated 0.10.0
     *
     * @codeCoverageIgnore
     */
    public function getBold()
    {
        return $this->isBold();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get italic
     *
     * @deprecated 0.10.0
     *
     * @codeCoverageIgnore
     */
    public function getItalic()
    {
        return $this->isItalic();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get superscript
     *
     * @deprecated 0.10.0
     *
     * @codeCoverageIgnore
     */
    public function getSuperScript()
    {
        return $this->isSuperScript();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get subscript
     *
     * @deprecated 0.10.0
     *
     * @codeCoverageIgnore
     */
    public function getSubScript()
    {
        return $this->isSubScript();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get strikethrough
     *
     * @deprecated 0.10.0
     *
     * @codeCoverageIgnore
     */
    public function getStrikethrough()
    {
        return $this->isStrikethrough();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get paragraph style
     *
     * @deprecated 0.11.0
     *
     * @codeCoverageIgnore
     */
    public function getParagraphStyle()
    {
        return $this->getParagraph();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set position
     *
     * @param int $value
     * @return self
     */
    public function setPosition($value = null)
    {
        $this->position = $this->setIntVal($value, null);

        return $this;
    }
}
