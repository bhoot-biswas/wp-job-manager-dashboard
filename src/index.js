/**
 * WordPress dependencies.
 */
import { render } from '@wordpress/element';
import {registerStore} from "@wordpress/data";

/**
 * Internal dependencies.
 */
import "./scss/index.scss";
import reducer from "./rootReducer";
import Dashboard from "./dashboard";

/**
 * Register store.
 */
registerStore("wpjm-dashboard", {reducer});

const appRoot = document.getElementById("wpjm-dashboard");
if (appRoot) {
	render(<Dashboard />, appRoot);
}
