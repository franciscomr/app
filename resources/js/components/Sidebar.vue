<template>
  <div class="relative z-50">
    <div class="absolute h-full overflow-y-auto">
      <div class="p-1  bg-white dark:bg-neutral-800  rounded shadow  border-white border-opacity-0 flex-col justify-center inline-flex"> 
        <slot name="content" />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
export default {
  name:'SideBar'
}
</script>