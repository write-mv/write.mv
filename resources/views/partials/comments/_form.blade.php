<style>


form {
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 400px;
}
</style>
<form action="{{route('comments.store', $post->id)}}" method="POST">
    @csrf
      <input type="hidden" name="parent_id" value="{{$parent_id ?? ''}}" />
    @guest
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
          Name
        </label>
      <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name">
    </div>
@endguest
  
   @auth
   <div class="mb-4">
    <span class="block text-gray-700 text-sm font-normal mb-2">Logged in as: <span class="font-semibold">{{auth()->user()->name}}</span></span>
    </div>
    <input type="hidden" name="guest" value="false"> 
   @endauth
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">
    Comment
      </label>
    <textarea class="form-textarea mt-1 block w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="body" rows="5" placeholder="Type your comment..."></textarea>
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">
          Submit
        </button>
    </div>
  </form>