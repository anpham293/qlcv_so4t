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
 * Spelling and Grammatical Checking State
 *
 * @see http://www.datypic.com/sc/ooxml/e-w_proofState-1.html
 */
final class ProofState
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Check Completed
     */
    const CLEAN = 'clean';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Check Not Completed
     */
    const DIRTY = 'dirty';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Spell Checking State
     *
     * @var string
     */
    private $spelling;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Grammatical Checking State
     *
     * @var string
     */
    private $grammar;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set the Spell Checking State (dirty or clean)
     *
     * @param string $spelling
     * @throws \InvalidArgumentException
     * @return self
     */
    public function setSpelling($spelling)
    {
        if ($spelling == self::CLEAN || $spelling == self::DIRTY) {
            $this->spelling = $spelling;
        } else {
            throw new \InvalidArgumentException('Invalid value, dirty or clean possible');
        }

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the Spell Checking State
     *
     * @return string
     */
    public function getSpelling()
    {
        return $this->spelling;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set the Grammatical Checking State (dirty or clean)
     *
     * @param string $grammar
     * @throws \InvalidArgumentException
     * @return self
     */
    public function setGrammar($grammar)
    {
        if ($grammar == self::CLEAN || $grammar == self::DIRTY) {
            $this->grammar = $grammar;
        } else {
            throw new \InvalidArgumentException('Invalid value, dirty or clean possible');
        }

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get the Grammatical Checking State
     *
     * @return string
     */
    public function getGrammar()
    {
        return $this->grammar;
    }
}
