<x-layout>
        <x-slot:heading>
        <h2>Jobs Listings</h2>
    </x-slot:heading>
    
    <ul>
        
    @foreach ($jobs as $job )
        
    <li>
        <a href="/jobs/{{ $job['id'] }}">
        {{$job['title']}} 
    </a>
    </li>
    @endforeach

    </ul>
</x-layout>