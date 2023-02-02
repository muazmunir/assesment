<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Image;

class AddWatermark extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addwatermark:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $images = glob('public/uploads/images/*');
        $date = date('Y-m-d');

        foreach ($images as $image) {
            $img = Image::make($image);

            $img->text($date, $img->width() - 50, $img->height() - 20, function ($font) {
               $font->file(public_path('fonts/arial.ttf'));
               $font->size(20);
               $font->color('#fdf6e3');
               $font->align('right');
               $font->valign('bottom');
            });

            // Add yellow rectangle behind the text
            $img->rectangle($img->width() - 80, $img->height() - 40, $img->width() - 20, $img->height() - 20, function ($draw) {
               $draw->background('#ffff00');
            });

            $img->save();
        }
    }
}
