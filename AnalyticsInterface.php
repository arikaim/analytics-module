<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Analytics;

/**
 * Analytics interface
 */
interface AnalyticsInterface 
{  
    /**
     * Get api service
     *
     * @return object|null
    */
    public function getService();   
}
