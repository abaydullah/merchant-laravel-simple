<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('products.store') }}">
                        @csrf
                    <div class="flex items-center gap-3 justify-end">
                        <div class="mt-4">
                            <x-input-label for="product" :value="__('Product')" />
                            <x-text-input id="product" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" placeholder="Enter Product Name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4 px-6">
                            <x-input-label for="category" :value="__('Category')" />
                            <select name="category_id" id="category" class="py-2 px-10">
                                @foreach($categories as $category)

                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4 px-6">
                            <x-input-label for="shop" :value="__('Shop')" />
                            <select name="store_id" id="shop" class="py-2 px-10">
                                @foreach($stores as $store)

                                <option value="{{$store->id}}">{{$store->name}}</option>
                                @endforeach
                            </select>
                        </div>
                       <div>
                           <x-primary-button class="bg-red-500 hover:bg-red-600 px-4 py-3 mt-10">
                               {{ __('Add') }}
                           </x-primary-button>
                       </div>
                    </div>

                    </form>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                   ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                   Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Shop
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=> $product)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$key+1}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$product->name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$product->category->name}}
                                </td>
                                <td class="px-6 py-4">
                                    <a class="text-indigo-500 font-semibold hover:text-indigo-600" href="{{'http://'.$product->store->slug.'.'.explode('//',config('app.url'))[1]}}">{{$product->store->name}}</a>
                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
