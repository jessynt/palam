<template>
    <section>
        <loading v-if="isLoading"></loading>
        <post-list v-if="!isLoading" :post-list="posts.list"></post-list>
        <pagination v-if="!isLoading" :pagination="posts.pagination"></pagination>
    </section>
</template>
<script>
    import Vue from 'vue';
    import {mapState, mapGetters, mapActions} from 'vuex';

    export default {
        name: 'home',
        computed: {
            ...mapState({
                isLoading: state => state.home.posts.isLoading
            }),
            ...mapGetters(['posts'])
        },
        methods: mapActions(['loadPostList']),
        created () {
            let page = this.$route.query.page || 1;
            this.loadPostList(page);
        },
        watch: {
            '$route': function (val) {
                let page = val.query.page || 1;
                this.loadPostList(page);
            }
        }
    }
</script>