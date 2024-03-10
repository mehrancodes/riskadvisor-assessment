<script setup>
import {Head, router, useForm} from '@inertiajs/vue3';
import { ref } from "vue";
import InsuranceProductsForm from "@/Components/GetQuoteSteps/InsuranceProductsForm.vue";
import PersonalInformationForm from "@/Components/GetQuoteSteps/PersonalInformationForm.vue";
import AddressInformationForm from "@/Components/GetQuoteSteps/AddressInformationForm.vue";
import TextInput from "@/Components/TextInput.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const totalSteps = 3;
const step = ref(1);
const formSubmitted = ref(false);
const stepBackgroundImages = {
    1: 'https://images.unsplash.com/photo-1656992470123-58162a9e9da6?q=80&w=800&fit=crop',
    2: 'https://images.unsplash.com/photo-1595785371554-eb445d0df6a9?q=80&w=800&fit=crop',
    3: 'https://images.unsplash.com/photo-1656992470123-58162a9e9da6?q=80&w=800&fit=crop',
};

const form = useForm({
    consumer: {
        first_name: null,
        last_name: null,
        email: null,
        phone_number: null,
        contact_preference: 1,
    },
    submission: {
        insurance_products: [],
        street_address: null,
        apt: null,
        city: null,
        state: 'TX',
        zip_code: null,
    }
})

defineProps({
    products: {
        type: Array,
        required: true,
    }
})

function nextStep() {
    if (step.value === 3) {
        submitForm();
    }

    if (step.value < totalSteps) {
        step.value++;
    }
}

function previousStep() {
    if (step.value > 0) {
        step.value--;
    }
}

function submitForm() {
    form.post(route('get-quote'), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => formSubmitted.value = true,
        onError: (errors) => goToStepOnErrors(errors)
    })
}

function refreshPage() {
    router.get(route('get-quote.show'))
}

function containsErrorFor(obj, key) {
  // Loop through the keys of the object
  for (const key in obj) {
    // Check if the key starts with 'consumer'
    if (key.startsWith(key)) {
      return true; // Found a key that starts with 'consumer'
    }
  }

  return false; // No key with 'consumer' prefix found
}

function goToStepOnErrors(errors) {
  if (errors['submission.insurance_products']) {
    return step.value = 1;
  }

  if (containsErrorFor(errors, 'consumer')) {
    return step.value = 2;
  }

  if (containsErrorFor(errors, 'submission')) {
    return step.value = 3;
  }
}
</script>

<template>
    <Head title="Get Quote" />

    <div class="flex flex-col md:flex-row">

        <!-- Left Side (Image) -->
        <div class="md:flex-1">
            <img
                :src="stepBackgroundImages[step]"
                alt="Left Side Image"
                class="w-full object-cover md:rounded-r-xl"
            >
        </div>

        <!-- Right Side (Form) -->
        <div class="my-auto absolute bg-white p-5 rounded-xl left-3 right-3 top-16 mx-auto md:flex-1 md:static md:rounded-none md:left-0 md:right-0 md:top-0">
            <div class="max-w-sm mx-auto">
                <InsuranceProductsForm
                    v-if="step === 1"
                    :products="products"
                    class="mt-5"
                    :errors="form.errors"
                    v-model="form.submission.insurance_products"
                    @click-next-step="nextStep" />

                <PersonalInformationForm
                    v-if="step === 2"
                    class="mt-5"
                    v-model="form.consumer"
                    :errors="form.errors"
                    @click-previous-step="previousStep"
                    @click-next-step="nextStep" />

                <AddressInformationForm
                    v-if="step === 3"
                    class="mt-5"
                    v-model="form.submission"
                    :errors="form.errors"
                    @click-previous-step="previousStep"
                    @click-next-step="nextStep" />
            </div>
        </div>

        <Modal max-width="lg" :show="formSubmitted" @close="refreshPage">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Thank you for your interest in our insurance products. We would contact with you soon!
                </h2>

                <div class="mt-6 flex justify-end">
                    <PrimaryButton @click="refreshPage"> Ok </PrimaryButton>
                </div>
            </div>
        </Modal>
    </div>
</template>
