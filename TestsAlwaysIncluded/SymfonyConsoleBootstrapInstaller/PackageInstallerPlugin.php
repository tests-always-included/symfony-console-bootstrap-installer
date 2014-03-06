<?php

namespace TestsAlwaysIncluded\SymfonyConsoleBootstrapInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class PackageInstallerPlugin implements PluginInterface
{
    /**
     * Adds the package installer
     *
     * @param Composer $composer
     * @param IOInterface $inputOutput
     */
    public function activate(Composer $composer, IOInterface $inputOutput)
    {
        $packageInstaller = new PackageInstaller($inputOutput, $composer);
        $composer->getInstallationManager()->addInstaller($packageInstaller);
    }
}
