<template>
  <div class="inline-flex w-full bg-primary">
    <div class="sm:w-1/3 w-1/2 flex items-center">
      <div class="inline-flex space-x-2">
        <slot name="left" />
      </div>
    </div>

    <div class="w-1/3 hidden sm:flex items-center justify-center ">
      <div class="w-96 h-6 opacity-80 bg-white rounded"></div>
    </div>

    <div class="sm:w-1/3 w-1/2 flex items-center justify-end">
      <div class="inline-flex space-x-2">
        <slot name="right" />
      </div>
    </div>
  </div>

</template>

<script lang="ts">
export default {
  name:'NavBar',
}
</script>