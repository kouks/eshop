<?php

namespace Lib\Http;

use Lib\Http\Concerns\ManagesResponse;

class Response extends \Symfony\Component\HttpFoundation\Response
{
    use ManagesResponse;
}
