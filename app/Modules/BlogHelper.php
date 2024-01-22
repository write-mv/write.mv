<?php

namespace App\Modules;

use Illuminate\Support\Str;

class BlogHelper
{
    /**
     * Builds a subdomain URL for a blog based on the blog name.
     *
     * @param  string  $blogName The name of the blog.
     * @return string The full URL with subdomain.
     */
    public static function buildBlogUrl($blogName)
    {
        // Extract the domain from the APP_URL
        $appUrl = config('app.url');
        $parsedUrl = parse_url($appUrl);
        $domain = $parsedUrl['host'] ?? 'write.mv';

        // Return the URL using the extracted domain
        return 'https://'.Str::slug($blogName).'.'.$domain;
    }
}
