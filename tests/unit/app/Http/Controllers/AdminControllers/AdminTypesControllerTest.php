<?php
namespace App\Http\Controllers\AdminControllers;


use App\Testing\LaravelTestCase;
use Illuminate\Foundation\Testing\TestCase;

class AdminTypesControllerTest extends TestCase
{

    use \Codeception\Specify;

    protected $baseUrl = '/';

    /**
     * Creates the application.
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


    public function testIndex()
    {
        $response = $this->call('GET', '/admin/type');
        $this->assertResponseOk();

        $types = $response->original['types'];
        $this->assertInstanceOf('Illuminate\Contracts\Pagination\LengthAwarePaginator', $types);
        $this->assertInstanceOf('App\Models\AdType', $types->first());
    }

    public function testCreate(){
        $response = $this->call('GET', '/admin/type/create');

        $this->assertResponseOk();
    }

    public function testStore(){
        $name = 'test' . md5(time());
        $response = $this->call('POST', '/admin/type', [
            'name' => $name,
            'description' => 'from test'
        ]);

        $this->assertRedirectedToRoute('admin.type.index');

    }

    public function testEdit(){
        $response = $this->call('GET', '/admin/type/1/edit');
        $this->assertResponseOk();

        $type = $response->original['type'];
        $this->assertInstanceOf('App\Models\AdType', $type);
    }




    /**
     * Figure out the base Laravel path
     *
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