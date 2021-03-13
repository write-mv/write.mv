<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-3">
                <div>
                  <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                      <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
                     
                        <span>All ({{$all_post_count}})</span>
                      </a>
                      <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
                       
                        <span>Published  ({{$published_post_count}})</span>
                      </a>
                      <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                      <a href="#" class="border-blue-500 text-blue-600 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                       
                        <span>Drafts ({{$draft_post_count}})</span>
                      </a>

                      <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
                     
                        <span>Scheduled ({{$scheduled_post_count}})</span>
                      </a>
                     
                    </nav>
                  </div>
                </div>
              </div>

            <div class="">
                <div class="xl:col-span-3">
                    <div class="flex justify-between mb-4 items-center">
                        <div class="pr-2 w-24">
                            <select wire:model.lazy="perPage" id="perPage"
                                class="max-w-lg border-none w-full shadow-sm sm:max-w-xs sm:text-sm rounded-md">
                                <option>8</option>
                                <option>10</option>
                                <option>15</option>
                            </select>
                        </div>



                        <div class="w-full">
                            <x-text-input class="fontfam-regular" wire:model="search" placeholder="Search Posts..." />
                        </div>

                        <div class="ml-5">
                            <a href="{{route('posts.new')}}"
                                class="flex items-center ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <x-heroicon-o-plus class="inline-block w-5 h-5" />
                                New
                            </a>


                        </div>

                    </div>

                    <div class="flex flex-col">
                        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div class="align-middle inline-block min-w-full shadow-sm overflow-hidden sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <x-th label="Title" value="title" :canSort="true" :sortField="$sortField"
                                                :sortAsc="$sortAsc" />
                                            <x-th label="Slug" value="slug" :canSort="true" :sortField="$sortField"
                                                :sortAsc="$sortAsc" />

                                            <x-th label="Status" value="published" :canSort="true"
                                                :sortField="$sortField" :sortAsc="$sortAsc" />


                                            <x-th label="Publish Date" value="published_date" :canSort="true"
                                                :sortField="$sortField" :sortAsc="$sortAsc" />
                                            <th
                                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @forelse($posts as $post)
                                        <tr wire:key="{{$post->id}}">

                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div
                                                    class="text-sm leading-5 text-gray-900 {{$post->is_english ? "" : "para-dhivehi"}}">
                                                    {{$post->title}}</div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="text-sm leading-5 text-gray-900">
                                                    {{$post->slug}}
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                @if($post->published && $post->published_date->lessThanOrEqualTo(now()))
                                                <x-badge label="published" color="green" />
                                                @elseif($post->published == false &&
                                                $post->published_date->lessThanOrEqualTo(now()))
                                                <x-badge label="drafted" color="yellow" />
                                                @elseif($post->published == true &&
                                                $post->published_date->greaterThan(now()))
                                                <x-badge label="scheduled" color="indigo" />
                                                @else
                                                <x-badge label="drafted" color="yellow" />
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="text-sm leading-5 text-gray-900">
                                                    {{$post->published_date->format('M d, Y')}}
                                                </div>

                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                <div class="flex items-center gap-2">

                                                    <button class="border-2 border-gray-200 rounded-md p-1">
                                                        <x-heroicon-o-eye class="h-4 w-4 text-gray-500" />
                                                    </button>


                                                    <a href="{{route('posts.update', $post)}}"
                                                        class="border-2 border-indigo-200 rounded-md p-1">
                                                        <x-heroicon-o-pencil class="h-4 w-4 text-indigo-500" />
                                                    </a>

                                                    <button class="border-2 border-red-200 rounded-md p-1">
                                                        <x-heroicon-o-trash class="h-4 w-4 text-red-500" />
                                                    </button>
                                                </div>

                                            </td>


                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="flex justify-center">
                                                <div class="flex justify-center items-center space-x-2">
                                                    <x-heroicon-o-newspaper class="w-10 h-10 mr-1 text-gray-400" />
                                                    <span class="font-medium py-8 text-gray-400 text-xl">No posts
                                                        found...</span>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
</div>