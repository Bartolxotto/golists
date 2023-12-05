   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
               <div>


                   <div class="px-6 py-4">
                       <x-input type="text" placeholder="{{ __('Search category...') }}" class="w-full my-4"
                           wire:model.live="search" />
                   </div>

                   <x-table>
                       <table class="min-w-full divide-y divide-gray-200">
                           <tbody class="bg-white divide-y divide-gray-200">
                               @foreach ($categories as $category)
                                   <tr wire:key="category-{{ $category->id }}">
                                       <td class="px-6">
                                           @if ($defaultCategory == $category->id)
                                               <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                   viewBox="0 0 22 20">
                                                   <path
                                                       d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                               </svg>
                                           @endif
                                       </td>
                                       <td class="text-center px-6 py-4 whitespace-nowrap w-full font-extrabold">
                                           {{ $category->icon }} {{ $category->name }}</td>
                                       <td class="px-6 py-4 whitespace-nowrap">
                                           <div class="flex flex-row">

                                               @livewire('edit-category', ['category' => $category], key($category->id))

                                               <div>
                                                   <x-danger-button class="ml-4"
                                                       wire:click="delete({{ $category }})">
                                                       <i class="fa-solid fa-trash"></i>
                                                   </x-danger-button>
                                               </div>

                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </x-table>
               </div>

               <div>
                   @livewire('create-category')
               </div>

           </div>
       </div>
   </div>
