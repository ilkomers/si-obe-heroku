<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignment Plans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="overflow-x-auto">
                  <table class="table table-compact w-full">
                    <thead>
                      <tr>
                        <th>id</th> 
                        <th>title</th> 
                        <th>description</th> 
                        <th>created_at</th> 
                        <th>updated_at</th> 
                        <th>assignment_style</th> 
                        <th>
                           
                        <div>
                        <form action="{{ route('syllabi.assignment-plans.create', $syllabus) }}" method= "get">
                              <button class="btn border-outline bg-blue-400 hover:bg-blue-700 hover:text-white 
                              text-white font-bold btn-outline"><strong>Create</strong></button>
                        </form>
                        </div>

                        </th>
                      </tr>
                    </thead> 
                    <tbody>
                      @foreach($plans as $plan)
                      <tr>
                        <td>{{ $plan->id }}</td> 
                        <td>{{ $plan->title }}</td> 
                        <td>{{ $plan->description }}</td> 
                        <td>{{ $plan->created_at }}</td> 
                        <td>{{ $plan->updated_at }}</td> 
                        <td>{{ $plan->assignment_style }}</td> 
                        <td>
                        <div class="card-actions justify-end pt-5">
                            <form action="{{ route('syllabi.assignment-plans.edit', [$syllabus, $plan->id]) }}" method="get">
                              <button class="btn btn-warning btn-sm" value="{{ $plan->id }}"><strong>Edit</strong></button>
                            </form>
                            <form action="{{ route('syllabi.assignment-plans.destroy', [$syllabus, $plan->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-error btn-sm" value="{{ $plan->id }}" onclick="return confirm('Yakin ingin menghapus data?');"><strong>Delete</strong></button>
                            </form>
                        </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody> 
                  </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>