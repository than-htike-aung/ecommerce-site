<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}} Hi .. {{Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        This is just home page
    </div>
</x-app-layout>
