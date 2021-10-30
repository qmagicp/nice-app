<x-dropdown>
    <div class="dropdown-menu text-justify bg-gray-100 rounded-xl" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/?{{ http_build_query(request()->except('category', 'page')) }}">All</a>
        @foreach ($categories as $category)
            <ul class="flex text-justify bg-gray-100 text-sm w-full max-h-16">
                <li>
                    <a href="/?category={{ $category->slug }}&{{ http_build_query(request()    ->except('category', 'page')) }}" :active="{{ request()->is("categories/.{$currentCategory}") ? $currentCategory->name : 'Category' }}" class="text-sm text-justify">
                        {{ ucwords($category->name) }}</a>
                </li>
            </ul>            
        @endforeach                
        
    </div>
   
</x-dropdown>  