<div>
    @foreach ($jobs as $job)
        <x-jobs.item :job="$job" />
    @endforeach

    {{ $jobs->links() }}
</div>
