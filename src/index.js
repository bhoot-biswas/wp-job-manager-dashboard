/**
 * WordPress dependencies.
 */
import {render} from "@wordpress/element";
import {createReduxStore, register} from "@wordpress/data";

/**
 * Internal dependencies.
 */
import "./scss/index.scss";
import reducer from "./rootReducer";
import actions from "./actions";
import selectors from "./selectors";
import controls from "./controls";
import resolvers from "./resolvers";
import Dashboard from "./dashboard";

// const store = createReduxStore("job-manager", {
// 	reducer,
// 	actions,
// 	selectors,
// 	controls,
// 	resolvers
// });

/**
 * Register store.
 */
// register(store);

const appRoot = document.getElementById("wpjm-dashboard");
if (appRoot) {
	render(<Dashboard />, appRoot);
}
