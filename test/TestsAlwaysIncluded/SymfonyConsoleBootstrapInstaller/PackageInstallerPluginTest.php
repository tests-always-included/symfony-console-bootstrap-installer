<?php
/**
 * Created by PhpStorm.
 * User: garadox
 * Date: 10/4/14
 * Time: 11:33 AM
 */

use TestsAlwaysIncluded\SymfonyConsoleBootstrapInstaller\PackageInstallerPlugin;
use TestsAlwaysIncluded\SymfonyConsoleBootstrapInstaller\PackageInstaller;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Installer\InstallationManager;
use Composer\Config;

class PackageInstallerPluginTest extends PHPUnit_Framework_TestCase {

    public function testActivate() {
        $mockInstallationManager = $this->getMockBuilder('InstallationManager')
            ->setMethods(array('addInstaller'))
            ->disableOriginalConstructor()
            ->getMock();
        $mockInstallationManager->expects($this->once())
            ->method('addInstaller')
            ->with($this->isInstanceOf('TestsAlwaysIncluded\SymfonyConsoleBootstrapInstaller\PackageInstaller'));

        $mockConfig = $this->getMockBuilder('Composer\Config')
            ->getMock();

        $mockComposer = $this->getMockBuilder('Composer\Composer')
            ->setMethods(array('getConfig', 'getInstallationManager'))
            ->disableOriginalConstructor()
            ->getMock();
        $mockComposer->expects($this->once())
            ->method('getInstallationManager')
            ->will($this->returnValue($mockInstallationManager));
        $mockComposer->expects($this->any())
            ->method('getConfig')
            ->will($this->returnValue($mockConfig));

        $mockIoInterface = $this->getMockBuilder('Composer\IO\IOInterface')
            ->getMock();

        $plugin = new PackageInstallerPlugin();
        $plugin->activate($mockComposer, $mockIoInterface);
    }
}