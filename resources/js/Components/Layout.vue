<template>
    <v-app id="inspire">
      <v-navigation-drawer v-model="menu">
        <!--  -->
      </v-navigation-drawer>
  
      <v-app-bar>
        <v-app-bar-nav-icon @click="menu = !menu">
          <v-icon :icon="mdiMenu" />
        </v-app-bar-nav-icon>
  
        <v-app-bar-title>Application</v-app-bar-title>
      </v-app-bar>
  
      <v-main>
        <slot></slot>
      </v-main>
    </v-app>
  </template>
  
  <script setup>
    import { mdiMenu } from '@mdi/js'
  </script>
  
  <script>
  export default {
    name: "Layout",
    data: () => ({
      menu: false
    })
  };
  </script>