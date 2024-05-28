<?php

namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use GuzzleHttp\Client;
// use App\Models\Anime;

// class AnimeSeeder extends Seeder
// {
//     public function run()
//     {
//         $client = new Client();
//         $nextPage = 'https://kitsu.io/api/edge/anime?page[limit]=20&page[offset]=0';

//         do {
//             $response = $client->get($nextPage);
//             $data = json_decode($response->getBody(), true);

//             foreach ($data['data'] as $animeData) {
//                 Anime::create([
//                     'title_default' => $animeData['attributes']['titles']['en_jp'],
//                     'title_en' => $animeData['attributes']['titles']['en'],
//                     'image_url' => $animeData['attributes']['posterImage']['original'],
//                     'score' => $animeData['attributes']['averageRating'],
//                     'rank' => $animeData['attributes']['popularityRank'],
//                     'episodes' => $animeData['attributes']['episodeCount'],
//                     'summary' => $animeData['attributes']['synopsis'],
//                     // 'url' => $animeData['links']['self'],
//                     'year' => isset($animeData['attributes']['startDate']) ? substr($animeData['attributes']['startDate'], 0, 4) : null,
//                 ]);
//             }

//             // Check if there is a "next" link in the response
//             $nextPage = isset($data['links']['next']) ? $data['links']['next'] : null;
//         } while ($nextPage);
//     }
// }





use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use App\Models\Anime;

class AnimeSeeder extends Seeder
{
    public function run()
    {
        $client = new Client();
        $nextPage = 'https://kitsu.io/api/edge/anime?page[limit]=20&page[offset]=0';

        do {
            $response = $client->get($nextPage);
            $data = json_decode($response->getBody(), true);

            foreach ($data['data'] as $animeData) {
                // Controleer of de velden bestaan voordat ze worden gebruikt
                $title_default = isset($animeData['attributes']['titles']['en_jp']) ? $animeData['attributes']['titles']['en_jp'] : null;
                $title_en = isset($animeData['attributes']['titles']['en']) ? $animeData['attributes']['titles']['en'] : null;
                $image_url = isset($animeData['attributes']['posterImage']['original']) ? $animeData['attributes']['posterImage']['small'] : null;
                $score = isset($animeData['attributes']['averageRating']) ? $animeData['attributes']['averageRating'] : null;
                $rank = isset($animeData['attributes']['popularityRank']) ? $animeData['attributes']['popularityRank'] : null;
                $episodes = isset($animeData['attributes']['episodeCount']) ? $animeData['attributes']['episodeCount'] : null;
                $summary = isset($animeData['attributes']['synopsis']) ? $animeData['attributes']['synopsis'] : null;
                $url = isset($animeData['links']['self']) ? $animeData['links']['self'] : null;
                $year = isset($animeData['attributes']['startDate']) ? substr($animeData['attributes']['startDate'], 0, 4) : null;

                Anime::create([
                    'title_default' => $title_default,
                    'title_en' => $title_en,
                    'image_url' => $image_url,
                    'score' => $score,
                    'rank' => $rank,
                    'episodes' => $episodes,
                    'summary' => $summary,
                    'url' => $url,
                    'year' => $year,
                ]);
            }

            // Controleer of er een "next" link is in de respons
            $nextPage = isset($data['links']['next']) ? $data['links']['next'] : null;
        } while ($nextPage);
    }
}
