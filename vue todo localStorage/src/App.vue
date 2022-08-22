<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>


      <nav>
      <RouterLink to="/new">new</RouterLink>
      <RouterLink to="/list">list</RouterLink>
        <RouterLink to="/pending">pending</RouterLink>
        <RouterLink to="/done">done</RouterLink>
        <RouterLink to="/search">search</RouterLink>
   
    

      </nav>
   

  <RouterView />
</template>
