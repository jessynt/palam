<template>
    <div class="pagination">
        <router-link class="prev" :to="{go :'/', query: {page : pagination.prev_page}}" v-if="pagination.prev_page">
            上一页
        </router-link>
        <router-link class="next" :to="{go :'/', query: {page : pagination.next_page}}" v-if="pagination.next_page > 1">
            下一页
        </router-link>
    </div>
</template>
<style lang="scss" rel="stylesheet/scss">
    .pagination {
        margin-top: 2em;
        margin-bottom: 4em;
        padding: 1em 0;
        .prev {
            float: left;
        }
        .next {
            float: right;
        }
        .prev, .next {
            color: #34495e;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            font-size: 20px;
            font-family: Athelas, Times New Roman, STHeiti, Microsoft Yahei, serif;
            &:hover {
                color: #0a568c;
            }
        }
    }
</style>
<script>
    export default{
        props: ['pagination']
    }
</script>