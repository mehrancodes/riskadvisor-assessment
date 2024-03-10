<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, reactive } from "vue";
import { router } from '@inertiajs/vue3';
import InsuranceProductsForm from "@/Components/GetQuoteSteps/InsuranceProductsForm.vue";
import PersonalInformationForm from "@/Components/GetQuoteSteps/PersonalInformationForm.vue";

const totalSteps = 3;
const step = ref(1);
const stepBackgroundImages = {
    1: 'https://images.unsplash.com/photo-1656992470123-58162a9e9da6?q=80&w=800&fit=crop',
    2: 'https://images.unsplash.com/photo-1595785371554-eb445d0df6a9?q=80&w=800&fit=crop',
    3: 'https://images.unsplash.com/photo-1656992470123-58162a9e9da6?q=80&w=800&fit=crop',
};
const form = reactive({
    first_name: null,
    last_name: null,
    email: null,
    insurance_products: [],
})

defineProps({
    products: {
        type: Array,
        required: true,
    }
})

function syncInsuranceProducts(products) {
    form.insurance_products = products;
}

function nextStep() {
    if (step.value < totalSteps) {
        step.value++;
    }
}

function previousStep() {
    if (step.value > 0) {
        step.value--;
    }
}

function submit() {
    router.post('/users', form)
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
                    @sync-products="syncInsuranceProducts"
                    @click-next-step="nextStep" />

                <PersonalInformationForm
                    v-if="step === 2"
                    class="mt-5"
                    @click-previous-step="previousStep"
                    @click-next-step="nextStep" />
            </div>
        </div>
    </div>
</template>
