<script setup>
defineProps((
    items: {
        type: Array,
    }
))</script>
<template>
    <div>
        <h1>Items</h1>
        <ul>
            <li v-for="item in items" :key="item.id">{{ item.name }}</li>
        </ul>
    </div>
</template>