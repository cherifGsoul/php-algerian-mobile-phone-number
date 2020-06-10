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

    function it_throws_for_ooreedoo_phone_number_length_after_local_indicative()
    {
        $this->beConstructedFromString('05990000');
        $this->shouldThrow(InvalidAlgerianMobilePhoneNumberException::class)->duringInstantiation();
    }


    function it_accepts_valid_ooreedoo_phone_number()
    {
        $this->beConstructedFromString('0599000000');
        $this->asString()->shouldReturn('0599000000');
    }

    function it_accepts_valid_ooreedoo_phone_number_with_plus_international_indicative()
    {
        $this->beConstructedFromString('+213599000000');
        $this->asString()->shouldReturn('+213599000000');
    }

    function it_accepts_valid_ooreedoo_phone_number_with_00_international_indicative()
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

    function it_knows_if_it_represents_ooreedoo_number()
    {
        $this->beConstructedFromString('0599000000');
        $this->shouldBeOoreedoo();
    }

    function it_knows_if_it_doesnt_represents_ooreedoo_number()
    {
        $this->beConstructedFromString('0699000000');
        $this->shouldNotBeOoreedoo();
    }

    function it_is_immutable()
    {
        $this->beConstructedFromString('0699000000');
        $other = $this->withNumber('0599000000');
        $this->shouldNotBe($other);
    }

}
