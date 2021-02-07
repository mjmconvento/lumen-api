<?php

namespace App\Services;

use App\Interfaces\ModelServiceInterface;
use App\Models\Customer;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class that handles Customer Services
 */
class CustomerService implements ModelServiceInterface
{
    /**
     * @param EntityManagerInterface $entityManager
     *
     * @return void
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Customer::class);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $data['results'] = [];

        foreach ($this->repository->findAll() as $customer) {
            $data['results'][] = CustomerFormatterService::formatAllCustomerData($customer);
        }

        return $data;
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function find(int $id): string
    {
        $customer = $this->repository->find($id);
        return json_encode(CustomerFormatterService::formatCustomerData($customer));
    }


    /**
     * @param array $customers
     *
     * @return void
     */
    public function saveCustomerData(array $customers): void
    {
        foreach ($customers as $customer) {
            $customerModel = $this->repository->findOneByEmail($customer->email);

            if (!$customerModel) {
                $customerModel = new Customer();
            }

            CustomerFormatterService::setCustomerProperties($customerModel, $customer);
            $this->entityManager->persist($customerModel);
        }

        $this->entityManager->flush();
    }
}
