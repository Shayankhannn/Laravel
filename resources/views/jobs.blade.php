<x-layout>
        <x-slot:heading>
        <h2>Jobs Listings</h2>
    </x-slot:heading>
    
    <ul>
        
    @foreach ($jobs as $job )
        
    <li>
        <a href="/jobs/">
        {{$job['title']}} : pays : {{$job['salary']}}
    </a>
    </li>
    @endforeach

    </ul>
</x-layout>