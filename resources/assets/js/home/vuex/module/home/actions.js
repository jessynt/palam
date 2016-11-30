import PostService from '../../../common/services/PostService';
import {createAction} from '../../helpers';
import {QUERY_POSTS_LIST, RECEIVE_POSTS_LIST} from './mutation_types';

const loadPostList = ({state, commit}, page) => {
    commit(QUERY_POSTS_LIST);
    const pagination = {
        ...state.posts.pagination,
        current_page: page
    };
    new PostService().queryPostList(pagination)
        .then((result = {}) => {
            commit(createAction(RECEIVE_POSTS_LIST, {
                result: result
            }));
        })
        .catch(console.error);
};
export default {loadPostList};