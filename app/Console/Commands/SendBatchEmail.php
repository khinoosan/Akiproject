<?php

// app/Console/Commands/SendBatchEmail.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendBatchEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-batch-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a batch email every 5 minutes when APP_DEBUG is false';

    /**
     * Execute the console command.
     */
    public function handle()
    {
     
        while (true) {
           
            if (!config('app.debug')) {
               
                $now = Carbon::now();

               
                $subject = 'バッチ処理送信メール';

                
                $body = "定期的なバッチ処理のメールです。\n\n現在" . now()->format('Y年m月d日 H時i分') . "です。\n\n";

               
                Mail::raw($body, function ($message) use ($subject) {
                    $message->to('inquiry@mail.test')
                            ->subject($subject);
                });

               
                $this->info('Batch email sent successfully at ' . $now->format('Y-m-d H:i:s'));
            } else {
              
                $this->info('Debug mode is on');
            }


            sleep(300); // 300min
        }
    }
}
