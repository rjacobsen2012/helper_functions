<?php

class NiftyLittleFunctionsTest extends PHPUnit_Framework_TestCase
{
    public function testConvertPhoneNumber()
    {
        $phoneNumber = '(502)-555-5555';
        $strippedPhoneNumber = convertPhoneNumber($phoneNumber);

        $this->assertEquals('5025555555', $strippedPhoneNumber);
    }

    public function testRemoveNamespaceFromClassName()
    {
        $model = '\Indatus\Services\UserLogin';
        $className = remove_namespace_from_class_name($model);

        $this->assertEquals('UserLogin', $className);
    }

    public function testSearchOperators()
    {
        $options = search_operators();

        $this->assertInternalType('array', $options);
    }

    public function testArrayValuesToKeys()
    {
        $array = array_values_to_keys(
            [
                'foo' => 'bar',
                'baz' => 'bam'
            ]
        );

        $this->assertArrayHasKey('bar', $array);
        $this->assertArrayHasKey('bam', $array);
        $this->assertEquals('bar', $array['bar']);
        $this->assertEquals('bam', $array['bam']);
    }

    public function testConvertStateNameToPostalCode()
    {
        $postalCode = convert_state('Kentucky');

        $this->assertEquals('KY', $postalCode);
    }

    public function testConvertPostalCodeToState()
    {
        $state = convert_state('KY', 'name');

        $this->assertEquals('Kentucky', $state);
    }
}