<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">

    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if (session()->has('message'))
                <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
            @endif


            <button wire:click="crear()"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Nuevo</button>
            @if ($modal)
                @include('livewire.events.create')
            @endif

            <table class="table-fixed w-full my-2">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <td class="px-4 py-2">
                            ID
                        </td>
                        <td class="px-4 py-2">
                            Title
                        </td>
                        <td class="px-4 py-2">
                            Slug
                        </td>
                        <td class="px-4 py-2">
                            Actions
                        </td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($events as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->id }}</td>
                            <td class="border px-4 py-2">{{ $item->title }}</td>
                            <td class="border px-4 py-2">{{ $item->slug }}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{ $item->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Edit</button>
                                <button wire:click="borrar({{ $item->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>



    </div>
</div>