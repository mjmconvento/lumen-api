<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class ApiTest extends TestCase
{
    use DatabaseMigrations;
    
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->artisan('db:seed --class=CustomersTableTestSeeder');
    }

    /**
     * @return void
     */
    public function testCustomersStatus(): void
    {
        $response = $this->call('GET', '/customers');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @return void
     */
    public function testCustomersData(): void
    {
        $customer = new \stdClass();
        $customer->country = 'Philippines';
        $customer->email = 'mjmconvento@gmail.com';
        $customer->full_name = 'MJ Convento';

        $response = $this->get('/customers')->seeJsonEquals([
            'results' => [$customer],
        ]);;
    }

    /**
     * @return void
     */
    public function testCustomerApiValidData(): void
    {
        $this->seeInDatabase('customers', [
            'first_name' => 'MJ',
            'last_name' => 'Convento',
            'username' => 'mjmconvento',
            'email' => 'mjmconvento@gmail.com',
            'password' => 'password',
            'gender' => 'Male',
            'phone' => '222-5428',
            'country' => 'Philippines',
            'city' => 'Makati'
        ]);
    }

    /**
     * @return void
     */
    public function testCustomerApiInvalidId(): void
    {
        $response = $this->call('GET', '/customers/error_id');
        $this->assertEquals(500, $response->status());
    }

    /**
     * @return void
     */
    public function testCustomerApiValidId(): void
    {
        $response = $this->call('GET', '/customers/1');
        $this->assertEquals(200, $response->status());
    }
}
