<template>
    <div class="layout-wrapper">
        <Header></Header>
      <Sidebar></Sidebar>
        <div class="layout-main-container">
            <div class="layout-main">
                <main>
                    <slot></slot>
                </main>
            </div>
        </div>
        <div class="layout-mask animate-fadein"></div>
    </div>
    <Toast />
</template>
<script setup>
import Header from "../Components/Header.vue";
import Sidebar from '../Components/Sidebar.vue'
</script>
