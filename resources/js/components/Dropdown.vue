<template>
      <div class="p-1 backdrop-blur-sm bg-white/95 dark:bg-neutral-800/95  rounded shadow-lg dark:shadow-neutral-950  border-white border-opacity-0 flex-col inline-flex w-64 "
           :class="styleWidth[width] || 'w-64'" > 
        <slot name="content" />
      </div>
</template>

<script lang="ts">
export default {
  name:'Dropdown',
  props:{
    width:{
      type:String,
      default:'md'
    },
    leftAlignment:{
      type:Boolean,
      default:true
    }
  },
  setup() {
    const styleWidth:any = {
      'xs': 'w-40',
      'sm': 'w-48',
      'md': 'w-64',
      'lg': 'w-80',
      'xl': 'w-96',
    }

    return { styleWidth }
  }
}
</script>