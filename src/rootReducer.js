import {combineReducers} from "@wordpress/data";
import jobs from "./jobs/reducer";

const prices = (state = {}, action) => {
	return action.type === "SET_PRICE"
		? {
				...state,
				[action.item]: action.price
		  }
		: state;
};

const discountPercent = (state = 0, action) => {
	return action.type === "START_SALE" ? action.discountPercent : state;
};

const rootReducer = combineReducers({
	jobs,
	prices,
	discountPercent
});

export default rootReducer;
