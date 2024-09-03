@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">{{ isset($cv) ? 'Edit CV' : 'Create New CV' }}</h2>

        <form action="{{ isset($cv) ? route('cvs.update', $cv->id) : route('cvs.store') }}" method="POST">
            @csrf
            @if(isset($cv))
                @method('PUT')
            @endif

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Personal Details</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">First
                            Name</label>
                        <input type="text" name="name" id="name"
                               class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                               value="{{ old('name', $cv->personalDetails->name ?? '') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="surname">Last
                            Name</label>
                        <input type="text" name="surname" id="surname"
                               class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                               value="{{ old('surname', $cv->personalDetails->surname ?? '') }}">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                               for="email">Email</label>
                        <input type="email" name="email" id="email"
                               class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                               value="{{ old('email', $cv->personalDetails->email ?? '') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="phone_number">Phone
                            Number</label>
                        <input type="text" name="phone_number" id="phone_number"
                               class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                               value="{{ old('phone_number', $cv->personalDetails->phone_number ?? '') }}">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                               for="address">Address</label>
                        <input type="text" name="address" id="address"
                               class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                               value="{{ old('address', $cv->personalDetails->address ?? '') }}">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="description">Description</label>
                        <textarea name="description" id="description" rows="4"
                                  class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">{{ old('description', $cv->personalDetails->description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="linkedin">LinkedIn</label>
                        <input type="url" name="linkedin" id="linkedin"
                               class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                               value="{{ old('linkedin', $cv->personalDetails->linkedin ?? '') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                               for="github">GitHub</label>
                        <input type="url" name="github" id="github"
                               class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                               value="{{ old('github', $cv->personalDetails->github ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Education</h3>

                <div id="education-section">
                    @forelse(old('education', isset($cv) ? $cv->education : []) as $index => $education)
                        <div class="education-entry grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="institution_{{ $index }}">Institution</label>
                                <input type="text" name="education[{{ $index }}][institution]"
                                       id="institution_{{ $index }}"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="{{ $education['institution'] }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="degree_{{ $index }}">Degree</label>
                                <input type="text" name="education[{{ $index }}][degree]" id="degree_{{ $index }}"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="{{ $education['degree'] }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="start_date_{{ $index }}">Start Date</label>
                                <input type="date" name="education[{{ $index }}][start_date]"
                                       id="start_date_{{ $index }}"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="{{ $education['start_date'] }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="end_date_{{ $index }}">End Date</label>
                                <input type="date" name="education[{{ $index }}][end_date]" id="end_date_{{ $index }}"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="{{ $education['end_date'] }}">
                            </div>
                        </div>
                    @empty
                        <div class="education-entry grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="institution_0">Institution</label>
                                <input type="text" name="education[0][institution]" id="institution_0"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="degree_0">Degree</label>
                                <input type="text" name="education[0][degree]" id="degree_0"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="start_date_0">Start Date</label>
                                <input type="date" name="education[0][start_date]" id="start_date_0"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="end_date_0">End Date</label>
                                <input type="date" name="education[0][end_date]" id="end_date_0"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="">
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="mt-4">
                    <button type="button" id="add-education"
                            class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition">
                        Add More Education
                    </button>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Work Experience</h3>

                <div id="work-experience-section">
                    @forelse(old('work_experience', isset($cv) ? $cv->workExperience : []) as $index => $work)
                        <div class="work-experience-entry grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="company_{{ $index }}">Company</label>
                                <input type="text" name="work_experience[{{ $index }}][company]"
                                       id="company_{{ $index }}"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="{{ $work['company'] }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="position_{{ $index }}">Position</label>
                                <input type="text" name="work_experience[{{ $index }}][position]"
                                       id="position_{{ $index }}"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="{{ $work['position'] }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="start_date_work_{{ $index }}">Start Date</label>
                                <input type="date" name="work_experience[{{ $index }}][start_date]"
                                       id="start_date_work_{{ $index }}"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="{{ $work['start_date'] }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="end_date_work_{{ $index }}">End Date</label>
                                <input type="date" name="work_experience[{{ $index }}][end_date]"
                                       id="end_date_work_{{ $index }}"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="{{ $work['end_date'] }}">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="description_{{ $index }}">Description</label>
                                <textarea name="work_experience[{{ $index }}][description]"
                                          id="description_{{ $index }}" rows="4"
                                          class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">{{ $work['description'] }}</textarea>
                            </div>
                        </div>
                    @empty
                        <div class="work-experience-entry grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="company_0">Company</label>
                                <input type="text" name="work_experience[0][company]" id="company_0"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="position_0">Position</label>
                                <input type="text" name="work_experience[0][position]" id="position_0"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="start_date_work_0">Start Date</label>
                                <input type="date" name="work_experience[0][start_date]" id="start_date_work_0"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="end_date_work_0">End Date</label>
                                <input type="date" name="work_experience[0][end_date]" id="end_date_work_0"
                                       class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"
                                       value="">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                       for="description_0">Description</label>
                                <textarea name="work_experience[0][description]" id="description_0" rows="4"
                                          class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"></textarea>
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="mt-4">
                    <button type="button" id="add-work-experience"
                            class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition">
                        Add More Work Experience
                    </button>
                </div>
            </div>

            <div class="mt-8">
                <button type="submit"
                        class="bg-green-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition">{{ isset($cv) ? 'Update CV' : 'Create CV' }}</button>
            </div>
        </form>
    </div>

    <script>
        let educationIndex = {{ count(old('education', isset($cv) ? $cv->education : [0])) }};
        let workExperienceIndex = {{ count(old('work_experience', isset($cv) ? $cv->workExperience : [0])) }};

        document.getElementById('add-education').addEventListener('click', function () {
            let template = `
            <div class="education-entry grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="institution_${educationIndex}">Institution</label>
                    <input type="text" name="education[${educationIndex}][institution]" id="institution_${educationIndex}" class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="degree_${educationIndex}">Degree</label>
                    <input type="text" name="education[${educationIndex}][degree]" id="degree_${educationIndex}" class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="start_date_${educationIndex}">Start Date</label>
                    <input type="date" name="education[${educationIndex}][start_date]" id="start_date_${educationIndex}" class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="end_date_${educationIndex}">End Date</label>
                    <input type="date" name="education[${educationIndex}][end_date]" id="end_date_${educationIndex}" class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">
                </div>
            </div>`;
            document.getElementById('education-section').insertAdjacentHTML('beforeend', template);
            educationIndex++;
        });

        document.getElementById('add-work-experience').addEventListener('click', function () {
            let template = `
            <div class="work-experience-entry grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="company_${workExperienceIndex}">Company</label>
                    <input type="text" name="work_experience[${workExperienceIndex}][company]" id="company_${workExperienceIndex}" class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="position_${workExperienceIndex}">Position</label>
                    <input type="text" name="work_experience[${workExperienceIndex}][position]" id="position_${workExperienceIndex}" class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="start_date_work_${workExperienceIndex}">Start Date</label>
                    <input type="date" name="work_experience[${workExperienceIndex}][start_date]" id="start_date_work_${workExperienceIndex}" class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="end_date_work_${workExperienceIndex}">End Date</label>
                    <input type="date" name="work_experience[${workExperienceIndex}][end_date]" id="end_date_work_${workExperienceIndex}" class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="description_${workExperienceIndex}">Description</label>
                    <textarea name="work_experience[${workExperienceIndex}][description]" id="description_${workExperienceIndex}" rows="4" class="mt-1 p-2 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md"></textarea>
                </div>
            </div>`;
            document.getElementById('work-experience-section').insertAdjacentHTML('beforeend', template);
            workExperienceIndex++;
        });
    </script>
@endsection
