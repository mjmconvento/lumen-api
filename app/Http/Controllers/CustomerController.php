<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;

class CustomerController extends Controller
{
    /**
     * @param CustomerService $customerService
     *
     * @return void
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->customerService->findAll();
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function find(int $customerId): string
    {
        return $this->customerService->find($customerId);
    }
}
