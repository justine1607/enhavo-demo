<?php

namespace App\Endpoint;

use Enhavo\Bundle\ApiBundle\Endpoint\AbstractEndpointType;
use Enhavo\Bundle\ApiBundle\Endpoint\Context;
use Enhavo\Bundle\ApiBundle\Data\Data;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/', name: 'app_start')]
class StartEndpoint extends AbstractEndpointType
{
    public function handleRequest($options, Request $request, Data $data, Context $context)
    {
        $context->setResponse(new RedirectResponse('/login'));
    }
}
