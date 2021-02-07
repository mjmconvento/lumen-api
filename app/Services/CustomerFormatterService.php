<?php

namespace App\Services;

use App\Models\Customer;

/**
 * Class that handles Customer Formatters
 */
class CustomerFormatterService
{
    /**
     * @param Customer $customer
     *
     * @return array
     */
    public static function formatAllCustomerData(Customer $customer): array
    {
        $customerData['full_name'] = sprintf('%s %s', $customer->getFirstName(), $customer->getLastName());
        $customerData['email'] = $customer->getEmail();
        $customerData['country'] = $customer->getCountry();

        return $customerData;
    }

    /**
     * @param Customer $customer
     *
     * @return \stdClass
     */
    public static function formatCustomerData(Customer $customer): \stdClass
    {
        $customerData = new \stdClass();

        $customerData->full_name = sprintf('%s %s', $customer->getFirstName(), $customer->getLastName());
        $customerData->email = $customer->getEmail();
        $customerData->username = $customer->getUsername();
        $customerData->gender = $customer->getGender();
        $customerData->country = $customer->getCountry();
        $customerData->city = $customer->getCity();
        $customerData->phone = $customer->getPhone();

        return $customerData;
    }

    /**
     * @param Customer &$customerModel
     * @param object $customer
     *
     * @return void
     */
    public static function setCustomerProperties(Customer &$customerModel, object $customer): void
    {
        $customerModel->setFirstName($customer->name->first);
        $customerModel->setLastName($customer->name->last);
        $customerModel->setUsername($customer->login->username);
        $customerModel->setPassword(md5($customer->login->password));
        $customerModel->setCountry($customer->location->country);
        $customerModel->setCity($customer->location->city);
        $customerModel->setEmail($customer->email);
        $customerModel->setGender($customer->gender);
        $customerModel->setPhone($customer->phone);
    }
}
