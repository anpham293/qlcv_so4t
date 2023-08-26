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

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Exception\InvalidObjectException;
use PhpOffice\PhpWord\Style\Image as ImageStyle;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * OLEObject element
 */
class OLEObject extends AbstractElement
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Ole-Object Src
     *
     * @var string
     */
    private $source;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Image Style
     *
     * @var \PhpOffice\PhpWord\Style\Image
     */
    private $style;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Icon
     *
     * @var string
     */
    private $icon;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Image Relation ID
     *
     * @var int
     */
    private $imageRelationId;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Has media relation flag; true for Link, Image, and Object
     *
     * @var bool
     */
    protected $mediaRelation = true;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create a new Ole-Object Element
     *
     * @param string $source
     * @param mixed $style
     *
     * @throws \PhpOffice\PhpWord\Exception\InvalidObjectException
     */
    public function __construct($source, $style = null)
    {
        $supportedTypes = array('xls', 'doc', 'ppt', 'xlsx', 'docx', 'pptx');
        $pathInfo = pathinfo($source);

        if (file_exists($source) && in_array($pathInfo['extension'], $supportedTypes)) {
            $ext = $pathInfo['extension'];
            if (strlen($ext) == 4 && strtolower(substr($ext, -1)) == 'x') {
                $ext = substr($ext, 0, -1);
            }

            $this->source = $source;
            $this->style = $this->setNewStyle(new ImageStyle(), $style, true);
            $this->icon = realpath(__DIR__ . "/../resources/{$ext}.png");

            return;
        }

        throw new InvalidObjectException();
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get object source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get object style
     *
     * @return \PhpOffice\PhpWord\Style\Image
     */
    public function getStyle()
    {
        return $this->style;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get object icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get image relation ID
     *
     * @return int
     */
    public function getImageRelationId()
    {
        return $this->imageRelationId;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Image Relation ID.
     *
     * @param int $rId
     */
    public function setImageRelationId($rId)
    {
        $this->imageRelationId = $rId;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Object ID
     *
     * @deprecated 0.10.0
     *
     * @return int
     *
     * @codeCoverageIgnore
     */
    public function getObjectId()
    {
        return $this->relationId + 1325353440;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Object ID
     *
     * @deprecated 0.10.0
     *
     * @param int $objId
     *
     * @codeCoverageIgnore
     */
    public function setObjectId($objId)
    {
        $this->relationId = $objId;
    }
}
