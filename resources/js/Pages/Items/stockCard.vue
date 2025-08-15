<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import dayjs, { Dayjs } from 'dayjs';
import PrimaryButton from '@/Components/PrimaryButton.vue';
const props = defineProps({
    item: {
        type: Object,
        required: true
    }
}); 
</script>
<template>
    <Head title="Stock Card" />

    <authenticated-layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Stock Card for {{ props.item.name }} ({{ props.item.qty }} {{ props.item.unit }})
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="table-auto w-full mt-4 bg-white border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr class="text-left">
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Qty</th>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Note</th>
                                    <th class="px-4 py-2">Description</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr v-for="(item, index) in item.stock_cards" :key="index">
                                    <td class="border px-4 py-2">{{ ++index }}</td>
                                    <td class="border px-4 py-2">{{ item.qty }}</td>
                                    <td class="border px-4 py-2">{{ dayjs(item.created_at).format('D-MM-YYYY | HH:mm:ss') }}</td>
                                    <td class="border px-4 py-2">{{ item.note }}</td>
                                    <td class="border px-4 py-2">{{ item.description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>