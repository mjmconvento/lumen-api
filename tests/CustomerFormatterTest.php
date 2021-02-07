<?php

use App\Models\Customer;
use App\Services\CustomerFormatterService;

class CustomerFormatterTest extends TestCase
{
    /**
     * @return void
     */
    public function testFormatAllCustomerData(): void
    {
        $customer = new Customer();
        $customer->setFirstName('MJ');
        $customer->setLastName('Convento');
        $customer->setEmail('mjmconvento@gmail.com');
        $customer->setCountry('Philippines');

        $formattedData = CustomerFormatterService::formatAllCustomerData($customer);
        
        $expectedResult = [
            'full_name' => 'MJ Convento',
            'email' => 'mjmconvento@gmail.com',
            'country' => 'Philippines'
        ];

        $this->assertEquals($formattedData, $expectedResult);
    }

    /**
     * @return void
     */
    public function testFormatCustomerData(): void
    {
        $formattedData = CustomerFormatterService::formatCustomerData($this->generateCustomerData());

        $expectedResult = new \stdClass();
        $expectedResult->full_name = 'MJ Convento';
        $expectedResult->email = 'mjmconvento@gmail.com';
        $expectedResult->username = 'mjmconvento';
        $expectedResult->gender = 'Male';
        $expectedResult->country = 'Philippines';
        $expectedResult->city = 'Makati';
        $expectedResult->phone = '222-5428';

        $this->assertEquals($formattedData, $expectedResult);
    }

    /**
     * @return void
     */
    public function testSetCustomerProperties(): void
    {
        $customer = new \stdClass();
        $customer->name = new \stdClass();
        $customer->name->first = 'MJ';
        $customer->name->last = 'Convento';
        $customer->login = new \stdClass();
        $customer->login->username = 'mjmconvento';
        $customer->login->password = 'password';
        $customer->location = new \stdClass();
        $customer->location->country = 'Philippines';
        $customer->location->city = 'Makati';
        $customer->email = 'mjmconvento@gmail.com';
        $customer->gender = 'Male';
        $customer->phone = '222-5428';

        $customerModel = new Customer();
        CustomerFormatterService::setCustomerProperties($customerModel, $customer);

        $this->assertEquals($customerModel, $this->generateCustomerData());
    }

    /**
     * @return Customer
     */
    private function generateCustomerData(): Customer
    {
        $customer = new Customer();

        $customer->setFirstName('MJ');
        $customer->setLastName('Convento');
        $customer->setEmail('mjmconvento@gmail.com');
        $customer->setUsername('mjmconvento');
        $customer->setPassword(md5('password'));
        $customer->setGender('Male');
        $customer->setCountry('Philippines');
        $customer->setCity('Makati');
        $customer->setPhone('222-5428');

        return $customer;
    }
}
