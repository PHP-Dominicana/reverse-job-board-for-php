<div>
    @foreach ($developers as $developer)
        <x-developers.item :developer="$developer" />
    @endforeach

    {{ $developers->links() }}
</div>
