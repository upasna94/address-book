<template>
    <div class="p-20 ">
        <h1 class="text-4xl font-bold">Contact List </h1>
        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full float-right	">
                <a href="contacts/create">Add New Contact</a>
            </button>
        </div>
        <br>
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 mt-20" role="alert" v-if="$page.props.flash.message">
                <p class="font-bold" >{{ $page.props.flash.message }}</p>
            </div>
            <br>
        <table>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date Of Birth</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            <tr v-for="contact in contacts" :key="contact.id">
                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    
                                        <div >
                                            <div class="text-sm font-medium text-gray-900">{{contact.id}} </div>
                                            
                                        </div>
                                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    
                                        <div >
                                            <div class="text-sm font-medium text-gray-900">{{contact.name}} </div>
                                            
                                        </div>
                                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    
                                        <div >
                                            <div class="text-sm font-medium text-gray-900">{{contact.email}} </div>
                                            
                                        </div>
                                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    
                                        <div >
                                            <div class="text-sm font-medium text-gray-900">{{contact.phone}} </div>
                                            
                                        </div>
                                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    
                                        <div >
                                            <div class="text-sm font-medium text-gray-900">{{contact.dateOfBirth}} </div>
                                            
                                        </div>
                                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    
                                        <div >
                                            <div class="text-sm font-medium text-gray-900">{{contact.address}} </div>
                                            
                                        </div>
                                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <Link :href="'edit-contact/' + contact.id" class="text-indigo-600 hover:text-indigo-900">Edit</Link> |
                    <Link :href="'delete-contact/' + contact.id" class="text-indigo-600 hover:text-indigo-900">Delete</Link>

                </td>
                                
            </tr>
        </table>
    </div>
</template>
<script setup>
defineProps({
    contacts : Object
})
</script>
