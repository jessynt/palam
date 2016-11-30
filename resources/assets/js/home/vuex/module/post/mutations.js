import {GET_POST, RECEIVE_POST} from './mutation_types';

export default {
    [GET_POST](state = {}) {
        state.isLoading = true;
    },

    [RECEIVE_POST](state = {}, mutation) {
        state.isLoading = false;
        mutation && (state.post = mutation.payload.data);
    }
};