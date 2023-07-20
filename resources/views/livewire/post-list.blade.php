<div>
    <div class="container mx-auto px-10 pt-20 pb-10">
        <div class="grid grid-cols-4 gap-3">
            <select wire:model="category_id" class="block w-full p-4 text-pink-700 bg-white border-2 border-pink-200 rounded-full focus:border-pink-400 focus:ring-pink-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                <option value="">Choose Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <select wire:model="sub_cat_id" class="block w-full p-4 text-pink-700 bg-white border-2 border-pink-200 rounded-full focus:border-pink-400 focus:ring-pink-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                <option value="">Choose Sub-category</option>
                @foreach($subCategories as $sc)
                <option value="{{$sc->id}}">{{$sc->name}}</option>
                @endforeach
            </select>
            <input type="number" wire:model="guest_count" class="block w-full p-4 text-pink-700 bg-white border-2 border-pink-200 rounded-full focus:border-pink-400 focus:ring-pink-300 focus:ring-opacity-40 focus:outline-none focus:ring">
            <input type="text" name="daterange" value="" class="block w-full p-4 text-pink-700 bg-white border-2 border-pink-200 rounded-full focus:border-pink-400 focus:ring-pink-300 focus:ring-opacity-40 focus:outline-none focus:ring" wire:change="render" />
        </div>

        <div class="container mx-auto px-10 pb-20 pt-10">
            <div class="grid grid-cols-4 gap-4">
                @forelse($filteredPost as $post)
                <div class="bg-white p-2 shadow rounded-md">
                    <div>
                        <img src="{{$post->image}}" alt="" class="rounded-md">
                    </div>
                    <div class="pb-2">
                        <p class="text-2xl font-bold mt-2">{{\Str::limit($post->title,22)}}</p>
                        <p class="text-gray-500 font-bold mt-2">Guest : {{$post->guests_allowed}}</p>
                        <p class="text-gray-500 font-bold mt-2">Category : {{$post->category->name}}</p>
                        <p class="text-gray-500 font-bold mt-2">Sub Category : {{$post->subCategory->name}}</p>
                        <p class="text-gray-500 font-bold mt-2">{{$post->start_date}} - {{$post->end_date}}</p>
                    </div>
                </div>
                @empty
                <p>No Post Found</p>
                @endforelse
            </div>
            @if($filteredPost->hasMorePages())
            <div class="flex justify-center">
                <button wire:click="loadMore" wire:loading.attr="disabled" class="bg-pink-500 mt-10 rounded-md shadow-xl hover:shadow px-3 py-1.5 text-white">
                    Load More
                </button>
            </div>
            @endif
        </div>

    </div>

    @push('js')
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                window.livewire.emit('dateRange', start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
    @endpush
</div>