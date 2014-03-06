<?php

namespace TestsAlwaysIncluded\SymfonyConsoleBootstrapInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;

class PackageInstaller extends LibraryInstaller
{
    protected $packageType = 'tests-always-included-symfony-console-bootstrap';

    /**
     * Perform the install steps
     *
     * @param InstalledRepositoryInterface $repository
     * @param PackageInterface $package
     */
    public function install(InstalledRepositoryInterface $repository, PackageInterface $package)
    {
        parent::install($repository, $package);

        //Copy the console and AppBoot files
        $rootDir = dirname($this->vendorRoot);
        $appDir = $rootDir . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR;

        if(false === is_dir($appDir)) {
            mkdir($appDir);
        }

        $installDir = $this->getInstallPath($package);
        $installAppDir = $installDir . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR;
        copy($installAppDir . 'console', $appDir . 'console');
        copy($installAppDir . 'AppBoot.php', $appDir . 'AppBoot.php');
    }

    /**
     * Returns if this installed supports a 
     * given package
     *
     * @param string $packageType
     * @return bool
     */
    public function supports($packageType)
    {
        return $this->packageType === $packageType;
    }
}
