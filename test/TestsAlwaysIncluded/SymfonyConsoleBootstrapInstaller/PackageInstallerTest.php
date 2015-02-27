<?php
/**
 * Created by IntelliJ IDEA.
 * User: garadox
 * Date: 2/26/15
 * Time: 9:59 PM
 */

use TestsAlwaysIncluded\SymfonyConsoleBootstrapInstaller\PackageInstaller;

class PackageInstallerTest extends PHPUnit_Framework_TestCase {
    public function testSupports() {
        $installer = $this->getMockBuilder('TestsAlwaysIncluded\SymfonyConsoleBootstrapInstaller\PackageInstaller')
            ->setMethods(null)
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertEquals($installer->supports('test'), false);
        $this->assertTrue($installer->supports('tests-always-included-symfony-console-bootstrap'));
    }
}
