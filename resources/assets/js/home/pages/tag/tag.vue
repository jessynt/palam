<template>
    <section>
        <loading v-if="isLoading"></loading>
        <div class="archive" v-if="!isLoading">
            <h2 class="year">{{ tagName }}</h2>
            <div class="post-item" v-for="post in tag.posts.data">
                <div class="post-time">{{ post.created_date }}</div>
                <router-link class="post-title-link" :to="{ name: 'post', params: {postName:post.id }}">
                    {{ post.title }}
                </router-link>
            </div>
        </div>
    </section>
</template>
<script>
    import Vue from 'vue';
    import {mapState, mapActions} from 'vuex';

    const TagComponent = {
        name: 'tag',
        computed: {
            ...mapState({
                tag: state => state.tag.tag,
                tagName: state => state.route.params.tagName,
                isLoading: state => state.tag.isLoading
            })
        },
        methods: {
            ...mapActions(['getTag'])
        },
        created() {
            this.getTag({tagName: this.tagName, router: this.$router});
        }
    };
    export default TagComponent;
</script>