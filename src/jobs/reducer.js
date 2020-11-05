const jobs = (state = {}, action) => {
	return action.type === "DELETE_JOB" ? {} : state;
};

export default jobs;
