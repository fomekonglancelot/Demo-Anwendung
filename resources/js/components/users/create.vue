<template>
    <div class="bg-white shadow-md  rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <form @submit.prevent="senData" class="mt-8" method="POST">
            <label for="email" class="block text-sm text-gray-700 font-bold mb-2">Email Adresse</label>
            <my-input
                type="text"
                name="email"
                placeholder="Email Adresse eingeben"
                v-model="form.email"
                required="true"
                disabled="false">
            </my-input>

            <label for="password" class="block text-sm text-gray-700 font-bold mb-2">Password</label>
            <my-input
                type="password"
                name="password"
                placeholder="Password eingeben"
                v-model="form.password"
                required="true"
                disabled="false">
            </my-input>
            <input-height
                type="number"
                name="height"
                placeholder="Größe eingeben"
                v-model="form.height"
                required="true"
                disabled="false">
            </input-height>

            <input-pay
                type="number"
                name="pay"
                placeholder="Gehalt eingeben"
                v-model="form.pay"
                required="true"
                disabled="false">
            </input-pay>

            <div class="mt-8 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                <button type="submit" class="px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    create
                </button>
            </div>
        </form>

    </div>
</template>

<script>
import myInput from '../inputComponent.vue';
import inputHeight from '../inputHeightComponent.vue';
import inputPay from '../inputPayComponent.vue';
export default {
    components: {
        myInput,
        inputHeight,
        inputPay
    },
    data: function () {
        return {
            form: {
                email: '',
                password: '',
                height: '',
                pay: '',
                unit: '',
                currency: ''
            }
        }
    },

    methods: {
        senData: function () {
            alert('je suis la');
        }
    }
}
</script>
