<template>
  <div class=" w-full h-full bg-neutral-400 dark:bg-neutral-900 py-8">
    <form @submit.prevent="submit()">
      <div class="max-w-md mx-auto">
        <div class="flex flex-col bg-white p-6 dark:bg-white/10 space-y-4 rounded-t-md">
          <Header :label="title" />

          <div v-for="(relationship) in relationships">
            <FormSelect v-if="relationship.type === 'select'" :id="relationship.id" :label="relationship.name" :resource="relationship.resource"
            v-model="form.data[relationship.id]" :error-message="errors[relationship.id]" />
          </div>
          
          <div v-for="(attribute) in attributes">

            <FormInput v-if="attribute.type === 'input'" :id="attribute.id" :label="attribute.name" :type="attribute.inputType" 
            v-model="form.data[attribute.id]" :error-message="errors[attribute.id]" />

            <FormSelect v-if="attribute.type === 'select'" :id="attribute.id" :label="attribute.name" :resource="attribute.resource"
            v-model="form.data[attribute.id]" :error-message="errors[attribute.id]" />
          </div>

        </div>
        <div class="flex flex-col bg-neutral-100 dark:bg-neutral-800  p-6 rounded-b-md">
          <div class="inline-flex items-center justify-between">
            <FormButton @click="redirectTo(type)" :default-button="true" :label="'Cancelar'" />
            <FormButton :default-button="false" :label="formAction=== 'create'? 'Registrar':'Actualizar'" />
          </div>
        </div>
      </div>
    </form>
</div>
</template>

<script lang="ts">
import {ref, onMounted } from 'vue'
import route from 'ziggy-js';
import { useRouter } from 'vue-router';
import submitForm from '@/functions/submitForm';
import getSingleRecord from '@/functions/getSingleRecord';
import FormButton from '@/components/FormButton.vue';
import Header from '@/components/Header.vue';
import FormInput from '@/components/FormInput.vue';
import FormSelect from '@/components/FormSelect.vue';

export default {
  name:'DataForm',
  props:{
    title: {
      type: String,
      default: 'Title'
    },
    type: {
      type: String,
      default: 'companies'
    },
    formAction:{
      type:String,
      default:'create'
    },
    attributes:{
      type:Object
    },
    relationships:{
      type:Object
    }
  },
  components:{
    Header,
    FormInput,
    FormSelect,
    FormButton
  },
  setup(props) {
    type resource = {
      resource:string;
      action:string;
      data:{[key: string] : string}
    }

    const vueRouter = useRouter()


    
    const form = ref<resource>({
      resource:props.type,
      action:props.formAction,
      data:{}
    });

    const errors:any = ref({});

    onMounted(async() => {
      if (props.formAction === 'edit') {
        const singleRecord = await getSingleRecord(route(props.type + '.show', vueRouter.currentRoute.value.params.id))
        form.value.data = singleRecord.data.attributes
        form.value.data.relationships = singleRecord.data.relationships
      }
    });

    const redirectTo = (path:string) => {
      vueRouter.push({ name: path });
    }

    const submit =  async() => {
       errors.value = await submitForm(form.value)
    }

    return{ submit, form, errors, redirectTo}
  }
}
</script>