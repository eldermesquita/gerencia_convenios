<template>
    <div>
        <InputLabel v-if="label" :required="required" :large-label="largeLabel" :normal-weight="normalWeight">
            {{ label }}
        </InputLabel>

        <div class="mt-4 space-y-4">
            <div v-for="(option, index) in options" :key="index" class="relative flex items-start">
                <div class="flex items-center h-5">
                    <input
                        :id="`${id}-${option.value}`"
                        ref="input"
                        v-model="localValue"
                        :value="option.value"
                        type="checkbox"
                        v-bind="$attrs"
                        class="h-4 w-4 | rounded | text-blue-600 border-gray-300 | focus:ring-blue-400"
                        :class="inputClass"
                        @change="handleCheck"
                    />
                </div>
                <div class="ml-3 text-sm">
                    <label
                        :for="`${id}-${option.value}`"
                        class="font-normal font-source-sans text-gray-900"
                        v-text="option.label"
                    />
                </div>
            </div>

            <InvalidFeedback v-if="error" :error="error" class="mt-2" />

            <HelpText :text="text" class="mt-2" />
        </div>
    </div>
</template>

<script>
import InputLabel from '@/components/form/shared/InputLabel';
import InvalidFeedback from '@/components/form/shared/InvalidFeedback';
import HelpText from '@/components/form/shared/HelpText';

export default {
    components: {
        InputLabel,
        InvalidFeedback,
        HelpText,
    },
    inheritAttrs: false,
    props: {
        id: {
            type: String,

            /**
             * Set a default id for the check input.
             *
             * @returns {string}
             */
            default() {
                // eslint-disable-next-line
                return `check-inline-input-${this._uid}`;
            },
        },
        value: {
            type: Array,
            default: () => [],
        },
        label: {
            type: String,
            default: null,
        },
        options: {
            type: Array,
            default: () => [],
        },
        error: {
            type: String,
            default: null,
        },
        required: {
            type: Boolean,
            default: false,
        },
        text: {
            type: String,
            default: null,
        },
        largeLabel: {
            type: Boolean,
            default: false,
        },
        normalWeight: {
            type: Boolean,
            default: false,
        },
    },
    /**
     * Holds the data.
     *
     * @returns {object}
     */
    data() {
        return {
            localValue: this.value,
        };
    },
    computed: {
        /**
         * Determines the input class based on the current state.
         *
         * @returns {string}
         */
        inputClass() {
            return {
                'border-red-300 text-red-900 focus:outline-none focus:ring-red-500 focus:border-red-500': this.error,
            };
        },
    },
    watch: {
        /**
         * Handles setting the given value on load.
         *
         * @param {number|string|boolean|Array} newValue
         */
        value(newValue) {
            this.localValue = newValue;
        },
    },
    methods: {
        /**
         * Focuses the input.
         */
        focus() {
            this.$refs.input.focus();
        },

        /**
         * Handle the checking of an option.
         */
        handleCheck() {
            this.$emit('input', this.localValue);
        },
    },
};
</script>
