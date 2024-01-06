<template>
<span class="text-2xl font-semibold text-primary dark:text-neutral-100 flex flex-col">{{ label }}</span>
</template>

<script lang="ts">
export default {
  name:'Header',
  props:{
    label:{
      type: String,
      default: 'New Label'
    }
  }
}
</script>