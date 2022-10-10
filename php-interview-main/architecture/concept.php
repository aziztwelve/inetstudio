<?php
class Concept {
    private $client;

    public function __construct(private UserGettingServiceFactory $userGettingServiceFactory) {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getUserData() {

        $userGettingService = $this->userGettingServiceFactory->create(UserGettingServiceFactory::DB_SOURCE);
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $userGettingService->getSecretKey(['user_id' => 1])
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }
}


interface IUserGettingService
{
    public function getSecretKey(array $data): string;
}

class UserGettingServiceFactory
{

    public const FILE_SOURCE = 'file';
    public const DB_SOURCE = 'db';
    public const CLOUD_SOURCE = 'cloud';

    public function create(string $source): IUserGettingService
    {
        switch ($source) {
            case self::FILE_SOURCE:
                return new File;
            case self::DB_SOURCE:
                return new DB();
            case self::CLOUD_SOURCE:
                return new Cloud;
            default:
                throw new Exception('not found');
        }
    }
}

class File implements IUserGettingService
{
    public function getSecretKey(array $data): string
    {
        return 'token';
    }
}

class DB implements IUserGettingService
{
    public function getSecretKey(array $data): string
    {
        return 'token';
    }
}

class Cloud implements IUserGettingService
{
    public function getSecretKey(array $data): string
    {
        return 'token';
    }
}