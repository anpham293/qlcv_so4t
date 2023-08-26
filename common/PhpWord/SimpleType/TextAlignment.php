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

namespace PhpOffice\PhpWord\SimpleType;

use PhpOffice\PhpWord\Shared\AbstractEnum;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Magnification Preset Values
 *
 * @since 0.14.0
 *
 * @see http://www.datypic.com/sc/ooxml/t-w_ST_TextAlignment.html
 */
final class TextAlignment extends AbstractEnum
{
    //Align Text at Top
    const TOP = 'top';

    //Align Text at Center
    const CENTER = 'center';

    //Align Text at Baseline
    const BASELINE = 'baseline';

    //Align Text at Bottom
    const BOTTOM = 'bottom';

    //Automatically Determine Alignment
    const AUTO = 'auto';
}
