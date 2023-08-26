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

use PhpOffice\Common\Microsoft\PasswordEncoder;
use PhpOffice\PhpWord\SimpleType\DocProtect;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Document protection class
 *
 * @since 0.12.0
 * @see http://www.datypic.com/sc/ooxml/t-w_CT_DocProtect.html
 */
class Protection
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Editing restriction none|readOnly|comments|trackedChanges|forms
     *
     * @var string
     * @see  http://www.datypic.com/sc/ooxml/a-w_edit-1.html
     */
    private $editing;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * password
     *
     * @var string
     */
    private $password;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Iterations to Run Hashing Algorithm
     *
     * @var int
     */
    private $spinCount = 100000;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Cryptographic Hashing Algorithm (see constants defined in \PhpOffice\PhpWord\Shared\Microsoft\PasswordEncoder)
     *
     * @var string
     */
    private $algorithm = PasswordEncoder::ALGORITHM_SHA_1;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Salt for Password Verifier
     *
     * @var string
     */
    private $salt;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create a new instance
     *
     * @param string $editing
     */
    public function __construct($editing = null)
    {
        if ($editing != null) {
            $this->setEditing($editing);
        }
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get editing protection
     *
     * @return string
     */
    public function getEditing()
    {
        return $this->editing;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set editing protection
     *
     * @param string $editing Any value of \PhpOffice\PhpWord\SimpleType\DocProtect
     * @return self
     */
    public function setEditing($editing = null)
    {
        DocProtect::validate($editing);
        $this->editing = $editing;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set password
     *
     * @param string $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get count for hash iterations
     *
     * @return int
     */
    public function getSpinCount()
    {
        return $this->spinCount;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set count for hash iterations
     *
     * @param int $spinCount
     * @return self
     */
    public function setSpinCount($spinCount)
    {
        $this->spinCount = $spinCount;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get algorithm
     *
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set algorithm
     *
     * @param string $algorithm
     * @return self
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set salt. Salt HAS to be 16 characters, or an exception will be thrown.
     *
     * @param string $salt
     * @throws \InvalidArgumentException
     * @return self
     */
    public function setSalt($salt)
    {
        if ($salt !== null && strlen($salt) !== 16) {
            throw new \InvalidArgumentException('salt has to be of exactly 16 bytes length');
        }

        $this->salt = $salt;

        return $this;
    }
}
