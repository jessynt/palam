import actions from './actions';
import mutations from './mutations';

export default {
    state: {
        posts: {
            list: [],
            pagination: {
                current_page: 1,
                prev_page: 1,
                next_page: 1
            },
            isLoading: false
        }
    },
    getters: {
        posts: state => state.posts
    },
    actions,
    mutations
};
