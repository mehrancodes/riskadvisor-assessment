<script setup>
import CheckIcon from "@/Components/Icons/CheckIcon.vue";
import {defineProps, ref} from "vue";

const insuranceProducts = defineModel();

const { products, errors } = defineProps({
  products: {
    type: Array,
    required: true,
  },
  errors: Object
})

const emit = defineEmits(['clickNextStep']);

const showErrorMessage = ref(false);

function syncProduct(productId) {
    isProductSelected(productId)
        ? insuranceProducts.value.splice(insuranceProductIndex(productId), 1)
        : insuranceProducts.value.push(productId);
}

function isProductSelected(productId) {
    return insuranceProductIndex(productId) !== -1;
}

function insuranceProductIndex(productId) {
    return insuranceProducts.value.indexOf(productId);
}

function emitNextStep() {
    if (insuranceProducts.value.length < 1) {
        return showErrorMessage.value = true;
    }

    emit('clickNextStep');
}
</script>

<template>
    <section>
        <form>
            <h1 class="text-2xl font-semibold leading-7 text-gray-800">Let's get started</h1>
            <p class="text-sm text-gray-400 mt-2 leading-6">
                Please select one or more options below that you'd like to have quoted for insurance.
            </p>

            <div class="mt-5" v-for="product in products" :key="product.id">
                <div
                    class="relative rounded-xl mt-4 bg-cover bg-center cursor-pointer border border-blue-200 hover:border-blue-700 hover:shadow-xl"
                    :class="{ 'border border-blue-800': isProductSelected(product.id) }"
                    @click="syncProduct(product.id)"
                    :style="{ 'background-image': `url('${product.image}')` }"
                >
                    <div
                        class="hidden absolute top-0 right-0 p-1 rounded-bl-xl rounded-tr-xl bg-blue-600"
                        :class="{ '!block': isProductSelected(product.id) }"
                    >
                        <CheckIcon class="w-4 h-4 text-white" />
                    </div>
                    <div class="flex p-3 rounded-xl bg-gradient-to-r from-gray-900 from-20% to-transparent">
                        <div class="p-3 rounded-lg bg-gray-100">
                            <div class="h-6 w-6 text-blue-700" v-html="product.icon" />
                        </div>
                        <div class="ml-3 text-white">
                            <h2 class="font-bold">{{ product.title }}</h2>
                            <p class="text-sm">{{ product.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="showErrorMessage" class="mt-4 text-red-500 leading-6 text-xs">You need to choose at least one insurance product.</div>
            <div v-if="errors['submission.insurance_products']" class="mt-4 text-red-500 leading-6 text-xs">{{ errors['submission.insurance_products'] }}</div>
        </form>

        <div class="flex items-center justify-between mt-4">
            <button @click.prevent="emitNextStep" class="bg-blue-600 hover:bg-blue-700 text-sm text-white w-full py-3 px-4 rounded-xl focus:outline-none focus:shadow-outline">
                Agree and Continue
            </button>
        </div>

        <div class="mt-4 text-sm text-gray-500">
            By continuing this from you agree to share data with Franke
            Insurance Services as defined in the Terms of Use and Privacy
            Policy.
        </div>
    </section>
</template>
