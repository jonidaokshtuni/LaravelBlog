<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class PostStatuscheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the posts status';

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
         DB::table('posts')
        ->where('publish_date','<',\Carbon\Carbon::now())
        ->update(['status'=>'1']);
        }
    }

