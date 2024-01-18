<template>
<div>
  <label :for="id" class="w-full inline-flex items-center dark:text-neutral-200">{{ label }}</label>
  <input :id="id" class="w-full border dark:text-neutral-200 hover:bg-gray-50 dark:bg-neutral-700 dark:border-neutral-600 hover:dark:bg-white/10 focus:bg-white/10   rounded-md py-1 px-2 border-b-2 focus:border-b-primary focus:bg-white focus:outline-none"
   :type="type" :required="isrequired" :value="modelValue"
      @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)">
      <div class="h-3">
        <div v-show="errorMessage">
          <p v-for="error in errorMessage" class="text-xs font-semibold text-red-500">
            {{ error }}
          </p>
        </div>
    </div>
</div>
</template>

<script lang="ts">
export default {
  name:'FormInput',
  props: {
    id: {
      type: String,
      default: 'id'
    },
    label: {
      type: String,
      default: 'Label'
    },
    type: {
      type: String,
      default: 'text'
    },
    isrequired: {
      type: Boolean,
      default:false
    },
    errorMessage: {
      type: Array,
      default:[]
    },
    modelValue: {
      type: String,
      default: ''
    },
  }
}
</script>