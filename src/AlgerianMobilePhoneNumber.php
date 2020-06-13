<?php
/**
 * @link    https://github.com/cherifGsoul/php-algerian-mobile-phone-number
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

namespace Cherif\AlgerianMobilePhoneNumber;

/**
 * AlgerianMobilePhoneNumber represents Algerian mobile phone value.
 *
 * @property string $number The phone number.
 *
 * @author Cherif BOUCHELAGHEM <cherifbouchelaghem@gmail.com>
 */

class AlgerianMobilePhoneNumber
{
    /**
     * @var string the phone number
     */
    private $number;

    private function __construct(string $number)
    {
        $this->setNumber($number);
    }

    /**
     * named constructor that creates an AlgerianMobilePhoneNumber instance
     * @param string $number
     * @return AlgerianMobilePhoneNumber the value object instance
     */
    public static function fromString(string $number): AlgerianMobilePhoneNumber
    {
        $number = preg_replace("/\s+/", "", $number);
        $algerianMobilePhoneNumber = new AlgerianMobilePhoneNumber($number);
        return $algerianMobilePhoneNumber;
    }

    /**
     * Return string value of the phone number
     * @return string the wrapped number
     */
    public function asString(): string
    {
        return $this->number;
    }

    /**
     * Checks if it is Mobile phone number
     * @return bool
     */
    public function isMobilis(): bool
    {
        $pattern = '/^(00213|\+213|0)(6)[0-9]{8}/';
        return !!preg_match($pattern, $this->number);
    }

    /**
     * Checks if it is Djezzy phone number
     * @return bool
     */
    public function isDjezzy(): bool
    {
        $pattern = '/^(00213|\+213|0)(7)[0-9]{8}/';
        return !!preg_match($pattern, $this->number);
    }

    /**
     * Checks if it is Ooredoo phone number
     * @return bool
     */
    public function isOoredoo(): bool
    {
        $pattern = '/^(00213|\+213|0)(5)[0-9]{8}/';
        return !!preg_match($pattern, $this->number);
    }

    /**
     * Changes the phone number and returns a new instance
     * @param string $number the phone number
     * @return AlgerianMobilePhoneNumber the new value object instance
     */
    public function withNumber(string $number): AlgerianMobilePhoneNumber
    {
        return AlgerianMobilePhoneNumber::fromString($number);
    }

    /**
     * Checks if a object equals an instance of AlgerianMobilePhoneNumber
     * @return bool
     */
    public function equals(AlgerianMobilePhoneNumber $other): bool
    {
        return $this->asString() == $other->asString();
    }

    /**
     * Invoked during string casting
     * @return string
     */
    public function __toString(): string
    {
        return $this->asString();
    }

    /**
     * Sets the string number property after validation
     */
    private function setNumber(string $number)
    {
        $pattern = '/^(00213|\+213|0)(5|6|7)[0-9]{8}/';
        if (!preg_match($pattern, $number)) {
            throw new InvalidAlgerianMobilePhoneNumberException('The mobile phone number is invalid!');
        }
        $this->number = $number;
    }
}
