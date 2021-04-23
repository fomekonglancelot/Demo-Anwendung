<template>
    <ValidationProvider :name="name" :rules="validations">
        <div slot-scope="{ errors }" class="mb-4">
            <label :for="name" class="block text-sm text-gray-700 font-bold mb-2" v-html="name"></label>
            <input :id="name" v-model="element" :name="name" :type="type"
                   class="w-24 min-w-full px-5 py-3 placeholder-gray-500 focus:ring-indigo-500 border focus:border-indigo-500 sm:max-w-xs border-gray-300 rounded-md"
                   :class="errors[0] ? 'border-red-500': '' " :placeholder="placeholder">
            <span class="text-xs text-red-500">{{ errors[0] ? errors[0] : error }}</span>
        </div>
    </ValidationProvider>
</template>

<script>

import {ValidationProvider} from 'vee-validate';

export default {

    components: {
        ValidationProvider
    },

    props: ['type', 'disabled', 'name', 'placeholder', 'validations', 'error'],

    data: function () {
        return {
            element: null
        }
    }
}
</script>
