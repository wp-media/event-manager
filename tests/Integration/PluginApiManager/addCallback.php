<?php
namespace WP_Media\EventManager\Tests\Integration\PluginApiManager;

use WP_Media\EventManager\Tests\Integration\TestCase;
use WP_Media\EventManager\PluginApiManager;

/**
 * Tests for the addCallback method
 *
 * @covers WP_Media\EventManager\PluginApiManager::addCallback
 * @group PluginApiManager
 */
class Test_AddCallback extends TestCase {
    /**
     * Test should add a new filter with default priority and arguments
     */
    public function testShouldAddNewFilterWithDefaultParameters() {
        $plugin_api_manager = new PluginApiManager();
        $plugin_api_manager->addCallback('the_content', 'strtolower');

        $this->assertSame(
            10,
            has_filter('the_content', 'strtolower')
        );
    }

    /**
     * Test should add a new filter with a priority 100 and 3 arguments
     */
    public function testShouldAddNewFilterWithAllParameters() {
        $plugin_api_manager = new PluginApiManager();
        $plugin_api_manager->addCallback('the_content', 'strtolower', 100, 3);

        $this->assertSame(
            100,
            has_filter('the_content', 'strtolower')
        );
    }
}
