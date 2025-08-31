<x-layout>
    <x-slot:heading>
        <h2>Home Page</h2>
    </x-slot:heading>

    @foreach ($jobs as $job )
        
    <li>{{$job['title']}} : pays : {{$job['salary']}}</li>
    @endforeach
    

</x-layout>