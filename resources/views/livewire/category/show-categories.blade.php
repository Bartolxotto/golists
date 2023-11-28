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
                                       <td class="text-center px-6 py-4 whitespace-nowrap w-full font-extrabold">{{ $category->icon }} {{ $category->name }}</td>
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
