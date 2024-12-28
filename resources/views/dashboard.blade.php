<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Task') }}
        </h2>
    </x-slot>

    <div class="container" style="display: flex; flex-direction:column; align-items: center">
        <div class="py-12">
            <div class="max-w-7xl sm:px-6 lg:px-8" style="max-width: 500px">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input wire:model="title" id="title" class="block mt-1 w-full" type="text" name="title" required
                            autocomplete="" />

                        <x-input-label for="desc" :value="__('Description')" style="margin-top:15px" />
                        <textarea id="desc" wire:model="desc"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            type="textarea" name="desc" required rows="4" cols="50"></textarea>

                        <x-primary-button class="mt-4">
                            {{ __('Add Task') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="min-width: 1024px">
                <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="table table-dark table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Ottffffffffffffffffffffffffffffffffffffo</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
