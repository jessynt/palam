import {GET_ARCHIVE, RECEIVE_ARCHIVE} from './mutation_types';
import {createAction} from '../../helpers';
import ArchiveService from '../../../common/services/ArchiveService';

const getArchive = ({commit, router}) => {
    commit(GET_ARCHIVE);
    new ArchiveService().queryArchive()
        .then(result => commit(createAction(RECEIVE_ARCHIVE, result)))
        .catch(err => {
            router.replace('/');
        });
};

export default {getArchive};