<template>
    <div class="nav">
        <a v-for="item in data" :key="item" class="nav_main">{{ item }}</a>
    </div>
</template>
<script>
export default {
    name : 'Header',

    props: {
        data: Array,
    }
}
</script>
<style>
    
</style>