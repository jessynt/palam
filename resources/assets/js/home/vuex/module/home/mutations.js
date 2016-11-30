import {QUERY_POSTS_LIST, RECEIVE_POSTS_LIST} from './mutation_types';

export default {

    [QUERY_POSTS_LIST](state = {}) {
        state.posts.isLoading = true;
    },

    [RECEIVE_POSTS_LIST](state = {}, mutation = {}) {
        let pagination = mutation.payload.result.meta.pagination;
        if (pagination.links.next) {
            state.posts.pagination.next_page = pagination.current_page + 1;
        }
        state.posts.pagination.prev_page = pagination.links.previous ? pagination.current_page - 1 : null;

        state.posts.list = mutation.payload.result.data;
        state.posts.isLoading = false;
    }
};