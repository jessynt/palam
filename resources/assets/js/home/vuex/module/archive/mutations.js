import {GET_ARCHIVE, RECEIVE_ARCHIVE} from './mutation_types';


export default {
    [GET_ARCHIVE](state = {}) {
        state.isLoading = true;
    },

    [RECEIVE_ARCHIVE](state = {}, mutation) {
        state.isLoading = false;

        mutation && (state.archive = mutation.payload.data);
    }
};