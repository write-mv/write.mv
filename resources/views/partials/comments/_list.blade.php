<div class="space-y-4">
        @foreach ($collection as $comment)
            @include ('partials.comments._comment')
        @endforeach
</div>
