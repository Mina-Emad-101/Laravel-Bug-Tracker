<x-layout>
    <x-header>Report Bug</x-header>
    <x-main>
        <form class="space-y-12 mx-5" enctype="multipart/form-data" action='/bugs' method='POST'>

            @if ($errors->any())
                <div>
                    <ul class="w-1/2 space-y-5">
                        @foreach ($errors->all() as $error)
                            <li class="p-8 border-2 border-red-500 text-red-500 bg-red-200 rounded-lg">
                                {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <div class="border-b border-gray-900/10 pb-12 space-y-8">

                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Bug</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Please fill all Bug information</p>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="project" class="block text-sm font-medium leading-6 text-gray-900">Project</label>
                        <div class="mt-2">
                            <select id="project" name="project" autocomplete="project-name"
                                class="block w-full rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                required>
                                <option value="" selected disabled hidden>-- Select a Project --</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Bug
                            Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                required></textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences explaining the Bug</p>
                    </div>

                    <div class="col-span-full">
                        <label for="screenshot" class="block text-sm font-medium leading-6 text-gray-900">Bug
                            Screenshot</label>
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="screenshot"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="screenshot" name="screenshot" type="file" class="sr-only"
                                            accept="image/*" required>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG or JPG</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @csrf

            <input type="hidden" name="reporter" value="4">

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>

        </form>
    </x-main>
</x-layout>
