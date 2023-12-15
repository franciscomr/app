<template>
<div>
  <label :for="id" class="w-full inline-flex items-center">{{ label }}</label>
  <input :id="id" class="w-full border hover:bg-gray-50  rounded-md py-1 px-2 border-b-2 focus:border-b-primary focus:bg-white focus:outline-none" type="text">
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
  }
}
</script>