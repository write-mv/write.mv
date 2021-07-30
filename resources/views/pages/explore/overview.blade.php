@extends('pages.layout')

@section('content')
    <div class="container mx-auto">


        <div class="pt-5 pb-10 lg:pt-10 lg:pb-0">
            <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
                <div class="lg:w-3/4">
                    <div class="flex justify-between items-center lg:block">
                        <div class="flex justify-between items-center">
                            <h1 class="text-4xl text-gray-900 font-bold">
                                Explore Writings.
                            </h1>
                        </div>

                        <div class="flex items-center justify-between lg:mt-6">
                            <h3 class="text-gray-800 text-xl font-semibold">
                                {{ $posts->total() }} Publications
                            </h3>
                        </div>

                    </div>

                

                    <section class="mt-8 mb-5 lg:mb-32">
                        <div class="flex flex-col gap-y-4">
                            @foreach ($posts as $post)
                                <x-explore.overview-summary :post="$post" />
                            @endforeach

                        </div>

                        <div class="mt-10">
                            {{ $posts->links() }}

                        </div>
                    </section>
                </div>

                <div class="lg:w-1/4">
                    <div class="bg-white shadow-sm mt-32">
                        <h3 class="text-xl font-semibold px-5 pt-5">
                            Top Blogs
                        </h3>

                        <ul>
                            @foreach ($blogs as $blog)
                                <x-explore.writer-card :blog="$blog" />
                            @endforeach
                        </ul>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
