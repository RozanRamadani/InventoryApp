<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
defineProps({
    items: {
        type: Array,
        required: true
    }
}); 
</script>
<template>
    <Head title="Items" />

    <authenticated-layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Items List
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <PrimaryButton>
                            <a href="/items/create" class="text-white">
                                Add New Item
                            </a>
                        </PrimaryButton>
                        <div v-if="$page.props.flash.success" class="bg-green-100 border border-green-400 text-black px-4 py-3 mt-2 rounded relative" role="alert">
                            {{ $page.props.flash.success }}
                        </div>
                        <table class="table-auto w-full mt-4 bg-white border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr class="text-left">
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Qty</th>
                                    <th class="px-4 py-2">Unit</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr v-for="(item, index) in items" :key="index">
                                    <td class="border px-4 py-2">{{ ++index }}</td>
                                    <td class="border px-4 py-2">{{ item.name }}</td>
                                    <td class="border px-4 py-2">{{ item.qty }}</td>
                                    <td class="border px-4 py-2">{{ item.unit }}</td>
                                    <td class="border px-4 py-2">
                                        <a :href="`/items/${item.id}/edit`" class="text-blue-500 hover:underline">Edit</a> |
                                        <a :href="`/items/${item.id}/edit-stock`" class="text-green-500 hover:underline">Edit Stock</a> |
                                        <a href="" class="text-yellow-500 hover:underline ml-2">Stock Card</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>