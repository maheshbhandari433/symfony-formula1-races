<?php

declare(strict_types=1);

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use GuzzleHttp\Client;

class RaceController extends AbstractController
{
    private $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function index()
    {
        $response = $this->httpClient->request('GET', 'https://ergast.com/api/f1/2023.json');
        $body = (string) $response->getBody();
        $races = json_decode($body, true);
        
        return $this->render('race/index.html.twig', [
            'races' => $races,
        ]);
       
    }
}


