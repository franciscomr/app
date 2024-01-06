<template>
  <span class="flex items-center justify-center">
    <Icon :type="iconName" :weight=200 
    :size="styleSize[iconSize] || '1.875rem'"  :fill="iconFill === true ? 1 : 0"
    
    />
  </span>
  </template>
  
  <script lang="ts">
  import { Icon } from "vue3-google-icon"
  export default {
    name:'Icons',
    props:{
      iconName:{
        type:String,
        default:'settings'
      },
      iconSize:{
        type:String,
        default:'md'
      },
      iconFill:{
        type:Boolean,
        default:false
      }
    },
    components:{
      Icon
    },
    setup() {
    const styleSize:any = {
      '2xs': '1rem',
      'xs': '1.25rem',
      'sm': '1.5rem',
      'md': '1.875rem',
      'lg': '2.25rem',
      'xl': '3rem',
      '2xl':'3.75rem',
      '3xl':'4.5rem',
      '4xl':'6rem',
      '5xl':'8rem',
    }

    return { styleSize }
  }
  }
  </script>