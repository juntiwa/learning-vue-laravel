<template>
    <div class="mx-3">
        <input v-model="user.sap_id"
               class="border border-slate-300 rounded py-2">
        <button @click="search"
                class="bg-amber-400 px-3 py-2  m-3 rounded">
            check
        </button>
        <div class="leading-loose">
            <p>full_name: {{ user.full_name }}</p>
            <p :class="{
                'text-green-600': user.status === true,
                'text-red-500': user.status && user.status !== true, //not check user.status
            }">status: {{ user.status }}</p>
            <p :class="{
                'text-green-600': user.division === 'ภ.อายุรศาสตร์',
                'text-red-500': user.division && user.division !== 'ภ.อายุรศาสตร์'
            }">division: {{ user.division }}</p>
            <div v-show="user.status === true && user.division === 'ภ.อายุรศาสตร์'">
                <label>
                    <input
                        type="radio"
                        :checked="user.role === 'admin'"
                        name="role"
                        v-model="user.role"
                        value="admin">
                    admin
                </label>
                <label>
                    <input type="radio"
                           :checked="user.role === 'user'"
                           name="role"
                           v-model="user.role"
                           value="user">
                    user
                </label>
                <div>
                    <button @click="add"
                            :disabled="!user.role"
                            class="bg-teal-400 px-3 py-2 mt-3 rounded disabled:bg-slate-300">add user</button>
                </div>
            </div>
        </div>

        <div v-show="users.length" class="my-3">
            {{ users.length }} users added
        </div>
        <div v-for="user in users" class="border-b-2 mb-2">
            <p class="mb-2">
                login : {{ user.login }} ,
                sap_id : {{ user.sap_id }} ,
                full_name : {{ user.full_name }} ,
                role : {{ user.role }}
            </p>
        </div>

        <button @click="save"
                v-show="users.length"
                class="bg-sky-400 px-3 py-2 mt-3 rounded">
            save
        </button>
    </div>
</template>

<script setup>
import {reactive, ref} from "vue";

// const sapId = ref(null);
const user = reactive({
    sap_id: null,
    full_name: null,
    status: null,
    division: null,
    role: null,
});

const users = ref([]);

const store = []

const search = () => {
    console.log(window.route('check-user'))
    window.axios
        .post(window.route('check-user'), {id: user.sap_id})
        .then((response) => {
            user.login = response.data.login;
            user.full_name = response.data.full_name;
            user.status = response.data.active;
            user.division = response.data.division_name;
            console.log(response.data)
        });
};

const add = () => {
    store.push({...user})
    users.value.push({...user}),
    user.sap_id = null,
    user.full_name = null,
    user.status = null,
    user.division = null,
    user.role = null
    console.log(store)

};

const save = () => {
   store.forEach(item =>
   axios.post(window.route('save-user'),item)
       .then(res => console.log(res.data))
   )
}
</script>
