<script setup>
// Scroll to section logic using snake_case
const scroll_to_section = (section_id) => {
    const target_element = document.getElementById(section_id);
    if (target_element) {
        target_element.scrollIntoView({ behavior: 'smooth' });
    }
};
</script>

<template>
    <div class="font-sans text-gray-900 bg-white">
        <!-- Navbar -->
        <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow">
            <div class="container mx-auto flex items-center justify-between px-4 py-3">
                <div>
                    <a href="#" @click.prevent="scroll_to_section('top_section')" class="text-xl font-bold text-red-500">
                        Pawtastic
                    </a>
                </div>
                <nav class="space-x-6">
                    <button @click="scroll_to_section('about_us_section')" class="text-gray-700 hover:text-red-500">
                        About Us
                    </button>
                    <button @click="scroll_to_section('appointment_form_section')" class="text-gray-700 hover:text-red-500">
                        Schedule a Visit
                    </button>
                </nav>
            </div>
        </header>

        <!-- Content Slot -->
        <main class="pt-20">
            <slot />
        </main>

        <!-- Footer (optional) -->
        <footer class="bg-gray-100 text-center py-6 mt-20">
            <p class="text-sm text-gray-600">&copy; 2025 Pawtastic. All rights reserved.</p>
        </footer>
    </div>
</template>

<style scoped>
html, body {
    scroll-behavior: smooth;
}
</style>
