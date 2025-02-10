<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                    @if(auth()->user()->role === 'admin')
                        <div>
                            <ul class="divide-y bg-gray-200 divide-gray-500 ">
                                @foreach(\App\Models\User::where('role','merchant')->get() as  $merchant)
                                    <li class="py-4 px-6">
                                        <h2 class="text-2xl">{{$merchant->name}}</h2>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
