<template>
  <button class="rounded-md text-sm p-1 shadow-sm
    hover:shadow-md active:opacity-[0.85] active:shadow-none transition-all focus:shadow-none focus:opacity-[0.85]text-black border
     bg-white hover:bg-neutral-100 dark:bg-neutral-800 dark:text-white dark:border-neutral-700 hover:dark:bg-neutral-700 dark:shadow-neutral-800 dark:hover:shadow-neutral-800/90"
 >
    <Icons :icon-name="iconName" :icon-size="'sm'" :icon-fill="false" />
  </button>
</template>

<script lang="ts">
import Icons from './Icons.vue';

export default {
  name:'IconButton',
  props:{
    iconName:{
      type:String,
      default:'settings'
    }
  },
  components:{
    Icons
  }
}
</script>