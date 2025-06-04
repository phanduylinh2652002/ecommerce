<template>
  <div class="layout-wrapper" :class="containerClass">
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
  <Toast/>
</template>
<script setup>
import Header from "../Components/Header.vue";
import Sidebar from '../Components/Sidebar.vue'
import {computed} from "vue";
import { useLayout } from "./composables/layout.js";

const { layoutConfig, layoutState } = useLayout();

const containerClass = computed(() => {
  return {
    'layout-overlay': layoutConfig.menuMode === 'overlay',
    'layout-static': layoutConfig.menuMode === 'static',
    'layout-static-inactive': layoutState.staticMenuDesktopInactive && layoutConfig.menuMode === 'static',
    'layout-overlay-active': layoutState.overlayMenuActive,
    'layout-mobile-active': layoutState.staticMenuMobileActive
  };
});
</script>
