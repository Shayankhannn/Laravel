<x-layout>
    <x-slot:heading>
        <h2>Job Page</h2>
    </x-slot:heading>

    <h2>{{$job->title}}</h2>
    <p>{{$job->salary}} per year</p>

    <p class="mt-5">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    </p>

</x-layout>