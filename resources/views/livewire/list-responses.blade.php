<div>
    <main class="max-w-screen-lg mx-auto py-16 px-4 sm:px-6 poppins">
        <div class="space-y-8">
            <div>
                <div class="mt-2 flex items-center justify-between">
                    <h1 class="font-bold text-2xl leading-10 poppins dark:text-gray-200">
                        Responses from your Reader's
                    </h1>

                </div>
    
                <div class="flex justify-between mt-5">
    
                <div class="relative text-gray-600 mt-2">
                    <input type="search" wire:model="search" name="search" placeholder="Search responses..."
                        class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none border-none">
                </div>
    
                <div>
                    <x-action-dropdown wire:key="dropdown-sort">
                        <x-slot name="icon">
                            Sort
                          <x-heroicon-s-filter class="h-5 w-5" />
                        </x-slot>
                          <a wire:click="$set('sort', 'desc')"
                              class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                              role="menuitem">Most replies</a>
                          <a wire:click="$set('sort', 'asc')"
                              class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                              role="menuitem">Fewer replies</a>
                              
                      </x-action-dropdown>
    
                </div>
    
                </div>
            </div>
        </div>

        <div class="mb-3 mt-2">
            <div>
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <a wire:click.prevent="switchFilter('all')"
                            class="cursor-pointer poppins font-normal {{ $filter == 'all' ? 'tab-active' : 'tab' }}">

                            <span>All ({{ $all_comment_count }})</span>
                        </a>
                        <a wire:click.prevent="switchFilter('pending')"
                            class="cursor-pointer poppins font-normal {{ $filter == 'pending' ? 'tab-active' : 'tab' }}">
                            <svg class="w-6 h-6 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Pending ({{ $pending_comment_count }})</span>
                        </a>

                        <a wire:click.prevent="switchFilter('approved')"
                            class="cursor-pointer poppins font-normal  {{ $filter == 'approved' ? 'tab-active' : 'tab' }}"
                            aria-current="page">

                            <svg class="w-6 h-6m mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

                            <span>Approved ({{ $approved_comment_count }})</span>
                        </a>

                        <a wire:click.prevent="switchFilter('spam')"
                            class="cursor-pointer poppins font-normal tab">
                            <svg class="w-6 h-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                            <span>Spam (32)</span>
                        </a>

                    </nav>
                </div>
            </div>
        </div>

        <div class="flex flex-col mt-8">
            <div class="-my-2 sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow-sm border-b border-gray-200 sm:rounded-lg rounded">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Post
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Message
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach($comments as $comment)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixqx=2HzVkefWts&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $comment->owner->name }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <a href="{{route('posts.show', ["name" => $comment->post->blog->name, "post" => $comment->post->slug])}}" target="_blank" class="text-sm text-gray-500 underline">{{$comment->post->title}}</a>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          @if($comment->approved)
                          <div class="text-sm text-gray-500">Approved</div>
                          @else
                          <div class="text-sm text-gray-500">Pending</div>
                          @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{$comment->body}}
                        </td>
                        <td>
                          <div class="flex items-center gap-2">
                          <x-action-dropdown wire:key="dropdown-{{ $comment->id }}">
                            <x-slot name="icon">
                                <x-heroicon-s-dots-vertical class="h-5 w-5" />
                              </x-slot>
                          @if($comment->approved)
                          <a wire:click="markAsPending({{$comment->id}})"
                            class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins flex items-center cursor-pointer"
                            role="menuitem">
                            <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Mark as pending</span>
                        </a>
                          @else
                          <a wire:click="approved({{$comment->id}})"
                          class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins flex items-center cursor-pointer"
                          role="menuitem">
                          <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                          <span>Mark as approved</span>
                      </a>
                          
                          @endif

                          <a href="#"
                            class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins flex items-center"
                            role="menuitem">
                            <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"></path></svg>
                            <span>Mark as spam</span>
                        </a>
                        
                          </x-action-dropdown>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


    
    </main>
</div>
