import {
    __experimentalNavigation as Navigation,
    __experimentalNavigationGroup as NavigationGroup,
    __experimentalNavigationItem as NavigationItem,
    __experimentalNavigationMenu as NavigationMenu,
} from '@wordpress/components';

const MyNavigation = () => (
    <Navigation>
        <NavigationMenu>
            <NavigationGroup>
                <NavigationItem item="item-1" title="Item 1" />
                <NavigationItem item="item-2" title="Item 2" />
            </NavigationGroup>
        </NavigationMenu>
    </Navigation>
);

export default MyNavigation;
