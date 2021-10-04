<?php

namespace Babisque\MusicList;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

class Music
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;

        $client = new HttpBrowser(HttpClient::create());
        $client->setServerParameter(
            'HTTP_USER_AGENT',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36'
        );

        $crawler = $client->request('GET', $url);

        $musics = $crawler->filter('td.chart-table-track strong')->each(function ($musics) {
            return $musics->text();
        });

        $artists = $crawler->filter('td.chart-table-track span')->each(function ($artists) {
            return substr($artists->text(), 3);
        });

        $musicList = array_combine($artists, $musics);

        return $musicList;
    }
}
