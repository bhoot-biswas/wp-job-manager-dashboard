/**
 * WordPress dependencies.
 */
import {render} from "@wordpress/element";
import {registerStore} from "@wordpress/data";

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

/**
 * Register store.
 */
registerStore("wpjm-dashboard", {
	reducer,
	actions,
	selectors,
	controls,
	resolvers
});

const appRoot = document.getElementById("wpjm-dashboard");
if (appRoot) {
	render(<Dashboard />, appRoot);
}
