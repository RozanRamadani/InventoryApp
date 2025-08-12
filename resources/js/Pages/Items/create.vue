<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    qty: 0
});

const submitForm = () => {
    form.post('/items');
};
</script>
<template>

    <Head title="Create Items" />

    <authenticated-layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create List Items
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submitForm">
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Item Name</label>
                                <input type="text" id="name" v-model="form.name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" id="qty" v-model="form.qty"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required>
                            </div>
                            <PrimaryButton type="submit">Create Item</PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>