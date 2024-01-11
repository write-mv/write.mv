<?php

namespace App\Modules;

use Illuminate\Support\Str;

class BlogNameGenerator
{
    protected $generator;

    public function __construct()
    {
        $this->generator = new \Nubs\RandomNameGenerator\All(
            [
                new \Nubs\RandomNameGenerator\Alliteration(),
                new \Nubs\RandomNameGenerator\Vgng(),
            ]
        );
    }

    public function generate(): string
    {
        return Str::slug($this->generator->getName());
    }
}
