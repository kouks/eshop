<?php

class ApplicationTest extends TestCase
{
    /** @test */
    public function it_bootstraps_environment_variables()
    {
        $this->assertEquals('testing', env('APP_ENV'));
    }

    /** @test */
    public function it_provides_a_working_pipeline()
    {
        (new Lib\Core\Pipe())
            ->pass('request')
            ->through(collect([new PipeOne(), new PipeTwo()]))
            ->finally(function ($request) {
                $this->assertEquals('request-pipe-one-addition-pipe-two-addition', $request);
            });
    }

    /** @test */
    public function it_properly_parses_a_config_file()
    {
        $this->assertEquals('h&p—The online store.', config('app.name.shop'));
    }
}

class PipeOne {
    public function handle($request, $next)
    {
        return $next($request.'-pipe-one-addition');
    }
}

class PipeTwo {
    public function handle($request, $next)
    {
        return $next($request.'-pipe-two-addition');
    }
}
