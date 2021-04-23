<template>
    <div>
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <ValidationProvider :name="name" :rules="validations">
                    <div slot-scope="{ errors }" class="mb-4">
                        <label for="pay" class="block text-sm text-gray-700 font-bold mb-2" v-html="name"></label>
                        <input :name="name" v-model="element" :type="type"
                               class="w-24 min-w-full px-5 py-3 placeholder-gray-500 focus:ring-indigo-500 border focus:border-indigo-500 sm:max-w-xs border-gray-300 rounded-md"
                               :placeholder="placeholder">
                        <span class="text-xs text-red-500">{{ errors[0] ? errors[0] : error }}</span>
                    </div>
                </ValidationProvider>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="unit" class="block text-sm text-gray-700 font-bold mb-2">
                    Einheit
                </label>
                <div class="mt-1">
                    <select name="unit" autocomplete="unit"
                            class="bg-white w-24 min-w-full px-5 py-3 mb-4 placeholder-gray-500 focus:ring-indigo-500 border focus:border-indigo-500 sm:max-w-xs border-gray-300 rounded-md">
                        <option>cm</option>
                        <option>m</option>
                        <option>m2</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {ValidationProvider} from 'vee-validate';

export default {

    props: ['type', 'disabled', 'name', 'placeholder', 'validations', 'error'],

    components: {
        ValidationProvider
    },

    data: function () {
        return {
            element: null
        }
    }
}
</script>
