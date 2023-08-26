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

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Document information
 */
class DocInfo
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236 //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@const string Property type constants */
    const PROPERTY_TYPE_BOOLEAN = 'b';
    const PROPERTY_TYPE_INTEGER = 'i';
    const PROPERTY_TYPE_FLOAT = 'f';
    const PROPERTY_TYPE_DATE = 'd';
    const PROPERTY_TYPE_STRING = 's';
    const PROPERTY_TYPE_UNKNOWN = 'u';

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Creator
     *
     * @var string
     */
    private $creator;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * LastModifiedBy
     *
     * @var string
     */
    private $lastModifiedBy;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Created
     *
     * @var int
     */
    private $created;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Modified
     *
     * @var int
     */
    private $modified;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Title
     *
     * @var string
     */
    private $title;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Description
     *
     * @var string
     */
    private $description;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Subject
     *
     * @var string
     */
    private $subject;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Keywords
     *
     * @var string
     */
    private $keywords;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Category
     *
     * @var string
     */
    private $category;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Company
     *
     * @var string
     */
    private $company;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Manager
     *
     * @var string
     */
    private $manager;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Custom Properties
     *
     * @var array
     */
    private $customProperties = array();

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Create new instance
     */
    public function __construct()
    {
        $this->creator = '';
        $this->lastModifiedBy = $this->creator;
        $this->created = time();
        $this->modified = time();
        $this->title = '';
        $this->subject = '';
        $this->description = '';
        $this->keywords = '';
        $this->category = '';
        $this->company = '';
        $this->manager = '';
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Creator
     *
     * @return string
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Creator
     *
     * @param  string $value
     * @return self
     */
    public function setCreator($value = '')
    {
        $this->creator = $this->setValue($value, '');

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Last Modified By
     *
     * @return string
     */
    public function getLastModifiedBy()
    {
        return $this->lastModifiedBy;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Last Modified By
     *
     * @param  string $value
     * @return self
     */
    public function setLastModifiedBy($value = '')
    {
        $this->lastModifiedBy = $this->setValue($value, $this->creator);

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Created
     *
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Created
     *
     * @param  int $value
     * @return self
     */
    public function setCreated($value = null)
    {
        $this->created = $this->setValue($value, time());

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Modified
     *
     * @return int
     */
    public function getModified()
    {
        return $this->modified;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Modified
     *
     * @param  int $value
     * @return self
     */
    public function setModified($value = null)
    {
        $this->modified = $this->setValue($value, time());

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Title
     *
     * @param  string $value
     * @return self
     */
    public function setTitle($value = '')
    {
        $this->title = $this->setValue($value, '');

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Description
     *
     * @param  string $value
     * @return self
     */
    public function setDescription($value = '')
    {
        $this->description = $this->setValue($value, '');

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Subject
     *
     * @param  string $value
     * @return self
     */
    public function setSubject($value = '')
    {
        $this->subject = $this->setValue($value, '');

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Keywords
     *
     * @param string $value
     * @return self
     */
    public function setKeywords($value = '')
    {
        $this->keywords = $this->setValue($value, '');

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Category
     *
     * @param string $value
     * @return self
     */
    public function setCategory($value = '')
    {
        $this->category = $this->setValue($value, '');

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Company
     *
     * @param string $value
     * @return self
     */
    public function setCompany($value = '')
    {
        $this->company = $this->setValue($value, '');

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get Manager
     *
     * @return string
     */
    public function getManager()
    {
        return $this->manager;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set Manager
     *
     * @param string $value
     * @return self
     */
    public function setManager($value = '')
    {
        $this->manager = $this->setValue($value, '');

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get a List of Custom Property Names
     *
     * @return array of string
     */
    public function getCustomProperties()
    {
        return array_keys($this->customProperties);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Check if a Custom Property is defined
     *
     * @param string $propertyName
     * @return bool
     */
    public function isCustomPropertySet($propertyName)
    {
        return isset($this->customProperties[$propertyName]);
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get a Custom Property Value
     *
     * @param string $propertyName
     * @return mixed
     */
    public function getCustomPropertyValue($propertyName)
    {
        if ($this->isCustomPropertySet($propertyName)) {
            return $this->customProperties[$propertyName]['value'];
        }

        return null;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get a Custom Property Type
     *
     * @param string $propertyName
     * @return string
     */
    public function getCustomPropertyType($propertyName)
    {
        if ($this->isCustomPropertySet($propertyName)) {
            return $this->customProperties[$propertyName]['type'];
        }

        return null;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set a Custom Property
     *
     * @param string $propertyName
     * @param mixed $propertyValue
     * @param string $propertyType
     *   'i': Integer
     *   'f': Floating Point
     *   's': String
     *   'd': Date/Time
     *   'b': Boolean
     * @return self
     */
    public function setCustomProperty($propertyName, $propertyValue = '', $propertyType = null)
    {
        $propertyTypes = array(
            self::PROPERTY_TYPE_INTEGER,
            self::PROPERTY_TYPE_FLOAT,
            self::PROPERTY_TYPE_STRING,
            self::PROPERTY_TYPE_DATE,
            self::PROPERTY_TYPE_BOOLEAN,
        );
        if (($propertyType === null) || (!in_array($propertyType, $propertyTypes))) {
            if ($propertyValue === null) {
                $propertyType = self::PROPERTY_TYPE_STRING;
            } elseif (is_float($propertyValue)) {
                $propertyType = self::PROPERTY_TYPE_FLOAT;
            } elseif (is_int($propertyValue)) {
                $propertyType = self::PROPERTY_TYPE_INTEGER;
            } elseif (is_bool($propertyValue)) {
                $propertyType = self::PROPERTY_TYPE_BOOLEAN;
            } elseif ($propertyValue instanceof \DateTime) {
                $propertyType = self::PROPERTY_TYPE_DATE;
            } else {
                $propertyType = self::PROPERTY_TYPE_STRING;
            }
        }

        $this->customProperties[$propertyName] = array(
            'value' => $propertyValue,
            'type'  => $propertyType,
        );

        return $this;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Convert document property based on type
     *
     * @param string $propertyValue
     * @param string $propertyType
     * @return mixed
     */
    public static function convertProperty($propertyValue, $propertyType)
    {
        $conversion = self::getConversion($propertyType);

        switch ($conversion) {
            case 'empty': // Empty
                return '';
            case 'null': // Null
                return null;
            case 'int': // Signed integer
                return (int) $propertyValue;
            case 'uint': // Unsigned integer
                return abs((int) $propertyValue);
            case 'float': // Float
                return (float) $propertyValue;
            case 'date': // Date
                return strtotime($propertyValue);
            case 'bool': // Boolean
                return ($propertyValue == 'true') ? true : false;
        }

        return $propertyValue;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Convert document property type
     *
     * @param string $propertyType
     * @return string
     */
    public static function convertPropertyType($propertyType)
    {
        $typeGroups = array(
            self::PROPERTY_TYPE_INTEGER => array('i1', 'i2', 'i4', 'i8', 'int', 'ui1', 'ui2', 'ui4', 'ui8', 'uint'),
            self::PROPERTY_TYPE_FLOAT   => array('r4', 'r8', 'decimal'),
            self::PROPERTY_TYPE_STRING  => array('empty', 'null', 'lpstr', 'lpwstr', 'bstr'),
            self::PROPERTY_TYPE_DATE    => array('date', 'filetime'),
            self::PROPERTY_TYPE_BOOLEAN => array('bool'),
        );
        foreach ($typeGroups as $groupId => $groupMembers) {
            if (in_array($propertyType, $groupMembers)) {
                return $groupId;
            }
        }

        return self::PROPERTY_TYPE_UNKNOWN;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Set default for null and empty value
     *
     * @param mixed $value
     * @param mixed $default
     * @return mixed
     */
    private function setValue($value, $default)
    {
        if ($value === null || $value == '') {
            $value = $default;
        }

        return $value;
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Get conversion model depending on property type
     *
     * @param string $propertyType
     * @return string
     */
    private static function getConversion($propertyType)
    {
        $conversions = array(
            'empty' => array('empty'),
            'null'  => array('null'),
            'int'   => array('i1', 'i2', 'i4', 'i8', 'int'),
            'uint'  => array('ui1', 'ui2', 'ui4', 'ui8', 'uint'),
            'float' => array('r4', 'r8', 'decimal'),
            'bool'  => array('bool'),
            'date'  => array('date', 'filetime'),
        );
        foreach ($conversions as $conversion => $types) {
            if (in_array($propertyType, $types)) {
                return $conversion;
            }
        }

        return 'string';
    }
}
