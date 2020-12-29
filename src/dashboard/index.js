import {withDispatch} from "@wordpress/data";

function Button({onClick}) {
	return (
		<button type="button" onClick={onClick}>
			Start Sale!
		</button>
	);
}

const Dashboard = withDispatch((dispatch, ownProps, {select}) => {
	// Stock number changes frequently.
	const {getStockNumber} = select("job-manager");
	const {startSale} = dispatch("job-manager");
	return {
		onClick() {
			const discountPercent = getStockNumber() > 50 ? 10 : 20;
			startSale(discountPercent);
		}
	};
})(Button);

export default Dashboard;
