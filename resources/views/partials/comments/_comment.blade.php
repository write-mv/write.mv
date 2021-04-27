<div class="flex">
    <div class="flex-shrink-0 mr-3">
      <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://ui-avatars.com/api/?rounded=true&name={{$comment->owner->name ?? ""}}" alt="">
    </div>
    <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
      <strong>{{$comment->owner->name ?? ""}}</strong> <span class="text-xs text-gray-400">{{$comment->created_at->diffForHumans()}}</span>
      <p class="text-sm">
        {{$comment->body}}
      </p>
      @if(!$comment->parent_id)

      <div x-data="{ show: false }">
        <div class="flex justify-end">
          <div @click="show = !show" class="cursor-pointer text-sm text-gray-500 font-semibold">
            Reply
           </div>
        </div>
     <div x-show="show">
      @include('partials.comments._form', [
        'parent_id' => $comment->id
      ])
   </div>
      
      </div>

      @endif

      @if (isset($comments[$comment->id]))
      <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>
  
      <div class="space-y-4">

        @include ('partials.comments._list', ['collection' => $comments[$comment->id]])
      </div>
      @endif
    </div>
  </div>