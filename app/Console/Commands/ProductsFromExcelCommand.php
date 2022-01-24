<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProductsFromExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reading product information from excel and import to Shopify';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
    }
}
