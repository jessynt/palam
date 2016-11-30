<template>
    <footer>
        <div class="copyright">
            <p>© 2015 - 2016 <span>Jessynt</span>.</p>
        </div>
    </footer>
</template>
<style lang="scss" rel="stylesheet/scss">
    footer {
        padding-top: 40px;
        display: flex;
        color: #FFFFFF;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-top: 1px solid #ddd;
        & .copyright {
            padding-top: 10px;
            & p, & a {
                color: #aaa;
                font-size: 14px;
                font-weight: 100;
            }
        }
    }
</style>
<script>
    import Vue from 'vue';
    export default Vue.component('page-footer', {});
</script>
