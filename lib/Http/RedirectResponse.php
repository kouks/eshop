<?php

namespace Lib\Http;

use Lib\Http\Concerns\ManagesResponse;

class RedirectResponse extends \Symfony\Component\HttpFoundation\RedirectResponse
{
    use ManagesResponse;
}
