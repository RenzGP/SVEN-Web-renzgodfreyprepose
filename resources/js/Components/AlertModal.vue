<template>
  <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
    <div class="bg-white rounded-lg p-6 max-w-sm w-full shadow-xl text-center">
      <h2 class="text-lg font-semibold mb-4">{{ title }}</h2>
      <p class="text-gray-700 mb-6">{{ message }}</p>
      <button
        @click="$emit('close')"
        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
      >
        OK
      </button>
    </div>
  </div>
</template>

<script setup>
defineProps({
  show: Boolean,
  title: String,
  message: String
})

defineEmits(['close'])
</script>
