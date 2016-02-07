<?php

use Illuminate\Foundation\Testing\TestCase;

class ProfileControllerTest extends TestCase
{
    //use \Codeception\Specify;
    protected $baseUrl = '/';

    /**
     * Creates the application.
     *
     * Needs to be implemented by subclasses.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $basePath = $this->findBasePath();
        $app = require $basePath . '/bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        return $app;
    }


    // tests
    public function testIndex()
    {
        $this->call('GET', 'profile');
        $this->assertRedirectedTo('auth/login');
    }

    /**
     * @return string
     */
    protected function findBasePath()
    {
        // Assuming that tests are running inside a folder called /test/..., and that folder
        // is in the base Laravel folder, this is easy.
        $reflector = new \ReflectionClass(get_called_class());
        $currentPath = $reflector->getFileName();
        $basePath = substr($currentPath,0, strpos($currentPath, "/tests/"));
        if(file_exists($basePath . '/bootstrap/app.php')) {
            return $basePath;
        }
        // We couldn't figure it out automatically, let's look for help
        if(defined('LARAVEL_BASE') && file_exists(LARAVEL_BASE . '/bootstrap/app.php')) {
            return LARAVEL_BASE;
        }
        // We need to full out exit here, not just throw an exception
        print("Unable to determine your base Laravel path, and didn't find a valid LARAVEL_BASE defined. Please define that in your _bootstrap.php file.");
        exit(1);
    }


}