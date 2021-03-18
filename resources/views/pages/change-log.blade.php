@extends('pages.layout')

@section('content')
<div class="py-12" style="font-family: Poppins;">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

        <div class="flex flex-col items-center justify-center my-4 mb-3 mx-5" style="font-family: Poppins;">
            <h1 class="font-bold text-2xl leading-10 poppins">
                Change-log 🔨
            </h1>

            <p class="font-normal text-lg text-center leading-10 sm:w-2/3 poppins break-words">
                Latest changes,issues and features closed in <a href="https://write.mv" class="underline">write.mv</a> repository.
            </p>
        </div>


        <div class="relative wrap overflow-hidden p-10 h-full">
            <div class="border-2-2 absolute border-opacity-20 border-gray-700 h-full border" style="left: 50%"></div>


            @foreach ($issues as $key => $issue)

            @if(!$key % 2)
            <!-- right timeline -->
            <div class="mb-8 flex justify-between items-center w-full right-timeline">
                <div class="order-1 w-5/12"></div>
                <div class="z-20 flex items-center order-1 bg-gray-800 rounded-lg shadow-xl w-36 h-8">
                    <h1 class="mx-auto font-semibold text-sm text-white">{{\Carbon\Carbon::parse($issue["closed_at"])->diffforHumans()}}</h1>
                </div>
                <div class="order-1 bg-white rounded-lg shadow-xl w-5/12 px-6 py-4">
                    <h3 class="mb-3 font-bold text-gray-800 m:text-md lg:text-xl"><mark>{{$issue["title"]}}</mark></h3>
                    <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">
                        {{$issue["body"]}}
                    </p>
                </div>
            </div>

            @else
            <!-- left timeline -->
            <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                <div class="order-1 w-5/12"></div>
                <div class="z-20 flex items-center order-1 bg-gray-800 rounded-lg shadow-xl w-36 h-8">
                    <h1 class="mx-auto text-white font-semibold text-sm">{{\Carbon\Carbon::parse($issue["closed_at"])->diffforHumans()}}</h1>
                </div>
                <div class="order-1 bg-white rounded-lg shadow-xl w-5/12 px-6 py-10">
                    <h3 class="mb-3 font-bold sm:text-md lg:text-xl"><mark>{{$issue["title"]}}</mark></h3>
                    <p class="text-sm font-medium leading-snug tracking-wide text-gray-800 text-opacity-100">
                        {{$issue["body"]}}
                    </p>
                </div>
            </div>
        </div>
        @endif



        @endforeach





    </div>
</div>
@endsection