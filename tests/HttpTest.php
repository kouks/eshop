<?php

class HttpTest extends TestCase
{
    /** @test */
    public function it_captures_a_request()
    {
        $request = Lib\Http\Request::capture();

        $this->assertInstanceOf(Symfony\Component\HttpFoundation\Request::class, $request);
    }

    /** @test */
    public function it_properly_builds_up_a_json_response()
    {
        $res = json(['err' => 'not found'])->status(404);

        $this->assertInstanceOf(Symfony\Component\HttpFoundation\Response::class, $res);
        $this->assertEquals(json_encode(['err' => 'not found']), $res->getContent());
        $this->assertEquals(404, $res->getStatusCode());
    }
}
