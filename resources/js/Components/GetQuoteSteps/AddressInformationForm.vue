<script setup>
import {defineEmits, defineModel, defineProps} from 'vue';

const submission = defineModel();

const { errors } = defineProps({ errors: Object });

const emit = defineEmits(['clickNextStep', 'clickPreviousStep']);

const states = ['AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY'];

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
            <h2 class="text-2xl font-semibold leading-7 text-gray-800">Address Information</h2>
            <p class="text-sm text-gray-400 mt-2 leading-6">
                We can help with that! What is your address?
            </p>

            <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                <div class="col-span-3">
                    <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street Address</label>
                    <div class="mt-2">
                        <input v-model="submission.street_address" type="text" name="street-address" id="street-address" autocomplete="given-address" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Street Address" />
                        <div v-if="errors['submission.street_address']" class="text-red-500 leading-6 text-xs">{{ errors['submission.street_address'] }}</div>
                    </div>
                </div>

                <div class="col-span-3">
                    <label for="apt" class="block text-sm font-medium leading-6 text-gray-900">Ste/Apt</label>
                    <div class="mt-2">
                        <input v-model="submission.apt" type="text" name="apt" id="apt" autocomplete="apt" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  placeholder="-" />
                        <div v-if="errors['submission.apt']" class="text-red-500 leading-6 text-xs">{{ errors['submission.apt'] }}</div>
                    </div>
                </div>

                <div class="col-span-3 md:col-span-full">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City *</label>
                    <div class="mt-2">
                        <input v-model="submission.city" type="text" name="city" id="city" autocomplete="city" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Forney" />
                        <div v-if="errors['submission.city']" class="text-red-500 leading-6 text-xs">{{ errors['submission.city'] }}</div>
                    </div>
                </div>

                <div class="col-span-3 md:col-span-full">
                    <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State *</label>
                    <div class="mt-2">
                        <select v-model="submission.state" id="state" name="state" autocomplete="state" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option v-for="state in states" :key="state" :value="state">{{ state }}</option>
                        </select>
                        <div v-if="errors['submission.state']" class="text-red-500 leading-6 text-xs">{{ errors['submission.state'] }}</div>
                    </div>
                </div>

                <div class="col-span-3 md:col-span-full">
                    <label for="zip-code" class="block text-sm font-medium leading-6 text-gray-900">Zip Code *</label>
                    <div class="mt-2">
                        <input v-model="submission.zip_code" type="text" name="zip-code" id="zip-code" autocomplete="zip-code" class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="75126" />
                        <div v-if="errors['submission.zip_code']" class="text-red-500 leading-6 text-xs">{{ errors['submission.zip_code'] }}</div>
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
