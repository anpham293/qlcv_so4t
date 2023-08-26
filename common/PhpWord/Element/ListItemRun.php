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

use PhpOffice\PhpWord\Style\ListItem as ListItemStyle;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * List item element
 */
class ListItemRun extends TextRun
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @var string Container type
     */
    protected $container = 'ListItemRun';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * ListItem Style
     *
     * @var \PhpOffice\PhpWord\Style\ListItem
     */
    private $style;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * ListItem Depth
     *
     * @var int
     */
    private $depth;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create a new ListItem
     *
     * @param int $depth
     * @param array|string|null $listStyle
     * @param mixed $paragraphStyle
     */
    public function __construct($depth = 0, $listStyle = null, $paragraphStyle = null)
    {
        $this->depth = $depth;

        // Version >= 0.10.0 will pass numbering style name. Older version will use old method
        if (!is_null($listStyle) && is_string($listStyle)) {
            $this->style = new ListItemStyle($listStyle);
        } else {
            $this->style = $this->setNewStyle(new ListItemStyle(), $listStyle, true);
        }
        parent::__construct($paragraphStyle);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get ListItem style.
     *
     * @return \PhpOffice\PhpWord\Style\ListItem
     */
    public function getStyle()
    {
        return $this->style;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get ListItem depth.
     *
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }
}
