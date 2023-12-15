<template>
  <span class="w-full text-sm dark:text-neutral-200 hover:bg-neutral-100 hover:dark:bg-neutral-700 p-1 rounded">{{ label }}</span>
</template>

<script lang="ts">
export default {
  name: 'DropdownLink',
  props:{
    label:{
      type:String,
      default: 'New Label'
    }
  }
}
</script>