<template>
    <div class="wrapper">
        <page-header></page-header>
        <main>
            <router-view></router-view>
        </main>
        <page-footer></page-footer>
    </div>
</template>
<style lang="scss" rel="stylesheet/scss">
    .wrapper {
        width: 980px;
        margin: 0 auto;
        main {
            margin: 32px 15px;
        }
        a {
            color: #34495e;
            text-decoration: none;
        }
    }

    @media screen and (max-width: 980px) {
        .wrapper {
            width: 100%;
        }
    }
</style>
<script>
    import Vue from 'vue';
    export default {
        name: 'app'
    };
</script>