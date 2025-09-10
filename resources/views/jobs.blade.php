<x-layout>
        <x-slot:heading>
        <h2>Jobs Listings</h2>
    </x-slot:heading>
    
    <div class="space-y-5">
        
    @foreach ($jobs as $job )
        
    <a href="/jobs/{{ $job['id'] }}" class="block  px-4 py-6 border border-gray-200 shadow-md shadow-gray-500 rounded-lg hover:bg-blue-300 transition">
    <div class="font-light text-sm text-blue-600">{{$job->employer->name}}</div>
        <div>
        <strong>{{$job['title']}}</strong> 
    </div>
</a>               
    
    @endforeach

    <div>
        {{ $jobs->links() }}
    </div>

    </div>
</x-layout>