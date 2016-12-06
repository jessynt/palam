<template>
    <ul class="navbar">
        <li class="navbar-item">
            <router-link :to="{ name: 'home'}">Home</router-link>
        </li>
        <li class="navbar-item">
            <router-link :to="{ name: 'archive'}">Archive</router-link>
        </li>
    </ul>
</template>
<style lang="scss" rel="stylesheet/scss">
    @import '../../../../sass/home/mixins.scss';
    @import '../../../../sass/home/variables.scss';
    .navbar {
        float: right;
        margin-top: 0;
        font-family: Athelas, Times New Roman, STHeiti, Microsoft Yahei, serif;
        .navbar-item {
            display: inline-block;
            padding: $navbar-link-padding;
            a {
                font-size: $navbar-font-size;
                &:hover {
                    transition: 0.1s ease-out;
                    border-radius: 2px;
                    border-bottom: $navbar-active-border
                }
            }
        }
    }
</style>
<script type="text/babel">
    import Vue from 'vue';
    export default {
        data(){
            return {
                msg: 'hello vue'
            }
        }
    };
</script>
