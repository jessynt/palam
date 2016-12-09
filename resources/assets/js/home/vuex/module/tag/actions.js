import {createAction} from '../../helpers';
import {GET_TAG, RECEIVE_TAG} from './mutation_types';
import TagService from "../../../common/services/TagService";

const getTag = ({commit}, {tagName, router}) => {
    commit(GET_TAG);
    new TagService().getTagByName(tagName)
        .then(result => {
            if (result.data) {
                return result;
            } else {
                throw new Error('Tag not found!');
            }
        })
        .then(result => commit(createAction(RECEIVE_TAG, result)))
        .catch(err => {
            router.replace('/');
        });
};

export default {getTag};