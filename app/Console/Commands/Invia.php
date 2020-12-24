<?php

namespace App\Console\Commands;

use App\Cpu;
use App\Videocard;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Contracts\Cache\ItemInterface;
use App\Laptop;
Use \Throwable;

class Invia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Invia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invia al database il mio array';

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
     * @return int
     */
    public function handle()
    {

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // funzione che usa le regex per estrapolare i dati
        function regex($pattern, $stringa)
        {
            preg_match("/$pattern/i", $stringa, $matches);

            return implode(",", $matches);
        }


        $cache = new FilesystemAdapter('cache', 3600, __DIR__);

        $client = new Client();

        $searchResultHtml = $cache->get('my_cache_key', function (ItemInterface $item) use ($client) {
            $item->expiresAfter(3600);

            $result = $client->post('https://www.notebookcheck.net/Laptop_Search.8223.0.html', [
                'form_params' => [
                    'lang'    => '2',
                    'class'   => '-1',
                    'age'     => '12',
                    'min_age' => '7',
                    'orderby' => '0'
                ]
            ]);

            return $result->getBody()->getContents();
        });

        $searchResultCrawler = new Crawler($searchResultHtml);

        // array dove vado a pushare i link estratti dal crawler
        $laptopSheetLinks = [];

        // mi estraggo i link
        $searchResultCrawler
            ->filter('#search')
            ->filter('tr a')
            ->each(function (Crawler $crawler) use (&$laptopSheetLinks) {
                $href = $crawler->attr('href');
                if ($href !== '#nbc_nbcompare_div') {
                    $laptopSheetLinks[] = $href;
                }
            });

        echo 'Trovati ' . count($laptopSheetLinks) . " links\n\n";

        // array dove vado a pushare i singoli laptop
        $specifications = [];

        // array dove vado a pushare le singole videocard
        $specifications_videocard = [];

        // array dove vado a pushare le singole cpu
        $specifications_cpu = [];


        foreach ($laptopSheetLinks as $link) {

            echo "Working on {$link}\n";

            $cacheKey = md5($link);

            $pageResultHtml = $cache->get("link_{$cacheKey}", function (ItemInterface $item) use ($client, $link) {
                $item->expiresAfter(3600);

                $result = $client->get($link);

                return $result->getBody()->getContents();
            });

            $pageResultCrawler = new Crawler($pageResultHtml);

            // array dove pusho i dati dei miei laptop_Non_Usare
            $laptopDetails = [];

            // array dove pusho i dati delle videocards
            $videocardDetails = [];

            // array dove pusho i dati delle cpus
            $cpuDetails = [];

            // Codice per tirare fuori i dati

            // estraggo ID univoco
            $id_laptop = $link;
            $id_laptop_regex = regex('\d\d\d\d\d\d', $id_laptop);
            $laptopDetails['laptop_id'] = $id_laptop_regex;

            // estraggo il nome
            $laptopDetails['name'] = $pageResultCrawler->filter('.specs_header')->first()->text();

            // estraggo il brand
            $laptopDetails['brand'] = strtok($pageResultCrawler->filter('h1')->first()->text(), " ");

            // estraggo la ram
            try {
                $ram_memory = $pageResultCrawler->filter('.specs_element')->eq(2)->text();
                $ram_memory_regex = regex('\d{4,6}', $ram_memory);
                $ram_memory_refactored = floor($ram_memory_regex / 1000);
                $laptopDetails['ram_memory'] = $ram_memory_refactored;
            } catch (Throwable $e) {
                echo 'Eccezione ram: ' . $e->getMessage();
            }


            // estraggo la scheda madre
            try {
                $motherboard = $pageResultCrawler->filter('.specs_element')->eq(4)->children('.specs_details')->text();
                $laptopDetails['motherboard'] = $motherboard;
            } catch (Throwable $e) {
                echo 'Eccezione scheda madre: ' . $e->getMessage();
            }


            // estraggo scheda di rete
            try {
                $network = $pageResultCrawler->filter('.specs_element')->eq(8)->children('.specs_details')->text();
                $laptopDetails['network'] = $network;
            } catch (Throwable $e) {
                echo 'Eccezione scheda di rete: ' . $e->getMessage();
            }

            // estraggo connessioni
            try {
                $connections = $pageResultCrawler->filter('.specs_element')->eq(7)->children('.specs_details')->text();
                $laptopDetails['connections'] = $connections;
            } catch (Throwable $e) {
                echo 'Eccezione connessioni: ' . $e->getMessage();
            }

            // estraggo la CPU
            try {
                $cpuDetails['name'] = $pageResultCrawler->filter('.specs_element')->eq(0)->children('.specs_details a')->text();
                $cpuDetails_cores = $pageResultCrawler->filter('.specs_element')->eq(0)->text();
                $cpuDetails_cores_regex = regex('\d\sx', $cpuDetails_cores);
                $cpuDetails_cores_regex_plus = regex('\d', $cpuDetails_cores_regex);
                $cpuDetails['cores'] = $cpuDetails_cores_regex_plus;
                $laptopDetails['cpu_name'] = $pageResultCrawler->filter('.specs_element')->eq(0)->children('.specs_details a')->text();
            } catch (Throwable $e) {
                continue;
            }

            // estraggo dimensioni display
            try {
                $display_size = $pageResultCrawler->filter('.specs_element')->eq(3)->children('.specs_details')->text();
                $display_size_regex = regex('\d\d\.?\d?', $display_size);
                $laptopDetails['display_size'] = $display_size_regex;
            } catch (Throwable $e) {
                echo 'Eccezione storage: ' . $e->getMessage();
            }


            // estraggo storage
            try {
                $storage_size = $pageResultCrawler->filter('.specs_element')->eq(5)->children('.specs_details')->text();
                $storage_size_regex = regex('\s\d{3,4}', $storage_size);
                $laptopDetails['storage_size'] = $storage_size_regex;
            } catch (Throwable $e) {
                echo 'Eccezione storage: ' . $e->getMessage();
            }


            // estraggo scheda video
            try {
                $videocardDetails['name'] = $pageResultCrawler->filter('.specs_element')->eq(1)->children('.specs_details a')->text();
                $laptopDetails['videocard_name'] = $pageResultCrawler->filter('.specs_element')->eq(1)->children('.specs_details a')->text();
            } catch (Throwable $e) {
                continue;
            }


            // estraggo batteria
            try {
                $battery_life = $pageResultCrawler->filter('.nbc_additional_specs .specs_element')->eq(4)->children('.specs_details')->text();
                $battery_life_regex = regex('\d\d\.?\d?', $battery_life);
                $laptopDetails['battery'] = $battery_life_regex;
            } catch (Throwable $e) {
                echo 'Eccezione batteria: ' . $e->getMessage();
            }

            // estraggo peso laptop
            $laptop_price_next = 'no';
            try {
                $laptop_weight = $pageResultCrawler->filter('.specs_element')->eq(14)->children('.specs_details')->text();
                $laptop_weight_regex = regex('\d\.\d\d?\d?', $laptop_weight);
                if ($laptop_weight_regex === '') { // se non trovo nulla in posizione 14 vado in posizione 15
                    $laptop_price_next = 'yes'; // se vado in posizione 15 devo far slittare alla posizione 16 il prezzo
                    $laptop_weight = $pageResultCrawler->filter('.specs_element')->eq(15)->children('.specs_details')->text();
                    $laptop_weight_regex = regex('\d\.\d\d?\d?', $laptop_weight);
                    if ($laptop_weight_regex === '') {
                        $laptop_weight_regex = 0;
                    }
                }
                $laptopDetails['weight'] = $laptop_weight_regex;
            } catch (Throwable $e) {
                echo 'Eccezione peso: ' . $e->getMessage();
            }

            // estraggo prezzo laptop
            try {
                $laptop_price = $pageResultCrawler->filter('.specs_element')->eq(15)->children('.specs_details')->text();
                $laptop_price_regex = regex('\d\d\d\d?', $laptop_price);
                if ($laptop_price_next === 'yes') { // faccio slittare alla posizione 16 se la 15 é occupata dal peso
                    $laptop_price = $pageResultCrawler->filter('.specs_element')->eq(16)->children('.specs_details')->text();
                    $laptop_price_regex = regex('\d\d\d\d?', $laptop_price);
                    if ($laptop_price_regex === '') {
                        $laptop_price_regex = 0;
                    }
                }
                $laptopDetails['price'] = $laptop_price_regex;
            } catch (Throwable $e) {
                echo 'Eccezione prezzo: ' . $e->getMessage();
            }

            // estratto max temperatura laptop
            try {
                $laptop_temp_array = [];
                for ($i = 0; $i <= 17; $i++) {
                    $laptop_temp = $pageResultCrawler->filter('.nbc2rdisplay_cell')->eq($i)->text();
                    $laptop_temp_regex = regex('\G\d\d', $laptop_temp);
                    $laptop_temp_array[] = $laptop_temp_regex;
                }
                $laptopDetails['max_temp'] = max($laptop_temp_array);
            } catch (Throwable $e) {
                echo 'Eccezione max_temp: ' . $e->getMessage();
            }

            // estraggo max rumore laptop
//            try {
//                $laptop_noise = $pageResultCrawler->filter('.tx-nbc2fe-pi1')->children('div')->children('table')
//                    ->children('tbody')->html();
//                var_dump($laptop_noise);
//            } catch (Throwable $e) {
//                echo 'Eccezione max_noise: ' . $e->getMessage();
//            }


            $specifications[] = $laptopDetails;

            $specifications_videocard[] = $videocardDetails;

            $specifications_cpu[] = $cpuDetails;

//            var_dump($laptopDetails);
//
//            var_dump($cpuDetails);
//
//
//            die();

        }


        // faccio un foreach per salvare i dati nella tabella "Videocards"
        foreach ($specifications_videocard as $videocard) {
            $new_videocard = new Videocard();
            $new_videocard->fill($videocard);
            // skippo gli elementi gia esistenti
            if (Videocard::where('name', '=', $new_videocard->name)->exists()) {
                continue;
            }
            $risultato_videocard = $new_videocard->save();
        }

        // faccio un foreach per salvare i dati nella tabella "Cpus"
        foreach ($specifications_cpu as $cpu) {
            $new_cpu = new Cpu();
            $new_cpu->fill($cpu);
            // skippo gli elementi gia esistenti
            if (Cpu::where('name', '=', $new_cpu->name)->exists()) {
                continue;
            }
            $risultato_videocard = $new_cpu->save();
        }

        // faccio un foreach per salvare i dati nella tabella "Laptops"
        foreach ($specifications as $specification) {
            $new_laptop = new Laptop();
            $new_laptop->fill($specification);
            // skippo gli elementi gia esistenti
            if (Laptop::where('name', '=', $new_laptop->name)->exists()) {
                $risultato = $new_laptop->update();
            } else {
                $risultato = $new_laptop->save();
            }
        }

        // faccio il print sul terminale di avvenuta scrittura
        if (isset($risultato)) {
            $this->info('Tabella Laptops: Push avvenuto con successo');
        } else {
            $this->info('Tabella Laptops: Push non avvenuto, probabilmente ci sono duplicati');
        }

        // faccio il print sul terminale di avvenuta scrittura per le videocards
        if (isset($risultato_videocard)) {
            $this->info('Tabella Videocards: Push avvenuto con successo');
        } else {
            $this->info('Tabella Videocards: Push non avvenuto, probabilmente ci sono duplicati');
        }

        // faccio il print sul terminale di avvenuta scrittura per le cpus
        if (isset($risultato_videocard)) {
            $this->info('Tabella CPU: Push avvenuto con successo');
        } else {
            $this->info('Tabella CPU: Push non avvenuto, probabilmente ci sono duplicati');
        }



        return '';
    }
}
