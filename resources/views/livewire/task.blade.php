<div class="container" style="display: flex; flex-direction:column; align-items: center">
    <div class="py-12">
        <div class="max-w-7xl sm:px-6 lg:px-8" style="max-width: 500px">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input wire:model="title" id="title" class="block mt-1 w-full" type="text"
                        name="title" required />

                    <x-input-label for="desc" :value="__('Description')" style="margin-top:15px" />
                    <textarea id="desc" wire:model="desc"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        type="textarea" name="desc" required rows="4" cols="50">
                                        </textarea>
                    @if ($showEdit)
                        <x-primary-button class="mt-4" wire:click="updateTask()">
                            {{ __('Update Task') }}
                        </x-primary-button>
                        <x-primary-button class="mt-4" wire:click.prevent="cancelTask()">
                            {{ __('Cancel') }}
                        </x-primary-button>
                    @else
                        <x-primary-button class="mt-4" wire:click.prevent="storeTask()">
                            {{ __('Add Task') }}
                        </x-primary-button>
                    @endif
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
                            <th scope="col" colspan=2>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $value)
                            <tr wire:key="task-{{ $value->id }}">
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->description }}</td>
                                <td>
                                    <button class="btn btn-light" wire:click="deleteTask({{ $value->id }})">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-light" id="editBtn" data-id="{{ $value->id }}" wire:click="editTask({{ $value->id }})">
                                        <i class="fa-solid fa-pen-to-square"></i>Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
