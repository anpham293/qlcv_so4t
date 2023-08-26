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

namespace PhpOffice\PhpWord\ComplexType;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Visibility of Annotation Types
 *
 * @see http://www.datypic.com/sc/ooxml/e-w_revisionView-1.html
 */
final class TrackChangesView
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Display Visual Indicator Of Markup Area
     *
     * @var bool
     */
    private $markup;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Display Comments
     *
     * @var bool
     */
    private $comments;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Display Content Revisions
     *
     * @var bool
     */
    private $insDel;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Display Formatting Revisions
     *
     * @var bool
     */
    private $formatting;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Display Ink Annotations
     *
     * @var bool
     */
    private $inkAnnotations;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Display Visual Indicator Of Markup Area
     *
     * @return bool True if markup is shown
     */
    public function hasMarkup()
    {
        return $this->markup;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Display Visual Indicator Of Markup Area
     *
     * @param bool $markup
     *            Set to true to show markup
     */
    public function setMarkup($markup)
    {
        $this->markup = $markup === null ? true : $markup;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Display Comments
     *
     * @return bool True if comments are shown
     */
    public function hasComments()
    {
        return $this->comments;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Display Comments
     *
     * @param bool $comments
     *            Set to true to show comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments === null ? true : $comments;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Display Content Revisions
     *
     * @return bool True if content revisions are shown
     */
    public function hasInsDel()
    {
        return $this->insDel;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Display Content Revisions
     *
     * @param bool $insDel
     *            Set to true to show content revisions
     */
    public function setInsDel($insDel)
    {
        $this->insDel = $insDel === null ? true : $insDel;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Display Formatting Revisions
     *
     * @return bool True if formatting revisions are shown
     */
    public function hasFormatting()
    {
        return $this->formatting;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Display Formatting Revisions
     *
     * @param bool|null $formatting
     *            Set to true to show formatting revisions
     */
    public function setFormatting($formatting = null)
    {
        $this->formatting = $formatting === null ? true : $formatting;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Display Ink Annotations
     *
     * @return bool True if ink annotations are shown
     */
    public function hasInkAnnotations()
    {
        return $this->inkAnnotations;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Display Ink Annotations
     *
     * @param bool $inkAnnotations
     *            Set to true to show ink annotations
     */
    public function setInkAnnotations($inkAnnotations)
    {
        $this->inkAnnotations = $inkAnnotations === null ? true : $inkAnnotations;
    }
}
