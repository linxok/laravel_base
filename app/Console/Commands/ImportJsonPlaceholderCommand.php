<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from jsonplaceholder';

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
        $import = new ImportDataClient();
        $responce = $import->client->request('GET', 'posts');
        $data = json_decode($responce->getBody()->getContents());

        foreach ($data as $item) {
            Post::firstOrCreate([
                'title' => $item->title
            ],
                [
                    'title' => $item->title,
                    'content' => $item->content,
                    'category_id' => 2,
                    'image' => $item->image,
                ]);
        }
        echo "\n end \n";
    }
}
