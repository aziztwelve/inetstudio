<?php

interface IHTTPRequestService
{
    public function request(string $url, string $method, array $options = []);
}

class XMLHTTPRequestService implements IHTTPRequestService {
    public function request(string $url, string $method, array $options = [])
    {
        // TODO: Implement request() method.
    }
}

class XMLHttpService extends XMLHTTPRequestService {}




class Http {
    public function __construct(private IHTTPRequestService $service) {
    }

    public function get(string $url, array $options = []): void
    {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url): void
    {
        $this->service->request($url, 'GET');
    }
}


$http = new Http(new XMLHttpService());
$http->get('/get/apt');
