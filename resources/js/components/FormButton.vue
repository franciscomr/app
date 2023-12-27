<template>
  <button class="py-1 rounded-md px-12 shadow-sm
    hover:shadow-md active:opacity-[0.85] active:shadow-none transition-all focus:shadow-none focus:opacity-[0.85]" 
  :class="defaultButton? 'bg-white text-black border hover:bg-neutral-100 dark:bg-neutral-800 dark:text-white dark:border-neutral-700 hover:dark:bg-neutral-700 dark:shadow-neutral-700 dark:hover:shadow-neutral-700/50':
  'text-white border-none bg-primary hover:shadow-primary/40  dark:hover:shadow-primary/50'"
 >
      <div class="tracking-wide">{{ label }}</div>
  </button>

</template>
<script lang="ts">
export default {
  name:'FormButton',
  props: {
    label: {
      type: String,
      default: 'New Title'
    },
    defaultButton:{
      type:Boolean,
      default:true
    }
  }
}
</script>