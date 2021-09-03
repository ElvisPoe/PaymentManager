<?php

namespace App\Console\Commands;

use App\Models\Client;
use Illuminate\Console\Command;

class ExportCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export data to CSV';

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
        $filename = "client_payments.csv";
        $handle = fopen($filename, 'w');
        fputcsv($handle, array('id', 'name', 'surname', 'payment'));

        $clients = Client::all();

        foreach($clients as $client) {
            fputcsv($handle, array($client->id, $client->name, $client->surname, $this->getPayments($client->lastPayment)));
        }

        fclose($handle);

        echo "File Done. You can find it in root folder.";
        return true;
    }

    private function getPayments($payments){
        foreach ($payments as $payment) {
            return $payment->amount . " - " . $payment->created_at;
        }
        return 0;
    }
}
