<template>
  <div class=" w-full h-screen bg-neutral-200 dark:bg-neutral-900 py-8">
    <form @submit.prevent="submit()">
      <div class="max-w-md mx-auto">
      <div class="flex flex-col bg-white p-6 dark:bg-white/10 space-y-4 rounded-t-md">
        <Image :image-size="'lg'" />
        <div v-for="(attribute) in attributes">
          <FormInput :id="attribute.id" :label="attribute.name" :type="attribute.inputType" v-model="form.data[attribute.id]" :error-message="errors[attribute.id]" />
        </div>
      </div>

      <div class="flex flex-col bg-neutral-100 dark:bg-neutral-800  p-6 rounded-b-md">
        <div class="inline-flex items-center justify-end">
          <FormButton :default-button="false" :label="'Iniciar Sesión'" />
        </div>
      </div>
    </div>
    </form>
  </div>
</template>

<script lang="ts">
import { ref, onMounted } from 'vue';
import submitForm from '@/functions/submitForm';
import Image from '@/components/Image.vue';
import FormInput from '@/components/FormInput.vue';
import FormButton from '@/components/FormButton.vue';

export default {
  name:'Login',
  props:{
    title:{
      type:String,
      default:'New Title'
    },
    attributes:{
      type:Object
    }
  },
  components :{
    Image,
    FormInput,
    FormButton
  },
  setup() {
    type errors = {[key: string] : string}

    type resource = {
      resource:string;
      action:string;
      data:{[key: string] : string}
    }
    
    const form = ref<resource>({
      resource:'login',
      action:'login',
      data:{}
    });

    const errors:any = ref({});

    const submit =  async() => {
       errors.value = await submitForm(form.value)
    }

    return { form, submit, errors }
  }

}
</script>