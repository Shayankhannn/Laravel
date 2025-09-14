@props(['name'])

@error($name)
              <p class="text-sm mt-1 italic text-red-600">{{ $message }}</p>
            @enderror