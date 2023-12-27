<template>
  <button class="w-full text-sm text-left dark:text-neutral-200 hover:bg-neutral-100 hover:dark:bg-neutral-700 p-1 rounded">
  <router-link :to="{name:routeName}" class="flex items-end justify-start w-full">
      {{ label }}
    </router-link>
  </button>
</template>

<script lang="ts">
export default {
  name: 'DropdownLink',
  props:{
    label:{
      type:String,
      default: 'New Label'
    },
    routeName:{
      type:String,
      default:'home'
    }
  }
}
</script>