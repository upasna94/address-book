<template>
    <div class="p-10">
        <h1 class="text-3xl">Create New Contacts</h1>
        <form class="max-w-md mx-auto mt-8" @submit.prevent="submit">
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Name
                </label>
                <input v-model="form.name" class="border border-gray-400 p-2 w-full" type="text" placeholder="name" id="name">
                <div class="text-sm text-red-600" v-if="errors.name">{{ errors.name }}</div>
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                    Email
                </label>
                <input v-model="form.email" class="border border-gray-400 p-2 w-full" type="email" placeholder="email" id="email">
                <div class="text-sm text-red-600" v-if="errors.email">{{ errors.email }}</div>

            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="phone">
                    Phone
                </label>
                <input v-model="form.phone" class="border border-gray-400 p-2 w-full" type="text" placeholder="phone" id="phone">
                <div class="text-sm text-red-600" v-if="errors.phone">{{ errors.phone }}</div>

            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="address">
                    Address
                </label>
                <textarea v-model="form.address" class="border border-gray-400 p-2 w-full" type="text" placeholder="address" id="address" />
                <div class="text-sm text-red-600" v-if="errors.address">{{ errors.address }}</div>

            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="dateOfBirth">
                    Date Of Birth
                </label>
                <input v-model="form.dateOfBirth" class="border border-gray-400 p-2 w-full" type="date" placeholder="dateOfBirth" id="dateOfBirth" >
                <div class="text-sm text-red-600" v-if="errors.dateOfBirth">{{ errors.dateOfBirth }}</div>

            </div>
            <div class="mb-6">
                <button type="button" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" @click="submit">
                    Submit
                </button>
            </div>
            <!-- <a href="settings">Back</a> -->
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

defineProps({
    errors:Object
});

let form = useForm({
    name: '',
    email: '',
    phone: '',
    dateOfBirth:'',
    address: ''
});

const submit = () => {
    router.post('/contacts',form);
}
</script>
