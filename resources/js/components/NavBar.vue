<template>
    <!-- Alerts -->
    <v-btn position="fixed" size="large" location = "top right" class="mx-4 my-4" icon="mdi-bell"></v-btn>

    <!-- Burger Menu -->
    <v-btn v-if="user_state==true" position="fixed" size="large" location = "bottom right" class="mx-4 my-4" icon="mdi-menu" id="menu-activator"/>

    <!-- Burger Menu Contents -->
    <v-menu v-if="carrier" activator="#menu-activator">

      <v-btn size="large" icon="mdi-truck" class="my-2"/>
      <v-btn size="large" icon="mdi-earth" class="my-2"/>
      <v-btn size="large" icon="mdi-package" class="my-2"/>
      <v-btn size="large" icon="mdi-account" class="my-2"/>
    </v-menu>
    <v-menu v-else-if="client" activator="#menu-activator">
      <v-btn size="large" icon="mdi-truck" class="my-2"/>
      <v-btn size="large" icon="mdi-earth" class="my-2"/>
    </v-menu>

    <!-- Home Navigation -->
    <v-btn position="fixed" size="large" location = "bottom center" class="mx-auto my-4" icon="mdi-plus" @click="home">
    </v-btn>


</template>


<script setup>
import { useRouter, useRoute } from 'vue-router'
import { ref, onMounted } from 'vue'

const router = useRouter()
const route = useRoute()


//Test here to see if anong state si user on:

//1. Set true if online si user
const user_state = ref(true)

//2. Set only ONE true if carrier or client account ang naka-login
const carrier = ref(true)
const client = ref(false)

//Declaration of v-btn to move pages
function home() {
  router.push({
    name: 'LandingPage',
  })
}

</script>
