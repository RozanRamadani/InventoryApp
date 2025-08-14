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
    qty: '',
    note: '',
    description: '',
});

const submitForm = () => {
    form.patch(`/items/${props.item.id}/update-stock`);
};
</script>
<template>

    <Head title="Create Items" />

    <authenticated-layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Stock Items : {{ props.item.name }} ( {{ props.item.qty }} {{ props.item.unit }} )
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submitForm">
                            <div class="mb-4">
                                <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" id="qty" v-model="form.qty"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required>
                                    <div class="bg-red-100 border border-red-400 text-black p-2 mt-2 rounded" v-if="form.errors.qty">{{ form.errors.qty }}</div>
                            </div>
                            <div class="mb-4">
                                <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                                <input type="radio" id="note" v-model="form.note" class="mr-1" value="in"> In
                                <input type="radio" id="note" v-model="form.note" class="mr-1" value="out"> Out
                                <div class="bg-red-100 border border-red-400 text-black p-2 mt-2 rounded" v-if="form.errors.note">{{ form.errors.note }}</div>
                            </div>
                            <div class="mb-4">
                                <textarea name="description" id="description" v-model="form.description"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    rows="4" placeholder="Description">
                                </textarea>
                            </div>
                            <PrimaryButton type="submit">Edit Stock</PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>