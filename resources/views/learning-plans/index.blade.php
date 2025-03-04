@section('pageTitle', 'Learning Plans')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning Plans') }}
        </h2>
        <p>for {{ $syllabus->title }}</p>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('learning-plans.index', $syllabus) }}
        <div class="pb-8">
            <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <x-button-link href="{{ route('syllabi.learning-plans.create', [$syllabus]) }}">
                        <i class="fa fa-plus"></i> {{ __('Create New Learning Plan') }}
                    </x-button-link>
                </div>
            </div>
            @if($learningPlans->count() > 0)
                <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-16">Week</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">LLO</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Study Material</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Learning Method</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-52">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($learningPlans as $plan)
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->week_number }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->lessonLearningOutcome->description }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->study_material }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->learning_method }}</td>
                                <td
                                    class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                    <div class="flex flex-wrap space-x-4">
                                        <a href="{{ route('syllabi.learning-plans.edit', [$syllabus, $plan]) }}"
                                           class="text-blue-500">Edit</a>
                                        <form method="POST" action="{{ route('syllabi.learning-plans.destroy', [$syllabus, $plan]) }}">
                                            @csrf
                                            @method('delete')

                                            <button class="text-red-500"
                                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $learningPlans->links() }}
            @else
                <div class="text-center p-8">
                    <p class="text-gray-500">No learning plans found.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
