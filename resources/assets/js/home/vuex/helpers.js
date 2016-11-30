const createAction = (type = '', data = '') => ({ type: type, payload: data });

export { createAction };