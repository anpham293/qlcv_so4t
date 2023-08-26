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

namespace PhpOffice\PhpWord\Metadata;

use PhpOffice\PhpWord\ComplexType\ProofState;
use PhpOffice\PhpWord\ComplexType\TrackChangesView;
use PhpOffice\PhpWord\SimpleType\Zoom;
use PhpOffice\PhpWord\Style\Language;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Setting class
 *
 * @since 0.14.0
 * @see  http://www.datypic.com/sc/ooxml/t-w_CT_Settings.html
 */
class Settings
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Magnification Setting
     *
     * @see  http://www.datypic.com/sc/ooxml/e-w_zoom-1.html
     * @var mixed either integer, in which case it treated as a percent, or one of PhpOffice\PhpWord\SimpleType\Zoom
     */
    private $zoom = 100;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Mirror Page Margins
     *
     * @see http://www.datypic.com/sc/ooxml/e-w_mirrorMargins-1.html
     * @var bool
     */
    private $mirrorMargins;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Hide spelling errors
     *
     * @var bool
     */
    private $hideSpellingErrors = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Hide grammatical errors
     *
     * @var bool
     */
    private $hideGrammaticalErrors = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Visibility of Annotation Types
     *
     * @var TrackChangesView
     */
    private $revisionView;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Track Revisions to Document
     *
     * @var bool
     */
    private $trackRevisions = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Do Not Use Move Syntax When Tracking Revisions
     *
     * @var bool
     */
    private $doNotTrackMoves = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Do Not Track Formatting Revisions When Tracking Revisions
     *
     * @var bool
     */
    private $doNotTrackFormatting = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Spelling and Grammatical Checking State
     *
     * @var \PhpOffice\PhpWord\ComplexType\ProofState
     */
    private $proofState;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Document Editing Restrictions
     *
     * @var \PhpOffice\PhpWord\Metadata\Protection
     */
    private $documentProtection;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Enables different header for odd and even pages.
     *
     * @var bool
     */
    private $evenAndOddHeaders = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Theme Font Languages
     *
     * @var Language
     */
    private $themeFontLang;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Automatically Recalculate Fields on Open
     *
     * @var bool
     */
    private $updateFields = false;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Radix Point for Field Code Evaluation
     *
     * @var string
     */
    private $decimalSymbol = '.';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Automatically hyphenate document contents when displayed
     *
     * @var bool|null
     */
    private $autoHyphenation;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Maximum number of consecutively hyphenated lines
     *
     * @var int|null
     */
    private $consecutiveHyphenLimit;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * The allowed amount of whitespace before hyphenation is applied
     * @var float|null
     */
    private $hyphenationZone;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Do not hyphenate words in all capital letters
     * @var bool|null
     */
    private $doNotHyphenateCaps;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return Protection
     */
    public function getDocumentProtection()
    {
        if ($this->documentProtection == null) {
            $this->documentProtection = new Protection();
        }

        return $this->documentProtection;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param Protection $documentProtection
     */
    public function setDocumentProtection($documentProtection)
    {
        $this->documentProtection = $documentProtection;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return ProofState
     */
    public function getProofState()
    {
        if ($this->proofState == null) {
            $this->proofState = new ProofState();
        }

        return $this->proofState;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param ProofState $proofState
     */
    public function setProofState($proofState)
    {
        $this->proofState = $proofState;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Are spelling errors hidden
     *
     * @return bool
     */
    public function hasHideSpellingErrors()
    {
        return $this->hideSpellingErrors;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Hide spelling errors
     *
     * @param bool $hideSpellingErrors
     */
    public function setHideSpellingErrors($hideSpellingErrors)
    {
        $this->hideSpellingErrors = $hideSpellingErrors === null ? true : $hideSpellingErrors;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Are grammatical errors hidden
     *
     * @return bool
     */
    public function hasHideGrammaticalErrors()
    {
        return $this->hideGrammaticalErrors;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Hide grammatical errors
     *
     * @param bool $hideGrammaticalErrors
     */
    public function setHideGrammaticalErrors($hideGrammaticalErrors)
    {
        $this->hideGrammaticalErrors = $hideGrammaticalErrors === null ? true : $hideGrammaticalErrors;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return bool
     */
    public function hasEvenAndOddHeaders()
    {
        return $this->evenAndOddHeaders;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param bool $evenAndOddHeaders
     */
    public function setEvenAndOddHeaders($evenAndOddHeaders)
    {
        $this->evenAndOddHeaders = $evenAndOddHeaders === null ? true : $evenAndOddHeaders;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the Visibility of Annotation Types
     *
     * @return \PhpOffice\PhpWord\ComplexType\TrackChangesView
     */
    public function getRevisionView()
    {
        return $this->revisionView;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set the Visibility of Annotation Types
     *
     * @param TrackChangesView $trackChangesView
     */
    public function setRevisionView(TrackChangesView $trackChangesView = null)
    {
        $this->revisionView = $trackChangesView;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return bool
     */
    public function hasTrackRevisions()
    {
        return $this->trackRevisions;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param bool $trackRevisions
     */
    public function setTrackRevisions($trackRevisions)
    {
        $this->trackRevisions = $trackRevisions === null ? true : $trackRevisions;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return bool
     */
    public function hasDoNotTrackMoves()
    {
        return $this->doNotTrackMoves;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param bool $doNotTrackMoves
     */
    public function setDoNotTrackMoves($doNotTrackMoves)
    {
        $this->doNotTrackMoves = $doNotTrackMoves === null ? true : $doNotTrackMoves;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return bool
     */
    public function hasDoNotTrackFormatting()
    {
        return $this->doNotTrackFormatting;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param bool $doNotTrackFormatting
     */
    public function setDoNotTrackFormatting($doNotTrackFormatting)
    {
        $this->doNotTrackFormatting = $doNotTrackFormatting === null ? true : $doNotTrackFormatting;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return mixed
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param mixed $zoom
     */
    public function setZoom($zoom)
    {
        if (is_numeric($zoom)) {
            // zoom is a percentage
            $this->zoom = $zoom;
        } else {
            Zoom::validate($zoom);
            $this->zoom = $zoom;
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return bool
     */
    public function hasMirrorMargins()
    {
        return $this->mirrorMargins;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param bool $mirrorMargins
     */
    public function setMirrorMargins($mirrorMargins)
    {
        $this->mirrorMargins = $mirrorMargins;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Returns the Language
     *
     * @return Language
     */
    public function getThemeFontLang()
    {
        return $this->themeFontLang;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * sets the Language for this document
     *
     * @param Language $themeFontLang
     */
    public function setThemeFontLang($themeFontLang)
    {
        $this->themeFontLang = $themeFontLang;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return bool
     */
    public function hasUpdateFields()
    {
        return $this->updateFields;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param bool $updateFields
     */
    public function setUpdateFields($updateFields)
    {
        $this->updateFields = $updateFields === null ? false : $updateFields;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Returns the Radix Point for Field Code Evaluation
     *
     * @return string
     */
    public function getDecimalSymbol()
    {
        return $this->decimalSymbol;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * sets the Radix Point for Field Code Evaluation
     *
     * @param string $decimalSymbol
     */
    public function setDecimalSymbol($decimalSymbol)
    {
        $this->decimalSymbol = $decimalSymbol;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return bool|null
     */
    public function hasAutoHyphenation()
    {
        return $this->autoHyphenation;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param bool $autoHyphenation
     */
    public function setAutoHyphenation($autoHyphenation)
    {
        $this->autoHyphenation = (bool) $autoHyphenation;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return int|null
     */
    public function getConsecutiveHyphenLimit()
    {
        return $this->consecutiveHyphenLimit;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param int $consecutiveHyphenLimit
     */
    public function setConsecutiveHyphenLimit($consecutiveHyphenLimit)
    {
        $this->consecutiveHyphenLimit = (int) $consecutiveHyphenLimit;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return float|null
     */
    public function getHyphenationZone()
    {
        return $this->hyphenationZone;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param float $hyphenationZone Measurement unit is twip
     */
    public function setHyphenationZone($hyphenationZone)
    {
        $this->hyphenationZone = $hyphenationZone;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @return null|bool
     */
    public function hasDoNotHyphenateCaps()
    {
        return $this->doNotHyphenateCaps;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @param bool $doNotHyphenateCaps
     */
    public function setDoNotHyphenateCaps($doNotHyphenateCaps)
    {
        $this->doNotHyphenateCaps = (bool) $doNotHyphenateCaps;
    }
}
