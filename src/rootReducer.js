import {combineReducers} from "@wordpress/data";
import jobs from "./jobs/reducer";

const rootReducer = combineReducers({
	jobs
});

export default rootReducer;
