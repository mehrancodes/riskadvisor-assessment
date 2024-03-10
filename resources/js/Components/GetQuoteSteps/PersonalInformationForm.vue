<script setup>
import { defineProps } from 'vue';

const consumer = defineModel();

const { errors } = defineProps({ errors: Object });

const emit = defineEmits(['clickNextStep', 'clickPreviousStep']);

function emitPreviousStep() {
    emit('clickPreviousStep');
}
function emitNextStep() {
    emit('clickNextStep');
}
</script>

<template>
    <section>
        <form>
            <h2 class="text-2xl font-semibold leading-7 text-gray-800">Personal Information</h2>
            <p class="text-sm text-gray-400 mt-2 leading-6">
                Ok, Great! Before we continue, please let us know how we can contact you regarding your quote.
            </p>

            <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                <div class="col-span-3">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name *</label>
                    <div class="mt-2">
                        <input v-model="consumer.first_name" type="text" name="first-name" id="first-name" autocomplete="first-name" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter First Name" />
                        <div v-if="errors['consumer.first_name']" class="text-red-500 leading-6 text-xs">{{ errors['consumer.first_name'] }}</div>
                    </div>
                </div>

                <div class="col-span-3">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name *</label>
                    <div class="mt-2">
                        <input v-model="consumer.last_name" type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  placeholder="Enter Last Name" />
                        <div v-if="errors['consumer.last_name']" class="text-red-500 leading-6 text-xs">{{ errors['consumer.last_name'] }}</div>
                    </div>
                </div>

                <div class="col-span-3 md:col-span-full">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address *</label>
                    <div class="mt-2">
                        <input v-model="consumer.email" id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Email Address" />
                        <div v-if="errors['consumer.email']" class="text-red-500 leading-6 text-xs">{{ errors['consumer.email'] }}</div>
                    </div>
                </div>

                <div class="col-span-3 md:col-span-full">
                    <label for="phone-number" class="block text-sm font-medium leading-6 text-gray-900">Phone No *</label>
                    <div class="mt-2">
                        <input v-model="consumer.phone_number" type="text" name="phone-number" id="phone-number" autocomplete="phone-number" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Phone No" />
                        <div v-if="errors['consumer.phone_number']" class="text-red-500 leading-6 text-xs">{{ errors['consumer.phone_number'] }}</div>
                    </div>
                </div>

                <div class="col-span-3 md:col-span-full">
                    <label for="contact-preference" class="block text-sm font-medium leading-6 text-gray-900">Contact Preference *</label>
                    <div class="mt-2">
                        <select v-model="consumer.contact_preference" id="contact-preference" name="contact-preference" autocomplete="contact-preference" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1">Email</option>
                            <option value="2">Phone No</option>
                        </select>
                        <div v-if="errors['consumer.contact_preference']" class="text-red-500 leading-6 text-xs">{{ errors['consumer.contact_preference'] }}</div>
                    </div>
                </div>
            </div>
        </form>

        <div class="mt-4">
            <button @click.prevent="emitNextStep" class="bg-blue-600 hover:bg-blue-700 text-sm text-white w-full py-3 px-4 rounded-xl focus:outline-none focus:shadow-outline">
                Continue
            </button>
            <button @click.prevent="emitPreviousStep" class="mt-4 text-center text-sm w-full font-semibold leading-6 text-blue-600">
                back
            </button>
        </div>
    </section>
</template>
