@extends('pages.layout')

@section('content')
<div class="py-12" style="font-family: Poppins;">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

        <div class="flex flex-col items-center justify-center my-4 mb-3 mx-5" style="font-family: Poppins;">
            <h1 class="font-bold text-2xl leading-10 poppins">
               Whats new's ?
            </h1>
    
            <p class="font-normal text-lg text-center leading-10 sm:w-2/3 poppins break-words">
                We’re constantly making <a href="https://write.mv"><mark>Write.mv</mark></a> better. Here are some of the of 
                notable new features and improvements that we’ve made to 
                <a href="https://write.mv"><mark>Write.mv</mark></a> since it first launched.
            </p>
            </div>
        

              <div class="relative wrap overflow-hidden p-10 h-full">
                <div class="border-2-2 absolute border-opacity-20 border-gray-700 h-full border" style="left: 50%"></div>
       
                
                    
                  <!-- right timeline -->
                  <div class="mb-8 flex justify-between items-center w-full right-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 bg-gray-800 shadow-xl w-8 h-8 rounded-full">
                      <h1 class="mx-auto font-semibold text-lg text-white">3</h1>
                    </div>
                    <div class="order-1 bg-gray-400 rounded-lg shadow-xl w-5/12 px-6 py-4">
                      <h3 class="mb-3 font-bold text-gray-800 text-xl">Lorem Ipsum</h3>
                      <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                  </div>
                
              
            
                <!-- left timeline -->
                <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                  <div class="order-1 w-5/12"></div>
                  <div class="z-20 flex items-center order-1 bg-gray-800 rounded-lg shadow-xl w-36 h-8">
                    <h1 class="mx-auto text-white font-semibold text-lg">17 March 2021</h1>
                  </div>
                  <div class="order-1 bg-white rounded-lg shadow-xl w-5/12 px-6 py-10">
                    <h3 class="mb-3 font-bold text-2xl"><mark>Launch Day</mark> 🎉</h3>
                    <p class="text-sm font-medium leading-snug tracking-wide text-gray-800 text-opacity-100">
                      The day write.mv was launched to the public.
                    </p>
                  </div>
                </div>
              </div>
            
    </div>
</div>
@endsection