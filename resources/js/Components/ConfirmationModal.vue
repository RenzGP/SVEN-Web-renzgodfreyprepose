<template>
  <div v-if="show" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md text-center">
      <h3 class="text-lg font-bold mb-4">Confirm Booking</h3>
      <p class="mb-6">Are you sure you want to book this appointment?</p>
      <div class="flex justify-center gap-4">
        <button @click="$emit('confirm')" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
          Yes, Confirm
        </button>
        <button @click="$emit('cancel')" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
          Cancel
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  show: Boolean
})

defineEmits(['confirm', 'cancel'])
</script>
