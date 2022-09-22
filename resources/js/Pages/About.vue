<template>
    <h1>About</h1>
    <InertiaLink href="/">home</InertiaLink>
    <a href="/">a-home</a>

    <br>
    <button @click="click">click</button>
</template>

<script setup>
import { InertiaLink } from "@inertiajs/inertia-vue3";
import axios from "axios";
const click = () => {
   axios.post('https://si-eservice3.si.mahidol.ac.th/selfservice/API/checkSamAcc',
   {
      employeeID :"10041336"
   })
}
</script>
