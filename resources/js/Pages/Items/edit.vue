<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    item: {
        type: Object,
        required: true
    }
})

const form = useForm({
    name: props.item.name,
    unit: props.item.unit,
});

const submitForm = () => {
    form.patch(`/items/${props.item.id}`);
};
</script>
<template>

    <Head title="Create Items" />

    <authenticated-layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Items
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
                                    <div class="bg-red-100 border border-red-400 text-black p-2 mt-2 rounded" v-if="form.errors.name">{{ form.errors.name }}</div>
                            </div>
                            <div class="mb-4">
                                <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
                                <input type="text" id="unit" v-model="form.unit"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required>
                                <div class="bg-red-100 border border-red-400 text-black p-2 mt-2 rounded" v-if="form.errors.unit">{{ form.errors.unit }}</div>
                            </div>
                            <PrimaryButton type="submit">Edit Item</PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>