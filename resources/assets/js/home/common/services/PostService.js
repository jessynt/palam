import httpFetch, * as FetchService from './FetchService';

const API_URL = '/api/post';

export default class PostService {
    queryPostList({current_page} = {}) {
        const QUERY_POST_LIST = {page: current_page};
        return httpFetch(FetchService.generatorUrl(API_URL, QUERY_POST_LIST));
    }

    getPostByName(postName) {
        return httpFetch(FetchService.generatorUrl(API_URL + `/${postName}`));
    }
}