<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Insights') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section>
                <div class="flex justify-center gap-5">
                    <div class="inline-block align-bottom px-4 pt-5 pb-4 text-left">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">
                                Lifetime Summary
                            </h3>
                            <dl
                                class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden divide-y divide-gray-200 md:grid-cols-2 md:divide-y-0 md:divide-x">
                                <div class="px-4 py-5 sm:p-6">
                                    <dt class="text-base font-normal text-gray-900">
                                        Total views
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div class="flex items-baseline text-2xl font-semibold text-blue-600">
                                            {{$life_time_views}}
                                        </div>
                                    </dd>
                                </div>

                                <div class="px-4 py-5 sm:p-6">
                                    <dt class="text-base font-normal text-gray-900">
                                        Total visitors
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div class="flex items-baseline text-2xl font-semibold text-blue-600">
                                            {{$life_time_visitors}}
                                        </div>
                                    </dd>
                                </div>


                            </dl>
                        </div>
                    </div>

                    <div class="inline-block align-bottom px-4 pt-5 pb-4 text-left">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">
                                Monthly Summary
                            </h3>
                            <dl
                                class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden divide-y divide-gray-200 md:grid-cols-2 md:divide-y-0 md:divide-x">
                                <div class="px-4 py-5 sm:p-6">
                                    <dt class="text-base font-normal text-gray-900">
                                        Views
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div class="flex items-baseline text-2xl font-semibold text-blue-600">
                                            {{$monthly_views}}

                                        </div>

                                        @if($views_increased < 0) <div
                                            class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800 md:mt-2 lg:mt-0">
                                            <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-red-500"
                                                fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">
                                                Decreased by
                                            </span>
                                            {{round($views_increased)}}%
                                </div>
                                @else

                                <div
                                    class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                                    <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500"
                                        fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">
                                        Increased by
                                    </span>
                                    {{round($views_increased)}}%
                                </div>
                                @endif


                                </dd>
                        </div>

                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-base font-normal text-gray-900">
                                Visitors
                            </dt>
                            <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                <div class="flex items-baseline text-2xl font-semibold text-blue-600">
                                    {{$monthly_visitors}}

                                </div>

                                @if($visitors_increased < 0) <div
                                    class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800 md:mt-2 lg:mt-0">
                                    <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-red-500"
                                        fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">
                                        Decreased by
                                    </span>
                                    {{round($visitors_increased)}}%
                        </div>
                        @else

                        <div
                            class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                            <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500"
                                fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">
                                Increased by
                            </span>
                            {{round($visitors_increased)}}%
                        </div>
                        @endif



                        </dd>
                    </div>


                    </dl>
                </div>
        </div>
    </div>

    </section>

    <section>
        <div class="p-4 mt-5" style="height: 40rem;">
            {!! $chart->container() !!}
        </div>
    </section>

    <section>
        <h3 class="text-gray-700 text-xl font-semibold mb-3 text-center">Top 10 Popular Posts 🔥</h3>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Slug
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Published date
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($top_10_posts as $post)
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900  {{$post->is_english ? "" : "para-dhivehi"}}">
                                        {{$post->title}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$post->slug}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$post->published_date->format('M d, Y')}}
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
</div>
</div>

@push('scripts')
<script src="{{ LarapexChart::cdn() }}"></script>
{{ $chart->script() }}
@endpush