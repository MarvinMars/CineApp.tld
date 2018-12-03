<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Film;

class FilmsParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'FilmsParser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();
        $response = $client->get('http://hdgo.club/films.json');
        $result = $response->getBody()->getContents();
        $parse_films = json_decode($result);
        $bar = $this->output->createProgressBar(count($parse_films));
        $bar->start();
        foreach ($parse_films as $parse_film){
            $data = [
                'link'=>!empty($parse_film->url) ? $parse_film->url:null,
                'title'=>!empty($parse_film->name) ? $parse_film->name:null,
                'eng_title'=>!empty($parse_film->name_eng) ? $parse_film->name_eng:null,
                'description'=>null,
                'image'=>null,
                'year'=>!empty($parse_film->year) ? $parse_film->year:null,
                'quality_id'=>!empty($parse_film->quality) ? $parse_film->quality:null,
                'world_art_id'=>!empty($parse_film->world_art_id) ? $parse_film->world_art_id:null,
                'kinopoisk_id'=>!empty($parse_film->kinopoisk_id) ? $parse_film->kinopoisk_id:null,
                'type'=>!empty($parse_film->sub_type) ? $parse_film->sub_type:null,
            ];
            $result = Film::UpdateOrCreate($data);
//            if($result){
//                if(!empty($result->title)){
//                    $wiki_response = $client->get('https://en.wikipedia.org/w/api.php?action=query&list=search&srsearch='.$result->title.'&utf8=&format=json');
//                    $wiki_result = $wiki_response->getBody()->getContents();
//                    $wiki_result = json_decode($wiki_result);
//                    $wiki_title = $wiki_result->query->search[0]->title;
//                    $page_response = $client->get('https://en.wikipedia.org/w/api.php?action=parse&page='.$wiki_title.'&prop=images&format=json');
//                    $page_result = json_decode($page_response->getBody()->getContents());
//                    dd($page_result);
//                };
//            }
            $bar->advance();
        }
        $bar->finish();
    }
}
