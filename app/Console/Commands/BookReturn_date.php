<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\PeminjamanBuku;
use Illuminate\Console\Command;

class BookReturn_date extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'book:return_date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'automaticaly return book';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $now = Carbon::now()->toDateString();
        $borrows = PeminjamanBuku::where('status', '=', 'sedang dipinjam')
            ->where('return_date', '!==', 'rent_date')
            ->get();

        foreach ($borrows as $borrow) {
            $borrow->status = 'in stock';
            $borrow->save();
        }

        $this->info('Book status updated successfully!');
    }
}
