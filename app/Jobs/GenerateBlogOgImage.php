<?php

namespace App\Jobs;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GenerateBlogOgImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $blog;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $canvas = Image::canvas(1200, 630);

        $template = Image::make(public_path("images/og-templates/blog-og-template.png"));
        $canvas->insert($template);

        $canvas->text(strtoupper($this->blog->name), 600, 320, function ($font) {
            $font->file(public_path("fonts/Poppins/Poppins-Bold.ttf"));
            $font->size(64);
            $font->color('#0d0d0d');
            $font->align('center');
            $font->valign('center');
            $font->angle(0);
        });

        $canvas->text("write.mv/{$this->blog->name}", 600, 580, function ($font) {
            $font->file(public_path("fonts/Poppins/Poppins-Light.ttf"));
            $font->size(24);
            $font->color('#7f7f7f');
            $font->align('center');
            $font->valign('center');
            $font->angle(0);
        });

        $file_path_name = config('writemv.blog_og_image.path').Str::random(40) . ".png";

        Storage::put($file_path_name, (string) $canvas->encode("png"), [
            'visibility' => 'public',
        ]);

        $this->blog->update([
            "meta" => [
                "og_image" => $file_path_name
            ]
        ]);

    }
}
