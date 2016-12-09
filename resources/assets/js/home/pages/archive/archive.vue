<template>
    <section>
        <loading v-if="isLoading"></loading>
        <div class="archive" v-for="(item, index) in archive" v-if="!isLoading">
            <h2 class="year">{{ index }}</h2>
            <div class="post-item" v-for="post in item">
                <div class="post-time">{{ post.created_date }}</div>
                <router-link class="post-title-link" :to="{ name: 'post', params: {postName:post.id }}">
                    {{ post.title }}
                </router-link>
            </div>
        </div>
    </section>
</template>
<style lang="scss" rel="stylesheet/scss">
    @import '../../../../sass/home/mixins.scss';
    @import '../../../../sass/home/variables.scss';

    .archive {
        line-height: 1.6;
        margin: 3em auto;
        max-width: 720px;
        .year {
            margin: 20px 0;
            font-size: 28px;
            font-weight: 400;
            font-family: $global-serif-font-family;
        }
        .post-item {
            padding: 2px 10px;
            border-left: $archive-item-border;
            .post-title-link{
                color: $global-theme-color;
            }
            &:hover {
                padding-left: 13px;
                border-left: $archive-item-hover-border;
                transition: 0.2s ease-out;

                .post-time {
                    color: darken($global-dark-gray, 10%);
                }
            }
        }
        .post-time {
            display: inline-block;
            // width: 12%;
            margin: 0 10px;
            color: $global-dark-gray;
        }
    }
    @media screen and (max-width: 800px){
        .archive  {
            width: 100%;
        }
    }
</style>
<script>
    import Vue from 'vue';
    import {mapState, mapActions} from 'vuex';

    const ArchiveComponent = {
        name: 'archive',
        computed: {
            ...mapState({
                archive: state => state.archive.archive,
                isLoading: state => state.archive.isLoading
            })
        },
        methods: {
            ...mapActions(['getArchive'])
        },
        created() {
            this.getArchive();
        }
    };
    export default ArchiveComponent;
</script>