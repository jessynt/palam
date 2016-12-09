import {GET_TAG, RECEIVE_TAG} from './mutation_types';

export default {
    [GET_TAG](state = {}) {
        state.isLoading = true;
    },

    [RECEIVE_TAG](state = {}, mutation) {
        state.isLoading = false;
        mutation && (state.tag = mutation.payload.data);
    }
};