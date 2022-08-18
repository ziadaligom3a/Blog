<x-dropdown>
    <x-slot name="trigger">
        <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
    </x-slot>

    <x-dropdown-item href="/admin/dashboard">Dashboard</x-dropdown-item>
    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

    <form id="logout-form" method="POST" action="/logout" class="hidden">
        @csrf
    </form>
</x-dropdown>