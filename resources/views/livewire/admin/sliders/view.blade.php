<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sliders') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-16">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 ">

            @if (session()->has('message'))
                <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
            @endif

            <x-jet-button wire:click="create">New</x-jet-button>

            @if ($modal)
                @include('livewire.admin.sliders.create')
            @endif
            <div class="overflow-x-auto w-full">
                <table class="table-auto w-full my-2 max-w-full">
                    <thead>
                        <tr class="bg-indigo-600 text-white">
                            <td class="px-4 py-2 cursor-pointer">
                                ID
                            </td>
                            <td class="px-4 py-2">
                                Image
                            </td>
                            <td class="px-4 py-2 cursor-pointer">
                                Title
                            </td>
                            <td class="px-4 py-2">
                                Date
                            </td>

                            <td class="px-4 py-2">
                                Description
                            </td>
                            <td class="px-4 py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $item)
                            <tr>
                                <td class="border px-4 py-2" NOWRAP>{{ $item->id }}</td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('storage/events/' . $item->image) }}" class="w-40">
                                </td>
                                <td class="border px-4 py-2">{{ $item->title }}</td>
                                <td class="border px-4 py-2">{{ $item->date_time }}</td>

                                <td class="border px-4 py-2 max-w-xs">
                                    <p class="truncate">
                                        {{ $item->description }}
                                    </p>


                                </td>
                                <td class="border px-2 py-2 text-center">
                                    <button wire:click="edit({{ $item->id }})"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Edit</button>
                                    <button wire:click="delete({{ $item->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



            {{ $sliders->links() }}
        </div>

    </div>

</div>