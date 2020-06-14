<?php

namespace spec\Cherif\AlgerianMobilePhoneNumber;

use Cherif\AlgerianMobilePhoneNumber\AlgerianMobilePhoneNumber;
use Cherif\AlgerianMobilePhoneNumber\InvalidAlgerianMobilePhoneNumberException;
use Cherif\AlgerianMobilePhoneNumber\InvalidAlgerianPhoneNumberException;
use PhpSpec\ObjectBehavior;

class AlgerianMobilePhoneNumberSpec extends ObjectBehavior
{
    function it_throws_for_mobilis_phone_number_length_after_local_indicative()
    {
        $this->beConstructedFromString('06990000');
        $this->shouldThrow(InvalidAlgerianMobilePhoneNumberException::class)->duringInstantiation();
    }
    
    function it_accepts_valid_mobilis_phone_number_with_local_indicative()
    {
        $this->beConstructedFromString('0699000000');
        $this->asString()->shouldReturn('0699000000');
    }

    function it_accepts_valid_mobilis_phone_number_with_plus_international_indicative()
    {
        $this->beConstructedFromString('+213699000000');
        $this->asString()->shouldReturn('+213699000000');
    }

    function it_accepts_valid_mobilis_phone_number_with_00_international_indicative()
    {
        $this->beConstructedFromString('00213699000000');
        $this->asString()->shouldReturn('00213699000000');
    }


    function it_throws_for_djezzy_phone_number_length_after_local_indicative()
    {
        $this->beConstructedFromString('07990000');
        $this->shouldThrow(InvalidAlgerianMobilePhoneNumberException::class)->duringInstantiation();
    }


    function it_accepts_valid_djezzy_phone_number()
    {
        $this->beConstructedFromString('0799000000');
        $this->asString()->shouldReturn('0799000000');
    }

    function it_accepts_valid_djezzy_phone_number_with_plus_international_indicative()
    {
        $this->beConstructedFromString('+213799000000');
        $this->asString()->shouldReturn('+213799000000');
    }

    function it_accepts_valid_djezzy_phone_number_with_00_international_indicative()
    {
        $this->beConstructedFromString('00213799000000');
        $this->asString()->shouldReturn('00213799000000');
    }

    function it_throws_for_ooredoo_phone_number_length_after_local_indicative()
    {
        $this->beConstructedFromString('05990000');
        $this->shouldThrow(InvalidAlgerianMobilePhoneNumberException::class)->duringInstantiation();
    }


    function it_accepts_valid_ooredoo_phone_number()
    {
        $this->beConstructedFromString('0599000000');
        $this->asString()->shouldReturn('0599000000');
    }

    function it_accepts_valid_ooredoo_phone_number_with_plus_international_indicative()
    {
        $this->beConstructedFromString('+213599000000');
        $this->asString()->shouldReturn('+213599000000');
    }

    function it_accepts_valid_ooredoo_phone_number_with_00_international_indicative()
    {
        $this->beConstructedFromString('00213599000000');
        $this->asString()->shouldReturn('00213599000000');
    }

    function it_knows_if_it_represents_mobilis_number()
    {
        $this->beConstructedFromString('0699000000');
        $this->shouldBeMobilis();
    }

    function it_knows_if_it_doesnt_represents_mobilis_number()
    {
        $this->beConstructedFromString('0799000000');
        $this->shouldNotBeMobilis();
    }


    function it_knows_if_it_represents_djezzy_number()
    {
        $this->beConstructedFromString('0799000000');
        $this->shouldBeDjezzy();
    }

    function it_knows_if_it_doesnt_represents_djezzy_number()
    {
        $this->beConstructedFromString('0599000000');
        $this->shouldNotBeDjezzy();
    }

    function it_knows_if_it_represents_ooredoo_number()
    {
        $this->beConstructedFromString('0599000000');
        $this->shouldBeOoredoo();
    }

    function it_knows_if_it_doesnt_represents_ooredoo_number()
    {
        $this->beConstructedFromString('0699000000');
        $this->shouldNotBeOoredoo();
    }

    function it_is_immutable()
    {
        $this->beConstructedFromString('0699000000');
        $other = $this->withNumber('0599000000');
        $this->shouldNotBe($other);
    }

    function it_accepts_space_separated_format()
    {
        $this->beConstructedFromString('06 99 00 00 00');
        $this->asString()->shouldReturn('0699000000');
    }

    function it_accepts_space_separated_format_with_international_indicative()
    {
        $this->beConstructedFromString('00213 6 99 00 00 00');
        $this->asString()->shouldReturn('00213699000000');
    }

    function it_accepts_dash_separated_format()
    {
        $this->beConstructedFromString('06-99-00-00-00');
        $this->asString()->shouldReturn('0699000000');
    }

    function it_accepts_dash_separated_format_with_international_indicative()
    {
        $this->beConstructedFromString('00213-6-99-00-00-00');
        $this->asString()->shouldReturn('00213699000000');
    }

    function it_accepts_mixed_separated_format()
    {
        $this->beConstructedFromString('06 9900-00-00');
        $this->asString()->shouldReturn('0699000000');
    }

    function it_can_compare_with_0_and_00213_indicatives()
    {
        $this->beConstructedFromString('0600000000');
        $other = AlgerianMobilePhoneNumber::fromString('00213600000000');
        $this->equals($other)->shouldReturn(true);
    }

    function it_can_compare_with_0_and_plus_213_indicatives()
    {
        $this->beConstructedFromString('0600000000');
        $other = AlgerianMobilePhoneNumber::fromString('+213600000000');
        $this->equals($other)->shouldReturn(true);
    }

    function it_can_compare_with_00213_and_plus_213_indicatives()
    {
        $this->beConstructedFromString('00213600000000');
        $other = AlgerianMobilePhoneNumber::fromString('+213600000000');
        $this->equals($other)->shouldReturn(true);
    }
}
