<script setup>
import { ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import ConfirmationModal from '@/Components/ConfirmationModal.vue'
import AlertModal from '@/Components/AlertModal.vue'

const page = usePage()

// reactive form fields
const form = ref({
  full_name: '',
  pet_name: '',
  email: '',
  phone: '',
  appointment_date: '',
  notes: ''
})

// modal and nav states
const show_confirmation = ref(false)
const show_alert = ref(false)
const alert_title = ref('')
const alert_message = ref('')
const is_mobile_nav_open = ref(false)

// scroll to section by id
const scroll_to_section = (section_id) => {
  const el = document.getElementById(section_id)
  if (el) el.scrollIntoView({ behavior: 'smooth' })
  is_mobile_nav_open.value = false // close nav on scroll
}

// today's date for min value
const min_date = new Date().toISOString().split('T')[0]

// confirm and submit form
const confirm_submission = () => {
  router.post('/appointments', form.value, {
    preserveScroll: true,
    onSuccess: () => {
      alert_title.value = 'Success'
      alert_message.value = 'Appointment successfully booked.'
      show_alert.value = true
      show_confirmation.value = false
      Object.keys(form.value).forEach(key => form.value[key] = '')
    },
    onError: () => {
      alert_title.value = 'Form Error'
      alert_message.value = 'Please fix the errors in the form.'
      show_alert.value = true
      show_confirmation.value = false
    }
  })
}

// phone number limit
const on_phone_input = (event) => {
  const raw = event.target.value.replace(/\D/g, '')
  form.value.phone = raw.slice(0, 11)
}
</script>

<template>
  <div class="font-sans text-gray-900 bg-white">
    <!-- navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow">
      <div class="container mx-auto flex items-center justify-between px-4 py-3">
        <a href="#" @click.prevent="scroll_to_section('top_section')" class="text-xl font-bold text-red-500">
          Pawtastic
        </a>

        <!-- hamburger button -->
        <button
          @click="is_mobile_nav_open = !is_mobile_nav_open"
          class="sm:hidden text-gray-700 focus:outline-none"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <!-- desktop nav -->
        <nav class="hidden sm:flex space-x-6">
          <button @click="scroll_to_section('about_us_section')" class="text-gray-700 hover:text-red-500">
            About Us
          </button>
          <button @click="scroll_to_section('appointment_form_section')" class="text-gray-700 hover:text-red-500">
            Schedule a Visit
          </button>
        </nav>
      </div>

      <!-- mobile nav -->
      <div v-if="is_mobile_nav_open" class="sm:hidden px-4 pb-4 space-y-2 bg-white border-t">
        <button @click="scroll_to_section('about_us_section')" class="block w-full text-left text-gray-700 hover:text-red-500">
          About Us
        </button>
        <button @click="scroll_to_section('appointment_form_section')" class="block w-full text-left text-gray-700 hover:text-red-500">
          Schedule a Visit
        </button>
      </div>
    </header>

    <!-- main content -->
    <main class="pt-20">
      <div id="top_section"></div>

      <!-- hero -->
      <section id="hero_section" class="min-h-screen bg-red-100 flex items-center justify-center relative overflow-hidden">
        <img src="/images/image.jpg" alt="Cute pet grooming"
          class="absolute inset-0 w-full h-full object-cover opacity-30" />
        <div class="relative text-center z-10 px-4">
          <h1 class="text-4xl sm:text-5xl font-bold mb-4 text-gray-900 drop-shadow">Welcome to Pawtastic!</h1>
          <p class="text-lg sm:text-xl mb-6 text-gray-800 drop-shadow">Your pet's happiness is our passion.</p>
          <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
            <button
              @click="scroll_to_section('about_us_section')"
              class="bg-white text-red-500 border border-red-500 px-6 py-2 rounded hover:bg-red-100"
            >
              About Us
            </button>
            <button
              @click="scroll_to_section('appointment_form_section')"
              class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600"
            >
              Schedule a Visit
            </button>
          </div>
        </div>
      </section>

      <!-- about us -->
      <section id="about_us_section" class="min-h-screen bg-gray-100 px-6 py-16 scroll-mt-12">
        <div class="max-w-5xl mx-auto">
          <h2 class="text-3xl sm:text-4xl font-bold text-center mb-6">About Us</h2>
          <p class="text-center text-gray-700 text-lg max-w-3xl mx-auto mb-12">
            At Pawtastic, we treat pets like family. With experienced groomers, friendly staff,
            and a safe environment, we make sure your pet receives the best care possible.
          </p>

          <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded shadow text-center">
              <div class="text-red-500 text-4xl mb-4">🐶</div>
              <h3 class="text-xl font-semibold mb-2">Gentle Grooming</h3>
              <p class="text-gray-600 text-sm">
                Professional grooming tailored to your pet's comfort and style.
              </p>
            </div>
            <div class="bg-white p-6 rounded shadow text-center">
              <div class="text-red-500 text-4xl mb-4">🩺</div>
              <h3 class="text-xl font-semibold mb-2">Trusted Care</h3>
              <p class="text-gray-600 text-sm">
                We prioritize your pet’s well-being and build trust with every visit.
              </p>
            </div>
            <div class="bg-white p-6 rounded shadow text-center">
              <div class="text-red-500 text-4xl mb-4">📞</div>
              <h3 class="text-xl font-semibold mb-2">Friendly Support</h3>
              <p class="text-gray-600 text-sm">
                Our team is always ready to answer your questions and accommodate your needs.
              </p>
            </div>
          </div>

          <div class="text-center mt-10">
            <button
              @click="scroll_to_section('appointment_form_section')"
              class="mt-6 bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600"
            >
              Schedule a Visit
            </button>
          </div>
        </div>
      </section>

      <!-- appointment form -->
      <section id="appointment_form_section" class="min-h-screen bg-white p-10 scroll-mt-12">
        <h2 class="text-3xl font-bold mb-6 text-center">Book an Appointment</h2>
        <form @submit.prevent="show_confirmation = true" class="max-w-2xl mx-auto space-y-6">
          <div>
            <label class="block text-gray-700 font-medium mb-1">Full Name</label>
            <input v-model="form.full_name" type="text" class="w-full border rounded px-4 py-2"
              :class="{ 'border-red-500': page.props.errors.full_name }" required />
            <p v-if="page.props.errors.full_name" class="text-red-500 text-sm mt-1">
              {{ page.props.errors.full_name }}
            </p>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">Pet Name</label>
            <input v-model="form.pet_name" type="text" class="w-full border rounded px-4 py-2"
              :class="{ 'border-red-500': page.props.errors.pet_name }" required />
            <p v-if="page.props.errors.pet_name" class="text-red-500 text-sm mt-1">
              {{ page.props.errors.pet_name }}
            </p>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">Email</label>
            <input v-model="form.email" type="email" class="w-full border rounded px-4 py-2"
              :class="{ 'border-red-500': page.props.errors.email }" required />
            <p v-if="page.props.errors.email" class="text-red-500 text-sm mt-1">
              {{ page.props.errors.email }}
            </p>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">Phone</label>
            <input v-model="form.phone" type="tel" maxlength="11" inputmode="numeric" pattern="[0-9]*"
              @input="on_phone_input" class="w-full border rounded px-4 py-2"
              :class="{ 'border-red-500': page.props.errors.phone }" required />
            <p v-if="page.props.errors.phone" class="text-red-500 text-sm mt-1">
              {{ page.props.errors.phone }}
            </p>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">Appointment Date</label>
            <input v-model="form.appointment_date" type="date" :min="min_date" class="w-full border rounded px-4 py-2"
              :class="{ 'border-red-500': page.props.errors.appointment_date }" required />
            <p v-if="page.props.errors.appointment_date" class="text-red-500 text-sm mt-1">
              {{ page.props.errors.appointment_date }}
            </p>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">Notes (Optional)</label>
            <textarea v-model="form.notes" class="w-full border rounded px-4 py-2"></textarea>
          </div>

          <div class="text-center">
            <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">
              Book Appointment
            </button>
          </div>
        </form>
      </section>
    </main>

    <!-- confirmation modal -->
    <ConfirmationModal
      :show="show_confirmation"
      @confirm="confirm_submission"
      @cancel="show_confirmation = false"
    />

    <!-- alert modal -->
    <AlertModal
      :show="show_alert"
      :title="alert_title"
      :message="alert_message"
      @close="show_alert = false"
    />

    <!-- footer -->
    <footer class="bg-gray-100 text-center py-6 mt-20">
      <p class="text-sm text-gray-600">&copy; 2025 Pawtastic. all rights reserved.</p>
    </footer>
  </div>
</template>

<style scoped>
html,
body {
  scroll-behavior: smooth;
}
</style>
