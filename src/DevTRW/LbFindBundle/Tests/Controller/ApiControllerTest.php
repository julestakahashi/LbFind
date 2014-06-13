<?php

namespace DevTRW\LbFindBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\HttpFoundation\Response;

class ApiControllerTest extends WebTestCase
{
    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();

    }

    public function listIndexTestDataProvider()
    {
        return [
            # Run one parameters
            [
                'expected' => [
                    [
                        'username' => "turdgoblin",
                        'location' => "Portland, Oreon",
                        'age' => 90,
                        'discipline' => "freestyle, downhill",
                    ],
                    [
                        'username' => "dingleberry",
                        'location' => "New York, New York",
                        'age' => 80,
                        'discipline' => "cruising",
                    ],
                    [
                        'username' => "Dogebooger",
                        'location' => "Anchorage, Alaskn",
                        'age' => 200,
                        'discipline' => "dance, downhill",
                    ]
                ]
            ]
        ];
    }

    /**
     * @dataProvider listIndexTestDataProvider
     */
    public function testIndex(array $expected)
    {
        $parsedResponse = $this->getJsonResponse('/api/longboarders.json');
        $response = $this->client->getResponse();

        $this->assertEquals(
            Response::HTTP_OK,
            $response->getStatusCode(),
            'The server should respond with a HTTP 200'
        );
        $this->assertNotEmpty($parsedResponse, 'The api should return a result');
        $this->assertEquals(
            $expected,
            $parsedResponse,
            'The api should return the expected longboarder data.'
        );
    }

    /**
     * @param String $endpoint The endpoint to make the GET request to
     *
     * @return Array|null The JSON decoded response array
     */
    protected function getJsonResponse($endpoint)
    {
        $this->client->request('GET', $endpoint);
        $response = $this->client->getResponse();

        return json_decode($response->getContent(), true);
    }
}
