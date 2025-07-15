<script setup>
import BaseLayout from '@/Layouts/BaseLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Welcome" />

    <BaseLayout>
        <section id="top_section" class="min-h-screen flex items-center justify-center bg-gray-100">
            <h1 class="text-4xl font-bold">Welcome to Pawtastic</h1>
        </section>

        <section id="about_us_section" class="min-h-screen bg-pink-100 flex items-center justify-center">
            <h2 class="text-2xl">About Us Section</h2>
        </section>

        <section id="appointment_form_section" class="min-h-screen bg-blue-100 flex items-center justify-center">
            <h2 class="text-2xl">Appointment Form Section</h2>
        </section>
    </BaseLayout>
</template>
