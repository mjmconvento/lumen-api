<?php

namespace App\Console\Commands;

use App\Services\CurlService;
use App\Services\CustomerService;
use App\Services\UrlGeneratorService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class DataImporterCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class DataImporterCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports data from https://randomuser.me';

    /**
     * @var string SUCCESS_MESSAGE
     */
    private const SUCCESS_MESSAGE = 'Data imported';

    /**
     * @var string API_URL
     */
    private const API_URL = 'https://randomuser.me/api?';

    /**
     * @var array QUERY_PARAMETERS
     */
    private const QUERY_PARAMETERS = [
        'results' => 100,
        'nat' => 'au',
        'inc' => 'name,login,location,email,gender,phone'
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(CustomerService $customerService)
    {
        try {
            $url = UrlGeneratorService::generateUrl(self::API_URL, self::QUERY_PARAMETERS);
            $response = CurlService::getResponse($url);
            $customerService->saveCustomerData($response->results);

            $this->info(self::SUCCESS_MESSAGE);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}