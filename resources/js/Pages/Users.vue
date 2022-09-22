<template>
    <input v-model="user.sap_id">
    <button @click="search">check</button>
    <div>
        <p>login: {{ user.login }}</p>
        <p>status: {{ user.status }}</p>
        <div v-show="user.status === 'Active'">
            <label><input type="radio" :checked="user.role === 'admin'" name="role" v-model="user.role" value="admin"> admin</label>
            <label><input type="radio" :checked="user.role === 'user'" name="role" v-model="user.role" value="user"> user</label>
            <button @click="users.push(user)">add user</button>
        </div>
    </div>

    <div>
        {{ users }}
    </div>

</template>

<script setup>
import {reactive, ref} from "vue";

// const sapId = ref(null);
const user = reactive({
    sap_id: null,
    login: null,
    status: null,
    role: null,
});
const users = ref([]);

const search = () => {
  window.axios
    .post(window.route('check-user'), {id: user.sap_id})
    .then((response) => {
        user.login = response.data.AccountName;
        user.status = response.data.Status;
        console.log(response.data);
    });
};
</script>
