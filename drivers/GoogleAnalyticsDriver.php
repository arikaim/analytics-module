<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Analytics\Drivers;

use Arikaim\Core\Arikaim;
use Arikaim\Core\Driver\Traits\Driver;
use Arikaim\Core\Interfaces\Driver\DriverInterface;
use Arikaim\Modules\Analytics\AnalyticsInterface;
use Exception;

/**
 * GoogleAnalyticsDriver driver class
 */
class GoogleAnalyticsDriver implements DriverInterface, AnalyticsInterface
{   
    use Driver;

    /**
     * Api service
     *
     * @var mixed
     */
    protected $service;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setDriverParams('analytics','analytics','GoogleAnalyticsDriver','Google Analytics api driver');      
    }

    /**
     * Initialize driver
     *
     * @return void
     */
    public function initDriver($properties)
    {
        $clientId = $properties->getValue('client_id');
        $clientSecret = $properties->getValue('client_secret');
        $accssToken = $properties->getValue('accss_token');
        $client = new \Google\Client();
        $client->setClientSecret($clientSecret);
        $client->setClientId($clientId);

        $client->addScope(\Google_Service_Analytics::ANALYTICS_READONLY);

        $client->setAccessToken($accssToken);
    
        $this->service = new \Google_Service_AnalyticsReporting($client);       
    }

    /**
     * Get api service 
     *
     * @return object
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Create driver config properties array
     *
     * @param Arikaim\Core\Collection\Properties $properties
     * @return array
     */
    public function createDriverConfig($properties)
    {
        $properties->property('client_id',function($property) {
            $property
                ->title('Client Id')
                ->type('text')              
                ->value('');                         
        }); 
        $properties->property('client_secret',function($property) {
            $property
                ->title('Client Secret')
                ->type('text')              
                ->value('');                         
        }); 
        $properties->property('access_token',function($property) {
            $property
                ->title('Access Token')
                ->type('oauth')              
                ->value('');                         
        }); 
    }
}
