import httpFetch, * as FetchService from './FetchService';

const API_URL = '/api/tag';

export default class TagService {
    getTagByName(TagName) {
        const query = `include=posts`;
        return httpFetch(FetchService.generatorUrl(API_URL + `/${TagName}`, query));
    }
}