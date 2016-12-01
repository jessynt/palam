import httpFetch, * as FetchService from './FetchService';
const API_URL = '/api/post/archive';

export default class ArchiveService {
    queryArchive() {
        return httpFetch(FetchService.generatorUrl(API_URL));
    }
}