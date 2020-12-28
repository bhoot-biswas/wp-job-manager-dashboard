export default {
	fetchFromAPI(path) {
		return {
			type: "FETCH_FROM_API",
			path
		};
	}
};
