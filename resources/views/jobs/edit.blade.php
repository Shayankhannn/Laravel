<x-layout>
        <x-slot:heading>
        <h2>Edit Job : {{$job->title}}</h2>
    </x-slot:heading>
    
    <form method="POST" action="/jobs/{{ $job->id }}">
      @csrf
      @method('PATCH')

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
     
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input 
              id="title"
               type="text"
                name="title"
                 required
                  placeholder="Programmer"
                  value="{{ $job->title }}"
                  class="block min-w-0 grow bg-white py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
             @error('title')
              <p class="text-sm mt-1 italic text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="sm:col-span-4">
          <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input 
              id="salary"
               type="text"
                name="salary"
                 required 
                 placeholder="$50,000"
                 value="{{ $job->salary }}"
                 class="block min-w-0 grow bg-white py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />

            </div>
            @error('salary')
              <p class="text-sm italic text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>


       

      </div>


    </div>

 

  </div>

  <div class="mt-6 flex items-center justify-between gap-x-6">
    <div >
      <button form="delete-form" class="border hover:border-red-600 hover:bg-transparent transition px-3 py-2 text-white font-medium hover:text-black rounded-lg bg-red-600 ">Delete</button>
    </div>
    <div class="flex items-center gap-x-6">
      <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
      <div>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
      </div>
      
    </div>
  </div>
</form>

<form action="/jobs/{{ $job->id }}" method="post" class="hidden" id="delete-form">
@csrf 
  @method('DELETE')

</form>
    
</x-layout>