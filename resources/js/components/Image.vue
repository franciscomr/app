<template>
<div class="flex items-center justify-center">
  <img :src="`./images/${imageName}`" :class="styleSize[imageSize] || 'h-90 w-auto'" alt="Image">
</div>
</template>

<script lang="ts">
export default {
  name:'Image',
  props:{
    imageName:{
      type:String,
      default:'logo.png'
    },
    imageSize:{
      type:String,
      default:'md'
    }
  },
  setup() {
    const styleSize:any = {
      '2xs':'h-8 w-auto',
      'xs': 'h-10 w-auto',
      'sm': 'h-12 w-auto',
      'md': 'h-16 w-auto',
      'lg': 'h-20 w-auto',
      'xl': 'h-24 w-auto',
      '2xl':'h-32 w-auto',
      '3xl':'h-36 w-auto',
      '4xl':'h-48 w-auto',
      '5xl':'h-64 w-auto',
      '6xl':'h-72 w-auto',
      '7xl':'h-80 w-auto',
      '8xl':'h-96 w-auto',

    }

    return { styleSize }
  }
}
</script>