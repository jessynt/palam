import PostService from '../../../common/services/PostService';

import {createAction} from '../../helpers';
import {GET_POST, RECEIVE_POST} from './mutation_types';

const getPost = ({commit}, {postName, router}) => {
    commit(GET_POST);
    new PostService().getPostByName(postName)
        .then(result => {
            if (result.data) {
                return result;
            } else {
                throw new Error('Post not found!');
            }
        })
        .then(result => commit(createAction(RECEIVE_POST, result)))
        .catch(err => {
            router.replace('/');
        });
};

export default {getPost};