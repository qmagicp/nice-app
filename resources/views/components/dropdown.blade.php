<div class="dropdown">
  <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @isset($currentCategory)
        {{ $currentCategory->name }}
    @endisset
        
    @empty($currentCategory)
        {{ 'Category' }}
    @endempty    
  </button>

            {{ $slot }}
          
</div>

          
                      

                            

                  



    