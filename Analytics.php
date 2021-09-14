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

use Arikaim\Core\Extension\Module;

/**
 * Analytics module class
 */
class Analytics extends Module
{
    /**
     * Install module
     *
     * @return void
     */
    public function install()
    {
        $this->installDriver('Arikaim\\Modules\\Analytics\\Drivers\\GoogleAnalyticsDriver');
    }
}
