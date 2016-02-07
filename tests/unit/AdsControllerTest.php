<?php

# tests/app/Http/Controllers/AdsControllerTest.php
class AdsControllerTest extends TestCase
{
    protected $builder;

    public function setUp()
    {
        parent::setUp();
        
        $this->mock = $this->mock('App\Models\Advertisement');

        $this->builder = $this->mock('Illuminate\Database\Eloquent\Builder');
    }

    /**
     * @return void
     */
    public function testIndex()
    {
        $this->mock
            ->shouldReceive('approved')
            ->atLeast()->once()->andReturn($this->builder);

        $this->builder->shouldReceive('with')->times(4)->andReturn($this->builder);

        $this->builder->shouldReceive('orderBy')->once()->andReturn($this->builder);

        //$this->builder->shouldReceive('paginate')->once()->andReturn($this->builder);


        $this->call('GET', 'ads');

        $this->assertResponseOk();
        //$this->assertViewHas('ads');
    }
    
    /**
     * @return void
     */
    public function testGetNew()
    {
        $this->mock
                ->shouldReceive('approved')
                ->atLeast()->once()->andReturn($this->builder);
        
        $this->builder->shouldReceive('with')->times(4)->andReturn($this->builder);


        $this->builder->shouldReceive('where')->once()->andReturn($this->builder);
        $this->builder->shouldReceive('orderBy')->once()->andReturn($this->builder);
        $this->builder->shouldReceive('get')->once()->andReturn($this->builder);
        $this->assertJson($this->call('GET', 'getNewAds')->getContent());
        $this->assertResponseOk();

        
    }
    
    
}