<template>
    <div v-for="user in users" class="border-b-2 mb-2">
        <input type="text" v-model="user.id">
        <input type="text" v-model="user.login">
    </div>
    <button @click="add">add</button>
</template>

<script setup>

import {ref} from "vue";

const users = ref([
    {id: 1001, login: 'name1.las'},
    {id: 1002, login: 'name2.las'},
]);

const add = () => {
    users.value.push({id: '100x', login: 'namex.las'})
};

</script>
