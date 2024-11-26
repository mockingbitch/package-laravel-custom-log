<?php

namespace phongtran\Logger\app\Watcher;

use Illuminate\Http\Response;

class RequestWatcher
{
    public Response $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
