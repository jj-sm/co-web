<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
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
                @include('livewire.admin.events.create')
            @endif
            <div class="overflow-x-auto w-full">
                <table class="table-auto w-full my-2 max-w-full divide-y divide-gray-200">
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
                                Featured
                            </td>
                            <td class="px-4 py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $item)
                            <tr>
                                <td class="border px-4 py-2" NOWRAP>{{ $item->id }}</td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('storage/events/' . $item->image) }}" class="w-40">
                                </td>
                                <td class="border px-4 py-2">{{ $item->title }}</td>
                                <td class="border px-4 py-2">{{ $item->date_time }}</td>

                                <td class="border px-4 py-2 max-w-xs ">

                                    @if ($item->featured)
                                        <svg class="w-6 h-6 mx-auto text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @else
                                        <svg class="w-6 h-6 mx-auto text-red-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    @endif


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



            {{ $events->links() }}
        </div>

    </div>

</div>