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

namespace PhpOffice\PhpWord\Escaper;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * @since 0.13.0
 *
 * @codeCoverageIgnore
 */
class Rtf extends AbstractEscaper
{
    protected function escapeAsciiCharacter($code)
    {
        if (20 > $code || $code >= 80) {
            return '{\u' . $code . '}';
        }

        return chr($code);
    }

    protected function escapeMultibyteCharacter($code)
    {
        return '\uc0{\u' . $code . '}';
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @see http://www.randomchaos.com/documents/?source=php_and_unicode
     * @param string $input
     */
    protected function escapeSingleValue($input)
    {
        $escapedValue = '';

        $numberOfBytes = 1;
        $bytes = array();
        for ($i = 0; $i < strlen($input); ++$i) {
            $character = $input[$i];
            $asciiCode = ord($character);

            if ($asciiCode < 128) {
                $escapedValue .= $this->escapeAsciiCharacter($asciiCode);
            } else {
                if (0 == count($bytes)) {
                    if ($asciiCode < 224) {
                        $numberOfBytes = 2;
                    } elseif ($asciiCode < 240) {
                        $numberOfBytes = 3;
                    } elseif ($asciiCode < 248) {
                        $numberOfBytes = 4;
                    }
                }

                $bytes[] = $asciiCode;

                if ($numberOfBytes == count($bytes)) {
                    if (4 == $numberOfBytes) {
                        $multibyteCode = ($bytes[0] % 8) * 262144 + ($bytes[1] % 64) * 4096 + ($bytes[2] % 64) * 64 + ($bytes[3] % 64);
                    } elseif (3 == $numberOfBytes) {
                        $multibyteCode = ($bytes[0] % 16) * 4096 + ($bytes[1] % 64) * 64 + ($bytes[2] % 64);
                    } else {
                        $multibyteCode = ($bytes[0] % 32) * 64 + ($bytes[1] % 64);
                    }

                    if (65279 != $multibyteCode) {
                        $escapedValue .= $multibyteCode < 128 ? $this->escapeAsciiCharacter($multibyteCode) : $this->escapeMultibyteCharacter($multibyteCode);
                    }

                    $numberOfBytes = 1;
                    $bytes = array();
                }
            }
        }

        return $escapedValue;
    }
}