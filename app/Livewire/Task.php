<?php

namespace App\Livewire;

use App\Models\Task as TaskModel;
use Livewire\Component;

class Task extends Component
{
    public $title, $desc, $edit = false,$task_id;

    public function storeTask()
    {
        // Validation
        $validated_data = $this->validate([
            'title' => 'required',
            'desc' => 'nullable'
        ]);

        // storing in DB
        $task = TaskModel::create([
            'title' => $validated_data['title'],
            'description' => $validated_data['desc'],
        ]);

        // Reset input fields and public values
        $this->dispatch('clear-inputs');
        $this->clearValues();

        // Show toastr
        if ($task) {
            $this->dispatch('success','Task created !');
        } else {
            $this->dispatch('error');
        }
    }

    private function clearValues(){
        $this->title = '';
        $this->desc = '';
    }

    public function editTask($id)
    {
        $task = TaskModel::find($id);

        $this->title = $task->title;
        $this->desc = $task->description;

        // Show update button
        $this->edit = true;

        $this->task_id = $id;
    }

    public function updateTask()
    {
        // Validation
        $validated_data = $this->validate([
            'title' => 'required',
            'desc' => 'nullable'
        ]);

        // Updating
        $task = TaskModel::find($this->task_id);
        $task->update([
            'title' => $validated_data['title'],
            'description' => $validated_data['desc'],
        ]);

        // Reset input fields
        $this->dispatch('clear-inputs');

        // Hide buttons
        $this->edit = false;

        // Show toastr
        if ($task) {
            $this->dispatch('success','Task updated !');
        } else {
            $this->dispatch('error');
        }
    }

    public function cancelTask()
    {
        // Hide update and cancel buttons
        $this->edit = false;
    }

    public function deleteTask($id) {
        $task = TaskModel::find($id);
        $task->delete();
    }

    public function render()
    {
        $tasks = TaskModel::all();
        $showEdit = $this->edit;
        return view('livewire.task', compact('tasks', 'showEdit'));
    }
}
